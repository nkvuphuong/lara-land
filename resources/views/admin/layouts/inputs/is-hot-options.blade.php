@foreach([0 => 'no', 1 => 'yes'] as $status => $lang)
    <option {{ (isset($selectedIsHot) && $selectedIsHot === $status) ? 'selected' : '' }} value="{{ $status }}">{{ __('admin/global.' . $lang) }}</option>
@endforeach