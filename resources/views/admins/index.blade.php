@extends('layouts.app')

@section('title', __('dash.admins_control'))

@section('content')

    <!-- Add Admin Button -->
    <div class="mb-3">
        <button type="button" class="btn btn-primary" onclick="openCreateModal()">
            <i class="fa fa-plus"></i> {{ __('dash.add_admin') }}
        </button>
    </div>

    <table id="admins_table" class="table card-table align-middle mb-0">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('dash.photo') }}</th>
                <th>{{ __('dash.name') }}</th>
                <th>{{ __('dash.email') }}</th>
                <th>{{ __('dash.username') }}</th>
                <th>{{ __('dash.phone') }}</th>
                <th>{{ __('dash.actions') }}</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <!-- Combined Admin Modal -->
    <!-- <div class="modal fade" id="generalAdminModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 id="adminModalTitle" class="modal-title"></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form id="AdminForm" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="_method" id="formMethod">
                                                <input type="hidden" name="admin_id" id="admin_id">
                                                <div class="modal-body">
                                                    <div class="mb-3 text-center">
                                                        <div class="image-input avatar xxl rounded-4"
                                                            style="background-image: url('{{ asset('assets/img/avatar.png') }}')" id="photoPreview">
                                                            <div class="avatar-wrapper rounded-4"></div>
                                                            <div class="file-input">
                                                                <input type="file" class="form-control" name="photo" id="create_photo">
                                                                <label for="create_photo" class="fa fa-pencil shadow"></label>
                                                            </div>
                                                            <div class="invalid-feedback"></div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('dash.name') }} *</label>
                                                        <input type="text" id="name" name="name" class="form-control" required>
                                                        <div class="invalid-feedback"></div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('dash.email') }} *</label>
                                                        <input type="email" id="email" name="email" class="form-control" required>
                                                        <div class="invalid-feedback"></div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('dash.username') }}</label>
                                                        <input type="text" id="username" name="username" class="form-control">
                                                        <div class="invalid-feedback"></div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('dash.password') }} *</label>
                                                        <input type="password" id="password" name="password" class="form-control" required>
                                                        <div class="invalid-feedback"></div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('dash.confirm_password') }} *</label>
                                                        <input type="password" name="password_confirmation" class="form-control" required>
                                                        <div class="invalid-feedback"></div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('dash.phone') }}</label>
                                                        <input type="text" id="phone" name="phone" class="form-control">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                        {{ __('dash.cancel') }}
                                                    </button>
                                                    <button type="submit" id="submitBtn" class="btn btn-primary">
                                                        <span class="submit-text"></span>
                                                        <span class="loading-text d-none">
                                                            <i class="fa fa-spinner fa-spin"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> -->
    <!-- <div class="modal fade" id="adminModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 id="adminModalTitle"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <form id="adminForm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" id="formMethod">
                            <input type="hidden" name="admin_id" id="admin_id">

                            <div class="modal-body">

                                <div class="mb-3 text-center">
                                    <div class="image-input avatar xxl rounded-4" id="photoPreview"
                                        style="background-image:url('{{ asset('assets/img/avatar.png') }}')">
                                        <input type="file" name="photo" class="form-control">
                                    </div>
                                </div>

                                <input type="text" name="name" id="name" class="form-control mb-2" placeholder="Name">
                                <input type="email" name="email" id="email" class="form-control mb-2" placeholder="Email">
                                <input type="text" name="username" id="username" class="form-control mb-2" placeholder="Username">
                                <input type="text" name="phone" id="phone" class="form-control mb-2" placeholder="Phone">

                                <div id="passwordFields">
                                    <input type="password" name="password" class="form-control mb-2" placeholder="Password">
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Confirm Password">
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="submit" id="submitBtn" class="btn btn-primary"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->
    <!-- <div class="modal fade" id="adminModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">{{ __('dash.add_new_admin') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="adminForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="formMethod" value="POST">
                        <input type="hidden" name="admin_id" id="admin_id">

                        <div class="modal-body">
                            <div class="mb-3 text-center">
                                <div class="image-input avatar xxl rounded-4" id="photoPreview"
                                    style="background-image: url('{{ asset('assets/img/avatar.png') }}')">
                                    <div class="avatar-wrapper rounded-4"></div>
                                    <div class="file-input">
                                        <input type="file" class="form-control" name="photo" id="photo">
                                        <label for="photo" class="fa fa-pencil shadow"></label>
                                    </div>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('dash.name') }} *</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('dash.email') }} *</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('dash.username') }}</label>
                                <input type="text" name="username" id="username" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('dash.password') }}
                                    <span id="passwordRequired">*</span>
                                    <small id="passwordHint" class="text-muted d-none">
                                        {{ __('dash.leave_blank_keep') }}
                                    </small>
                                </label>
                                <input type="password" name="password" id="password" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('dash.confirm_password') }}
                                    <span id="confirmPasswordRequired">*</span>
                                </label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('dash.phone') }}</label>
                                <input type="text" name="phone" id="phone" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                {{ __('dash.cancel') }}
                            </button>
                            <button type="submit" class="btn btn-primary" id="modalSubmitBtn">
                                <span class="submit-text">{{ __('dash.save') }}</span>
                                <span class="loading-text d-none">
                                    <i class="fa fa-spinner fa-spin"></i> <span
                                        id="loadingText">{{ __('dash.saving') }}...</span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->

    <!-- Combined Admin Modal -->
    <div class="modal fade" id="adminModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="adminModalTitle" class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="adminForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <input type="hidden" name="admin_id" id="admin_id">

                    <div class="modal-body">
                        <div class="mb-3 text-center">
                            <div class="image-input avatar xxl rounded-4" id="photoPreview" style="background-image: url('{{ asset('assets/img/avatar.png') }}')">
                                <div class="avatar-wrapper rounded-4"></div>
                                <div class="file-input">
                                    <input type="file" class="form-control" name="photo" id="photo">
                                    <label for="photo" class="fa fa-pencil shadow"></label>
                                </div>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('dash.name') }} *</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('dash.email') }} *</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('dash.username') }}</label>
                            <input type="text" name="username" id="username" class="form-control">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div id="passwordFields">
                            <div class="mb-3">
                                <label class="form-label">{{ __('dash.password') }}</label>
                                <input type="password" name="password" id="password" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('dash.confirm_password') }}</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('dash.phone') }}</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('dash.cancel') }}</button>
                        <button type="submit" id="submitBtn" class="btn btn-primary">
                            <span class="submit-text"></span>
                            <span class="loading-text d-none"><i class="fa fa-spinner fa-spin"></i></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/bundle/dataTables.bundle.js') }}"></script>
    <!-- <script>
        function openCreateModal() {
            $('#adminForm')[0].reset();

            $('#adminModalTitle').text('Add New Admin');
            $('#submitBtn').text('Save');

            $('#adminForm').attr('action', '/admins');
            $('#formMethod').val('POST');

            $('#admin_id').val('');
            $('#passwordFields').show();

            $('#photoPreview').css('background-image', "url('/assets/img/avatar.png')");

            $('#adminModal').modal('show');
        }

        function openEditModal(admin) {
            $('#adminForm')[0].reset();

            $('#adminModalTitle').text('Edit Admin');
            $('#submitBtn').text('Update');

            $('#adminForm').attr('action', '/admins/' + admin.id);
            $('#formMethod').val('PUT');

            $('#admin_id').val(admin.id);
            $('#name').val(admin.name);
            $('#email').val(admin.email);
            $('#username').val(admin.username);
            $('#phone').val(admin.phone);

            // $('#passwordFields').hide();

            if (admin.photo) {
                $('#photoPreview').css(
                    'background-image',
                    'url(/storage/admins/' + admin.photo + ')'
                );
            }

            $('#adminModal').modal('show');
        }
    </script> -->
    <script>
        $(document).ready(function () {
            // Initialize Yajra / server-side DataTable
            var adminsTable = $('#admins_table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "{{ route('admins.index') }}",
                    type: 'GET'
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'photo', name: 'photo', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'username', name: 'username' },
                    { data: 'phone', name: 'phone' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ],
                language: {
                    search: "{{ __('dash.search') }}:",
                    lengthMenu: "{{ __('dash.show') }} _MENU_ {{ __('dash.entries') }}",
                    info: "{{ __('dash.showing') }} _START_ {{ __('dash.to') }} _END_ {{ __('dash.of') }} _TOTAL_ {{ __('dash.entries') }}",
                    paginate: {
                        first: "{{ __('dash.first') }}",
                        last: "{{ __('dash.last') }}",
                        next: "{{ __('dash.next') }}",
                        previous: "{{ __('dash.previous') }}"
                    }
                }
            });

            // Photo preview for modal photo input
            $('#photo').on('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#photoPreview').css('background-image', 'url(' + e.target.result + ')');
                    }
                    reader.readAsDataURL(file);
                }
            });

            // Handle Edit Button Click (delegated for server-side rows) - use data- attributes
            $(document).on('click', '.edit-admin-btn', function () {
                const btn = $(this);
                const admin = {
                    id: btn.data('admin-id'),
                    name: btn.data('admin-name'),
                    email: btn.data('admin-email'),
                    username: btn.data('admin-username'),
                    phone: btn.data('admin-phone'),
                    photo: btn.data('admin-photo')
                };

                openEditModal(admin);
            });

            // Handle Delete Button Click (delegated)
            $(document).on('click', '.delete-admin-btn', function (e) {
                e.preventDefault();

                const adminId = $(this).data('admin-id');
                const adminName = $(this).data('admin-name');
                const currentAdminId = {{ auth('admin')->id() }};

                // Double-check: prevent self-deletion
                if (adminId == currentAdminId) {
                    Swal.fire(
                        "{{ __('dash.error') }}",
                        "{{ __('dash.cannot_delete_self') }}",
                        'error'
                    );
                    return;
                }

                Swal.fire({
                    title: "{{ __('dash.are_you_sure') }}",
                    text: "{{ __('dash.delete_admin_confirm') }}: " + adminName,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "{{ __('dash.yes_delete') }}",
                    cancelButtonText: "{{ __('dash.cancel') }}"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Use the delete form's action (localized route)
                        const deleteForm = $('#delete_form_' + adminId);
                        const deleteUrl = deleteForm.attr('action');

                        $.ajax({
                            url: deleteUrl,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            beforeSend: function () {
                                // Show loading
                            },
                            success: function (response) {
                                if (response.success) {
                                    // Reload table to reflect deletion
                                    if (typeof adminsTable !== 'undefined') {
                                        adminsTable.ajax.reload(null, false);
                                    }

                                    Swal.fire(
                                        "{{ __('dash.deleted') }}",
                                        response.message,
                                        'success'
                                    );
                                } else {
                                    Swal.fire(
                                        "{{ __('dash.error') }}",
                                        response.message,
                                        'error'
                                    );
                                }
                            },
                            error: function (xhr) {
                                let errorMessage = "{{ __('dash.something_went_wrong') }}";
                                if (xhr.responseJSON && xhr.responseJSON.message) {
                                    errorMessage = xhr.responseJSON.message;
                                }
                                Swal.fire(
                                    "{{ __('dash.error') }}",
                                    errorMessage,
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

            // Combined admin form submit handler (handles create and update)
            window.openCreateModal = function() {
                $('#adminForm')[0].reset();
                $('#adminModalTitle').text('{{ __('dash.add_new_admin') }}');
                $('#submitBtn .submit-text').text('{{ __('dash.save') }}');
                $('#formMethod').val('POST');
                $('#adminForm').attr('action', '{{ route('admins.store') }}');
                $('#admin_id').val('');
                $('#passwordFields').show();
                $('#photoPreview').css('background-image', "url('{{ asset('assets/img/avatar.png') }}')");
                $('#adminModal').modal('show');
            }

            window.openEditModal = function(admin) {
                $('#adminForm')[0].reset();
                $('#adminModalTitle').text('{{ __('dash.edit_admin') }}');
                $('#submitBtn .submit-text').text('{{ __('dash.update') }}');
                $('#adminForm').attr('action', '/admins/' + admin.id);
                $('#formMethod').val('PUT');
                $('#admin_id').val(admin.id);
                $('#name').val(admin.name);
                $('#email').val(admin.email);
                $('#username').val(admin.username);
                $('#phone').val(admin.phone);
                if (admin.photo) {
                    $('#photoPreview').css('background-image', 'url(' + admin.photo + ')');
                }
                $('#adminModal').modal('show');
            }

            $('#adminForm').on('submit', function (e) {
                e.preventDefault();

                const form = $(this);
                form.find('.is-invalid').removeClass('is-invalid');
                form.find('.invalid-feedback').text('');

                const formData = new FormData(this);
                const method = $('#formMethod').val();
                if (method === 'PUT') formData.append('_method', 'PUT');

                const submitBtn = $('#submitBtn');
                const submitText = submitBtn.find('.submit-text');
                const loadingText = submitBtn.find('.loading-text');

                submitText.addClass('d-none');
                loadingText.removeClass('d-none');
                submitBtn.prop('disabled', true);

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: response.message || (method === 'PUT' ? '{{ __('dash.admin_updated') }}' : '{{ __('dash.admin_created') }}'),
                                showConfirmButton: false,
                                timer: 1500
                            });

                            form[0].reset();
                            $('#photoPreview').css('background-image', "url('{{ asset('assets/img/avatar.png') }}')");
                            try { $('#adminModal').modal('hide'); } catch (e) {}
                            if (typeof adminsTable !== 'undefined') adminsTable.ajax.reload(null, false);
                        } else {
                            Swal.fire({ toast: true, position: 'top-end', icon: 'error', title: response.message || '{{ __('dash.something_went_wrong') }}', showConfirmButton: false, timer: 2000 });
                        }
                    },
                    error: function (xhr) {
                        if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                            const errors = xhr.responseJSON.errors;
                            Object.keys(errors).forEach(function (field) {
                                let input = form.find('[name="' + field + '"]');
                                if (!input.length) {
                                    const alt = field.replace(/\.[0-9]+/g, '');
                                    input = form.find('[name="' + alt + '"]');
                                }
                                if (!input.length) input = form.find('[name="' + field + '[]"]');
                                if (input.length) {
                                    input.addClass('is-invalid');
                                    let wrapper = input.closest('.mb-3');
                                    if (wrapper.length && wrapper.find('.invalid-feedback').length) wrapper.find('.invalid-feedback').text(errors[field][0]);
                                    else {
                                        if (input.next('.invalid-feedback').length) input.next('.invalid-feedback').text(errors[field][0]);
                                        else input.after('<div class="invalid-feedback">' + errors[field][0] + '</div>');
                                    }
                                }
                            });

                            Swal.fire({ toast: true, position: 'top-end', icon: 'error', title: '{{ __('dash.fix_errors') }}', showConfirmButton: false, timer: 2000 });
                        } else {
                            const msg = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : '{{ __('dash.something_went_wrong') }}';
                            Swal.fire({ toast: true, position: 'top-end', icon: 'error', title: msg, showConfirmButton: false, timer: 2000 });
                        }
                    },
                    complete: function () {
                        submitText.removeClass('d-none');
                        loadingText.addClass('d-none');
                        submitBtn.prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endpush