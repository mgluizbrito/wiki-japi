<x-html>
    <x-portal_header />

    <section id="observation" class="container-fluid">
        <div class="d-flex flex-wrap justify-content-center gap-5">
            <div>
                <div class="obs-foto">
                    <img src="/storage/{{$obs['photo_url']}}" alt="" style="max-width: 100%; max-height: 600px;">
    
                    <div class="d-none flex-column mt-4">
                        <span class="color-gray">Postagem por </span>
                        <span class="color-gray">Identificado por </span>
                        <span class="color-gray">Validado por </span>
                    </div>
                    
                </div>
                
                <div class="obs-actions flex-column gap-2 mt-4 p-3">
                    <div class="d-flex align-items-center flex-column gap-2">
                        @if ($user['id'] == Auth::user()->id)
                        <span>Essa observação te pertence!!</span>
                        <div class="d-flex gap-4 ">
                            <a id="editar-achado-btn" class="editar-btn">Editar Observação</a>
                            <a href="{{route('observacao.destroy', ['id' => $obs['id']])}}" class="delete-btn">Excluir Observação</a>
                        </div>
                        @endif 
                        
                        @if ($user['role'] == 'specialist' && !$iden == null)
                        <a id="validar-btn" class="validar-btn">Validar Identificação</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="obs-infos">
                
                <div class="d-flex flex-column flex-wrap gap-4 mb-4">
                    
                    <div class="d-flex flex-column w-100 gap-2">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form action="{{route("identificar")}}" method="post" class="d-flex flex-column w-100 gap-2">
                            @csrf
                            <input type="hidden" name="id" value="{{$obs['id']}}">
                            <label>
                                <span class="date color-black form-label">Nome Científico: {{$iden['scientific_name'] ?? "Não Identificado"}}</span>
                                <input type="text" name="scientific_name" id="sci-name" class="form-control d-none" placeholder="Nome Científico">
                            </label>
                            <label>
                                <span class="date color-black form-label">Nome Popular: {{$iden['common_name'] ?? "Não Identificado"}}</span>
                                <input type="text" name="common_name" id="common-name" class="form-control d-none" placeholder="Nome Popular">
                            </label>
                             
                            <button type="submit" id="send-iden" class="btn btn-outline-danger w-100 d-none justify-content-center">Enviar Identificação</button>
                        </form>

                        <span class="date color-black">Dia: {{ \Carbon\Carbon::parse($obs['datetime'])->format('d/m/Y') }}</span>
                        <span class="time color-black">Hora: {{ \Carbon\Carbon::parse($obs['datetime'])->format('H:i') }}</span>
                    </div>

                    <div class="d-flex flex-column">
                        <textarea class="color-black p-2" id="obs-desc" cols="60" rows="4" name="desc" style="resize: none;" readonly>{{$obs['desc']}}</textarea>
                    </div>

                </div>

                <!-- Mapa Container -->
                <div id="obsed-map" style="height: 400px;" class=" w-100 mt-3 mb-3 z-0"></div>
                <input type="hidden" name="latitude" id="obs-latitude">
                <input type="hidden" name="longitude" id="obs-longitude">

                <button id="identificar-btn" class="btn btn-outline-success w-100 d-flex justify-content-center">Identificar</button>
            </div>
        </div>
    </section>

    <script>
    let identificarBtn = document.querySelector("#identificar-btn");
    identificarBtn.addEventListener('click', (e) => {
        e.preventDefault();
        document.getElementById("sci-name").classList.toggle('d-none');
        document.getElementById("common-name").classList.toggle('d-none');

        document.getElementById("send-iden").classList.toggle('d-flex');
        document.getElementById("send-iden").classList.toggle('d-none');
    });

    var obsMap = L.map('obsed-map', {
        center: [ {{$obs['latitude']}} , {{$obs['longitude']}} ],
        zoom: 13,
        zoomControl: true,
        attributionControl: false,
    });

    // Adiciona marcador arrastável
    let obsMarker = L.marker([ {{$obs['latitude']}} , {{$obs['longitude']}} ], {
        draggable: false
    }).addTo(obsMap);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(obsMap);
    </script>
    
    <x-edit_observation_form
        id="{{$obs['id']}}"
        datetime="{{$obs['datetime']}}"
        desc="{{$obs['desc']}}"
        lat="{{$obs['latitude']}}"
        long="{{$obs['longitude']}}"
        />
    <x-observation_form />
    <x-denuncia_form />
</x-html>