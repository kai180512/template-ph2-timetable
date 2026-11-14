<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimetableEntry;
use Illuminate\Database\Query\Builder;
use Illuminate\Validation\Rule;

class TimetableEntryController extends Controller
{
    public function index(){
        $entries = TimetableEntry::orderBy('day')
        ->orderBy('period')
        ->get();

        return view('entries.index', [
            'entries' => $entries
        ]);
    }

    public function create()
    {
        return view('entries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'day' => [
                'required',
                'integer',
                'between:1,5',
                Rule::unique('timetable_entries', 'day')
                    ->where(function (Builder $query) use ($request) {
                        $period = $request->input('period');
                        if (is_int($period) || (is_string($period) && ctype_digit($period))) {
                            $query->where('period', $period);
                        }
                    }),
            ],
            'period' => ['required', 'integer', 'between:1,6'],
            'title' => ['required', 'string', 'max:255'],
            'room' => ['nullable', 'string', 'max:255'],
        ], [
            'day.required' => '曜日を選択してください。',
            'day.integer' => '曜日を正しく選択してください。',
            'day.between' => '曜日を正しく選択してください。',
            'day.unique' => 'この曜日・時限にはすでに授業が登録されています。',
            'period.required' => '時限を選択してください。',
            'period.integer' => '時限を正しく選択してください。',
            'period.between' => '時限を正しく選択してください。',
            'title.required' => '授業名を入力してください。',
            'title.string' => '授業名を正しく入力してください。',
            'title.max' => '授業名は255文字以内で入力してください。',
            'room.string' => '教室を正しく入力してください。',
            'room.max' => '教室は255文字以内で入力してください。',
        ]);

        TimetableEntry::create($validated);

        return redirect('/entries');
    }
}
