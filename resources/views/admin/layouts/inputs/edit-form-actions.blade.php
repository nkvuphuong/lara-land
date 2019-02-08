<button onclick="AdminMain.setIsContinue($(this), 0)" type="submit" class="btn btn-primary">{{ __('global.edit') }}</button>
<button onclick="AdminMain.setIsContinue($(this), 1)" type="submit" class="btn btn-primary">{{ __('global.edit') }} & {{ __('global.continue') }}</button>
@include('admin.layouts.inputs.form-actions')