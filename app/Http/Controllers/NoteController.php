<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\NoteRequest;

class NoteController extends Controller
{
    public function index(): View
    {
        //traigo todas las notas
        $notes = Note::all();
        return view('note.index', compact('notes'));
    }

    public function create(): View
    {
        return view('note.create');
    }

    public function store(NoteRequest $request): RedirectResponse
    {
        //está recepcionando una petición del request
        // $note = new Note;
        // $note->title = $request->title;
        // $note->description = $request->description;
        // $note->save();

        // Note::create([
        //     'title'-> $request->title,
        //     'description'-> $request->description
        // ]);


        //seguiendo los mismos nombres tanto el modelo como en el formulario

        Note::create($request->all());
        return redirect()->route('note.index')->with('success', 'Note Created');
    }

    public function edit(Note $note): View
    {
        return view('note.edit', compact('note'));
    }

    public function update(NoteRequest $request, Note $note): RedirectResponse
    {
        //POO
        // $note->title = $request->title;
        // $note->description = $request->description;
        // $note->update();

        $note->update($request->all());
        return redirect()->route('note.index')->with('success', 'Note Updated');;

    }

    public function show(Note $note): View
    {
        return view('note.show', compact('note'));
    }

    public function destroy(Note $note): RedirectResponse
    {
        $note->delete();
        return redirect()->route('note.index')->with('danger', 'Note Deleted');
    }
}
