@foreach([1,0] as $status)
    <option {{ (isset($selectedDisplayStatus) && $selectedDisplayStatus === $status) ? 'selected' : '' }} value="{{ $status }}">{{ \App\Admin\PostCategory::displayStatus($status) }}</option>
@endforeach