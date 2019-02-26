@if(!empty($categories))
    @foreach($categories as $category)
        <option {{ (!isset($selectedCates) || !in_array($category->id, $selectedCates)) ? '' : 'selected' }} value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
@endif
