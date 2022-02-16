<div class="content">
    @if(!empty($successMsg))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMsg }}
        </div>
    @endif
    @if($show_table)
        @include('livewire.show-table')
    @else
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
        @if($currentPage == 1)
        @include('livewire.father-form')
        @endif

        <!--Step 2-->
        @if($currentPage == 2)
        @include('livewire.mother-form')
        @endif

        @if($currentPage == $totalPages)
            <div><p>@lang('site.parentSure')</p></div>
            <div class="col-md-12">
                <div class="row form-group">
                    <label class="col-md-12 label-control">@lang('site.attachments')</label>
                    <input type="file" wire:model="photos" accept="images/*" multiple />
                </div>
            </div>
                @if($updated_form)
                    <button class="btn btn-primary" type="button" wire:click="submitFormEdit">@lang('site.save')</button>
                @else
                    <button class="btn btn-primary" type="button" wire:click="submitForm">@lang('site.save')</button>
                @endif
        @endif

        @if($currentPage > 1 && $currentPage <= $totalPages)

            @if($updated_form)
                <button class="btn btn-info" type="button" wire:click='previousEdit'>@lang('site.previous')</button>
            @else
                <button class="btn btn-info" type="button" wire:click='previous'>@lang('site.previous')</button>
            @endif
        @endif
        @if($currentPage < $totalPages)
            @if($updated_form)
                <button class="btn btn-primary" type="button" wire:click='nextEdit'>@lang('site.next')</button>
            @else
                <button class="btn btn-primary" type="button" wire:click='next'>@lang('site.next')</button>
            @endif
        @endif
    @endif

</div>
