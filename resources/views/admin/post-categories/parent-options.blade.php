@if($parents)
    @foreach($parents as $parent)
        <option {{ old('parent_id', (isset($parent_id) && $parent_id !== null) ? $parent_id : (isset($postCategory) ? $postCategory->parent_id : 0)) == $parent->id ? 'selected' : '' }} value="{{ $parent->id }}">{{ $parent->name }}</option>
    @endforeach
@endif