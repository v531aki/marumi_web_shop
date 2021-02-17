<div class="sidebar-wrapper">
    @foreach ($major_category_names as $major_category_name)
    <div class="category paling">
        <h2>{{ $major_category_name }}</h2>
        @foreach ($categories as $category)
            @if ($category->major_category_name === $major_category_name)
                <label class="marumi-sidebar-category-label">
                    <a href="{{ route('products.index', ['category' => $category->id]) }}">
                        {{ $category->name }}
                    </a>
                </label>
            @endif
        @endforeach
    </div>
    @endforeach
</div>

<div class="row category-list-wrapper">
    @foreach ($major_category_names as $major_category_name)
    <?php $value = 0 ?>
    <div class="col-md-4 cp_ipselect cp_sl01">
        <select required>
        	<option value="" hidden>{{ $major_category_name }}で絞る</option>
        	@foreach ($categories as $category)
            	@if ($category->major_category_name === $major_category_name)
            	    <?php $value++ ?>
            	    <option value="{{ $value }}"><a href="#">{{ $category->name }}</a></option>
                @endif
            @endforeach
        </select>
    </div>
    @endforeach
</div>
