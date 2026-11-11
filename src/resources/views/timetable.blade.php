
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>わたしの時間割づくり | POSSE大学</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 text-slate-800 min-h-screen">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">

        <!-- 区画1：月曜日の授業 -->
        <div class="bg-white rounded-lg border overflow-hidden">
            <h2 class="text-xl font-bold p-6">月曜日の授業</h2>

            <table class="w-full text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-4">時限</th>
                        <th class="p-4">授業名</th>
                        <th class="p-4">担当教員</th>
                        <th class="p-4">教室</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($courses1 as $course)
                        <tr class="border-t">
                            <td class="p-4">{{ $course->period }}</td>
                            <td class="p-4">{{ $course->name }}</td>
                            <td class="p-4">{{ $course->teacher }}</td>
                            <td class="p-4">{{ $course->room }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- 区画2：必修科目 -->
        <div class="bg-white rounded-lg border overflow-hidden">
            <h2 class="text-xl font-bold p-6">必修科目</h2>

            <table class="w-full text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-4">授業名</th>
                        <th class="p-4">単位数</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($courses2 as $course)
                        <tr class="border-t">
                            <td class="p-4">{{ $course->name }}</td>
                            <td class="p-4">{{ $course->credits }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
