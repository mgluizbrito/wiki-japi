<section id="editar-achado" class="container-fluid position-fixed z-2 d-flex justify-content-center align-items-center flex-column">
    <div class="d-flex justify-content-center w-100 ps-5 pe-5 position-relative">
        <span class="color-black" style="font-size: 2rem">Editar Observação</span>
        <img id="close-editar-achado-btn" src="{{asset('assets/icon/close_24dp_000000.svg')}}" class=" color-black cursor-pointer position-absolute" style="width: 2rem; height: 2rem; right: 0;">
    </div>

    <form id="observation_form" action="{{route('observacao.update')}}" method="POST" id="obs-form" class="w-100 h-100 d-flex flex-column justify-content-center align-items-center" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{$id}}">
        <div class="d-flex flex-column flex-wrap gap-4 mb-4">
            <div class="d-flex flex-column w-100 gap-2">
                <input type="date" name="date" id="obs-date" class="color-black" value="{{ \Carbon\Carbon::parse(   $datetime)->format('Y-m-d') }}">
                <input type="time" name="time" id="obs-time" class="color-black" value="{{ \Carbon\Carbon::parse($datetime)->format('H:i') }}">
            </div>

            <div class="d-flex flex-column">
                <textarea class="color-black p-2" id="obs-desc" cols="60" rows="4" name="desc" style="resize: none;">{{$desc}}</textarea>
            </div>

        </div>

        <input type="file" name="foto" id="foto-upload" class="color-black"/>
        
        <!-- Mapa Container -->
        <div id="edit-obs-editObsMap" style="height: 400px;" class=" w-75 mt-3 mb-3"></div>
        <input type="hidden" name="latitude" id="edit-obs-lat">
        <input type="hidden" name="longitude" id="edit-obs-lng">

        <button type="submit" class="btn btn-outline-danger">Editar</button>
    </form>
</section>  

<script>
    var editObsMap = L.map('edit-obs-editObsMap', {
        center: [{{$lat}}, {{$long}}],
        zoom: 13,
        zoomControl: true,
        attributionControl: true,
    });

    // Adiciona marcador arrastável
    let editObsMarker = L.marker([{{$lat}}, {{$long}}], {
        draggable: true
    }).addTo(editObsMap);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(editObsMap);

    // Atualiza coordenadas quando marcador é movido
    editObsMarker.on('dragend', function(e) {
        const { lat, lng } = editObsMarker.getLatLng();
        document.querySelector('#edit-obs-lat').value = lat;
        document.querySelector('#edit-obs-lng').value = lng;
    });
    
    // Permite clicar no mapa para adicionar marcador
    editObsMap.on('click', function(e) {
        const { lat, lng } = e.latlng;
        editObsMarker.setLatLng([lat, lng]);
        document.querySelector('#edit-obs-lat').value = lat;
        document.querySelector('#edit-obs-lng').value = lng;
    });

    /* Editar Achado */
    document.querySelector('#editar-achado-btn').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('editar-achado').classList.add('active');
        document.getElementById('editar-achado').classList.remove('desactive');
    });
    
    document.querySelector("#close-editar-achado-btn").addEventListener('click', (e) => {
        e.preventDefault();
        document.getElementById('editar-achado').classList.remove('active');
        document.getElementById('editar-achado').classList.add('desactive');
    })

    // Define o atributo 'max' do campo de data para a data atual
    document.getElementById('obs-date').setAttribute('max', new Date().toISOString().split('T')[0]);
</script>