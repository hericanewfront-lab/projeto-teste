<x-layout>
    <form action="/login" method="POST">
        @csrf
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4 mx-auto">
            <legend class="fieldset-legend">Login</legend>

            <label class="label" for="email">Email</label>
            <input class="input" type="email" name="email" placeholder="Seu e-mail"required />
            <x-forms.error name="email"/>

            <label class="label">Senha</label>
            <input type="password" class="input" name="password" placeholder="Password" />
            <x-forms.error name="password"/>

            <button class="btn btn-neutral mt-4">Login</button>
        </fieldset>
    </form>
</x-layout>
