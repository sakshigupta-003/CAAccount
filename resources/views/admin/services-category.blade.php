@extends('layouts.admin')

@section('title','Manage Service Categories')
@section('page','Service Categories')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <style>
        .spinner-container { display: none; text-align: center; padding: 20px; }
        .spinner { border: 4px solid rgba(0,0,0,.1); border-left-color: #09f; height: 30px; width: 30px; animation: spin 1s linear infinite; border-radius: 50%; }
        @keyframes spin { to { transform: rotate(360deg); } }
    </style>
@endpush

@section('content')
<div class="container-fluid">

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Service Categories List</h5>
            <button class="btn btn-primary btn-sm" id="addCategoryBtn">Add Category</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="categoriesTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div id="categoriesLoading" class="spinner-container">
                <div class="spinner"></div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="categoryForm">
                    @csrf
                    <input type="hidden" id="categoryId">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
    $(document).ready(function(){
        $('#categoriesLoading').show();

        let table = $('#categoriesTable').DataTable({
            ajax: {
                url: '{{ route("admin.service-categories.get") }}',
                dataSrc: 'data'
            },
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'status' },
                { 
                    data: null,
                    orderable: false,
                    render: function(d){
                        return `
                            <div class="action-buttons">
                                <button class="btn btn-sm btn-success editCategory" data-id="${d.id}" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button class="btn btn-sm btn-danger deleteCategory" data-id="${d.id}" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        `;
                    }
                }
            ],
            initComplete: function() {
                $('#categoriesLoading').hide();
            }
        });

        // Add Category
        $('#addCategoryBtn').click(function(){
            $('#categoryForm')[0].reset();
            $('#categoryForm .invalid-feedback').hide();
            $('#categoryId').val('');
            $('#categoryModal .modal-title').text('Add Category');
            $('#categoryModal').modal('show');
        });

        // Submit Form
        $('#categoryForm').submit(function(e){
            e.preventDefault();
            let id = $('#categoryId').val();
            let updateBaseUrl = '{{ route("admin.service-categories.update", ":id") }}';
            let url = id ? updateBaseUrl.replace(':id', id) : '{{ route("admin.service-categories.store") }}';
            let submitBtn = $(this).find('button[type="submit"]');
            let originalText = submitBtn.html();
            submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');

            $.ajax({
                url: url,
                method: 'POST',
                data: $(this).serialize(),
                success:function(res){
                    if(res.success){
                        $('#categoryModal').modal('hide');
                        table.ajax.reload();
                        showAlert(res.message, 'success');
                    } else {
                        showAlert('Error occurred', 'error');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        $('#categoryForm .invalid-feedback').hide();
                        for (const field in errors) {
                            $(`#categoryForm [name="${field}"]`).addClass('is-invalid')
                                .next('.invalid-feedback').text(errors[field][0]).show();
                        }
                    } else {
                        showAlert('Error saving category!', 'error');
                    }
                },
                complete: function() {
                    submitBtn.prop('disabled', false).html(originalText);
                }
            });
        });

        // Edit Category
        $('#categoriesTable').on('click','.editCategory', function(){
            let id = $(this).data('id');
            $.get('{{ route("admin.service-categories.get") }}', function(res){
                let category = res.data.find(c => c.id == id);
                if(category){
                    $('#categoryId').val(category.id);
                    $('#name').val(category.name);
                    $('#status').val(category.status);
                    $('#categoryForm .invalid-feedback').hide();
                    $('#categoryModal .modal-title').text('Edit Category');
                    $('#categoryModal').modal('show');
                }
            });
        });

        // Delete Category
        $('#categoriesTable').on('click','.deleteCategory', function(){
            if(confirm('Are you sure?')){
                let id = $(this).data('id');
                let destroyBaseUrl = '{{ route("admin.service-categories.destroy", ":id") }}';
                let url = destroyBaseUrl.replace(':id', id);
                $.ajax({
                    url: url,
                    type:'DELETE',
                    data:{ _token: '{{ csrf_token() }}' },
                    beforeSend: function() {
                        showAlert('Deleting category...', 'info');
                    },
                    success:function(res){
                        if(res.success){
                            table.ajax.reload();
                            showAlert(res.message, 'success');
                        }
                    },
                    error: function(xhr) {
                        showAlert('Error deleting category!', 'danger');
                    }
                });
            }
        });

    });
    </script>
@endpush