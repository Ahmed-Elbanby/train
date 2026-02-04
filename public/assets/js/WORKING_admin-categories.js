$(function () {
  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
  });

  
  const table = $('#categories-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: Categories_DATA_URL,
    columns: [
      { data: 'id', name: 'id' },
      { data: 'photo', name: 'photo' },
      { data: 'name_en', name: 'translations.name' },
      { data: 'name_ar', name: 'translations.name' },
      { data: 'actions', orderable: false, searchable: false }
    ]
  });
  // expose table for other handlers
  window.CategoriesTable = table;
  
  // Note: modals are loaded into #globalModal by modal-loader.js
  let currentActionUrl = (typeof Categories_STORE_URL !== 'undefined') ? Categories_STORE_URL : null;
  let currentMethod = 'POST';

  $(document).on('click', '#saveCategoryBtn', function () {
    const $form = $('#categoryForm');
    if (!$form.length) return;

    // Determine HTTP method to send. If currentMethod === 'PUT' we must spoof via _method and send POST.
    const isPut = (typeof currentMethod !== 'undefined' && currentMethod === 'PUT');
    const ajaxMethod = isPut ? 'POST' : (typeof currentMethod !== 'undefined' ? currentMethod : 'POST');

    const formData = new FormData($form[0]);
    if (isPut) {
      formData.append('_method', 'PUT');
    }

    const actionUrl = $form.attr('action') || currentActionUrl;
    if (!actionUrl) { console.error('No action URL for category form'); return; }
    console.debug('Saving category', { actionUrl: actionUrl, method: ajaxMethod });

    $.ajax({
      url: actionUrl,
      method: ajaxMethod,
      data: formData,
      processData: false,
      contentType: false,
      cache: false,
    }).done(function (resp) {
      try { $('#globalModal').modal('hide'); } catch (e) { }
      if (typeof table !== 'undefined' && table) table.ajax.reload(null, false);
      Swal.fire('Success', resp.message || 'Saved', 'success');
    }).fail(function (xhr) {
      if (xhr.status === 422) {
        const errors = xhr.responseJSON.errors || {};
        try { clearFormErrors($form); } catch (e) {}
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
});