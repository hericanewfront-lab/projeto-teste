<x-layout>
    <div class="card bg-neutral p-6">
        <div>
            {{ $idea->descricao }}
        </div>

        <div class=mt-6>
            <a href="/ideas/{{ $idea->id }}/edit"
                class="btn btn-soft">
                Editar
            </a>
        </div>
    </div>
</x-layout>
