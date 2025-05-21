<div>
    <div class="columns-2 gap-4 w-300 p-2 my-4 mx-auto bg-base-300 rounded-lg">
        <figure>
            <img src="{{ $imagen->url }}" class="rounded-lg">
            <p>Original</p>
        </figure>
        <figure>
            <img src="{{ $imagen->imagenMod->url }}" class="rounded-lg">
            <p>Modificada</p>
        </figure>
    </div>
    <div>

    </div>
</div>
