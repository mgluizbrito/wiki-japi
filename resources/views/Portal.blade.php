<x-html>

    <x-portal_header />

    <section id="posts" style="margin-top: 80px;" class="container-fluid">
        <div class="post-ops mb-4 pt-3 d-flex justify-content-center">
            <form action="{{route('search')}}" method="GET" class="d-flex w-25">
                <input type="text" class="form-control" name="q" placeholder="Pesquise por nome, descrição ou usuário">
                <button class="btn btn-success" type="submit" id="button-addon2"><img src="{{asset('assets/icon/search_24dp_FFFFFF.svg')}}"></button>
            </form>
        </div>

        <div class="observations d-flex flex-wrap gap-4">
            @foreach($observations as $obs)
                <x-observation_card :data="[
                    'id' => $obs->id,
                    'imgPath' => $obs->photo_url,
                    'desc' => $obs->desc,
                    'datetime' => $obs->datetime,
                    'name' => $obs->user->name,

                    'sci_name' => $obs->ident->scientific_name ?? null,
                    'com_name' => $obs->ident->common_name ?? null,
                ]" />
            @endforeach
        </div>
    </section>

    <script>
        document.querySelectorAll('.observation').forEach((element) => {       
            element.querySelector(".obs-button").addEventListener("click", (event) => {
                event.preventDefault();
                window.location.href = window.location.origin +"/observacao/"+ element.querySelector("#card-id").innerHTML;
            })
        })  
    </script>
    <x-observation_form />
    <x-denuncia_form />
</x-html>