@if(count($tags)>0)
@foreach ($tags as $tag)
<tr>
    <td>{{Str::ucfirst($tag->name ??'')}}</td>
    <td>

        <div class="d-inline-flex">
            <a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">
                <i data-feather='more-vertical'></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="javascript:;" data-target="table-body" data-url="{{ route('tag.ajax.edit', $tag->id) }}" data-heading="Edit Tag" data-update_url="{{ route('tag.ajax.list') }}" class="dropdown-item open-modal">
                    <i data-feather='edit'></i> Edit
                </a>
                <a href="javascript:;" class="dropdown-item del-btn" data-target="table-body" data-href="{{ route('tag.ajax.delete', $tag->id) }}" data-update_url="{{ route('tag.ajax.list') }}">
                    <i data-feather='trash-2'></i> Delete
                </a>
            </div>
        </div>

    </td>
</tr>
@endforeach
@endif