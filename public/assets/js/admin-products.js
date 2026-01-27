$(function(){
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
      { data: 'price', name: 'price' },
      { data: 'has_offer', name: 'has_offer', render: function(d){ return d ? 'Yes' : 'No'; } },
      { data: 'actions', orderable: false, searchable: false }
    ]
  });

  function clearFormErrors($form){
    $form.find('.is-invalid').removeClass('is-invalid');
    $form.find('.invalid-feedback').text('');
  }

  function fillForm(data){
    const $form = $('#productForm');
    $form.find('[name="name_en"]').val(data.translations?.find(t=>t.locale==='en')?.name || data.name_en || '');
    $form.find('[name="name_ar"]').val(data.translations?.find(t=>t.locale==='ar')?.name || data.name_ar || '');
    $form.find('[name="details_en"]').val(data.translations?.find(t=>t.locale==='en')?.details || data.details_en || '');
    $form.find('[name="details_ar"]').val(data.translations?.find(t=>t.locale==='ar')?.details || data.details_ar || '');
    $form.find('[name="price"]').val(data.price || '');
    const $cb = $form.find('#hasOfferCheckbox');
    $cb.prop('checked', !!data.has_offer);
    $form.find('[name="has_offer"]').val(data.has_offer ? '1' : '0');
    $form.find('[name="offer_type"]').val(data.offer_type || '');
    $form.find('[name="offer_amount"]').val(data.offer_amount || '');
    toggleOfferFieldsFor($form);
    calculateFinalPriceFor($form);
  }

  

  // $('#createProductBtn').on('click', function(){
    // currentActionUrl = PRODUCTS_STORE_URL;
    // currentMethod = 'POST';
    // $('#productModalLabel').text('Create Product');
    // $form[0].reset();
    // clearFormErrors();
    // $('#form_method').val('POST');
    // $hasOfferCheckbox.prop('checked', false);
    // $form.find('[name="has_offer"]').val('0');
    // toggleOfferFields();
    // productModal.show();
  // });

  // $('#products-table').on('click', '.edit-btn', function(){
    // const id = $(this).data('id');
    // const url = `${PRODUCTS_BASE_URL}/${id}`;
    // $.get(url).done(function(res){
    //   fillForm(res);
    //   clearFormErrors();
    //   currentActionUrl = url;
    //   currentMethod = 'PUT';
    //   $('#form_method').val('PUT');
    //   $('#productModalLabel').text('Edit Product');
    //   productModal.show();
    // }).fail(function(){
    //   Swal.fire('Error', 'Unable to fetch product', 'error');
    // });
  // });

  $('#products-table').on('click', '.delete-btn', function(){
    const id = $(this).data('id');
    const url = `${PRODUCTS_BASE_URL}/${id}`;
    Swal.fire({
      title: 'Delete?',
      text: 'This action cannot be undone',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Delete'
    }).then((result)=>{
      if (result.isConfirmed) {
        $.ajax({ url: url, method: 'DELETE' }).done(function(){
          table.ajax.reload(null, false);
          Swal.fire('Deleted', '', 'success');
        }).fail(function(){
          Swal.fire('Error', 'Delete failed', 'error');
        });
      }
    });
  });

  $(document).on('click', '#saveProductBtn', function(){
    const $form = $('#productForm');
    const $cb = $form.find('#hasOfferCheckbox');
    $form.find('[name="has_offer"]').val($cb.is(':checked') ? '1' : '0');
    const data = $form.serialize();
    const method = currentMethod === 'PUT' ? 'POST' : currentMethod;
    $.ajax({
      url: currentActionUrl,
      method: method,
      data: data,
    }).done(function(resp){
      try { productModal.hide(); } catch(e){}
      table.ajax.reload(null, false);
      Swal.fire('Success', resp.message || 'Saved', 'success');
    }).fail(function(xhr){
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

  function toggleOfferFieldsFor($form){
    const $cb = $form.find('#hasOfferCheckbox');
    const $offerFields = $form.find('#offerFields');
    const $offerFieldsSection = $form.find('#offerFieldsSection');
    const $finalPriceSection = $form.find('#finalPriceSection');
    if ($cb.is(':checked')){
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

  function calculateFinalPriceFor($form){
    const price = parseFloat($form.find('[name="price"]').val());
    const hasOffer = $form.find('#hasOfferCheckbox').is(':checked');
    const type = $form.find('[name="offer_type"]').val();
    const amount = parseFloat($form.find('[name="offer_amount"]').val());
    const $finalPriceDisplay = $form.find('#finalPriceDisplay');
    if (!hasOffer || isNaN(price)){
      $finalPriceDisplay.text('-');
      return;
    }
    if (type === 'percent' && !isNaN(amount)){
      const finalP = price - (price * (amount / 100));
      $finalPriceDisplay.text(finalP.toFixed(2));
      return;
    }
    if (type === 'value' && !isNaN(amount)){
      const finalP = price - amount;
      $finalPriceDisplay.text(finalP.toFixed(2));
      return;
    }
    $finalPriceDisplay.text('-');
  }

  $(document).on('change', '#hasOfferCheckbox', function(){
    let $form = $(this).closest('form');
    if (!$form.length) $form = $(this).closest('.modal').find('#productForm');
    if (!$form.length) $form = $('#productForm');
    toggleOfferFieldsFor($form);
    calculateFinalPriceFor($form);
  });
  $(document).on('input', '#productForm [name="price"]', function(){
    let $form = $(this).closest('form'); if (!$form.length) $form = $(this).closest('.modal').find('#productForm');
    calculateFinalPriceFor($form);
  });
  $(document).on('change', '#productForm [name="offer_type"]', function(){
    let $form = $(this).closest('form'); if (!$form.length) $form = $(this).closest('.modal').find('#productForm');
    calculateFinalPriceFor($form);
  });
  $(document).on('input', '#productForm [name="offer_amount"]', function(){
    let $form = $(this).closest('form'); if (!$form.length) $form = $(this).closest('.modal').find('#productForm');
    calculateFinalPriceFor($form);
  });

});
