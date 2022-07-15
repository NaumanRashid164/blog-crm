<form class="row gy-1 pt-75" action="{{route('category.ajax.addCategory')}}" method="post">
    @csrf
    <input type="hidden" name="id" value={{$cat->id}}>
    <div class="col-6 col-md-6">
        <label class="form-label">Type</label>
        <select name="type" class="form-select type required" id="">
            <option value="" disabled>--Select--</option>
            <option value="main-category" {{$cat->type == "main-category" ? 'selected' : ""}}>Main Category</option>
            <option value="sub-category" {{$cat->type == "sub-category" ? 'selected' : ""}}>Sub Category</option>
        </select>
        @error('type')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-6 col-md-6 main_category {{$cat->type == 'main-category' ? 'hidden' : ''}} ">
        <label class="form-label">Main Category</label>
        <select name="main_category" class="form-select main_category required" id="">
            <option value="" selected disabled>--select--</option>
            @foreach(main_category() as $item)
            <option value="{{$item->id}}" {{$item->id == $cat->main_category ? 'selected' : ""}}>{{$item->name}}</option>
            @endforeach
        </select>
        @error('main_category')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>


    <div class="col-6 col-md-6">
        <label class="form-label">Category Name</label>
        <input type="text" class="form-control name required" name="name" value="{{$cat->name}}">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12 text-center mt-2 pt-50">
        <button type="submit" class="btn btn-primary me-1">Submit</button>
        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
            Discard
        </button>
    </div>
</form>