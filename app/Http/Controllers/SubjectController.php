<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::get();

        return Inertia::render('Subject/Index', [
            'subjects' => $subjects
        ]);
    }

    public function regist()
    {
        $subjects = Subject::with(['users'])->get();

        return Inertia::render('Subject/RegistForm');
    }

    public function list()
    {
        $user = User::where('id', Auth::user()->id)->with('subjects')->get()[0];

        return Inertia::render('Subject/Index', [
            'user' => $user
        ]);
    }

    public function show($subjectId)
    {
        $subject = Subject::where('id', $subjectId)->with(['users', 'comments'])->get()[0];

        return Inertia::render('Subject/SubjectShow', [
            'subject' => $subject
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required'
        ]);

        $subject = new Subject([
            'name' => $request->name,
            'desc' => $request->desc,
            'point' => $request->point
        ]);
        $subject->save();

        return redirect()->route('subject');
    }

    public function destroy($subjectId)
    {
        Subject::where('id', $subjectId)->delete();


        return redirect()->route('subject');
    }

    public function update(Request $request, $subjectId)
    {

        $post = Subject::where('id', $subjectId);
        $post->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'point' => $request->point,
        ]);

        return redirect()->route('subject.show', ['subjectId' => $subjectId]);
    }

    public function edit($subjectId)
    {
        $subject = Subject::where('id', $subjectId)->get()[0];

        return Inertia::render('Subject/RegistForm', [
            'subject' => $subject
        ]);
    }
}
