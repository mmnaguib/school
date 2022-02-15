<div class="fatherContent" id="step-1">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>@lang('site.email')</label>
                <input type="email" class="form-control" wire:model="email" />
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>@lang('site.password')</label>
                <input type="password" class="form-control"  wire:model="password" />
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        @foreach (config('translatable.locales') as $locale)
        <div class="col-md-6">
            <div class="form-group">
                <label>@lang('site.' . $locale . '.babaname')</label>
                <input type="text"  wire:model="{{ $locale }}_babaname" class="form-control" />
                @error($locale.'_babaname')
                    <div class="alert alert-danger">{{ $message }}</div>
                    <!--<span style="position: absolute;top: 0;left: 30px;color: #f00;font-weight: bold;font-size: 20px;">*</span>-->
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
                <input type="text" wire:model="{{ $locale }}_babajob" class="form-control" />
                @error($locale.'_babajob')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        @endforeach

        <div class="col-md-2">
            <label>@lang('site.ID')</label>
            <input type="text" wire:model="baba_id" class="form-control" />
            @error('baba_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-2">
            <label>@lang('site.passport')</label>
            <input type="text"  wire:model="baba_passport" class="form-control" />
            @error('baba_passport')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-2">
            <label>@lang('site.phone')</label>
            <input type="text"  wire:model="baba_phone" class="form-control" />
            @error('baba_phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>@lang('site.nationality')</label>
            <select  wire:model="baba_nationality" class="form-control">
                <option value="" selected>@lang('site.nationality')</option>
                @foreach($nationalities as $nationality)
                    <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                @endforeach
            </select>
            @error('baba_nationality')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label>@lang('site.bloodType')</label>
            <select  wire:model="baba_bloodType" class="form-control">
                <option value="" selected>@lang('site.bloodType')</option>
                @foreach($bloodTypes as $bloodType)
                    <option value="{{ $bloodType->id }}">{{ $bloodType->name }}</option>
                @endforeach
            </select>
            @error('baba_bloodType')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label>@lang('site.religions')</label>
            <select  wire:model="baba_religions" class="form-control">
                <option value="" selected>@lang('site.religions')</option>
                @foreach($religions as $religion)
                    <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                @endforeach
            </select>
            @error('baba_religions')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>@lang('site.address')</label>
                <textarea  wire:model="baba_address" class="form-control" style="height: 70px;background: #f9f9f9;"></textarea>
            </div>
            @error('baba_address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
