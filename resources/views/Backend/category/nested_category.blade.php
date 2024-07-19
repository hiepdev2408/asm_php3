<option value="{{ $category->id }}">{{ $each }}{{ $category->name }}</option>

@if ($category->children)
    @php($each .= '-')

    @foreach ($category->children as $child)
        @include('Backend.category.nested_category', ['category' => $child])
    @endforeach
@endif
