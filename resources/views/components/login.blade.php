<form method="get" action="{{route('auth')}}" class="w-50" id="login-form">

    @if ($errors->any())
    <ul class="alert alert-error">
        @foreach ($errors->all() as $error)
            <li style="color: red">{{$error}}</li>                
        @endforeach
    </ul>
    @endif

    @csrf
    <x-form.inputbox type="email" name="email" id="lg-email" label="Email"/>
    <x-form.inputbox type="password" name="password" id="lg-password" label="Senha"/>

    <div class="d-flex justify-content-between align-items-center">
        <div class="remember-me">
            <input type="checkbox" id="remember-me" name="remember-me">
            <label for="remember-me" class="color-gray">Lembrar de mim</label>
        </div>
        <a href="#" class="forgot-password color-gray">Esqueci minha senha</a>
    </div>
    <div class="d-flex justify-content-center align-items-center gap-3 flex-column">
        <button class="btn btn-secondary">Entrar</button>
        <a id="sign-up" class="color-black">Ainda não possui uma conta? Cadastre-se</a>
    </div>
</form>