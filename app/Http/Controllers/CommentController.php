<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommentController extends Controller
{
    public function index($subjectId)
    {
        $comments = Comment::where('subject_id', $subjectId)->with('user')->get();

        return $comments;
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment([
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'subject_id' => $request->subject_id,
        ]);

        $comment->save();

        return redirect()->route('subject.show', ['subjectId' => $request->subject_id]);
    }

    public function destroy(Request $request)
    {
        $comment = Comment::where('id', $request->id);
        $subjectId = $request->subject_id;
        $comment->delete();


        return redirect()->route('subject.show', ['subjectId' => $subjectId]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = Comment::where('id', $request->id);
        $subjectId = $request->subject_id;
        $comment->update([
            'content' => $request->content,
        ]);

        return redirect()->route('subject.show', ['subjectId' => $subjectId]);
    }

    public function editForm($commentId)
    {
        $comment = Comment::where('id', $commentId)->get()[0];

        return Inertia::render('Post/CommentEditForm', [
            'comment' => $comment
        ]);
    }
}
