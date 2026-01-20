@extends('layouts.app')

@section('title', __('dash.admins_control'))

@section('content')

    <!-- Add Admin Button -->
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAdminModal">
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
        <tbody>
            @foreach($admins as $admin)
                <tr id="admin_row_{{ $admin->id }}">
                    <td>{{ $admin->id }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            @if(!empty($admin->photo) && \Illuminate\Support\Facades\Storage::disk('public')->exists($admin->photo))
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($admin->photo) }}"
                                    class="rounded-circle sm avatar" alt="{{ $admin->name }}"
                                    style="width: 40px; height: 40px; object-fit: cover;">
                            @else
                                <img src="{{ asset('assets/img/avatar.png') }}" class="rounded-circle sm avatar" alt="{{ $admin->name }}"
                                    style="width: 40px; height: 40px; object-fit: cover;">
                            @endif
                        </div>
                    </td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->phone }}</td>
                    <td>
                        <!-- Edit Button -->
                        <button type="button" class="btn btn-link btn-sm color-400 edit-admin-btn" data-bs-toggle="modal"
                            data-bs-target="#editAdminModal" data-admin-id="{{ $admin->id }}"
                            data-admin-name="{{ $admin->name }}" data-admin-email="{{ $admin->email }}"
                            data-admin-username="{{ $admin->username }}" data-admin-phone="{{ $admin->phone }}"
                            @if(!empty($admin->photo) && \Illuminate\Support\Facades\Storage::disk('public')->exists($admin->photo))
                                data-admin-photo="{{ \Illuminate\Support\Facades\Storage::url($admin->photo) }}"
                            @else
                                data-admin-photo="{{ asset('assets/img/avatar.png') }}"
                            @endif
                            data-action="{{ route('admins.update', $admin->id) }}"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('dash.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </button>

                        <!-- Delete Button - Only show if not current admin -->
                        @if($admin->id != auth('admin')->id())
                            <form action="{{ route('admins.destroy', $admin->id) }}" method="POST"
                                class="d-inline delete-admin-form" id="delete_form_{{ $admin->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-link btn-sm color-400 delete-admin-btn"
                                    data-admin-id="{{ $admin->id }}" data-admin-name="{{ $admin->name }}" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="{{ __('dash.delete') }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        @else
                            <!-- Disabled delete button for current admin -->
                            <!-- <button type="button" class="btn btn-link btn-sm color-400" disabled data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="{{ __('dash.cannot_delete_self') }}">
                                                        <i class="fa fa-trash text-muted"></i>
                                                    </button> -->
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Create Admin Modal -->
    <div class="modal fade" id="createAdminModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('dash.add_new_admin') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="createAdminForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 text-center">
                            <div class="image-input avatar xxl rounded-4"
                                style="background-image: url('{{ asset('assets/img/avatar.png') }}')"
                                id="createPhotoPreview">
                                <div class="avatar-wrapper rounded-4"></div>
                                <div class="file-input">
                                    <input type="file" class="form-control" name="photo" id="create_photo">
                                    <label for="create_photo" class="fa fa-pencil shadow"></label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('dash.name') }} *</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('dash.email') }} *</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('dash.username') }}</label>
                            <input type="text" name="username" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('dash.password') }} *</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('dash.confirm_password') }} *</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('dash.phone') }}</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            {{ __('dash.cancel') }}
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <span class="submit-text">{{ __('dash.save') }}</span>
                            <span class="loading-text d-none">
                                <i class="fa fa-spinner fa-spin"></i> {{ __('dash.saving') }}...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Admin Modal -->
    <div class="modal fade" id="editAdminModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('dash.edit_admin') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editAdminForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="admin_id" id="edit_admin_id">

                    <div class="modal-body">
                        <div class="mb-3 text-center">
                            <div class="image-input avatar xxl rounded-4" id="editPhotoPreview">
                                <div class="avatar-wrapper rounded-4"></div>
                                <div class="file-input">
                                    <input type="file" class="form-control" name="photo" id="edit_photo">
                                    <label for="edit_photo" class="fa fa-pencil shadow"></label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('dash.name') }} *</label>
                            <input type="text" name="name" id="edit_name" value="{{ auth('admin')->user()->name }}"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('dash.email') }} *</label>
                            <input type="email" name="email" id="edit_email" value="{{ auth('admin')->user()->email }}"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('dash.username') }}</label>
                            <input type="text" name="username" id="edit_username"
                                value="{{ auth('admin')->user()->username }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('dash.password') }}</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="{{ __('dash.leave_blank') }}">
                            <small class="text-muted">{{ __('dash.leave_blank_keep') }}</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('dash.confirm_password') }}</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('dash.phone') }}</label>
                            <input type="text" name="phone" id="edit_phone" value="{{ auth('admin')->user()->phone }}"
                                class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            {{ __('dash.cancel') }}
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <span class="submit-text">{{ __('dash.update') }}</span>
                            <span class="loading-text d-none">
                                <i class="fa fa-spinner fa-spin"></i> {{ __('dash.updating') }}...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/bundle/dataTables.bundle.js') }}"></script>
    <script>
        $(document).ready(function () {
            // Initialize DataTable
            $('#admins_table').DataTable({
                responsive: true,
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

            // Photo preview for create form
            $('#create_photo').on('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#createPhotoPreview').css('background-image', 'url(' + e.target.result + ')');
                    }
                    reader.readAsDataURL(file);
                }
            });

            // Photo preview for edit form
            $('#edit_photo').on('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#editPhotoPreview').css('background-image', 'url(' + e.target.result + ')');
                    }
                    reader.readAsDataURL(file);
                }
            });

            // Handle Edit Button Click
            $('.edit-admin-btn').on('click', function () {
                const adminId = $(this).data('admin-id');
                const adminName = $(this).data('admin-name');
                const adminEmail = $(this).data('admin-email');
                const adminUsername = $(this).data('admin-username');
                const adminPhone = $(this).data('admin-phone');
                const adminPhoto = $(this).data('admin-photo');

                // Use server-generated localized action URL
                const actionUrl = $(this).data('action');

                // Set form values
                $('#edit_admin_id').val(adminId);
                $('#edit_name').val(adminName);
                $('#edit_email').val(adminEmail);
                $('#edit_username').val(adminUsername);
                $('#edit_phone').val(adminPhone);
                $('#editPhotoPreview').css('background-image', 'url(' + adminPhoto + ')');

                // Set form action (localized)
                $('#editAdminForm').attr('action', actionUrl);
            });

            // Handle Delete Button Click
            $('.delete-admin-btn').on('click', function (e) {
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
                                    // Remove row from table
                                    $('#admin_row_' + adminId).remove();

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

            // Create Admin Form Submission - DEBUG VERSION
            $('#createAdminForm').on('submit', function (e) {
                e.preventDefault();

                console.log('📝 Create admin form submitted');

                const formData = new FormData(this);

                // Log form data for debugging
                console.log('📤 FormData contents:');
                for (let [key, value] of formData.entries()) {
                    console.log(key + ':', value);
                }

                const submitBtn = $(this).find('button[type="submit"]');

                // Show loading
                submitBtn.find('.submit-text').addClass('d-none');
                submitBtn.find('.loading-text').removeClass('d-none');
                submitBtn.prop('disabled', true);

                $.ajax({
                    url: "{{ route('admins.store') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        console.log('✅ Server response:', response);

                        if (response.success) {
                            console.log('✅ Admin created successfully');
                            // alert('✅ Admin created! Page will reload...');
                            // Wait 1 second then reload
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        } else {
                            console.log('❌ Server returned success false:', response);
                            alert('❌ ' + (response.message || 'Failed to create admin'));
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('❌ AJAX Error:', {
                            status: xhr.status,
                            statusText: xhr.statusText,
                            responseText: xhr.responseText,
                            error: error
                        });

                        let errorMessage = "Something went wrong!";

                        if (xhr.status === 422) {
                            // Validation errors
                            let errors = xhr.responseJSON?.errors;
                            if (errors) {
                                errorMessage = 'Validation errors:\n';
                                Object.values(errors).forEach(errorArray => {
                                    errorArray.forEach(error => {
                                        errorMessage += '• ' + error + '\n';
                                    });
                                });
                            }
                        } else if (xhr.responseJSON?.message) {
                            errorMessage = xhr.responseJSON.message;
                        }

                        alert('❌ ' + errorMessage);
                    },
                    complete: function () {
                        // Reset button state
                        submitBtn.find('.submit-text').removeClass('d-none');
                        submitBtn.find('.loading-text').addClass('d-none');
                        submitBtn.prop('disabled', false);
                    }
                });
            });

            // Edit Admin Form Submission
            $('#editAdminForm').on('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(this);
                const submitBtn = $(this).find('button[type="submit"]');
                const adminId = $('#edit_admin_id').val();

                // Show loading
                submitBtn.find('.submit-text').addClass('d-none');
                submitBtn.find('.loading-text').removeClass('d-none');
                submitBtn.prop('disabled', true);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            // Reload page to show updated data
                            location.reload();
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
                        } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                            const errors = xhr.responseJSON.errors;
                            errorMessage = Object.values(errors).flat().join('<br>');
                        }

                        Swal.fire(
                            "{{ __('dash.error') }}",
                            errorMessage,
                            'error'
                        );
                    },
                    complete: function () {
                        // Reset button state
                        submitBtn.find('.submit-text').removeClass('d-none');
                        submitBtn.find('.loading-text').addClass('d-none');
                        submitBtn.prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endpush