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
    <h2 class="text-center">{{ $sidebar['dates1'][8]->month }}月</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="bg-info text-center px-0 py-2">
                    <button type="button" class="bg-info text-white" data-toggle="tooltip" data-placement="top" title="会員様ポイント　2倍ｄａｙ">
                        日
                    </button>
                </th>
                <th class="bg-info text-center px-0 py-2">
                    <button type="button" class="bg-info text-white" data-toggle="tooltip" data-placement="top" title="会員様ー綿・麻10％引ｄａｙ">
                        月
                    </button>
                </th>
                <th class="bg-info text-center px-0 py-2">
                    <button type="button" class="bg-info text-white" data-toggle="tooltip" data-placement="top" title="会員様ハギレ半額ｄａｙ">
                        火
                    </button>
                </th>
                <th class="bg-info text-center px-0 py-2">
                    <button type="button" class="bg-info text-white" data-toggle="tooltip" data-placement="top" title="会員様ー手芸小物・裏地・芯地10％引き">
                        水
                    </button>
                </th>
                <th class="bg-success text-center px-0 py-2">
                    <button type="button" class="bg-success text-white" data-toggle="tooltip" data-placement="top" title="\会員様キルティング10％引き/ \無料講習会(10:00~)/">
                        木
                    </button>
                </th>
                <th class="bg-info text-center px-0 py-2">
                    <button type="button" class="bg-info text-white" data-toggle="tooltip" data-placement="top" title="会員様合繊地・レース地が値札よ10％引き！！">
                        金
                    </button>
                </th>
                <th class="bg-info text-center px-0 py-2">
                    <button type="button" class="bg-info text-white" data-toggle="tooltip" data-placement="top" title="会員様限定手作り品10％引">
                        土
                    </button>
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($sidebar['dates1'] as $date)
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
<div class="container px-0 mt-5">
    <h2 class="text-center">{{ $sidebar['dates2'][8]->month }}月</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="bg-info text-center px-0 py-2">
                    <button type="button" class="bg-info text-white" data-toggle="tooltip" data-placement="top" title="会員様ポイント　2倍ｄａｙ">
                        日
                    </button>
                </th>
                <th class="bg-info text-center px-0 py-2">
                    <button type="button" class="bg-info text-white" data-toggle="tooltip" data-placement="top" title="会員様ー綿・麻10％引ｄａｙ">
                        月
                    </button>
                </th>
                <th class="bg-info text-center px-0 py-2">
                    <button type="button" class="bg-info text-white" data-toggle="tooltip" data-placement="top" title="会員様ハギレ半額ｄａｙ">
                        火
                    </button>
                </th>
                <th class="bg-info text-center px-0 py-2">
                    <button type="button" class="bg-info text-white" data-toggle="tooltip" data-placement="top" title="会員様ー手芸小物・裏地・芯地10％引き">
                        水
                    </button>
                </th>
                <th class="bg-success text-center px-0 py-2">
                    <button type="button" class="bg-success text-white" data-toggle="tooltip" data-placement="top" title="\会員様キルティング10％引き/ \無料講習会(10:00~)/">
                        木
                    </button>
                </th>
                <th class="bg-info text-center px-0 py-2">
                    <button type="button" class="bg-info text-white" data-toggle="tooltip" data-placement="top" title="会員様合繊地・レース地が値札よ10％引き！！">
                        金
                    </button>
                </th>
                <th class="bg-info text-center px-0 py-2">
                    <button type="button" class="bg-info text-white" data-toggle="tooltip" data-placement="top" title="会員様限定手作り品10％引">
                        土
                    </button>
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($sidebar['dates2'] as $date)
        @if ($date->dayOfWeek == 0)
        <tr>
            <td
            @if ($date->month != date('m', strtotime('+1 month')))
            class="px-0 py-2 bg-secondary text-center"
            @else
            class="px-0 py-2 bg-primary text-white text-center"
            @endif
            >
                {{ $date->day }}
            </td>
        @elseif ($date->dayOfWeek == 6)
            <td
            @if ($date->month != date('m', strtotime('+1 month')))
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
            @if ($date->month != date('m', strtotime('+1 month')))
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