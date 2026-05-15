    @extends('layouts.admin')
@section('title', 'Admin || Manage About Us Section')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endpush

@section('content')
@section('page', 'Manage About Us Section')

<div class="container pt-3 card">
    <div class="card-body">
        <form id="updateAboutForm" class="row g-4">
            @csrf
            <div class="col-md-4">
                <label class="form-label">Sub Title</label>
                <input type="text" class="form-control" name="sub_title" id="sub_title" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Title Line 1</label>
                <input type="text" class="form-control" name="title_line1" id="title_line1" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Title Line 2</label>
                <input type="text" class="form-control" name="title_line2" id="title_line2" required>
            </div>

            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="8" required></textarea>
            </div>

            <div class="col-md-4">
                <label class="form-label">Button Text</label>
                <input type="text" class="form-control" name="button_text" id="button_text" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Button Link</label>
                <input type="text" class="form-control" name="button_link" id="button_link" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Current Logo Image</label>
                <div id="currentLogoPreview" class="mb-3"></div>
                <input type="file" class="form-control" name="logo_image" accept="image/*">
                <small class="text-muted">Upload new logo (optional)</small>
            </div>

            <div class="col-md-6">
                <label class="form-label">Current Center Image</label>
                <div id="currentCenterPreview" class="mb-3"></div>
                <input type="file" class="form-control" name="center_image" accept="image/*">
                <small class="text-muted">Upload new center image (optional)</small>
            </div>

            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary btn-lg">
                    Update About Section
                </button>
            </div>
        </form>

        <div id="aboutLoading" class="spinner-container mt-4">
            <div class="spinner"></div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

    $(document).ready(function() {
        loadAbout();
        $('#updateAboutForm').submit(updateAbout);
    });

    function loadAbout() {
        $('#aboutLoading').show();
        $.ajax({
            url: "{{ route('admin.about.get') }}",
            type: "GET",
            success: function(res) {
                $('#aboutLoading').hide();
                if (res.success && res.data) {
                    let about = res.data;
                    $('#sub_title').val(about.sub_title);
                    $('#title_line1').val(about.title_line1);
                    $('#title_line2').val(about.title_line2);
                    $('#description').val(about.description);
                    $('#button_text').val(about.button_text);
                    $('#button_link').val(about.button_link);

                    // Preview images
                    let logoHtml = about.logo_image 
                        ? `<img src="/storage/${about.logo_image}" class="img-fluid rounded" style="max-height:200px;">`
                        : '<p class="text-muted">No logo uploaded</p>';
                    $('#currentLogoPreview').html(logoHtml);

                    let centerHtml = about.center_image 
                        ? `<img src="/storage/${about.center_image}" class="img-fluid rounded" style="max-height:400px;">`
                        : '<p class="text-muted">No center image uploaded</p>';
                    $('#currentCenterPreview').html(centerHtml);
                } else {
                    showAlert('No data found. Fill and update to create.', 'info');
                }
            },
            error: function() {
                $('#aboutLoading').hide();
                showAlert('Error loading data!', 'error');
            }
        });
    }

    function updateAbout(e) {
        e.preventDefault();
        let formData = new FormData(this);
        let btn = $(this).find('button[type="submit"]');
        let original = btn.html();
        btn.prop('disabled', true).html('Updating...');

        $.ajax({
            url: "{{ route('admin.about.update') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: { 'X-CSRF-TOKEN': csrfToken },
            success: function(res) {
                if (res.success) {
                    loadAbout();
                    showAlert(res.message, 'success');
                }
            },
            error: function() {
                showAlert('Error updating section!', 'error');
            },
            complete: function() {
                btn.prop('disabled', false).html(original);
            }
        });
    }
</script>
@endpush