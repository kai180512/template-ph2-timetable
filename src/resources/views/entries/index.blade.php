<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>時間割一覧</title>
</head>
<body class="max-w-4xl mx-auto">
    <h1 class="font-bold text-xl">時間割一覧</h1>
    @if($entries->isEmpty())
    <p>まだ授業が登録されていません</p>
    @else
    <table class="w-full border-collapse border border-gray-300">
    <tr class="bg-gray-100">
        <th class="border border-gray-300 px-4 py-2">曜日</th>
        <th class="border border-gray-300 px-4 py-2">時限</th>
        <th class="border border-gray-300 px-4 py-2">授業名</th>
        <th class="border border-gray-300 px-4 py-2">教室</th>
    </tr>
    @foreach($entries as $entry)
    <tr>
        <td>{{ $entry->day }}</td>
        <td>{{ $entry->period }}</td>
        <td>{{ $entry->title }}</td>
        <td>{{ $entry->room }}</td>
    </tr>
    @endforeach

</table>
@endif
</body>
</html>