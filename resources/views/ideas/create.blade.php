<x-layout>
    <form method="POST" action="/ideas">
        @csrf

        <div class="col-span-full">
            <label for="descricao" class="block text-sm/6 font-medium text-white">
                Criar uma nova Ideia
            </label>

            <div class="mt-2">
                <textarea id="descricao" name="descricao" rows="3" class="text-area w-full">{{ old('descricao') }}</textarea>
            </div>

            <x-forms.error name="descricao"/>

            <p class="mt-3 text-sm/6 text-gray-400">
                Tem alguma ideia que queira salvar para mais tarde?
            </p>

            <button type="submit"
                class=btn">
                Salvar
            </button>
        </div>
    </form>
</x-layout>
