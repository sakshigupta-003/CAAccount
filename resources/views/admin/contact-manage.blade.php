@extends('layouts.admin')
@section('title', 'Admin || Manage Contacts')
@push('styles')
@endpush

@section('content')
@section('page', 'Manage Contacts')

<div class="container pt-3 card">
    <div class="contacts-section">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="m-0 fw-semi-bold">Manage Contact </h6>
        </div>

        <div class="table-responsive">
            <table id="contactsTable" class="table table-striped table-bordered w-100">
                <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th width="15%">Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>service</th>
                        <th>What do you want</th>
                        <th>Message (Preview)</th>
                        <th width="10%">Submited At</th>
                        <th width="15%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div id="contactsLoading" class="spinner-container">
            <div class="spinner"></div>
        </div>
    </div>
</div>

<!-- View Contact Modal -->
<div class="modal fade" id="viewContactModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contact Details</h5>
                <button type="button" class="btn btn-sm btn-light rounded-circle shadow-sm position-absolute top-0 end-0 m-3 z-3" style="width: 25px; height: 25px; display: flex; align-items: center; justify-content: center;" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div class="modal-body" id="contactDetailsBody">
                <!-- Dynamic content loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
        let contactsTable = null;
        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        $(document).ready(function() {
            initializeDataTable();
            loadContacts();
        });

        function initializeDataTable() {
            contactsTable = $('#contactsTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                lengthChange: false,
                pageLength: 10,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search contacts..."
                },
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'phone' },
                    { data: 'service' },
                    { data: 'what_do_you_want' },
                    { 
                        data: 'message',
                        render: function(data) {
                            return data ? (data.length > 30 ? data.substring(0, 30) + '...' : data) : '';
                        }
                    },
                 
                    { 
                        data: 'created_at',
                        render: function(data) {
                            return new Date(data).toLocaleDateString();
                        }
                    },
                    { 
                        data: null,
                        orderable: false,
                        render: function(data, type, row) {
                            return `
                                <div class="action-buttons">
                                    <button class="btn btn-sm btn-info" onclick="viewContact(${row.id})" title="View">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-contact" data-id="${row.id}" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            `;
                        }
                    }
                ]
            });
        }

        // Load Contacts
        function loadContacts() {
            $('#contactsLoading').show();
            
            $.ajax({
                url: "{{ route('admin.contacts.get') }}",
                type: "GET",
                success: function(response) {
                    $('#contactsLoading').hide();
                    
                    if (response.success && response.data.length > 0) {
                        contactsTable.clear();
                        contactsTable.rows.add(response.data);
                        contactsTable.draw();
                    } else {
                        contactsTable.clear();
                        contactsTable.draw();
                    }
                },
                error: function() {
                    $('#contactsLoading').hide();
                    showAlert('Error loading contacts!', 'error');
                }
            });
        }

        function viewContact(id) {
            $.ajax({
                url: `/contacts/${id}`, 
                type: "GET",
                success: function(response) {
                    if (response.success) {
                        const contact = response.data;
                        let detailsHtml = `
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Name:</strong> ${contact.name}</p>
                                    <p><strong>Email:</strong> ${contact.email}</p>
                                    <p><strong>Phone:</strong> ${contact.phone || 'N/A'}</p>
                                    <p><strong>service:</strong> ${contact.service || 'N/A'}</p>
                                    <p><strong>What do you want:</strong> ${contact.what_do_you_want || 'N/A'}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Created:</strong> ${new Date(contact.created_at).toLocaleString()}</p>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <strong>Message:</strong>
                                <p class="mt-2">${contact.message}</p>
                            </div>
                        `;
                        $('#contactDetailsBody').html(detailsHtml);
                        $('#viewContactModal').modal('show');
                    }
                },
                error: function() {
                    showAlert('Error loading contact details!', 'error');
                }
            });
        }

        // Delete Contact
        $(document).on('click', '.delete-contact', function() {
            const id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "This will delete the contact permanently!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/contacts/${id}`, 
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        success: function(response) {
                            if (response.success) {
                                loadContacts();
                                showAlert(response.message, 'success');
                            } else {
                                showAlert(response.message || 'Delete failed!', 'error');
                            }
                        },
                        error: function() {
                            showAlert('Error deleting contact!', 'error');
                        }
                    });
                }
            });
        });
    </script>
@endpush