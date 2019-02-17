<div class="card-footer">
    <p class="text-right">
        <button onclick="AdminMain.setIsContinue($(this), 0)" type="submit" class="btn btn-primary">{{ __('global.create') }}</button>
        <button onclick="AdminMain.setIsContinue($(this), 1)" type="submit" class="btn btn-primary">{{ __('global.create') }} & {{ __('global.continue') }}</button>
        @include('admin.layouts.inputs.form-actions')
    </p>
</div>