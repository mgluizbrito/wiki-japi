<div class="observation">
    <div class="d-none" id="card-id">{{$data['id']}}</div>
    <div class="obs-img mb-3">
        <img src="/storage/{{$data['imgPath']}}">
    </div>

    <div class="obs-info">
        <p class="text-title color-black m-0">{{$data['sci_name'] ?? "Não Identificado"}}</p>
        <span class="popular-name">{{$data['com_name'] ?? "Não Identificado"}}</span>
        <p class="text-body">{{$data['desc']}}</p>
    </div>

    <div class="obs-footer d-flex justify-content-between align-items-center">
        <span class="color-black">{{$data['datetime']}}</span>
        <span class="color-black">{{$data['name']}}</span>
    </div>
    <button class="obs-button">Mais Informações</button>
</div><!-- observation -->