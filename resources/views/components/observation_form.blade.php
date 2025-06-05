<section id="publicar-achado" class="container-fluid position-fixed z-2 d-flex justify-content-center align-items-center flex-column">
    <div class="d-flex justify-content-center w-100 ps-5 pe-5 position-relative">
        <span class="color-black" style="font-size: 2rem">Publicar Observação</span>
        <img id="close-publicar-achado-btn" src="{{asset('assets/icon/close_24dp_000000.svg')}}" class=" color-black cursor-pointer position-absolute" style="width: 2rem; height: 2rem; right: 0;">
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
                <textarea class="color-black p-2" id="obs-desc" cols="60" rows="4" name="desc" style="resize: none;">Descreva Aqui</textarea>
            </div>

        </div>

        <input type="file" name="foto" id="foto-upload" class="color-black"/>
        
        <!-- Mapa Container -->
        <div id="obs-map" style="height: 400px;" class=" w-75 mt-3 mb-3"></div>
        <input type="hidden" name="latitude" id="obs-latitude">
        <input type="hidden" name="longitude" id="obs-longitude">

        <button type="submit" class="btn btn-secondary">Publicar</button>
    </form>
</section>  

<script>
    var map = L.map('obs-map', {
        center: [-23.230663, -46.955980],
        zoom: 13,
        zoomControl: true,
        attributionControl: true,
    });

    // Adiciona marcador arrastável
    let marker = L.marker([-23.230663, -46.955980], {
        draggable: true
    }).addTo(map);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Atualiza coordenadas quando marcador é movido
    marker.on('dragend', function(e) {
        const { lat, lng } = marker.getLatLng();
        document.querySelector('#obs-latitude').value = lat;
        document.querySelector('#obs-longitude').value = lng;
    });
    
    // Permite clicar no mapa para adicionar marcador
    map.on('click', function(e) {
        const { lat, lng } = e.latlng;
        marker.setLatLng([lat, lng]);
        document.querySelector('#obs-latitude').value = lat;
        document.querySelector('#obs-longitude').value = lng;
    });

    /* Publicar Achado */
    document.querySelector('#publicar-achado-btn').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('publicar-achado').classList.add('active');
        document.getElementById('publicar-achado').classList.remove('desactive');
    });
    
    document.querySelector("#close-publicar-achado-btn").addEventListener('click', (e) => {
        e.preventDefault();
        document.getElementById('publicar-achado').classList.remove('active');
        document.getElementById('publicar-achado').classList.add('desactive');
    })

    // Define o atributo 'max' do campo de data para a data atual
    document.getElementById('obs-date').setAttribute('max', new Date().toISOString().split('T')[0]);
</script>