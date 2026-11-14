<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>時間割の登録</title>
</head>
<body class="max-w-4xl mx-auto p-6">
    <h1 class="font-bold text-xl mb-6">時間割の登録</h1>

    <form action="/entries" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="day" class="block mb-1">曜日</label>
            <select id="day" name="day" required class="border rounded px-3 py-2">
                <option value="">曜日を選択してください</option>
                @foreach ([1 => '月曜日', 2 => '火曜日', 3 => '水曜日', 4 => '木曜日', 5 => '金曜日'] as $value => $label)
                    <option value="{{ $value }}" @selected(old('day') == $value)>{{ $label }}</option>
                @endforeach
            </select>
            @error('day')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="period" class="block mb-1">時限</label>
            <select id="period" name="period" required class="border rounded px-3 py-2">
                <option value="">時限を選択してください</option>
                @foreach (range(1, 6) as $value)
                    <option value="{{ $value }}" @selected(old('period') == $value)>{{ $value }}限</option>
                @endforeach
            </select>
            @error('period')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="title" class="block mb-1">授業名</label>
            <input id="title" name="title" type="text" value="{{ old('title') }}" required maxlength="255" class="border rounded px-3 py-2">
            @error('title')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="room" class="block mb-1">教室</label>
            <input id="room" name="room" type="text" value="{{ old('room') }}" maxlength="255" class="border rounded px-3 py-2">
            @error('room')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white rounded px-4 py-2">登録</button>
    </form>

    <a href="/entries" class="inline-block mt-4 text-blue-600 underline">時間割一覧に戻る</a>
</body>
</html>
