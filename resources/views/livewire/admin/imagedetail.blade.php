<div class="flex flex-row">
    <div>
        <div class="columns-2 flex-1 gap-4 w-[90%] lg:w-300 p-2 my-2 mx-auto bg-base-300 rounded-lg">
            <figure>
                <img src="{{ $imagen->url }}" class="rounded-lg">
                <p class="text-center font-extrabold">Original</p>
            </figure>
            <figure>
                <img src="{{ $imagen->imagenMod->url }}" class="rounded-lg">
                <p class="text-center font-extrabold">Modificada</p>
            </figure>
        </div>
        <div class="bg-base-300 w-[90%] lg:w-300 h-60 my-2 overflow-y-scroll mx-auto rounded-lg h-fill">
            <h1 class="text-xl text-center col-full mx-auto font-extrabold w-fit py-1 px-2 my-2 bg-base-300 rounded-lg border-2 border-primary">Subimágenes</h1>
            <div class="px-2 grid grid-cols-8 gap-4">
                @foreach($imagen->subimagenes as $subimagen)
                    <figure class="p-2 w-fit h-fit bg-base-200 rounded-lg shadow-lg">
                        <img class="rounded-lg min-w-15 min-h" src="{{ asset($subimagen->url) }}">
                        <p class="text-center font-bold">{{ Str::ucfirst($subimagen->objeto) }}</p>
                    </figure>
                @endforeach
            </div>

        </div>
    </div>
    <div class="flex-1 flex flex-col align-center content-center flex-wrap">
        <div class="join join-vertical my-auto">
            @if($imagen?->sala != null)
                <a href="{{ route('admin.chat', $imagen?->sala) }}" class="btn btn-primary join-item">Ir al chat relacionado</a>
            @endif
            <a href="{{ route('admin.user', $imagen->paciente) }}" class="btn btn-primary join-item">Ir al usuario</a>
            <button class="btn btn-warning join-item" wire:click="deleteImage">Eliminar imagen</button>
            <button class="btn btn-error join-item" wire:click="deleteUser">Eliminar usuario</button>
        </div>
    </div>
</div>
