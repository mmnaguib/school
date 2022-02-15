<button class="btn btn-success mb-3" type="button" wire:click="showFormadd">@lang('site.add_parent')</button>
<table id="datatable" class="table table-striped table-bordered p-0">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">@lang('site.email')</th>
            <th scope="col">@lang('site.name')</th>
            <th scope="col">@lang('site.ID')</th>
            <th scope="col">@lang('site.passport')</th>
            <th scope="col">@lang('site.phone')</th>
            <th scope="col">@lang('site.job')</th>
            <th scope="col">@lang('site.actions')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($parents as $index => $parent)
        <tr>
            <th scope="row">{{ $index +1 }}</th>
            <td>{{ $parent->email }}</td>
            <td>{{ $parent->father_name }}</td>
            <td>{{ $parent->father_id }}</td>
            <td>{{ $parent->father_passport }}</td>
            <td>{{ $parent->father_phone }}</td>
            <td>{{ $parent->father_job }}</td>
            <td>
                <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
