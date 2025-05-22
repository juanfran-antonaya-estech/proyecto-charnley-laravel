<div>
    <div class="p-4 flex gap-4">
        <div class="bg-base-200 w-fit h-full p-4 rounded-lg">
            <h2 class="font-extrabold text-4xl my-4">Perfil</h2>
            <div class="flex content-center justify-center p-4 bg-base-300 w-fit rounded-lg my-4">
                <img src="{{ $paciente->profile_photo_url }}" alt="{{ $paciente?->name }}" class="rounded-full">
                <p class="font-bold my-auto mx-4">{{ $paciente?->name }}</p>
            </div>
        </div>
        <div class="bg-base-200 flex-1 p-4 rounded-lg">
            <h2 class="font-extrabold text-4xl">Información</h2>
            <div class="stats">
                <div class="stat">
                    <div class="stat-title text-primary">Correo electrónico</div>
                    <div class="stat-value text-primary">{{ $paciente?->email }}</div>
                </div>
                <div class="stat">
                    <div class="stat-title text-primary">Reportes recibidos</div>
                    <div class="stat-value text-secondary">{{ $paciente?->nOfTimesReported->count() }}</div>
                </div>
                <div class="stat">
                    <div class="stat-title text-primary">Rol</div>
                    <div class="stat-value text-primary">{{ $rolelist[$paciente->role] }}</div>
                </div>
            </div>
            <h2 class="font-extrabold text-xl">Acciones</h2>
            <div class="join">
                <button class="btn btn-error-join-item"></button>
            </div>
        </div>
    </div>
    <div class="tabs tabs-border m-4">
        <input type="radio" name="my_tabs_2" class="tab" aria-label="Imágenes" checked="checked" />
        <div class="tab-content border-base-300 bg-base-100 p-5">
            <div class="grid grid-cols-7 w-fill max-h-70 overflow-y-scroll p-2 gap-4">
                @foreach ($paciente->imagenes as $image)
                <figure class="bg-base-200 w-40 p-3 tilt aspect-square shadow-lg rounded-lg border-2 border-{{ $image->sala?->reported ? "error" : "primary" }}">
                    <a href="{{ route('admin.image', $image) }}" class="cursor-select">
                        <img src="{{ $image->url }}" alt="" class="h-full object-cover">
                    </a>
                </figure>
                @endforeach
            </div>

        </div>
        <input type="radio" name="my_tabs_2" class="tab" aria-label="Chats" />
        <div class="tab-content border-base-300 bg-base-100 p-7">

            <ul class="list bg-base-200 max-h-70 overflow-y-scroll rounded-box shadow-md">

                <li class="p-4 pb-2 text-xs opacity-60 tracking-wide">Chats con soporte abiertos por este usuario</li>
                @foreach ($paciente->chatrooms as $indice => $sala)
                <li class="list-row">
                    <div class="text-4xl font-thin opacity-30 tabular-nums">{{ $nh->padstart($indice, 3) }}</div>
                    <div><img class="size-10 rounded-box" src="{{ $sala->imagen->url }}" /></div>
                    <div class="list-col-grow">
                        <div>Chat con soporte
                            @if($sala->reported)
                            <span class="badge badge-error">Reportada</span>
                            @endif
                        </div>
                        <div class="text-xs uppercase font-semibold opacity-60">{{ $sala->ultimomensaje->content }}</div>
                    </div>
                    <a class="btn btn-square btn-ghost" href="{{ route('admin.chat', $sala) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </li>
                @endforeach

            </ul>

        </div>

    </div>
</div>

