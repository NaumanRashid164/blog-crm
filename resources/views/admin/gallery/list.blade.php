@extends('layouts.admin')
@section('title', 'Gallery')

@section('css')
<link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
<style>
    .img-button {
        display: flex;
        align-items: center;
        justify-content: end;
    }

    .dz-image img {
        width: 100%;
        height: 100%;
    }

    .dropzone.dz-started .dz-message {
        display: block !important;
    }

    .dropzone {
        border: 2px dashed #028AF4 !important;
        ;
    }

    .dropzone .dz-preview.dz-complete .dz-success-mark {
        opacity: 1;
    }

    .dropzone .dz-preview.dz-error .dz-success-mark {
        opacity: 0;
    }

    .dropzone .dz-preview .dz-error-message {
        top: 144px;
    }
</style>
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
@endsection

@section('content-header')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Gallery</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Gallery</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="img-button">
    <button type="button" class="btn btn-primary me-1 open-modal" data-heading="Upload image" data-target="table-body" data-update_url="{{ route('gallery.ajax.list') }}" data-url="{{route('gallery.ajax.addfrom')}}">Upload Image</button>
</div>
<div class="row mt-2">
    @include("ajax.gallery.list")

</div>
@endsection

@section("script")



@endsection