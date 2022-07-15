@extends('layouts.admin')
@section('title', 'Setup')

@section('css')

@endsection

@section('content-header')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Modules Setup</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Modules</a>
                        </li>

                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<!-- frequently asked questions tabs pills -->
<section id="faq-tabs">
    <!-- vertical tab pill -->
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="faq-navigation d-flex justify-content-between flex-column mb-2 mb-md-0">
                <!-- pill tabs navigation -->
                <ul class="nav nav-pills nav-left flex-column" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="pill" href="#module" aria-expanded="true" role="tab" data-update_url="{{ route('tag.index') }}" data-target="modules-list">
                            <img src="{{ asset('app-assets/images/icons/brands/tag.png') }}" style="width: 20px !important;margin-right: 11px;" alt="icon">
                            <span class="fw-bold">Tags</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="pill" href="#module" aria-expanded="true" role="tab" data-update_url="{{ route('category.index') }}" data-target="modules-list">
                            <img src="{{ asset('app-assets/images/icons/brands/category.png') }}" style="width: 20px !important;margin-right: 11px;" alt="icon">
                            <span class="fw-bold">Category</span>
                        </a>
                    </li>

                </ul>

            </div>
        </div>

        <div class="col-lg-9 col-md-8 col-sm-12">
            <!-- pill tabs tab content -->
            <div class="tab-content">
                <!-- payment panel -->
                <div role="tabpanel" class="tab-pane active module_tab" id="module" aria-labelledby="module" aria-expanded="true">
                    <!-- icon and header -->
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-tag bg-primary me-1">
                            <img src="{{ asset('app-assets/images/icons/brands/tag.png') }}" class="module_img" style="width: 20px !important" alt="icon">
                        </div>
                        <div>
                            <h4 class="mb-0 module_title">Tags</h4>

                        </div>
                    </div>


                    <div class="modules-list">

                        @include('admin.tag.list')

                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- / frequently asked questions tabs pills -->

@endsection

@section('script')
<script>
    $(document).on("change", ".type", function() {
        var selected = $(this).find("option:selected").val();
        if (selected == "main-category") {
            $(".main_category").addClass("hidden").val("");
        } else {

            $(".main_category").removeClass("hidden").val("");
        }
    });
</script>

@endsection