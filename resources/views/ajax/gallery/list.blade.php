@if(count($galleries) > 0)
@foreach($galleries as $gallery)
<div class="col-md-3 col-sm-6">
    <div class="card imgGalleryCard">
        <div class="card-body">
            <div class="row d-flex justify-content-between">
                <div class="col">
                    <h6 class="text-start">ID: {{$gallery->id}}</h6>
                </div>
                <div class="col">
                    <h6 class="text-end">Type: {{$gallery->type}}</h6>
                </div>
            </div>
            <div class="img-container">
                <img src="{{ asset('images/gallery/'. $gallery->img) }}" alt="" class="img-fluid">
                <div class="imgIcon"><i class="fadeIn animated bx bx-fullscreen"></i><br>{{$gallery->img}}</div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif