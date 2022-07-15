@if(count($cats)>0)
@foreach ($cats as $cat)
<tr>
    <td>{{Str::ucfirst($cat->type ??'')}}</td>
    <td>{{Str::ucfirst($cat->name ??'')}}</td>
    <td>{{get_category($cat->main_category)}}</td>
    <td>
        <select name="status" class="form-control update-status" data-id="{{$cat->id}}" data-url="{{ route('category.status') }}" data-update_url="{{ route('category.ajax.list') }}" data-target="table-body">
            <option value="Publish" {{$cat->status =="Publish" ? 'selected':''}}>Publish</option>
            <option value="Not Publish" {{$cat->status =="Not Publish" ? 'selected':''}}>Not Publish</option>
            <option value="Archived" {{$cat->status =="Archived" ? 'selected':''}}>Archived</option>
        </select>
    </td>
    <td>
        <div class="d-inline-flex">
            <a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">
                <i data-feather='more-vertical'></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="javascript:;" data-target="table-body" data-url="{{ route('category.ajax.edit', $cat->id) }}" data-heading="Edit Category" data-update_url="{{ route('category.ajax.list') }}" class="dropdown-item open-modal">
                    <i data-feather='edit'></i> Edit
                </a>
                <a href="javascript:;" class="dropdown-item del-btn" data-target="table-body" data-href="{{ route('category.ajax.delete', $cat->id) }}" data-update_url="{{ route('category.ajax.list') }}">
                    <i data-feather='trash-2'></i> Delete
                </a>
            </div>
        </div>

    </td>
</tr>
@endforeach
@endif