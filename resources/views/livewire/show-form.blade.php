<div class="content">
    <!--Step 1-->
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button"
                class="btn btn-circle {{ $currentPage != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                <p>@lang('site.fatherInformation')</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button"
                class="btn btn-circle {{ $currentPage != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                <p>@lang('site.mohterInformation')</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button"
                class="btn btn-circle {{ $currentPage != 3 ? 'btn-default' : 'btn-success' }}"
                disabled="disabled">3</a>
                <p>@lang('site.sureInformation')</p>
            </div>
        </div>
    </div>
    <form method="post" autocomplete="off" wire:submit.prevent='add_parent'>
        @if($currentPage == 1)
        <div class="fatherContent" id="step-1">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>@lang('site.email')</label>
                        <input type="email" class="form-control" wire:model="email" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>@lang('site.password')</label>
                        <input type="password" class="form-control"  wire:model="password" />
                    </div>
                </div>
                @foreach (config('translatable.locales') as $locale)
                <div class="col-md-6">
                    <div class="form-group">
                        <label>@lang('site.' . $locale . '.babaname')</label>
                        <input type="text"  wire:model="{{ $locale }}_babaname" class="form-control" />
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                @foreach (config('translatable.locales') as $locale)
                <div class="col-md-3">
                    <div class="form-group">
                        <label>@lang('site.' . $locale . '.parentjob')</label>
                        <input type="text"  wire:model="{{ $locale }}_babajob" class="form-control" />
                    </div>
                </div>
                @endforeach

                <div class="col-md-2">
                    <label>@lang('site.ID')</label>
                    <input type="text"  wire:model="baba_id" class="form-control" />
                </div>
                <div class="col-md-2">
                    <label>@lang('site.passport')</label>
                    <input type="text"  wire:model="baba_passport" class="form-control" />
                </div>
                <div class="col-md-2">
                    <label>@lang('site.phone')</label>
                    <input type="text"  wire:model="baba_phone" class="form-control" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>@lang('site.nationality')</label>
                    <select  wire:model="baba_nationality" class="form-control">
                        <option value="" disabled selected>@lang('site.nationality')</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>@lang('site.bloodType')</label>
                    <select  wire:model="baba_bloodType" class="form-control">
                        <option value="" disabled selected>@lang('site.bloodType')</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>@lang('site.religions')</label>
                    <select  wire:model="baba_religions" class="form-control">
                        <option value="" disabled selected>@lang('site.religions')</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>@lang('site.address')</label>
                        <textarea  wire:model="baba_address" class="form-control" style="height: 70px;background: #f9f9f9;"></textarea>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!--Step 2-->
        @if($currentPage == 2)
        <div class="motherContent" id="step-2">
            <div class="row">
                @foreach (config('translatable.locales') as $locale)
                <div class="col-md-6">
                    <div class="form-group">
                        <label>@lang('site.' . $locale . '.mamaname')</label>
                        <input type="text" wire:model="{{ $locale }}_mamaname" class="form-control" />
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
                    </div>
                </div>
                @endforeach

                <div class="col-md-2">
                    <label>@lang('site.ID')</label>
                    <input type="text"  wire:model="mama_id" class="form-control" />
                </div>
                <div class="col-md-2">
                    <label>@lang('site.passport')</label>
                    <input type="text"  wire:model="mama_passport" class="form-control" />
                </div>
                <div class="col-md-2">
                    <label>@lang('site.phone')</label>
                    <input type="text"  wire:model="mama_phone" class="form-control" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>@lang('site.nationality')</label>
                    <select  wire:model="mama_nationality" class="form-control">
                        <option value="" disabled selected>@lang('site.nationality')</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>@lang('site.bloodType')</label>
                    <select  wire:model="mama_bloodType" class="form-control">
                        <option value="" disabled selected>@lang('site.bloodType')</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>@lang('site.religions')</label>
                    <select  wire:model="mama_religions" class="form-control">
                        <option value="" disabled selected>@lang('site.religions')</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>@lang('site.address')</label>
                        <textarea  wire:model="mama_address" class="form-control" style="height: 70px;background: #f9f9f9;"></textarea>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if($currentPage == $totalPages)
        <button class="btn btn-primary" type="submit" >@lang('site.save')</button>
        @endif
        @if($currentPage < $totalPages)
        <button class="btn btn-primary" type="button" wire:click='next'>@lang('site.next')</button>
        @endif
        @if($currentPage > 1 && $currentPage <= $totalPages)
        <button class="btn btn-info" type="button" wire:click='previous'>@lang('site.previous')</button>
        @endif

    </form>
</div>
