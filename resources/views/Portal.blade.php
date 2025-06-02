<x-html>

    <x-portal_header />

    <section id="posts" style="margin-top: 80px;" class="container-fluid">
        <div class="post-ops mb-4 pt-3">
            <div class="filters">Filters</div>
            <div class="orderby">Order</div>
        </div>

        <div class="observations d-flex flex-wrap gap-4">
            @foreach($observations as $obs)
                <x-observation_card :data="[
                    'id' => $obs->id,
                    'imgPath' => $obs->photo_url,
                    'desc' => $obs->desc,
                    'datetime' => $obs->datetime,
                    'name' => $obs->user->name,
                ]" />
            @endforeach
        </div>
    </section>

    <script>
        document.querySelectorAll('.observation').forEach((element) => {       
            element.querySelector(".obs-button").addEventListener("click", (event) => {
                event.preventDefault();
                window.location.href = window.location.origin +"/obs/"+ element.querySelector("#card-id").innerHTML;
            })
        })  
    </script>
    <x-observation_form />
    <x-denuncia_form />
</x-html>