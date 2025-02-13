<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NotesController extends Controller {
    function index(Request $request) {
        $user = $request->user();
        $notes = Note::where('user_id', $user->id)->get();
        return response()->json($notes, 200);
    }

    function show(Request $request, $id) {
        $user = $request->user();
        $note = Note::findOrFail($id);
        if($note->user_id !== $user->id) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
        return response()->json($note, 200);
    }

    function store(Request $request) {
        $user = $request->user();
        $title = $request->input('title');
        $content = $request->input('content');

        $note = Note::create([
            'title' => $title,
            'content' => $content,
            'user_id' => $user->id,
        ]);

        return response()->json($note, 201);
    }

    function update(Request $request, $id) {
        $user = $request->user();
        $note = Note::findOrFail($id);

        $title = $request->input('title');
        $content = $request->input('content');
        $note->title = $title;
        $note->content = $content;

        if($note->user_id !== $user->id) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $note->save();

        return response()->json($note, 200);
    }

    function patch(Request $request, $id) {
        $user = $request->user();
        $note = Note::findOrFail($id);

        $title = $request->input('title');
        $content = $request->input('content');

        if ($title) {
            $note->title = $title;
        }

        if ($content) {
            $note->content = $content;
        }

        if($note->user_id !== $user->id) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $note->save();

        return response()->json($note, 200);
    }

    function destroy(Request $request, $id) {
        $user = $request->user();
        $note = Note::findOrFail($id);

        if($note->user_id !== $user->id) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $note->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Note deleted'
        ], 204);
    }
}
