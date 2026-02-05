$(function () {
  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
  });

  const productModal = new bootstrap.Modal(document.getElementById('productModal'));
  let currentActionUrl = PRODUCTS_STORE_URL;
  let currentMethod = 'POST';

  const table = $('#products-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: PRODUCTS_DATA_URL,
    columns: [
      { data: 'id', name: 'id' },
      { data: 'name_en', name: 'translations.name' },
      { data: 'name_ar', name: 'translations.name' },
      { data: 'Category', name: 'category' },
      { data: 'price', name: 'price' },
      { data: 'has_offer', name: 'has_offer', render: function (d) { return d ? 'Yes' : 'No'; } },
      { data: 'actions', orderable: false, searchable: false }
    ]
  });

  function clearFormErrors($form) {
    $form.find('.is-invalid').removeClass('is-invalid');
    $form.find('.invalid-feedback').text('');
  }

  $(document).on('change', '#parentCategorySelect', function () {
    const categoryId = $(this).val();
    const $subCategorySelect = $('#subCategorySelect');
    const getSubCategoriesUrl = $(this).data('get-subcategories-url').replace(':category', categoryId);
    console.log('Parent category changed');
    if (categoryId) {
      console.log('Fetching sub-categories for category ID:', categoryId);
        $subCategorySelect.empty().append('<option value="">Loading..</option>');
      $.ajax({
        url: getSubCategoriesUrl,
        method: 'GET'
      }).done(function (res) {
        $subCategorySelect.empty().append('<option value="">Choose Sub Category</option>');
        $.each(res, function (i, subCat) {
          $subCategorySelect.append(`<option value="${subCat.id}">${subCat.name}</option>`);
        });
        $subCategorySelect.prop('disabled', false);
        // $subCategorySelect.trigger('subcategories.loaded', [res]);
      }).fail(function () {
        $subCategorySelect.empty().append('<option value="">Failed To Load Sub Categories</option>');
        Swal.fire('Error', 'Failed to fetch sub categories', 'error');
      });
    } else {
      $subCategorySelect.empty().append('<option value="">Choose Parent Category First</option>');
      $subCategorySelect.prop('disabled', true);
    }
  });

    // // When an edit modal is shown, pre-select parent/subcategory according to the product
    // $(document).on('shown.bs.modal', '#globalModal', function () {
    //   const $modal = $(this);
    //   const $form = $modal.find('#productForm');
    //   if (!$form.length) return;

    //   const currentCatId = $modal.find('#currentProductCategoryId').val();
    //   const currentParentId = $modal.find('#currentProductCategoryParentId').val();
    //   const $parentSelect = $form.find('#parentCategorySelect');
    //   const $subSelect = $form.find('#subCategorySelect');

    //   if (!currentCatId) return;

    //   if (currentParentId) {
    //     // product's category is a subcategory: select its parent, load children and select the product category
    //     $parentSelect.val(currentParentId).trigger('change');
    //     $subSelect.one('subcategories.loaded', function (e, res) {
    //       $subSelect.val(currentCatId).prop('disabled', false);
    //     });
    //   } else {
    //     // product's category is a parent: select parent and load its subcategories (no selection)
    //     $parentSelect.val(currentCatId).trigger('change');
    //     // no further action needed; subcategories will be loaded by change handler
    //   }
    // });

  $('#products-table').on('click', '.delete-btn', function () {
    const id = $(this).data('id');
    const url = `${PRODUCTS_BASE_URL}/${id}`;
    Swal.fire({
      title: 'Delete?',
      text: 'This action cannot be undone',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Delete'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({ url: url, method: 'DELETE' }).done(function () {
          table.ajax.reload(null, false);
          Swal.fire('Deleted', '', 'success');
        }).fail(function () {
          Swal.fire('Error', 'Delete failed', 'error');
        });
      }
    });
  });

  $(document).on('click', '#saveProductBtn', function () {
    const $form = $('#productForm');
    const $cb = $form.find('#hasOfferCheckbox');
    $form.find('[name="has_offer"]').val($cb.is(':checked') ? '1' : '0');
    const data = $form.serialize();
    const actionUrl = $form.attr('action') || currentActionUrl;
    // Always send as POST so server receives full form data; form may include _method for PUT
    $.ajax({
      url: actionUrl,
      method: 'POST',
      data: data,
    }).done(function (resp) {
      $('#globalModal').modal('hide');
      table.ajax.reload(null, false);
      Swal.fire('Success', resp.message || 'Saved', 'success');
    }).fail(function (xhr) {
      if (xhr.status === 422) {
        const errors = xhr.responseJSON.errors || {};
        clearFormErrors($form);
        for (let key in errors) {
          const $el = $form.find(`[name="${key}"]`);
          $el.addClass('is-invalid');
          $el.closest('.mb-3').find('.invalid-feedback').text(errors[key][0]);
        }
      } else {
        const msg = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred';
        Swal.fire('Error', msg, 'error');
      }
    });
  });

  function toggleOfferFieldsFor($form) {
    const $cb = $form.find('#hasOfferCheckbox');
    const $offerFields = $form.find('#offerFields');
    const $offerFieldsSection = $form.find('#offerFieldsSection');
    const $finalPriceSection = $form.find('#finalPriceSection');
    if ($cb.is(':checked')) {
      $offerFields.show();
      $offerFieldsSection.show();
      $finalPriceSection.show();
    } else {
      $offerFields.hide();
      $offerFieldsSection.hide();
      $form.find('#finalPriceDisplay').text('-');
      $finalPriceSection.hide();
    }
  }

  function calculateFinalPriceFor($form) {
    const price = parseFloat($form.find('[name="price"]').val());
    const hasOffer = $form.find('#hasOfferCheckbox').is(':checked');
    const type = $form.find('[name="offer_type"]').val();
    const amount = parseFloat($form.find('[name="offer_amount"]').val());
    const $finalPriceDisplay = $form.find('#finalPriceDisplay');
    if (!hasOffer || isNaN(price)) {
      $finalPriceDisplay.text('-');
      return;
    }
    if (type === 'percent' && !isNaN(amount)) {
      const finalP = price - (price * (amount / 100));
      $finalPriceDisplay.text(finalP.toFixed(2));
      return;
    }
    if (type === 'value' && !isNaN(amount)) {
      const finalP = price - amount;
      $finalPriceDisplay.text(finalP.toFixed(2));
      return;
    }
    $finalPriceDisplay.text('-');
  }

  $(document).on('change', '#hasOfferCheckbox', function () {
    let $form = $(this).closest('form');
    if (!$form.length) $form = $(this).closest('.modal').find('#productForm');
    if (!$form.length) $form = $('#productForm');
    toggleOfferFieldsFor($form);
    calculateFinalPriceFor($form);
  });
  $(document).on('input', '#productForm [name="price"]', function () {
    let $form = $(this).closest('form'); if (!$form.length) $form = $(this).closest('.modal').find('#productForm');
    calculateFinalPriceFor($form);
  });
  $(document).on('change', '#productForm [name="offer_type"]', function () {
    let $form = $(this).closest('form'); if (!$form.length) $form = $(this).closest('.modal').find('#productForm');
    calculateFinalPriceFor($form);
  });
  $(document).on('input', '#productForm [name="offer_amount"]', function () {
    let $form = $(this).closest('form'); if (!$form.length) $form = $(this).closest('.modal').find('#productForm');
    calculateFinalPriceFor($form);
  });

});
