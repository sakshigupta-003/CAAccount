@extends('layouts.admin')

@section('title','Manage Subscribers')
@section('page','Subscribers')

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
            <h5 class="mb-0">Subscribers List</h5>
            <button class="btn btn-primary btn-sm" id="addSubscriberBtn">Add Subscriber</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="subscribersTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div id="subscribersLoading" class="spinner-container">
                <div class="spinner"></div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="subscriberModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="subscriberForm">
                    @csrf
                    <input type="hidden" id="subscriberId">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Subscriber</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
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
        $('#subscribersLoading').show();

        let table = $('#subscribersTable').DataTable({
            ajax: {
                url: '{{ route("admin.subscribers.get") }}',
                dataSrc: 'data'
            },
            columns: [
                { data: 'id' },
                { data: 'email' },
                { data: 'status' },
                { 
                    data: null,
                    orderable: false,
                    render: function(d){
                        return `
                            <div class="action-buttons">
                                <button class="btn btn-sm btn-success editSubscriber" data-id="${d.id}" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button class="btn btn-sm btn-danger deleteSubscriber" data-id="${d.id}" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        `;
                    }
                }
            ],
            initComplete: function() {
                $('#subscribersLoading').hide();
            }
        });

        // Add Subscriber
        $('#addSubscriberBtn').click(function(){
            $('#subscriberForm')[0].reset();
            $('#subscriberForm .invalid-feedback').hide();
            $('#subscriberId').val('');
            $('#subscriberModal .modal-title').text('Add Subscriber');
            $('#subscriberModal').modal('show');
        });

        // Submit Form
        $('#subscriberForm').submit(function(e){
            e.preventDefault();
            let id = $('#subscriberId').val();
            let updateBaseUrl = '{{ route("admin.subscribers.update", ":id") }}';
            let url = id ? updateBaseUrl.replace(':id', id) : '{{ route("admin.subscribers.store") }}';
            let submitBtn = $(this).find('button[type="submit"]');
            let originalText = submitBtn.html();
            submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');

            $.ajax({
                url: url,
                method: 'POST',
                data: $(this).serialize(),
                success:function(res){
                    if(res.success){
                        $('#subscriberModal').modal('hide');
                        table.ajax.reload();
                        showAlert(res.message, 'success');
                    } else {
                        showAlert('Error occurred', 'error');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        $('#subscriberForm .invalid-feedback').hide();
                        for (const field in errors) {
                            $(`#subscriberForm [name="${field}"]`).addClass('is-invalid')
                                .next('.invalid-feedback').text(errors[field][0]).show();
                        }
                    } else {
                        showAlert('Error saving subscriber!', 'error');
                    }
                },
                complete: function() {
                    submitBtn.prop('disabled', false).html(originalText);
                }
            });
        });

        // Edit Subscriber
        $('#subscribersTable').on('click','.editSubscriber', function(){
            let id = $(this).data('id');
            $.get('{{ route("admin.subscribers.get") }}', function(res){
                let subscriber = res.data.find(c => c.id == id);
                if(subscriber){
                    $('#subscriberId').val(subscriber.id);
                    $('#email').val(subscriber.email);
                    $('#status').val(subscriber.status);
                    $('#subscriberForm .invalid-feedback').hide();
                    $('#subscriberModal .modal-title').text('Edit Subscriber');
                    $('#subscriberModal').modal('show');
                }
            });
        });

        // Delete Subscriber
        $('#subscribersTable').on('click','.deleteSubscriber', function(){
            if(confirm('Are you sure?')){
                let id = $(this).data('id');
                let destroyBaseUrl = '{{ route("admin.subscribers.destroy", ":id") }}';
                let url = destroyBaseUrl.replace(':id', id);
                $.ajax({
                    url: url,
                    type:'DELETE',
                    data:{ _token: '{{ csrf_token() }}' },
                    beforeSend: function() {
                        showAlert('Deleting subscriber...', 'info');
                    },
                    success:function(res){
                        if(res.success){
                            table.ajax.reload();
                            showAlert(res.message, 'success');
                        }
                    },
                    error: function(xhr) {
                        showAlert('Error deleting subscriber!', 'danger');
                    }
                });
            }
        });

    });
    </script>
@endpush