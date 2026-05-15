@extends('layouts.admin')

@section('title', 'Admin | FAQs Management')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <style>
        .spinner-container { display: none; text-align: center; padding: 20px; }
        .spinner { border: 4px solid rgba(0,0,0,.1); border-left-color: #09f; height: 30px; width: 30px; animation: spin 1s linear infinite; border-radius: 50%; }
        @keyframes spin { to { transform: rotate(360deg); } }
    </style>
@endpush

@section('content')
@section('page', 'FAQs Management')

<div class="container pt-3 card">
    <div class="faqs-section">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="m-0 fw-semi-bold">FAQs Management</h6>
            <button class="btn cu" onclick="showAddModal()">
                <i class="fas fa-plus"></i> Add FAQ
            </button>
        </div>

        <div class="table-responsive">
            <table id="faqsTable" class="table table-striped table-bordered w-100">
                <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th width="10%">Status</th>
                        <th width="15%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div id="faqsLoading" class="spinner-container">
            <div class="spinner"></div>
        </div>
    </div>
</div>

<!-- Add FAQ Modal -->
<div class="modal fade" id="addFaqModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New FAQ</h5>
                <button type="button" class="btn btn-sm btn-light rounded-circle shadow-sm position-absolute top-0 end-0 m-3 z-3" style="width: 25px; height: 25px; display: flex; align-items: center; justify-content: center;" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <form id="addFaqForm" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Question *</label>
                        <input type="text" class="form-control" name="question" placeholder="Enter Question" required>
                        <div class="invalid-feedback">Please enter question</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Answer *</label>
                        <textarea class="form-control" name="answer" rows="3" required></textarea>
                        <div class="invalid-feedback">Please enter answer</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status *</label>
                        <select class="form-control" name="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <div class="invalid-feedback">Please select status</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save FAQ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit FAQ Modal -->
<div class="modal fade" id="editFaqModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit FAQ</h5>
                <button type="button" class="btn btn-sm btn-light rounded-circle shadow-sm position-absolute top-0 end-0 m-3 z-3" style="width: 25px; height: 25px; display: flex; align-items: center; justify-content: center;" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <form id="editFaqForm" enctype="multipart/form-data">
                <input type="hidden" name="id" id="editFaqId">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Question *</label>
                        <input type="text" class="form-control" name="question" id="editQuestion" required>
                        <div class="invalid-feedback">Please enter question</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Answer *</label>
                        <textarea class="form-control" name="answer" id="editAnswer" rows="3" required></textarea>
                        <div class="invalid-feedback">Please enter answer</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status *</label>
                        <select class="form-control" name="status" id="editStatus" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <div class="invalid-feedback">Please select status</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update FAQ</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let faqsTable = null;
        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        $(document).ready(function() {
            initializeDataTable();
            loadFaqs();
            $('#addFaqForm').submit(addFaq);
            $('#editFaqForm').submit(updateFaq);
        });

        function initializeDataTable() {
            faqsTable = $('#faqsTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                lengthChange: false,
                pageLength: 100,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search FAQs..."
                },
                columns: [
                    { data: 'id' },
                    { data: 'question' },
                    { data: 'answer' },
                    { data: 'status' },
                    {
                        data: null,
                        orderable: false,
                        render: function(data, type, row) {
                            return `
                                <div class="action-buttons">
                                    <button class="btn btn-sm btn-success" onclick="editFaq(${row.id})" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger delete-faq" data-id="${row.id}" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            `;
                        }
                    }
                ]
            });
        }

        // Load FAQs
        function loadFaqs() {
            $('#faqsLoading').show();
            
            $.ajax({
                url: "{{ route('admin.faq.get') }}",
                type: "GET",
                success: function(response) {
                    $('#faqsLoading').hide();
                    
                    if (response.success && response.data.length > 0) {
                        faqsTable.clear();
                        faqsTable.rows.add(response.data);
                        faqsTable.draw();
                    } else {
                        faqsTable.clear();
                        faqsTable.draw();
                        faqsTable.row.add({
                            'id': '',
                            'question': '<div class="text-center text-muted">No FAQs found</div>',
                            'answer': '',
                            'status': '',
                            'null': ''
                        }).draw();
                    }
                },
                error: function() {
                    $('#faqsLoading').hide();
                    showAlert('Error loading FAQs!', 'error');
                }
            });
        }

        function showAddModal() {
            $('#addFaqForm')[0].reset();
            $('#addFaqForm .invalid-feedback').hide();
            $('#addFaqModal').modal('show');
        }

        function addFaq(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const submitBtn = $(this).find('button[type="submit"]');
            const originalText = submitBtn.html();
            submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');
            
            $.ajax({
                url: "{{ route('admin.faq.save') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    if (response.success) {
                        $('#addFaqModal').modal('hide');
                        loadFaqs();
                        showAlert(response.message, 'success');
                    } else {
                        showAlert(response.message, 'error');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        $('#addFaqForm .invalid-feedback').hide();
                        for (const field in errors) {
                            $(`#addFaqForm [name="${field}"]`).addClass('is-invalid')
                                .next('.invalid-feedback').text(errors[field][0]).show();
                        }
                    } else {
                        showAlert('Error saving FAQ!', 'error');
                    }
                },
                complete: function() {
                    submitBtn.prop('disabled', false).html(originalText);
                }
            });
        }

        function editFaq(id) {
            $.ajax({
                url: "{{ route('admin.faq.get') }}",
                type: "GET",
                success: function(response) {
                    if (response.success) {
                        const faq = response.data.find(p => p.id == id);
                        if (faq) {
                            $('#editFaqId').val(faq.id);
                            $('#editQuestion').val(faq.question);
                            $('#editAnswer').val(faq.answer);
                            $('#editStatus').val(faq.status);
                            $('#editFaqForm .invalid-feedback').hide();
                            $('#editFaqModal').modal('show');
                        }
                    }
                }
            });
        }

        // Update FAQ
        function updateFaq(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const id = $('#editFaqId').val();
            const submitBtn = $(this).find('button[type="submit"]');
            const originalText = submitBtn.html();
            
            submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Updating...');
            
            $.ajax({
                url: `{{ url('admin/faqs') }}/${id}`,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'X-HTTP-Method-Override': 'PUT'  // For Laravel to handle as PUT
                },
                success: function(response) {
                    if (response.success) {
                        $('#editFaqModal').modal('hide');
                        loadFaqs();
                        showAlert(response.message, 'success');
                    } else {
                        showAlert(response.message, 'error');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        $('#editFaqForm .invalid-feedback').hide();
                        for (const field in errors) {
                            $(`#editFaqForm [name="${field}"]`).addClass('is-invalid')
                                .next('.invalid-feedback').text(errors[field][0]).show();
                        }
                    } else {
                        showAlert('Error updating FAQ!', 'error');
                    }
                },
                complete: function() {
                    submitBtn.prop('disabled', false).html(originalText);
                }
            });
        }

        $(document).on('click', '.delete-faq', function() {
            if (confirm('Are you sure you want to delete this FAQ?')) {
                const id = $(this).data('id');
                $.ajax({
                    url: `{{ url('admin/faqs') }}/${id}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    beforeSend: function() {
                        showAlert('Deleting FAQ...', 'info');
                    },
                    success: function(response) {
                        loadFaqs();
                        showAlert(response.message);
                    },
                    error: function(xhr) {
                        showAlert('Error deleting FAQ!', 'danger');
                    }
                });
            }
        });
      
    </script>
@endpush