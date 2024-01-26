<x-layout title="Register page">
    <div class="text-bg-primary rounded mt-4">
        <h1 class="p-3">Cadastro 🪪</h1>
    </div>
    <form method="POST" action="{{ route('cadastro.store') }}">

        @csrf
        <div>
            <label class="form-label mt-3 fs-3" for="useremail">Digite seu email:</label>
            <input class="form-control p-3" name="email" id="useremail" type="text">
        </div>

        <div>
            <label class="form-label mt-3 fs-3" for="password">Digite sua senha:</label>
            <input class="form-control p-3" name="password" id="password" type="password">
        </div>

        <div>
            <label class="form-label mt-3 fs-3" for="passoword-repeated">Repita a senha:</label>
            <input class="form-control p-3" name="password_confirmation"  id="password-repeated" type="password">
        </div>

        <input type="submit" class="btn btn-lg btn-primary mt-4" value="Cadastrar">
    </form>

    <div class="mt-3">
        <span class="fs-5">Já possui uma conta? <a href="{{ route('login')  }}">Faça login</a></span>
    </div>
</x-layout>
