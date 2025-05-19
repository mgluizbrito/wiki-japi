<x-html>

    <section id="auth" class="d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-center align-items-center flex-column w-100 h-100">

            <div class="login-form d-flex justify-content-center align-items-center flex-column">
                <div class="mb-5 d-flex justify-content-center align-items-center">
                    <a href="{{route('home')}}" class="d-flex justify-content-center align-items-center" style="margin-top: -50px; width: 14rem">
                        <img class="w-100" src="{{asset('assets/img/logo.png')}}" alt="">
                    </a>
                </div>
    
                <form method="GET" action="/" class="w-50" id="login-form">
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
                
                <form method="GET" action="/" class="w-50 d-none" id="sign-up-form">
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
                        <x-form.inputbox type="url" name="lattes" id="lattes" label="Link Currículo Lattes"/>
                        <x-form.inputbox type="text" name="area" id="area" label="Área de Atuação:"/>
                    </div>
                    <div class="d-flex justify-content-center align-items-center gap-3 flex-column">
                        <button class="btn btn-secondary">Entrar</button>
                        <a id="login" class="color-black">Já possui conta? Entre Aqui</a>
                    </div>
                </form> 
            </div>

        </div>

        <div class="right-img h-100 p-0 position-relative">
            <div class="overlay w-100 h-100 z-1 position-absolute" style="background: rgba(54, 54, 54, 0.3)"></div>
            <div class="cachoeira"></div>
        </div>

    </section>
</x-html>