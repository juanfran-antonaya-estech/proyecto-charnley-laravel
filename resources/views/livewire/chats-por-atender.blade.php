<div class="carousel carousel-center bg-neutral rounded-box max-w-md space-x-4 p-4"> <!-- Tengo que ver exactamente qué clases pintan -->
    @foreach ($por_atender as $item)
        <div class="carousel-item">
            <!-- <img src="{{$item->imagen()->imagenOriginal()}}" class="rounded-box" /> --> <!-- verdadero codigo a usar una vez tengamos imagenes -->
            <img src="https://img.daisyui.com/images/stock/photo-1559703248-dcaaec9fab78.webp" class="rounded-box" /> <!-- Placeholder hasta que tengamos imagenes en la BDD -->
        </div>
    @endforeach
</div>