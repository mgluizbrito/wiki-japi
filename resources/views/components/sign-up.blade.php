<form method="post" action="{{route('auth.store')}}" class="w-50 d-none" id="sign-up-form">
    @csrf
    <x-form.inputbox type="text" name="name" id="sg-name" label="Nome:"/>
    <x-form.inputbox type="email" name="email" id="sg-email" label="Email"/>
    <x-form.inputbox type="password" name="password" id="sg-password" label="Senha"/>
    <x-form.inputbox type="password" name="confirm-password" id="sg-confirm-password" label="Confirme sua senha:"/>
    <div class="d-flex justify-content-center align-items-center gap-3 mb-3">
        <label class="color-gray">
            <input type="radio" name="role" value="user"> Usuário
        </label>
        <label class="color-gray">
            <input type="radio" name="role" id="specialist-role" value="specialist"> Especialista
        </label>
    </div>
    
    <div id="specialist-inputs" class="d-none">
        <div class="input-box">
            <input type="text" name="lattes" id="lattes" placeholder=" ">
            <label for="lattes">Link Currículo Lattes</label>
        </div>
        <div class="input-box">
            <input type="text" name="area" id="area" placeholder=" ">
            <label for="area">Área de Atuação</label>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center gap-3 flex-column">
        <button class="btn btn-secondary">Entrar</button>
        <a id="login" class="color-black">Já possui conta? Entre Aqui</a>
    </div>
</form> 