<header class="d-flex justify-content-center position-fixed w-100 mt-3 z-3 home-header">
    <div class="d-flex justify-content-between align-items-center w-50">
        <div class="ms-5">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo do WikiJapi">
        </div>
    
        <div class="d-flex justify-content-between align-items-center">
            <div class="links">
                <ul class="d-flex justify-content-between align-items-center me-2">
                    <li class="link"><a class="p-4 " href="{{ route('home') }}">Início</a></li>
                    <li class="link"><a class="p-4" href="{{ route('explore') }}">Explorar</a></li>
                    <li class="link"><a class="p-4" href="{{ route('about') }}">Sobre</a></li>
                </ul>
            </div>
    
            <div class=" btn-entrar ps-5 pe-5">
                <a class="w-100 h-100 d-flex justify-content-center align-items-center" href="{{ route('auth.entrar') }}">Entrar</a>
            </div>
        </div>  
    </div>
</header>