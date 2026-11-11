<x-layout>
    <form action="/register" method="POST">
        @csrf
        @if ($errors->any())
            <div
                style="background-color: #fee2e2; color: #991b1b; padding: 12px; margin-bottom: 16px; border-radius: 6px;">
                <strong>Ops! Ocorreram alguns erros:</strong>
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4 mx-auto">
            <legend class="fieldset-legend">Cadastro</legend>

            <label class="label" for="name">Nome</label>
            <input class="input" name="name" placeholder="Seu nome" required />

            <label class="label" for="email">Email</label>
            <input class="input" type="email" name="email" placeholder="Seu e-mail"required />

            <label class="label">Senha</label>
            <input type="password" class="input" name="password" placeholder="Password" />

            <button class="btn btn-neutral mt-4">Cadastrar</button>
        </fieldset>
    </form>
</x-layout>
