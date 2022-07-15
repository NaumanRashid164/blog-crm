@extends('layouts.admin')
@section('title', 'All Post')

@section('css')

@endsection

@section('content-header')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">All Post</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">All Post</a>
                        </li>

                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<section id="row-grouping-datatable" class="mt-2">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Post List</h4>
                </div>
                <div class="card-datatable">
                    <table class="dt-row-grouping table">
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Post Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Feature Options</th>
                                <th>Post Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">

                            @include("ajax.post.list")
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('script')
<script>

</script>
@endsection