<section id="publicar-denuncia" class="container-fluid position-fixed z-2 d-flex justify-content-center align-items-center flex-column">
    <div class="d-flex justify-content-center w-100 ps-5 pe-5 position-relative">
        <span class="color-black" style="font-size: 2rem">Denunciar Atropelamento</span>
        <img id="close-publicar-denuncia-btn" src="{{asset('assets/icon/close_24dp_000000.svg')}}" class=" color-black cursor-pointer position-absolute" style="width: 2rem; height: 2rem; right: 0;">
    </div>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form id="observation_form" action="{{route('observacao.store')}}" method="POST" id="obs-form" class="w-100 h-100 d-flex flex-column justify-content-center align-items-center" enctype="multipart/form-data">
        @csrf

        <div class="d-flex flex-column flex-wrap gap-4 mb-4">
            <div class="d-flex flex-column w-100 gap-2">
                <input type="date" name="date" id="obs-date" class="color-black">
                <input type="time" name="time" id="obs-time" class="color-black">
            </div>

            <div class="d-flex flex-column">
                <textarea class="color-black p-2" id="obs-desc" cols="60" rows="4" name="desc" style="resize: none;">Detalhes Aqui</textarea>
            </div>

        </div>

        <input type="file" name="foto" id="foto-upload" class="color-black"/>
        
        <!-- denunciaMapa Container -->
        <div id="denunciaMap" style="height: 400px;" class=" w-75 mt-3 mb-3"></div>
        <input type="hidden" name="latitude" id="obs-latitude">
        <input type="hidden" name="longitude" id="obs-longitude">

        <button type="submit" class="btn btn-secondary">Publicar</button>
    </form>
</section>  

<script>
    var denunciaMap = L.map('denunciaMap', {
        center: [-23.230663, -46.955980],
        zoom: 13,
        zoomControl: true,
        attributionControl: true,
    });

    // Adiciona marcador arrastável
    let denunciaMarker = L.marker([-23.230663, -46.955980], {
        draggable: true
    }).addTo(denunciaMap);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetdenunciaMap</a> contributors'
    }).addTo(denunciaMap);

    // Atualiza coordenadas quando marcador é movido
    denunciaMarker.on('dragend', function(e) {
        const { lat, lng } = denunciaMarker.getLatLng();
        document.querySelector('#obs-latitude').value = lat;
        document.querySelector('#obs-longitude').value = lng;
    });
    
    // Permite clicar no denunciaMapa para adicionar marcador
    denunciaMap.on('click', function(e) {
        const { lat, lng } = e.latlng;
        denunciaMarker.setLatLng([lat, lng]);
        document.querySelector('#obs-latitude').value = lat;
        document.querySelector('#obs-longitude').value = lng;
    });

    /* Publicar Achado */
    document.querySelector('#publicar-denuncia-btn').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('publicar-denuncia').classList.add('active');
        document.getElementById('publicar-denuncia').classList.remove('desactive');
    });
    
    document.querySelector("#close-publicar-denuncia-btn").addEventListener('click', (e) => {
        e.preventDefault();
        document.getElementById('publicar-denuncia').classList.remove('active');
        document.getElementById('publicar-denuncia').classList.add('desactive');
    })

    // Define o atributo 'max' do campo de data para a data atual
    document.getElementById('obs-date').setAttribute('max', new Date().toISOString().split('T')[0]);
</script>