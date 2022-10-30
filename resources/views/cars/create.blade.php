

{{-- if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $office_number = $_POST['office_number'];
    $input_manage = find_input_manage_by_office_number($office_number);

    if (isset($_POST['start_button'])) {
        if (empty($input_manage) || isset($input_manage['finishtime'])) {
            time_card_start($office_number);
        }
    } elseif (isset($_POST['finish_button'])) {
        time_card_finish($office_number);
        header("Location: input_manage.php?id=${input_manage['id']}");
        exit;
    }
} --}}


<x-app-layout>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('cars.index') }}">公用車</a>
        </div>
    </nav>
    <p class="reservation_title" aria-current="page">ータイムカードー</p>
    <div class=front_page>
        <h4 id="RealtimeClockArea2"></h4>
        <!-- <p id="RealtimeClockArea2"></p> -->
        <form class="time_card">
            <label class="email_label" for="number">社員番号</label><br>
                @csrf
            <select name="personal_id" class="form-select" aria-label="Default select example">
                @foreach($personals as $personal)
                    <option value="{{$personal->id}}" >
                        {{$personal->number}}
                    </option>
                @endforeach
            </select><br>
            <div class="button_area">
                    <input type="submit" value="開始" class="start_button" name="start_button" formaction="/cars" formmethod="post">
                    <input type="submit" value="終了" class="finish_button" name="finish_button" formaction="/cars/search" formmethod="post">
                    {{-- <input type="submit" name="finish_button" class="finish_button" value="終了"> --}}
                    {{-- <button onclick="location.href='/cars/update'">終了</button> --}}
                    {{-- <a href="/cars/search">終了</a> --}}
            </div>
        </form>
    </div>
    <script src="{{ asset('/js/time.js') }}"></script>
</body>
</x-app-layout>
