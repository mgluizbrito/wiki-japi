@if(auth()->check())
    <script>
        window.location.href = "{{ route('portal') }}";
    </script>
@endif
<x-html>

    <x-header/>

    <section id="h-hero" class="d-flex flex-column align-items-center justify-content-center gap-3 position-relative z-0">
        <div class="overlay w-100 h-100 position-absolute" style="background-color: rgba(54, 54, 54, 0.3);"></div>
        <h1 class="z-1" style="font-size: 5rem"><span style="font-family: 'PT Serif' ">Bem vindo ao WikiJapi</span></h1>
        <div class="z-1">
            <h3 class="mt-3" style="font-size: 2rem">O que vamos explorar hoje?</h3>

            <div class="search-field input-group input-group-lg mt-2 mb-3">
                <input type="text" class="form-control" placeholder="Pesquise aqui">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><img src="{{asset('assets/icon/search_24dp_FFFFFF.svg')}}"></button>
            </div>
        </div>
    </section>

    <section id="statistics-cards" class="w-100 position-relative d-flex justify-content-center align-items-center">
        <div class="w-100 position-absolute d-flex justify-content-center align-items-center gap-4">

            <div class="card">
                <span>{{$colaborators}}</span>
                <span>Colaboradores</span>
            </div>
            <div class="card">
                <span>{{$posts}}</span>
                <span>Registros</span>
            </div>
            <div class="card">
                <span>{{$species}}</span>
                <span>Espécies</span>
            </div>

        </div>
    </section>

    <section id="apresentacao" class="w-100 d-flex justify-content-center align-items-center gap-5">
        <div class="">
            <span>Um projeto de ciência cidadã</span>
            <h3>Reunindo pessoas a fim de catalogar, preservar e explorar a reserva natural da Serra do Japi</h3>
        </div>

        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea quaerat ducimus voluptas? Ipsam accusamus sapiente praesentium itaque dolorum voluptates accusantium omnis aut voluptate. Eaque harum, possimus ullam qui tempora aut.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint accusamus neque voluptatem suscipit similique nobis earum, consectetur in temporibus, aperiam nulla ex et iusto repellendus? Ipsa, atque officiis! Eaque, nesciunt.
        </p>
    </section>

</x-html>
