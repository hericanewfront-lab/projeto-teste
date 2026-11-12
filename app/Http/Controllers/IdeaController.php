<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Http\Requests\IdeaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Notifications\IdeaPublished;
/**
 * @propert-read Collection<int,Idea]> $ideas
 */
class IdeaController extends Controller
{
    // Listar todas as ideias
    public function index()
    {
        $ideas = Idea::query()->where([
            'user_id' => Auth::id(),
        ])->get();

        return view('ideas.index', [
            'ideas' => Auth::user()->ideas,
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
        /** @var \App\Models\Idea $idea */
        $idea = Auth::user()->ideas()->create([
            'descricao' => $request->descricao,
            'state' => 'pending',
        ]);

        Auth::user()->notify(new IdeaPublished($idea));

        return redirect('/ideas');
    }
    // Mostrar uma ideia
    public function show(Idea $idea)
    {
        Gate::authorize('update', $idea);

        return view('ideas.show', [
            'idea' => $idea,
        ]);
    }

    // Abrir formulário de edição
    public function edit(Idea $idea)
    {
        Gate::authorize('update', $idea);

        return view('ideas.edit', [
            'idea' => $idea,
        ]);
    }

    // Atualizar uma ideia
    public function update(IdeaRequest $request, Idea $idea)
    {
        Gate::authorize('update', $idea);
        $idea->update([
            'descricao' => $request->descricao,
        ]);

        return redirect("/ideas/{$idea->id}");
    }

    // Excluir uma ideia
    public function destroy(Idea $idea)
    {
        Gate::authorize('update', $idea);
        $idea->delete();

        return redirect('/ideas');
    }
}
