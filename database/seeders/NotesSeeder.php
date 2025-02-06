<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Note;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notes = [
            [
                'title' => 'Note 1',
                'content' => 'Content of Note 1',
            ],
            [
                'title' => 'Note 2',
                'content' => 'Content of Note 2',
            ],
            [
                'title' => 'Note 3',
                'content' => 'Content of Note 3',
            ],
            [
                'title' => 'Note 4',
                'content' => 'Content of Note 4',
            ],
            [
                'title' => 'Note 5',
                'content' => 'Content of Note 5',
            ],
        ];

        foreach ($notes as $note) {
            Note::create($note);
        }
    }
}
