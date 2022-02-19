@if(!empty($successMsg))
    <div class="alert alert-success" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ $successMsg }}
    </div>
@endif
<button class="btn btn-success mb-3" type="button" wire:click="showFormadd">@lang('site.add_parent')</button>
<table id="datatable" class="table table-striped table-bordered p-0">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">@lang('site.email')</th>
            <th scope="col">@lang('site.parent_name')</th>
            <th scope="col">@lang('site.ID')</th>
            <th scope="col">@lang('site.passport')</th>
            <th scope="col">@lang('site.phone')</th>
            <th scope="col">@lang('site.parent_job')</th>
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
                <button class="btn btn-sm btn-primary" wire:click='edit({{ $parent->id }})'><i class="fa fa-edit"></i> @lang('site.edit')</button>
                <button type="submit" class="btn btn-danger btn-sm" wire:click="delete({{ $parent->id }} )" ><i class="fa fa-trash"></i> @lang('site.delete')</button>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
