<x-layout>
    @if ($ideas->count())
        <div class="mt-6 text-white">
            <h2 class="font-bold">Suas ideias</h2>
            <ul class="mt-6 grid grid-cols-2 gap-x-6 gap-y-4">
                @foreach ($ideas as $idea)
                    <x-idea-card href="/ideas/{{$idea->id}}">
                        {{ $idea->descricao }}
                    </x-idea-card>
                @endforeach
            </ul>
        </div>
    @else
        <p class="mt-6 text-white"> Sem ideias ainda. <a href="/ideas/create" class="underline">Criar uma nova</a></p>
    @endif
</x-layout>
