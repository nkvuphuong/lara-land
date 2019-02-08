@foreach([1,0] as $status)
    <option {{ (isset($selectedDisplayStatus) && $selectedDisplayStatus === $status) ? 'selected' : '' }} value="{{ $status }}">{{ BaseHelperFormatterAdmin::displayStatus($status) }}</option>
@endforeach