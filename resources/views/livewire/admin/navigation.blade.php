<div class="h-10 flex flex-row bg-base-300 menu-horizontal">
    <div class="flex-1 flex items-center justify-center">
        <a href="{{ $user->role == 4 ? route('admin.chats') : route('sadmin.chats') }}" class="link">Chats</a>
    </div>
    <div class="flex-1 flex items-center justify-center">
        <a href="{{ $user->role == 4 ? route('admin.users') : route('sadmin.users') }}" class="link">Pacientes</a>
    </div>
    <div class="flex-1 flex items-center justify-center">
        <a href="{{ $user->role == 4 ? route('admin.images') : route('sadmin.images') }}" class="link">Imágenes</a>
    </div>
    @if ($user->role == 5)
    <div class="flex-1 flex items-center justify-center">
        <a href="{{ route('sadmin.user.create') }}" class="link">Crear usuario</a>
    </div>
    @endif
</div>
