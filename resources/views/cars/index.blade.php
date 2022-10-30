

{{-- if ($_SERVER['REQUEST_METHOD'] === 'GET') {

$search_word = filter_input(INPUT_GET, 'search');
$manage_items = search_contents($search_word);
} --}}
<x-app-layout>
<x-validation-errors :errors="$errors" />
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="front_page.php">公用車</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('reservations.create') }}">予約</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            使用状況
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <!-- <li><a class="dropdown-item" href="#"></a></li> -->
                            <li><a class="dropdown-item" href="use_car_now.php">現在使用している車</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('reservations.index') }}">予約表</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('cars.create') }}">タイムカード</a>
                    </li>
                </ul>
                <form action="" method="get" class="d-flex">
                    <input class="form-control me-2" name="search" type="text" placeholder="Search" aria-label="Search">
                    <input class="btn btn-outline-dark" type="submit" value="Search">
                </form>
            </div>
        </div>
    </nav>

    <p class="reservation_title" aria-current="page">ー平泉町公用車運行管理簿ー</p>

    <div class="btn-group" role="group" aria-label="Basic outlined example">
        <button type="button" class="btn btn-outline-primary">平泉町まちづくり推進課</button>
        <button type="button" class="btn btn-outline-primary">B課</button>
        <button type="button" class="btn btn-outline-primary">C課</button>
        <button type="button" class="btn btn-outline-primary">D課</button>
        <button type="button" class="btn btn-outline-primary">E課</button>
        <button type="button" class="btn btn-outline-primary">F課</button>
        <button type="button" class="btn btn-outline-primary">G課</button>
        <button type="button" class="btn btn-outline-primary">H課</button>
    </div>

    <main class=>
        <table class="manage_table">
            <tr>
                <th>出発日付</th>
                <th>出発時刻</th>
                <th>用務内容</th>
                <th>用務先</th>
                <th>帰庁日付</th>
                <th>帰庁時刻</th>
                <th>距離数(km)</th>
                <th>運転者名</th>
                <th>人数(人)</th>
                <th>給油(L)</th>
                <th>備考</th>
            </tr>

            <?php foreach ($car_items as $item ) : ?>
                <tr>
                    <td>
                        <p>{{substr( $item->created_at, 0, 10) }}</p>
                    </td>
                    <td>
                        <p>{{ substr($item->created_at, 10) }}</p>
                    </td>
                    <td>
                        <p>{{ $item->task}}</p>
                    </td>
                    <td>
                        <p>{{ $item->destination}}</p>
                    </td>
                    <td>
                        <p>{{ substr($item->updated_at, 0, 10) }}</p>
                    </td>
                    <td>
                        <p>{{ substr($item->updated_at, 10) }}</p>
                    </td>
                    <td>
                        <p>{{ $item->distance}}</p>
                    </td>
                    <td>
                        <p>{{ $item->personal->name }}</p>
                    </td>
                    <td>
                        <p>{{ $item->headcount}}</p>
                    </td>
                    <td>
                        <p>{{ $item->oil}}</p>
                    </td>
                    <td>
                        <p>{{ $item->remarks}}</p>
                    </td>
                </tr>
            @endforeach
        </table>

    </main>
</body>
</x-app-layout>
