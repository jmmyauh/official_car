{{-- $reservation_items = reservation_list();
$id = filter_input(INPUT_GET, 'id');

delete_reservation_list($id) --}}
<x-app-layout>
<x-validation-errors :errors="$errors" />
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('cars.index') }}">公用車</a>
        </div>
    </nav>
    <p class="reservation_title" aria-current="page">ー予約表ー</p>
    <header>
    </header>
    <main class=>
        <table class="reservation_table">
            <tr>
                <th>名前</th>
                <th>開始日付</th>
                <th>開始時刻</th>
                <th>帰庁日付</th>
                <th>帰庁時刻</th>
                <th>車種</th>
                <th>　　</th>
            </tr>

            @foreach ($reservation_items as $item)
            {{-- {{ $item->personal->number }} --}}
                <tr>
                    <td>
                        <p>{{ $item->personal->name }}</p>
                    </td>
                    <td>
                        <p>{{ $item->startday }}</p>
                    </td>
                    <td>
                        <p>{{ $item->starttime }}</p>
                    </td>
                    <td>
                        <p>{{ $item->finishday }}</p>
                    </td>
                    <td>
                        <p>{{ $item->finishtime }}</p>
                    </td>
                    <td>
                        <p>{{ $item->cartype}}</p>
                    </td>
                    <td>
                        <form action="{{ route('reservations.destroy', $item) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-outline-dark" value="削除">
                        {{-- <button type="submit" class="btn btn-outline-dark">削除</button> --}}
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

    </main>
</body>
</x-app-layout>


