@extends('layouts.admin')
@section('title', 'Admin || Manage Hero Banner')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endpush

@section('content')
@section('page', 'Manage Hero Banner')

<div class="container pt-3 card">
    <div class="projects-section">
        <h6 class="m-0 fw-semi-bold mb-4">Edit Hero Banner (Single)</h6>

        <form id="updateBannerForm" class="row g-4">
            @csrf
            <div class="col-md-6">
                <label class="form-label">Title *</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Moving Texts (separate with ||) *</label>
                <input type="text" class="form-control" name="move_text" id="move_text" 
                       placeholder="Hotel & Restaurant || Commercial || Residential" required>
                <small class="text-muted">Use || to separate multiple rotating texts</small>
            </div>

            <div class="col-md-8">
                <label class="form-label">Current Image</label>
                <div id="currentImagePreview" class="mb-3"></div>
            </div>

            <div class="col-md-4">
                <label class="form-label">New Image (optional)</label>
                <input type="file" class="form-control" name="image" accept="image/*">
            </div>

            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Banner
                </button>
            </div>
        </form>
        <hr class="my-5">
        <div id="bannerLoading" class="spinner-container">
            <div class="spinner"></div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script> <!-- For frontend animation -->

<script>
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

    $(document).ready(function() {
        loadBanner();
        $('#updateBannerForm').submit(updateBanner);
    });

    function loadBanner() {
        $('#bannerLoading').show();
        $.ajax({
            url: "{{ route('admin.herobanners.get') }}",
            type: "GET",
            success: function(res) {
                $('#bannerLoading').hide();
                if (res.success && res.data) {
                    let banner = res.data;
                    $('#title').val(banner.title);
                    $('#move_text').val(banner.move_text);

                    // Preview
                    $('#previewTitle').text(banner.title);
                    $('#previewMoveText').text(banner.move_text.replace(/\|\|/g, ' | '));

                    let imgHtml = banner.image 
                        ? `<img src="/storage/${banner.image}" class="img-fluid rounded" style="height:300px; width:100%;">`
                        : '<p class="text-muted">No image</p>';
                    $('#currentImagePreview').html(imgHtml);
                    $('#previewImage').html(imgHtml);
                } else {
                    // First time - empty fields
                    showAlert('No banner found. Fill and update to create one.', 'info');
                }
            },
            error: function() {
                $('#bannerLoading').hide();
                showAlert('Error loading banner!', 'error');
            }
        });
    }

    function updateBanner(e) {
        e.preventDefault();
        let formData = new FormData(this);
        let btn = $(this).find('button[type="submit"]');
        let original = btn.html();
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Updating...');

        $.ajax({
            url: "{{ route('admin.herobanners.update') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: { 'X-CSRF-TOKEN': csrfToken },
            success: function(res) {
                if (res.success) {
                    loadBanner(); // Refresh fields & preview
                    showAlert(res.message, 'success');
                }
            },
            error: function() {
                showAlert('Error updating banner!', 'error');
            },
            complete: function() {
                btn.prop('disabled', false).html(original);
            }
        });
    }
</script>
@endpush