<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Http\Requests\IdeaRequest;

class IdeaController extends Controller
{
    // Listar todas as ideias
    public function index()
    {
        $ideas = Idea::all();

        return view('ideas.index', [
            'ideas' => $ideas,
        ]);
    }

    // Abrir formulário de criação
    public function create()
    {
        return view('ideas.create');
    }

    // Salvar uma nova ideia
    public function store(IdeaRequest $request)
    {
        Idea::create([
            'descricao' => $request->descricao,
            'state' => 'pending',
        ]);

        return redirect('/ideas');
    }

    // Mostrar uma ideia
    public function show(Idea $idea)
    {
        return view('ideas.show', [
            'idea' => $idea,
        ]);
    }

    // Abrir formulário de edição
    public function edit(Idea $idea)
    {
        return view('ideas.edit', [
            'idea' => $idea,
        ]);
    }

    // Atualizar uma ideia
    public function update(IdeaRequest $request, Idea $idea)
    {
        $idea->update([
            'descricao' => $request->descricao,
        ]);

        return redirect("/ideas/{$idea->id}");
    }

    // Excluir uma ideia
    public function destroy(Idea $idea)
    {
        $idea->delete();

        return redirect('/ideas');
    }
}
