<div class="motherContent" id="step-2">
    <div class="row">
        @foreach (config('translatable.locales') as $locale)
        <div class="col-md-6">
            <div class="form-group">
                <label>@lang('site.' . $locale . '.mamaname')</label>
                <input type="text" wire:model="{{ $locale }}_mamaname" class="form-control" />
                @error($locale."_mamaname")
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        @foreach (config('translatable.locales') as $locale)
        <div class="col-md-3">
            <div class="form-group">
                <label>@lang('site.' . $locale . '.parentjob')</label>
                <input type="text"  wire:model="{{ $locale }}_mamajob" class="form-control" />
                @error($locale."_mamajob")
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        @endforeach

        <div class="col-md-2">
            <label>@lang('site.ID')</label>
            <input type="text"  wire:model="mama_id" class="form-control" />
            @error('mama_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-2">
            <label>@lang('site.passport')</label>
            <input type="text"  wire:model="mama_passport" class="form-control" />
            @error('mama_passport')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-2">
            <label>@lang('site.phone')</label>
            <input type="text"  wire:model="mama_phone" class="form-control" />
            @error('mama_phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>@lang('site.nationality')</label>
            <select  wire:model="mama_nationality" class="form-control">
                <option value="" selected>@lang('site.nationality')</option>
                @foreach($nationalities as $nationality)
                    <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                @endforeach
            </select>
            @error('mama_nationality')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label>@lang('site.bloodType')</label>
            <select  wire:model="mama_bloodType" class="form-control">
                <option value="" selected>@lang('site.bloodType')</option>
                @foreach($bloodTypes as $bloodType)
                    <option value="{{ $bloodType->id }}">{{ $bloodType->name }}</option>
                @endforeach
            </select>
            @error('mama_bloodType')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label>@lang('site.religions')</label>
            <select  wire:model="mama_religions" class="form-control">
                <option value="" selected>@lang('site.religions')</option>
                @foreach($religions as $religion)
                    <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                @endforeach
            </select>
            @error('mama_religions')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>@lang('site.address')</label>
                <textarea  wire:model="mama_address" class="form-control" style="height: 70px;background: #f9f9f9;"></textarea>
            </div>
            @error('mama_address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
