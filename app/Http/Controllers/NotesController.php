<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NotesController extends Controller {
    function index(Request $request) {
        $notes = Note::all();
        return response()->json($notes, 200);
    }

    function show(Request $request, $id) {
        $note = Note::findOrFail($id);
        return response()->json($note, 200);
    }

    function store(Request $request) {
        $title = $request->input('title');
        $content = $request->input('content');

        $note = Note::create([
            'title' => $title,
            'content' => $content
        ]);

        return response()->json($note, 201);
    }

    function update(Request $request, $id) {
        $note = Note::findOrFail($id);

        $title = $request->input('title');
        $content = $request->input('content');
        $note->title = $title;
        $note->content = $content;
        $note->save();

        return response()->json($note, 200);
    }

    function patch(Request $request, $id) {
        $note = Note::findOrFail($id);

        $title = $request->input('title');
        $content = $request->input('content');

        if ($title) {
            $note->title = $title;
        }

        if ($content) {
            $note->content = $content;
        }

        $note->save();

        return response()->json($note, 200);
    }

    function destroy(Request $request, $id) {
        $note = Note::findOrFail($id);
        $note->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Note deleted'
        ], 204);
    }
}
