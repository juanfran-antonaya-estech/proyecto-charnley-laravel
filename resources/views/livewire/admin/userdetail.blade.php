<div>
    <div class="p-4 flex gap-4">
        <div class="bg-base-200 w-fit h-full p-4 rounded-lg">
            <h2 class="font-extrabold text-4xl my-4">Perfil</h2>
            <div class="flex content-center justify-center p-4 bg-base-300 w-fit rounded-lg my-4">
                <img src="{{ $paciente->profile_photo_url }}" alt="{{ $paciente?->name }}" class= "rounded-full">
                <p class="font-bold my-auto mx-4">{{ $paciente?->name }}</p>
            </div>
        </div>
        <div class="bg-base-200 flex-1 p-4 rounded-lg">
            <h2 class="font-extrabold text-4xl">Información</h2>
            <div class="stats shadow">
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
        </div>
    </div>
    <div class="tabs tabs-border m-4">
        <input type="radio" name="my_tabs_2" class="tab" aria-label="Imágenes" checked="checked" />
        <div class="tab-content border-base-300 bg-base-100 p-10">

        </div>
        <input type="radio" name="my_tabs_2" class="tab" aria-label="Chats" />
        <div class="tab-content border-base-300 bg-base-100 p-10">



        </div>

    </div>
</div>
