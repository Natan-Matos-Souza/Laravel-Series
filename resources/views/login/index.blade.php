<x-layout title="Register page">
    <div class="text-bg-primary rounded mt-4">
        <h1 class="p-3">Login 🪪</h1>
    </div>
    <form method="POST" action="{{ route('login.store') }}">

        @csrf
        <div>
            <label class="form-label mt-3 fs-3" for="useremail">Digite seu email:</label>
            <input class="form-control p-3" name="email" id="useremail" type="text">
        </div>

        <div>
            <label class="form-label mt-3 fs-3" for="password">Digite sua senha:</label>
            <input class="form-control p-3" name="password" id="password" type="password">
        </div>

        <input type="submit" class="btn btn-lg btn-primary mt-4" value="Entrar">
    </form>

    <div class="mt-3">
        <span class="fs-5">Não tem uma conta? <a href="{{ route('cadastro.index')  }}">Crie agora a sua</a></span>
    </div>
</x-layout>
