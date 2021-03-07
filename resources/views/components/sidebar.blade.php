<div class="container">
    @foreach ($major_category_names as $major_category_name)
    <div class="row paling">
        <h2>{{ $major_category_name }}</h2>
        @foreach ($categories as $category)
            @if ($category->major_category_name === $major_category_name)
                <label class="col-12">
                    <a href="{{ route('products.index', ['category' => $category->id]) }}">
                        {{ $category->name }}
                    </a>
                </label>
            @endif
        @endforeach
    </div>
    @endforeach
</div>