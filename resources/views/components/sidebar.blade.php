<div class="container">
    @foreach ($sidebar['major_category_names'] as $major_category_name)
    <div class="row paling">
        <h2>{{ $major_category_name }}</h2>
        @foreach ($sidebar['categories'] as $category)
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
<div class="container px-0 mt-5">
    <h2 class="text-center">{{ $sidebar['dates'][8]->month }}月</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center text-danger px-0 py-2">日</th>
                @foreach (['月', '火', '水', '木', '金'] as $dayOfWeek)
                <th class="text-center px-0 py-2">{{ $dayOfWeek }}</th>
                @endforeach
                <th class="text-center text-primary px-0 py-2">土</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($sidebar['dates'] as $date)
        @if ($date->dayOfWeek == 0)
        <tr>
            <td
            @if ($date->month != date('m'))
            class="px-0 py-2 bg-secondary text-center"
            @else
            class="px-0 py-2 bg-primary text-white text-center"
            @endif
            >
                {{ $date->day }}
            </td>
        @elseif ($date->dayOfWeek == 6)
            <td
            @if ($date->month != date('m'))
            class="px-0 py-2 bg-secondary text-center"
            @else
            class="px-0 py-2 bg-primary text-white text-center"
            @endif
            >
                {{ $date->day }}
            </td>
        </tr>
        @else
            <td
            @if ($date->month != date('m'))
            class="px-0 py-2 bg-secondary text-center"
            @else
            class="px-0 py-2 text-center"
            @endif
            >
                {{ $date->day }}
            </td>
        @endif

        @endforeach
        </tbody>
    </table>
</div>