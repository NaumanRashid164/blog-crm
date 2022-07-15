@extends('layouts.admin')
@section('title', 'Edit Post')

@section('css')
<!-- Summernote CSS - CDN Link -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<style>
    .note-modal-footer {
        height: 60px;
    }

    .note-editing-area {
        background-color: white;
    }

    .featured_img {
        height: 150px;
    }
</style>
<!-- //Summernote CSS - CDN Link -->
@endsection

@section('content-header')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Edit Post</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Edit Post</a>
                        </li>

                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<section id="basic-vertical-layouts" class="mt-2">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Post</h4>
                </div>
                <div class="card-body">
                    <form class="form form-vertical post-form" action="{{route('post.ajax.addPost')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$post->id}}">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label for="">Post Title</label>
                                    <input type="text" name="title" value="{{$post->title}}" class="form-control required title" id="">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label for="">Seo Title</label>
                                    <input type="text" name="seo_title" value="{{$post->seo_title}}" class="form-control required" id="">
                                    @error('seo_title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" value="{{$post->slug}}" class="form-control required slug" readonly id="">
                                    @error('slug')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="contact-info-vertical">Author</label>
                                <select name="author_id" class="form-control form-select required">
                                    <option disabled>--Select--</option>
                                    @foreach(users() as $item)
                                    <option value="{{$item->id}}" {{($item->id == $post->author_id) ? "selected" : ""}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('author_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="contact-info-vertical">Category</label>
                                <select name="category_id" class="form-control form-select required">
                                    <option disabled>--Select--</option>
                                    @foreach(category() as $item)
                                    <option value="{{$item->id}}" {{($item->id == $post->category_id) ? "selected" : ""}}>{{$item->name}} ({{$item->type}})</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="contact-info-vertical">Comments</label>
                                <select name="comments_status" class="form-control form-select required">
                                    <option disabled>--Select--</option>
                                    <option value="Active" {{("Active" == $post->comments_status) ? "selected" : ""}}>Active</option>
                                    <option value="Not Active" {{("Not Active" == $post->comments_status) ? "selected" : ""}}>Not Active</option>
                                    <option value="Read Only" {{("Read Only" == $post->comments_status) ? "selected" : ""}}>Read Only</option>
                                </select>
                                @error('comments_status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-4 mt-1">
                                <div class="mb-1">
                                    <label for="">Featured Image</label>
                                    <input type="file" name="featured_img" class="form-control" onchange="loadFile(event)" id="">
                                    <img class="img-fluid img-thumbnail mt-2 featured_img" id="output" src="{{asset('images/Feature img/'.$post->featured_img)}}" alt="">
                                    @error('featured_img')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4 mt-1">
                                <div class="mb-1">
                                    <label for="">Featured Image Alt Tag</label>
                                    <input type="text" name="featured_img_alt" value="{{$post->featured_img_alt}}" class="form-control required" id="">
                                    @error('featured_img_alt')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4 mt-1">
                                <div class="mb-1">
                                    <label for="">Publish Date</label>
                                    <input type="datetime-local" name="published_at" value="{{$post->published_at}}" class="form-control required published_at" id="">
                                    @error('published_at')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 mt-1">
                                <div class="mb-1">
                                    <label for="">Meta Description</label>
                                    <textarea name="meta_desc" rows="6" class="form-control">{{$post->meta_desc}}</textarea>
                                    @error('meta_desc')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mt-1">
                                <div class="mb-1">
                                    <label for="">Meta Keywords</label>
                                    <textarea name="meta_tags" rows="6" class="form-control">{{$post->meta_tags}}</textarea>
                                    @error('meta_tags')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mt-1">
                                <div class="mb-1">
                                    <label for="">Additional Tags</label>
                                    <textarea name="additional_tags" rows="6" class="form-control">{{$post->additional_tags}}</textarea>
                                    @error('additional_tags')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-12 mt-1">
                                <div class="mb-1">
                                    <label for="">Post Body</label>
                                    <textarea name="detail" rows="6" class="form-control detail summernote">
                                    {{$post->detail}}
                                    </textarea>
                                    @error('detail')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 text-lg-end mt-2 pt-50">
                                <button type="submit" class="btn btn-primary me-1">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                    Discard
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('script')
<!-- Summernote JS - CDN Link -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script type="text/javascript">
    // Image Preview on change
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };

    $(document).ready(function() {
        function sendFile(file, el) {
            var form_data = new FormData();
            form_data.append('file', file);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                data: form_data,
                type: "POST",
                url: "{{route('post.blog_images')}}",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    console.log(url);
                    $(el).summernote('editor.insertImage', url);
                }
            });
        }
        $('.summernote').summernote({
            tabsize: 2,
            height: 400,
            callbacks: {
                onImageUpload: function(files, editor, welEditable) {
                    for (var i = files.length - 1; i >= 0; i--) {
                        sendFile(files[i], this);
                    }
                }
            },
            fontSizes: ['8', '9', '10', '11', '12', '14', '18', '21'],
            tabsize: 2,
            height: 400,
            callbacks: {
                onImageUpload: function(files, editor, welEditable) {
                    for (var i = files.length - 1; i >= 0; i--) {
                        sendFile(files[i], this);
                    }
                }
            },

            toolbar: [
                ['style', ['style']],
                ['font-style', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['font', ['fontname']],
                ['font-size', ['fontsize']],
                ['font-color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video', 'hr']],
                ['misc', ['fullscreen', 'codeview', 'help']]
            ],
        });

        $('.dropdown-toggle').dropdown();
    });



    function convertToSlug(Text) {
        return Text.toLowerCase()
            .replace(/ /g, '-')
            .replace(/[^\w-]+/g, '');
    }
    // For Slug
    $(document).on("keyup", ".title", function() {
        var text = $(this).val();
        $(".slug").val(convertToSlug(text));
    });

    // On submit form
    $(document).on('submit', '.post-form', function(e) {
        e.preventDefault();
        if (!validate())
            return false;
        var form = $(this);
        var data = new FormData(this);
        // $(form).find('button[type="submit"]').prop('disabled', true);

        $.ajax({
            type: 'POST',
            data: data,
            cache: !1,
            contentType: !1,
            processData: !1,
            url: $(form).attr('action'),
            async: true,
            headers: {
                "cache-control": "no-cache"
            },
            success: function(response) {

                $(form).find('button[type="button"]').prop('disabled', true);
                toastr.success(response.success);
            },
            error: function(xhr, status, error) {
                if (xhr.status == 422) {
                    $(form).find('div.alert').remove();
                    var errorObj = xhr.responseJSON.errors;
                    $.map(errorObj, function(value, index) {
                        var appendIn = $(form).find('[name="' + index + '"]').closest('div');
                        if (!appendIn.length) {
                            toastr.error(value[0]);
                        } else {
                            $(appendIn).append('<div class="alert alert-danger" style="padding: 1px 5px;font-size: 12px"> ' + value[0] + '</div>')
                        }
                    });

                    $(form).find('button[type="submit"]').prop('disabled', false);

                } else {
                    toastr.error('Unknown Error!');
                    $(form).find('button[type="submit"]').prop('disabled', false);
                }

            }
        });
    });
</script>

@endsection