<header class="ps-5 pe-5 d-flex justify-content-between align-items-center w-100 position-fixed top-0 start-0 z-1" style="background-color: rgb(46, 94, 78); height: 80px;">
    <div class="logo" style="width: 7rem; height: 80px;">
        <a class="w-100 h-100" href="{{route('home')}}" class="d-flex justify-content-center align-items-center" style="margin-top: -50px; width: 14rem">
            <img class="w-100" src="{{asset('assets/img/logo.png')}}" alt="">
        </a>        
    </div>

    <div class="modal-links">
        <ul class="d-flex justify-content-between align-items-center" style="font-size: 24px;">
            <li id="publicar-achado-btn" class="cursor-pointer h-100 p-4">Publicar Observação 📷</a></li>
            <li id="denuncia-btn" class="cursor-pointer h-100 p-4">Denúncia de Atropelamento 🚨</a></li>
        </ul>
    </div>

    <div class="user-dropdown">
        <div id="dropdown-btn" style="width: 2.5rem; height: 2.5rem; cursor: pointer;">
            <img class="w-100" src="{{asset('/assets/icon/apps_24dp_FFFFFF.svg')}}">
        </div>

        <div class="dropdown-itens d-none flex-column position-absolute" style="right: 0">
            <a href="{{route("my.observacoes")}}">Minhas Observações</a>
            <a href="">Minhas Identificações</a>
            <a href="{{route("auth.logout")}}">Sair</a>
        </div>
    </div>

    <script>
        document.querySelector("#dropdown-btn").addEventListener('click', (event) => {
            event.preventDefault();
            document.querySelector(".dropdown-itens").classList.toggle("d-flex");
            document.querySelector(".dropdown-itens").classList.toggle("d-none");
        });
    </script>
</header>