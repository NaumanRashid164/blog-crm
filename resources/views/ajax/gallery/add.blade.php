<form method="post" action="{{route('gallery.ajax.addFile')}}" enctype="multipart/form-data" class="dropzone" id="my-dropzone">
    @csrf
    <div class="dz-default dz-message">
        <h4> Drop files here or Click to upload</h4>
    </div>
</form>