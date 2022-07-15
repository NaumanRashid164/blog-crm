<section id="row-grouping-datatable" class="mt-2">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Category List</h4>

                    <button type="button" class="btn btn-primary me-1 open-modal" data-heading="Add Category" data-target="table-body" data-update_url="{{ route('category.ajax.list') }}" data-url="{{route('category.ajax.addfrom')}}">Add Category</button>

                </div>
                <div class="card-datatable">
                    <table class="dt-row-grouping table">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Main Category</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">

                            @include('ajax.category.list')

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>