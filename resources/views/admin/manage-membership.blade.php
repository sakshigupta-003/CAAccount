@extends('layouts.admin')

@section('title', 'Manage Membership Applications')
@section('page', 'Membership Applications')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <style>
        .spinner-container {
            display: none;
            text-align: center;
            padding: 40px 0;
        }
        .spinner {
            border: 5px solid rgba(0,0,0,.1);
            border-left-color: #0d6efd;
            height: 40px;
            width: 40px;
            animation: spin 1s linear infinite;
            border-radius: 50%;
            margin: 0 auto;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        .action-buttons button {
            margin: 0 3px;
        }
        .is-invalid ~ .invalid-feedback {
            display: block !important;
        }
        .modal-xl .modal-body {
            max-height: 75vh;
            overflow-y: auto;
        }
    </style>
@endpush

@section('content')
<div class="container-fluid">

    <div class="card mb-4 shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center bg-light">
            <h5 class="mb-0 text-dark">Membership Applications List</h5>
            <button class="btn btn-primary btn-sm px-3" id="addApplicationBtn">
                <i class="bi bi-plus-lg"></i> Add Application (Manual)
            </button>
        </div>

        <div class="card-body">
            <div id="applicationsLoading" class="spinner-container">
                <div class="spinner"></div>
                <p class="mt-2 text-muted">Loading applications...</p>
            </div>

            <table class="table table-hover table-bordered" id="applicationsTable" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Submitted</th>
                        <th width="140">Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <!-- Modal (Add/Edit) -->
    <div class="modal fade" id="applicationModal" tabindex="-1" aria-labelledby="applicationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <form id="applicationForm">
                    @csrf
                    <input type="hidden" id="applicationId" name="id">

                    <div class="modal-header">
                        <h5 class="modal-title" id="applicationModalLabel">Add New Application</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" required>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" required>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Gender</label>
                                <select name="gender" id="gender" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                    <option value="prefer_not_to_say">Prefer not to say</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Member Type</label>
                                <select name="member_type" id="member_type" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="new">New Member</option>
                                    <option value="returning">Returning Member</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold">Interests</label>
                                <div class="d-flex flex-wrap gap-4">
                                    {{-- @foreach(['Networking', 'Access to resources', 'Volunteering', 'Skill Development'] as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="interests[]" value="{{ $item }}" id="int_{{ str_slug($item) }}">
                                            <label class="form-check-label" for="int_{{ str_slug($item) }}">{{ $item }}</label>
                                        </div>
                                    @endforeach --}}
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Interested Programs/Services</label>
                                <input type="text" name="interested_programs" id="interested_programs" class="form-control">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Accommodations / Support Needed</label>
                                <input type="text" name="accommodations_needed" id="accommodations_needed" class="form-control">
                            </div>

                            <div class="col-12 mt-3"><h6 class="fw-bold">Address</h6></div>

                            <div class="col-md-6">
                                <label>Street</label>
                                <input type="text" name="street" id="street" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>City</label>
                                <input type="text" name="city" id="city" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>State/Province</label>
                                <input type="text" name="state_province" id="state_province" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>Postal Code</label>
                                <input type="text" name="postal_code" id="postal_code" class="form-control">
                            </div>
                            <div class="col-12">
                                <label>Country</label>
                                <input type="text" name="country" id="country" class="form-control">
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold">Message / Notes</label>
                                <textarea name="message" id="message" class="form-control" rows="4"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-select" required>
                                    <option value="pending">Pending</option>
                                    <option value="reviewed">Reviewed</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success px-4" id="saveBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    $(document).ready(function () {

        $('#applicationsLoading').show();

        let table = $('#applicationsTable').DataTable({
            processing: true,
            ajax: {
                url: '{{ route("admin.membership-applications.get") }}',
                dataSrc: 'data'
            },
            columns: [
                { data: 'id', width: '60px' },
                { data: 'name' },
                { data: 'email' },
                { data: 'phone', defaultContent: '-' },
                {
                    data: 'member_type',
                    render: d => d ? (d === 'new' ? 'New' : 'Returning') : '-'
                },
                {
                    data: 'status',
                    render: function(data) {
                        let color = data === 'approved' ? 'success' :
                                    data === 'rejected' ? 'danger' :
                                    data === 'reviewed' ? 'info' : 'warning';
                        return `<span class="badge bg-${color}">${data.charAt(0).toUpperCase() + data.slice(1)}</span>`;
                    }
                },
                {
                    data: 'created_at',
                    render: d => new Date(d).toLocaleDateString('en-IN')
                },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    width: '140px',
                    render: function(data) {
                        return `
                            <button class="btn btn-sm btn-outline-primary editApplication me-1" data-id="${data.id}" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger deleteApplication" data-id="${data.id}" title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        `;
                    }
                }
            ],
            pageLength: 10,
            lengthMenu: [10, 25, 50, 100],
            order: [[6, 'desc']],
            initComplete: function () {
                $('#applicationsLoading').hide();
            }
        });

        // Add button
        $('#addApplicationBtn').click(function () {
            $('#applicationForm')[0].reset();
            $('#applicationForm .is-invalid').removeClass('is-invalid');
            $('#applicationForm .invalid-feedback').text('').hide();
            $('#applicationId').val('');
            $('#applicationModalLabel').text('Add New Application');
            $('#saveBtn').text('Save');
            // reset checkboxes
            $('input[name="interests[]"]').prop('checked', false);
            new bootstrap.Modal(document.getElementById('applicationModal')).show();
        });

        // Form submit (create + update)
        $('#applicationForm').submit(function (e) {
            e.preventDefault();

            let id = $('#applicationId').val();
            let url = id
                ? '{{ route("admin.membership-applications.update", ":id") }}'.replace(':id', id)
                : '{{ route("admin.membership-applications.store") }}';

            let method = id ? 'PUT' : 'POST';

            let btn = $('#saveBtn');
            let originalText = btn.html();
            btn.prop('disabled', true).html('<i class="bi bi-arrow-repeat me-2 fa-spin"></i> Saving...');

            $.ajax({
                url: url,
                method: method,
                data: $(this).serialize() + (method === 'PUT' ? '&_method=PUT' : ''),
                success: function (res) {
                    if (res.success) {
                        bootstrap.Modal.getInstance(document.getElementById('applicationModal')).hide();
                        table.ajax.reload(null, false);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: res.message,
                            timer: 1800,
                            showConfirmButton: false
                        });
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $('#applicationForm .is-invalid').removeClass('is-invalid');
                        $('#applicationForm .invalid-feedback').text('').hide();

                        $.each(errors, function (field, messages) {
                            $(`#${field}`).addClass('is-invalid')
                                .next('.invalid-feedback').text(messages[0]).show();
                        });
                    } else {
                        Swal.fire('Error', 'Something went wrong!', 'error');
                    }
                },
                complete: function () {
                    btn.prop('disabled', false).html(originalText);
                }
            });
        });

        // Edit
        $('#applicationsTable').on('click', '.editApplication', function () {
            let id = $(this).data('id');

            $.get('{{ route("admin.membership-applications.get") }}', function (res) {
                let app = res.data.find(a => a.id == id);
                if (app) {
                    $('#applicationId').val(app.id);
                    $('#name').val(app.name);
                    $('#email').val(app.email);
                    $('#phone').val(app.phone || '');
                    $('#dob').val(app.dob || '');
                    $('#gender').val(app.gender || '');
                    $('#member_type').val(app.member_type || '');
                    $('#interested_programs').val(app.interested_programs || '');
                    $('#accommodations_needed').val(app.accommodations_needed || '');
                    $('#street').val(app.street || '');
                    $('#city').val(app.city || '');
                    $('#state_province').val(app.state_province || '');
                    $('#postal_code').val(app.postal_code || '');
                    $('#country').val(app.country || '');
                    $('#message').val(app.message || '');
                    $('#status').val(app.status || 'pending');

                    // interests
                    $('input[name="interests[]"]').prop('checked', false);
                    if (app.interests) {
                        app.interests.forEach(val => {
                            $(`input[name="interests[]"][value="${val}"]`).prop('checked', true);
                        });
                    }

                    $('#applicationForm .is-invalid').removeClass('is-invalid');
                    $('#applicationForm .invalid-feedback').text('').hide();

                    $('#applicationModalLabel').text('Edit Application #' + app.id);
                    $('#saveBtn').text('Update');

                    new bootstrap.Modal(document.getElementById('applicationModal')).show();
                }
            });
        });

        // Delete
        $('#applicationsTable').on('click', '.deleteApplication', function () {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "This application will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = '{{ route("admin.membership-applications.destroy", ":id") }}'.replace(':id', id);

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: { _token: '{{ csrf_token() }}' },
                        success: function (res) {
                            if (res.success) {
                                table.ajax.reload(null, false);
                                Swal.fire('Deleted!', res.message, 'success');
                            }
                        },
                        error: function () {
                            Swal.fire('Error!', 'Cannot delete this application.', 'error');
                        }
                    });
                }
            });
        });
    });
    </script>
@endpush