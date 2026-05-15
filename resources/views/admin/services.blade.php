@extends('layouts.admin')

@section('title', 'Admin || Manage Services')

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <style>
        .spinner-container {display:flex;justify-content:center;align-items:center;height:200px;}
        .spinner {width:3rem;height:3rem;border:3px solid #f3f3f3;border-top:3px solid #3498db;border-radius:50%;animation:spin 1s linear infinite;}
        @keyframes spin {0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}
        .service-image {width:50px;height:50px;object-fit:cover;border-radius:4px;}
        .action-buttons {display:flex;gap:5px;}
        .image-preview {max-width:200px;max-height:150px;object-fit:cover;border-radius:4px;}
        .variant-row {background:#f8f9fa;}
    </style>
@endpush

@section('content')
@section('page', 'Manage Services')

    <div class="container pt-3 card">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="fw-semi-bold">Services List</h6>
            <button class="btn btn-primary btn-sm" id="addServiceBtn"><i class="fas fa-plus"></i> Add Service</button>
        </div>

        <div class="mb-3 col-md-6">
            <input type="text" class="form-control" id="nameSearch" placeholder="Search by name...">
        </div>

        <div class="table-responsive">
            <table id="servicesTable" class="table table-striped table-bordered w-100">
                <thead>
                    <tr>
                        <th>ID</th><th>Category</th><th>Name</th><th>Short Desc</th><th>Image</th><th>Status</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div id="servicesLoading" class="spinner-container" style="display:none;"><div class="spinner"></div></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="serviceModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Add New Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="serviceForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="serviceId">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Category </label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Name </label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Status </label>
                                <select name="status" id="status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Image</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                <div id="imagePreviewContainer" class="mt-2"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Short Description </label>
                            <textarea name="short_description" id="shortDescription" class="form-control tinymce-editor"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Full Description</label>
                            <textarea name="description" id="description" class="form-control tinymce-editor"></textarea>
                        </div>

                        <!-- Variants -->
                        <div class="mb-5">
                        <div class="mt-5 bg-light p-3 rounded">
                            <div class="d-flex justify-content-between mb-3">
                                <label class="fw-bold">Variants</label>
                                <button type="button" id="addVariantBtn" class="btn btn-success btn-sm">+ Add Variant</button>
                            </div>
                            <div id="variantsContainer"></div>
                        </div>
                    </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="serviceSubmitBtn">
                            <span class="btn-text">Save Service</span>
                            <span class="spinner-border spinner-border-sm d-none"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('tiny/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    let servicesTable;
    let csrfToken = $('meta[name="csrf-token"]').attr('content');
    let variantIndex = 0;
    let variantEditors = {}; // Track variant editors
    let mainEditorsInitialized = false;

    $(document).ready(function () {
        initializeDataTable();
        loadServices();
        bindEvents();
        initSearch();
    });

    function initSearch() {
        // Debounce search to avoid too many requests
        let searchTimeout;
        $('#nameSearch').on('keyup', function() {
            clearTimeout(searchTimeout);
            let query = $(this).val().trim();
            
            searchTimeout = setTimeout(function() {
                searchServices(query);
            }, 500); // 500ms delay
        });
        
        // Clear search when clicking X in input
        $('#nameSearch').on('search', function() {
            if ($(this).val() === '') {
                searchServices('');
            }
        });
    }

    function searchServices(query) {
        // Show loading
        $('#servicesLoading').show();
        
        $.ajax({
            url: '{{ route("admin.services.search") }}',
            type: 'GET',
            data: { query: query },
            success: function(res) {
                $('#servicesLoading').hide();
                if (res.success) {
                    // Clear and redraw DataTable with search results
                    servicesTable.clear().rows.add(res.data).draw();
                    
                    // Update showing text if query exists
                    if (query) {
                        let infoText = servicesTable.page.info();
                        $('.dataTables_info').html(
                            `Showing ${infoText.start+1} to ${infoText.end} of ${infoText.recordsDisplay} entries (filtered from ${infoText.recordsTotal} total entries)`
                        );
                    }
                }
            },
            error: function() {
                $('#servicesLoading').hide();
                Swal.fire('Error', 'Search failed', 'error');
            }
        });
    }

    function initMainEditors() {
        // Destroy existing editors first
        if (tinymce.get('shortDescription')) {
            tinymce.get('shortDescription').destroy();
        }
        if (tinymce.get('description')) {
            tinymce.get('description').destroy();
        }

        // Initialize short description editor
        tinymce.init({
            selector: '#shortDescription',
            height: 200,
            menubar: false,
            branding: false,
            promotion: false,
            statusbar: false,
            plugins: 'link lists',
            toolbar: 'undo redo | bold italic | bullist numlist | link',
            setup: function (editor) {
                editor.on('init', function () {
                    $(editor.container).addClass('initialized');
                });
            }
        });

        // Initialize full description editor
        tinymce.init({
            selector: '#description',
            height: 300,
            menubar: true,
            branding: false,
            promotion: false,
            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace wordcount visualblocks code fullscreen insertdatetime media table paste textcolor',
            toolbar: 'undo redo | formatselect | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | table | code | fullscreen',
            image_advtab: true,
            setup: function (editor) {
                editor.on('init', function () {
                    $(editor.container).addClass('initialized');
                });
            }
        });

        mainEditorsInitialized = true;
    }

    function bindEvents() {
        $('#addServiceBtn').click(() => {
            resetForm();
            $('#modalTitle').text('Add New Service');
            if (!mainEditorsInitialized) {
                initMainEditors();
            }
            $('#serviceModal').modal('show');
        });
        
        $('#image').change(previewImage);
        $('#serviceForm').submit(function(e){ 
            e.preventDefault(); 
            saveService(); 
        });
        
        $('#addVariantBtn').click(() => addVariantRow());
        
        $('#servicesTable').on('click', '.editService', function(){ 
            loadServiceForEdit($(this).data('id')); 
        });
        
        $('#servicesTable').on('click', '.deleteService', function(){ 
            deleteService($(this).data('id')); 
        });
        
        $('#serviceModal').on('hidden.bs.modal', resetForm);
        $('#serviceModal').on('shown.bs.modal', function() {
            // Re-init main editors if needed
            if (!mainEditorsInitialized) {
                initMainEditors();
            }
        });
    }

    function resetForm() {
        $('#serviceForm')[0].reset();
        $('#serviceId').val('');
        $('#imagePreviewContainer').empty();
        
        // Destroy all variant editors
        Object.values(variantEditors).forEach(editorId => {
            if (tinymce.get(editorId)) {
                tinymce.get(editorId).destroy();
            }
        });
        variantEditors = {};
        
        $('#variantsContainer').empty();
        variantIndex = 0;
        
        // Reset main editors content
        if (tinymce.get('shortDescription')) {
            tinymce.get('shortDescription').setContent('');
        }
        if (tinymce.get('description')) {
            tinymce.get('description').setContent('');
        }
        
        // Add one default variant
        addVariantRow();
    }

    function previewImage(event) {
        let input = event.target;
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreviewContainer').html(
                    `<img src="${e.target.result}" class="image-preview" alt="Preview">`
                );
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function addVariantRow(data = null) {
        let idx = variantIndex++;
        let editorId = `variant-editor-${idx}`;
        variantEditors[editorId] = editorId;

        let html = `
            <div class="variant-row border p-3 mb-3" id="vrow-${idx}">
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" class="form-control variant-name" 
                               placeholder="Variant Name" 
                               value="${data ? data.name : ''}">
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-danger btn-sm w-100 remove-variant">
                            Remove
                        </button>
                    </div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Variant Description</label>
                    <textarea id="${editorId}-textarea" class="d-none">${data ? data.description : ''}</textarea>
                    <div id="${editorId}" class="variant-editor" 
                         style="min-height:200px; border:1px solid #ced4da; border-radius:4px;">
                    </div>
                </div>
            </div>
        `;

        $('#variantsContainer').append(html);

        // Initialize TinyMCE for this variant
        setTimeout(() => {
            tinymce.init({
                selector: `#${editorId}`,
                height: 200,
                menubar: false,
                branding: false,
                promotion: false,
                statusbar: false,
                plugins: 'link lists',
                toolbar: 'undo redo | bold italic | bullist numlist | link',
                setup: function (editor) {
                    editor.on('init', function () {
                        // Set content from hidden textarea
                        let content = $(`#${editorId}-textarea`).val();
                        if (content) {
                            editor.setContent(content);
                        }
                    });
                }
            });
        }, 100);

        // Remove variant button event
        $(`#vrow-${idx} .remove-variant`).click(function () {
            if (tinymce.get(editorId)) {
                tinymce.get(editorId).destroy();
            }
            delete variantEditors[editorId];
            $(this).closest('.variant-row').remove();
        });
    }

    function loadServiceForEdit(id) {
        $.get('{{ route("admin.services.gets") }}', function(res) {
            if (res.success) {
                let service = res.data.find(s => s.id == id);
                if (service) {
                    resetForm(); // Clear form first
                    
                    $('#serviceId').val(service.id);
                    $('#category_id').val(service.category_id);
                    $('#name').val(service.name);
                    $('#status').val(service.status);

                    // Set image preview
                    let imgHtml = service.image ? 
                        `<p class="mb-1">Current Image:</p><img src="/storage/${service.image}" class="image-preview">` : 
                        '';
                    $('#imagePreviewContainer').html(imgHtml);

                    // Ensure main editors are initialized
                    if (!mainEditorsInitialized) {
                        initMainEditors();
                    }

                    // Set main editors content with slight delay to ensure they're ready
                    setTimeout(() => {
                        if (tinymce.get('shortDescription')) {
                            tinymce.get('shortDescription').setContent(service.short_description || '');
                        }
                        if (tinymce.get('description')) {
                            tinymce.get('description').setContent(service.description || '');
                        }
                    }, 300);

                    // Clear variants and add new ones
                    $('#variantsContainer').empty();
                    variantEditors = {};
                    variantIndex = 0;

                    if (service.variants && service.variants.length > 0) {
                        // Add variants after a delay to ensure DOM is ready
                        setTimeout(() => {
                            service.variants.forEach(v => addVariantRow(v));
                        }, 500);
                    } else {
                        setTimeout(() => addVariantRow(), 500);
                    }

                    // Update UI
                    $('#modalTitle').text('Edit Service');
                    $('#serviceSubmitBtn .btn-text').text('Update Service');
                    $('#serviceModal').modal('show');
                }
            }
        }).fail(function() {
            Swal.fire('Error', 'Failed to load service data', 'error');
        });
    }

    function saveService() {
        // Get content from main editors
        let shortDesc = '';
        let fullDesc = '';
        
        if (tinymce.get('shortDescription')) {
            shortDesc = tinymce.get('shortDescription').getContent();
        }
        if (tinymce.get('description')) {
            fullDesc = tinymce.get('description').getContent();
        }
        
        // Update hidden textareas
        $('#shortDescription').val(shortDesc);
        $('#description').val(fullDesc);

        // Collect variants data
        let variants = [];
        $('.variant-row').each(function () {
            let name = $(this).find('.variant-name').val().trim();
            let editorDiv = $(this).find('.variant-editor')[0];
            let editorId = editorDiv ? editorDiv.id : null;
            
            if (editorId && tinymce.get(editorId)) {
                let desc = tinymce.get(editorId).getContent();
                if (name) {
                    variants.push({ 
                        name: name, 
                        description: desc 
                    });
                }
            }
        });

        let id = $('#serviceId').val();
        let url = id ? `{{ url('services/update') }}/${id}` : '{{ route("admin.services.store") }}';
        let method = id ? 'PUT' : 'POST';

        let formData = new FormData($('#serviceForm')[0]);
        formData.append('variants', JSON.stringify(variants));
        if (id) {
            formData.append('_method', 'PUT');
        }

        let btn = $('#serviceSubmitBtn');
        btn.prop('disabled', true)
           .find('.btn-text')
           .text(id ? 'Updating...' : 'Saving...');
        btn.find('.spinner-border').removeClass('d-none');

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: { 
                'X-CSRF-TOKEN': csrfToken 
            },
            success: function(res) {
                if (res.success) {
                    $('#serviceModal').modal('hide');
                    loadServices();
                    Swal.fire('Success', res.message, 'success');
                } else {
                    Swal.fire('Error', res.message || 'Operation failed', 'error');
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let errorMsg = Object.values(errors).flat().join('<br>');
                    Swal.fire('Validation Error', errorMsg, 'warning');
                } else {
                    Swal.fire('Error', 'Server error occurred', 'error');
                }
            },
            complete: function() {
                btn.prop('disabled', false)
                   .find('.btn-text')
                   .text(id ? 'Update Service' : 'Save Service');
                btn.find('.spinner-border').addClass('d-none');
            }
        });
    }

    function initializeDataTable() {
        servicesTable = $('#servicesTable').DataTable({
            paging: true,
            searching: false, // Disable DataTable's built-in search
            ordering: true,
            info: true,
            lengthChange: true,
            pageLength: 10,
            language: {
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                infoEmpty: "Showing 0 to 0 of 0 entries",
                infoFiltered: "",
                emptyTable: "No services found",
                zeroRecords: "No matching services found",
                lengthMenu: "Show _MENU_ entries",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous"
                }
            },
            columns: [
                { data: 'id' },
                { 
                    data: 'category.name', 
                    defaultContent: '—',
                    render: function(data) {
                        return data || '—';
                    }
                },
                { data: 'name' },
                { 
                    data: 'short_description', 
                    render: function(data) {
                        let text = (data || '').replace(/<[^>]*>/g, '').trim();
                        return text.length > 60 ? 
                            text.substring(0, 60) + '...' : 
                            (text || '—');
                    }
                },
                { 
                    data: 'image', 
                    render: function(data) {
                        return data ? 
                            `<img src="/storage/${data}" class="service-image" alt="Service Image">` : 
                            '—';
                    }
                },
                { 
                    data: 'status', 
                    render: function(data) {
                        let badgeClass = data === 'active' ? 'bg-success' : 'bg-secondary';
                        let text = data ? data.charAt(0).toUpperCase() + data.slice(1) : 'Inactive';
                        return `<span class="badge ${badgeClass}">${text}</span>`;
                    }
                },
                { 
                    data: null, 
                    orderable: false,
                    render: function(data) {
                        return `
                            <div class="action-buttons">
                                <button class="btn btn-sm btn-success me-1 editService" 
                                        data-id="${data.id}"
                                        title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button class="btn btn-sm btn-danger deleteService" 
                                        data-id="${data.id}"
                                        title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        `;
                    }
                }
            ]
        });
    }

    function loadServices() {
        $('#servicesLoading').show();
        $.get('{{ route("admin.services.gets") }}', function(res) {
            $('#servicesLoading').hide();
            if (res.success) {
                servicesTable.clear().rows.add(res.data).draw();
            }
        }).fail(function() {
            $('#servicesLoading').hide();
            Swal.fire('Error', 'Failed to load services', 'error');
        });
    }

    function deleteService(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{ url("services/destroy") }}/' + id,
                    type: 'DELETE',
                    data: {
                        _token: csrfToken
                    },
                    success: function(res) {
                        if (res.success) {
                            loadServices();
                            Swal.fire('Deleted!', res.message, 'success');
                        } else {
                            Swal.fire('Error', res.message || 'Delete failed', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Server error occurred', 'error');
                    }
                });
            }
        });
    }
</script>
@endpush