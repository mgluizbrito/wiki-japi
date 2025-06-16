<x-html>

    <x-portal_header />

    <section id="posts" style="margin-top: 80px;" class="container-fluid">
        <div class="post-ops mb-4 pt-3 d-flex justify-content-center align-items-center">
            <h1 class="color-black" style="font-size: 32px">Minhas Observações:</h1>
        </div>

        <div class="observations d-flex flex-wrap gap-4">
            @foreach($observations as $obs)
                <x-observation_card :data="[
                    'id' => $obs->id,
                    'imgPath' => $obs->photo_url,
                    'desc' => $obs->desc,
                    'datetime' => \Carbon\Carbon::parse($obs->datetime)->format('d/m/Y'). ' às ' . \Carbon\Carbon::parse($obs->datetime)->format('H:i'),
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