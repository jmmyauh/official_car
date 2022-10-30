<x-app-layout>
<x-validation-errors :errors="$errors" />
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('cars.index') }}">公用車</a>
        </div>
    </nav>
    <p class="reservation_title" aria-current="page">ー予約ー</p>
    <div class=front_page>
        <!-- <form action="reservation_list.php" method="POST"> -->
        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <label for="">社員番号</label><br>
            <select name="personal_id" class="form-select" aria-label="Default select example">
                @foreach($personals as $personal)
                    <option value="{{$personal->id}}" >
                    {{-- @if($level->id==$thisLevel) selected @endif> --}}
                    {{$personal->number}}</option>
                @endforeach
            </select>
            {{-- <input type="text" name=name class=name required><br> --}}
            <div class="time_wapper">
                <label for="">出発日付</label><br>
                <input class=startday type="date" name=startday required><br>
                <div class="starttime_wrapper">
                        <label for="">出発時刻</label><br>
                        <input class=starttime type="time" name="starttime" required><br>
                </div>
            </div>
            <div class="time_wapper">
                <label for="">日付</label><br>
                <input type="date" name=finishday class=finishday required><br>
                <div class="starttime_wrapper">
                        <label for="">帰庁時刻</label><br>
                        <input class=finishtime type="time" name="finishtime" required><br>
                </div>
            </div>
            <label for="">車種</label><br>
            <select name="cartype" class="form-select" aria-label="Default select example" required>
                    <option value="" selected>Open this select menu</option>
            <!-- <select name="car_type" class="car_type"> -->
                @foreach ($cars as $key)
                    <option value="{{ $key }}">{{ $key }}</option>
                @endforeach
            </select>
            <br><br>
            <div class="register_button_wrapper">
            <input class="register_button" type="submit" value="登録">
            </div>
        </form>
    </div>
    <header>
    </header>
</body>

</x-app-layout>
