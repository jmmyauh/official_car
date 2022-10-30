
{{-- $id = filter_input(INPUT_GET, 'id');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = $_POST['task'];
    $destination = $_POST['destination'];
    $distance = $_POST['distance'];
    $name = $_POST['name'];
    $headcount = ['headcount'];
    $oil = $_POST['oil'];
    $remarks = $_POST['remarks'];

    update_input_manage($task, $destination, $distance, $name, $headcount, $oil, $remarks, $id);

    if (isset($_POST['registration'])) {
        header("Location: time_card.php");
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
    <p class="reservation_title" aria-current="page">ー管理簿入力項目ー</p>
    <div class=input_manage_page>
        <form action="{{ route('cars.update', $car) }}" method="POST">
        @csrf
        @method('PUT')
            <label for="">用務内容</label><br>
            <input type="text" name="task" class=input_manage required><br>
            <label for="">用務先</label><br>
            <input type="text" name="destination" class=input_manage required><br>
            <label for="">距離数(km)</label><br>
            <input type="text" name="distance" class=input_manage required><br>
            <label for="">人数</label><br>
            <input type="text" name="headcount" class=input_manage required><br>
            <label for="">給油(L)</label><br>
            <input type="text" name="oil" class=input_manage><br>
            <label for="">備考</label><br>
            <input type="text" name="remarks" class=input_manage><br>
            <div class="register_button_wrapper">
                <input name="registration" type="submit" value="登録" class=register_button>
            </div>
        </form>
    </div>
</body>
</x-app-layout>
