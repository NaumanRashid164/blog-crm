@if(count($posts) > 0)
@foreach($posts as $post)
<tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$post->title}}</td>
    <td>{{$post->author->name}}</td>
    <td>{{$post->category->name}}</td>
    <td>
        <select name="featured" class="form-control update-status" data-id="{{$post->id}}" data-url="{{ route('post.feature') }}" data-update_url="{{ route('post.ajax.list') }}" data-target="table-body">
            <option value="Featured" {{$post->featured =="Featured" ? 'selected':''}}>Featured</option>
            <option value="Not Featured" {{$post->featured =="Not Featured" ? 'selected':''}}>Not Featured</option>
        </select>
    </td>
    <td>
        <select name="status" class="form-control update-status" data-id="{{$post->id}}" data-url="{{ route('post.status') }}" data-update_url="{{ route('post.ajax.list') }}" data-target="table-body">
            <option value="Published" {{$post->status =="Published" ? 'selected':''}}>Published</option>
            <option value="Archived" {{$post->status =="Archived" ? 'selected':''}}>Archived</option>
            <option value="Not Published" {{$post->status =="Not Published" ? 'selected':''}}>Not Published</option>
        </select>
    </td>
    <td>
        <div class="d-inline-flex">
            <a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">
                <i data-feather='more-vertical'></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="{{ route('post.ajax.edit', $post->id) }}" class="dropdown-item">
                    <i data-feather='edit'></i> Edit
                </a>
                <a href="javascript:;" class="dropdown-item del-btn" data-target="table-body" data-href="{{ route('post.ajax.delete', $post->id) }}" data-update_url="{{ route('post.ajax.list') }}">
                    <i data-feather='trash-2'></i> Delete
                </a>
            </div>
        </div>

    </td>
</tr>
@endforeach
@endif