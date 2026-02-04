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

    $(document).on('click', '#saveCategoryBtn', function (e) {
        e.preventDefault();

        const $form = $('#categoryForm');
        const formData = new FormData($form[0]);
        const actionUrl = $form.attr('action');
        $.ajax({
            url: actionUrl,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                $('#globalModal').modal('hide');
                window.CategoriesTable.ajax.reload();
                Swal.fire('Success', response.message || 'Saved', 'success');
            },
            error: function (xhr, status, error) {
                console.error('Error saving category:', error);
            }
        });
    });

    $(document).on('click', '#updateCategoryBtn', function (e) {
        e.preventDefault();

        const $form = $('#categoryForm');
        const formData = new FormData($form[0]);
        const actionUrl = $form.attr('action');
        $.ajax({
            url: actionUrl,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                $('#globalModal').modal('hide');
                window.CategoriesTable.ajax.reload();
                Swal.fire('Success', response.message || 'Updated', 'success');
            },
            error: function (xhr, status, error) {
                console.error('Error updating category:', xhr.responseText || error);
            }
        });
    });

    // Delete category handler (delegated for dynamic rows)
    $(document).on('click', '.delete-btn', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        if (!id) return;

        Swal.fire({
            title: 'Are you sure?',
            text: "This will permanently delete the category.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const url = Categories_BASE_URL + '/' + id;
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: { _method: 'DELETE' },
                    success: function (response) {
                        if (window.CategoriesTable) window.CategoriesTable.ajax.reload();
                        Swal.fire('Deleted!', response.message || 'Category deleted.', 'success');
                    },
                    error: function (xhr) {
                        console.error('Error deleting category:', xhr.responseText || xhr.statusText);
                        Swal.fire('Error', 'Failed to delete category', 'error');
                    }
                });
            }
        });
    });

    // $('#categories-table').on('click', '.delete-btn', function () {
    //     const id = $(this).data('id');
    //     const url = `${CATEGORIES_BASE_URL}/${id}`;
    //     Swal.fire({
    //         title: 'Delete?',
    //         text: 'This action cannot be undone',
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonText: 'Delete'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             $.ajax({ url: url, method: 'DELETE' }).done(function () {
    //                 window.CategoriesTable.ajax.reload();
    //                 Swal.fire('Deleted', '', 'success');
    //             }).fail(function () {
    //                 Swal.fire('Error', 'Delete failed', 'error');
    //             });
    //         }
    //     });
    // });

});