$(function () {
  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
  });

  const categoryModal = new bootstrap.Modal(document.getElementById('categoryModal'));
  let currentActionUrl = CATEGORIES_STORE_URL;
  let currentMethod = 'POST';

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


  $(document).on('click', '#saveCategoryBtn', function () {
    const $form = $('#categoryForm');
    const formData = new FormData($form[0]);
    const method = $form.find('[name="_method"]').val() || 'POST';
    formData.append('_method', method);
    const actionUrl = $form.attr('action') || currentActionUrl;
    // const data = $form.serialize();
    // const method = currentMethod === 'PUT' ? 'POST' : currentMethod;
    $.ajax({
      url: actionUrl,
      method: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      cache: false,
    }).done(function (resp) {
      try { categoryModal.hide(); } catch (e) { }
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






  // // AIIIIIIIIIIIII
  // // Load modal content into #globalModal and initialize handlers
  // $(document).on('click', '#createCategoryBtn, .edit-btn', function (e) {
  //   e.preventDefault();
  //   const url = $(this).data('modal');
  //   if (!url) return;
  //   $.get(url).done(function (html) {
  //     $('#modalContent').html(html);
  //     const globalModal = $('#globalModal');
  //     globalModal.modal('show');

  //     // initialize modal-specific behavior
  //     const $form = $('#modalContent').find('#categoryForm');
  //     if (!$form.length) return;

  //     // Image preview handler for the file input inside the loaded modal
  //     $form.find('input[type="file"][name="photo"]').off('change.preview').on('change.preview', function () {
  //       const file = this.files && this.files[0];
  //       if (!file) return;
  //       const container = $(this).closest('.image-input');
  //       const wrapper = container.find('.avatar-wrapper').get(0) || container.get(0);
  //       const url = URL.createObjectURL(file);
  //       if (wrapper) {
  //         wrapper.style.backgroundImage = 'url("' + url + '")';
  //         wrapper.style.backgroundRepeat = 'no-repeat';
  //         wrapper.style.backgroundPosition = 'center';
  //         wrapper.style.backgroundSize = 'cover';
  //       }
  //       setTimeout(function () { try { URL.revokeObjectURL(url); } catch (e) {} }, 2000);
  //     });

  //     // Save handler (button is outside the form in modal markup)
  //     const $saveBtn = $('#modalContent').find('#saveCategoryBtn');
  //     $saveBtn.off('click.save').on('click.save', function (ev) {
  //       ev.preventDefault();
  //       // clear previous errors
  //       $form.find('.is-invalid').removeClass('is-invalid');
  //       $form.find('.invalid-feedback').text('');

  //       const fd = new FormData($form.get(0));
  //       const action = $form.attr('action') || Categories_STORE_URL;

  //       $.ajax({
  //         url: action,
  //         method: 'POST',
  //         data: fd,
  //         processData: false,
  //         contentType: false,
  //       }).done(function (resp) {
  //         try { globalModal.modal('hide'); } catch (e) { }
  //         if (window.CategoriesTable) window.CategoriesTable.ajax.reload(null, false);
  //         Swal.fire('Success', resp.message || 'Saved', 'success');
  //       }).fail(function (xhr) {
  //         if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
  //           const errors = xhr.responseJSON.errors;
  //           Object.keys(errors).forEach(function (key) {
  //             const field = $form.find('[name="' + key + '"]');
  //             if (field.length) field.addClass('is-invalid');
  //             const feedback = field.closest('.mb-3').find('.invalid-feedback');
  //             if (feedback.length) feedback.text(errors[key][0]);
  //           });
  //         } else {
  //           const msg = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred';
  //           Swal.fire('Error', msg, 'error');
  //         }
  //       });
  //     });
  //   }).fail(function (xhr) {
  //     Swal.fire('Error', 'Failed to load modal content', 'error');
  //   });
  // });


  // // MADE BY AI To Show image preview when selecting category photo
  // // Initialize category modal specific UI (file preview)
  // document.addEventListener('DOMContentLoaded', function () {
  //   const globalModal = document.getElementById('globalModal');
  //   if (!globalModal) return;

  //   globalModal.addEventListener('shown.bs.modal', function () {
  //     const modalContent = document.getElementById('modalContent');
  //     if (!modalContent) return;

  //     // detect category form inside loaded modal
  //     const categoryForm = modalContent.querySelector('#categoryForm');
  //     if (!categoryForm) return;

  //     // prevent double-init
  //     if (categoryForm.dataset.previewInit === '1') return;
  //     categoryForm.dataset.previewInit = '1';

  //     const fileInput = categoryForm.querySelector('input[type="file"][name="photo"]');
  //     const previewElem = categoryForm.querySelector('#photoPreview') || categoryForm.querySelector('.image-input');

  //     if (!fileInput || !previewElem) return;

  //     fileInput.addEventListener('change', function () {
  //       const file = this.files && this.files[0];
  //       if (!file) return;
  //       const reader = new FileReader();
  //       reader.onload = function (ev) {
  //         try {
  //           previewElem.style.backgroundImage = `url(${ev.target.result})`;
  //         } catch (err) {
  //           console.error('Failed to set image preview:', err);
  //         }
  //       };
  //       reader.readAsDataURL(file);
  //     });
  //     // Save handler for create modal
  //     const saveBtn = categoryForm.querySelector('#saveCategoryBtn');
  //     if (saveBtn && !categoryForm.dataset.saveInit) {
  //       categoryForm.dataset.saveInit = '1';
  //       saveBtn.addEventListener('click', function () {
  //         // clear previous errors
  //         categoryForm.querySelectorAll('.is-invalid').forEach(i => i.classList.remove('is-invalid'));
  //         categoryForm.querySelectorAll('.invalid-feedback').forEach(f => f.textContent = '');

  //         const fd = new FormData(categoryForm);

  //         $.ajax({
  //           url: Categories_STORE_URL,
  //           method: 'POST',
  //           data: fd,
  //           processData: false,
  //           contentType: false,
  //           success: function (res) {
  //             // close modal
  //             try {
  //               const modalInstance = bootstrap.Modal.getInstance(globalModal);
  //               if (modalInstance) modalInstance.hide();
  //             } catch (e) {
  //               // fallback
  //               $(globalModal).modal('hide');
  //             }
  //             // reload datatable
  //             if (window.CategoriesTable) window.CategoriesTable.ajax.reload(null, false);
  //           },
  //           error: function (xhr) {
  //             if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
  //               const errors = xhr.responseJSON.errors;
  //               Object.keys(errors).forEach(function (key) {
  //                 const field = categoryForm.querySelector('[name="' + key + '"]');
  //                 const feedback = field ? field.closest('.mb-3')?.querySelector('.invalid-feedback') : null;
  //                 if (field) field.classList.add('is-invalid');
  //                 if (feedback) feedback.textContent = errors[key][0];
  //               });
  //             } else {
  //               console.error('Save category failed', xhr.responseText);
  //             }
  //           }
  //         });
  //       });
  //     }
  //   });


  // // Photo preview for modal photo input
  // $('#photo').on('change', function () {
  //   console.log('Photo input changed!');
  //   const file = this.files[0];
  //   if (file) {
  //     console.log('File selected:', file.name);
  //     const reader = new FileReader();
  //     reader.onload = function (e) {
  //       console.log('File loaded, updating preview...');
  //       $('#photoPreview').css('background-image', 'url(' + e.target.result + ')');
  //     }
  //     reader.readAsDataURL(file);
  //   }
  // });



  // alert('admin-categories.js loaded');
});