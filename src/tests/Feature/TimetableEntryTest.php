<?php

namespace Tests\Feature;

use App\Models\TimetableEntry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TimetableEntryTest extends TestCase
{
    use RefreshDatabase;

    public function test_creation_form_is_displayed(): void
    {
        $this->get('/entries/create')
            ->assertOk()
            ->assertSee('曜日')
            ->assertSee('時限')
            ->assertSee('授業名')
            ->assertSee('教室');
    }

    public function test_entry_is_saved_and_redirects_to_the_list(): void
    {
        $response = $this->post('/entries', [
            'day' => 1,
            'period' => 2,
            'title' => 'プログラミング基礎',
            'room' => 'A101',
        ]);

        $response->assertRedirect('/entries');
        $this->assertDatabaseHas('timetable_entries', [
            'day' => 1,
            'period' => 2,
            'title' => 'プログラミング基礎',
            'room' => 'A101',
        ]);
    }

    public function test_same_day_and_period_cannot_be_registered_twice(): void
    {
        TimetableEntry::create([
            'day' => 1,
            'period' => 2,
            'title' => '登録済みの授業',
        ]);

        $this->from('/entries/create')
            ->post('/entries', [
                'day' => 1,
                'period' => 2,
                'title' => '重複する授業',
            ])
            ->assertRedirect('/entries/create')
            ->assertSessionHasErrors('day');

        $this->assertDatabaseMissing('timetable_entries', [
            'title' => '重複する授業',
        ]);
    }
}
