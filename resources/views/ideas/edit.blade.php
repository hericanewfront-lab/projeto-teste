<x-layout>
    <form method="POST" action="/ideas/{{ $idea->id }}">
        @csrf
        @method('PATCH')
        <div class="col-span-full">
            <label for="descricao" class="block text-sm/6 font-medium text-white">
                Editar Ideia
            </label>

            <div class="mt-2">
                <textarea id="descricao" name="descricao" rows="3"
                 class="textarea w-full">{{ old('descricao', $idea->descricao) }}</textarea>
                <x-forms.error name="descricao" />
            </div>

            <div class="mt-4 flex items-center gap-x-4">
                <button type="submit"
                    class="btn btn-primary">
                    Atualizar
                </button>

                <button type="submit" form="delete-idea-form"
                    class="btn btn-warning">
                    Excluir
                </button>
            </div>

            <p class="mt-3 text-sm/6 text-gray-400">
                Tem alguma ideia que queira salvar para mais tarde?
            </p>
        </div>
    </form>

    <form id="delete-idea-form" method="POST" action="/ideas/{{ $idea->id }}" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
