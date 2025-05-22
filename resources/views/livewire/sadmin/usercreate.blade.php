<div class="w-60 m-auto h-fit mt-4 bg-base-200 shadow-lg rounded-lg p-4" wire:poll.1s>
    @if($this->success)
    <div class="alert alert-success">¡Usuario creado con éxito!</div>
    @endif
    <h2 class="font-bold">Crear un usuario</h2>
    <input class="input input-primary border my-2" required placeholder="Nombre" type="text" wire:model="name" />
    @error('name') <div class="alert alert-error p-1">{{ $message }}</div> @enderror
    <input class="input input-primary border my-2" required placeholder="Email" type="text" wire:model="email" />
    @error('email') <div class="alert alert-error p-1">{{ $message }}</div> @enderror
    <input class="input input-primary border my-2" required placeholder="Contraseña" type="password" wire:model="password" />
    @error('password') <div class="alert alert-error p-1">{{ $message }}</div> @enderror
    <select class="input input-primary my-2" required wire:model="role">
        <option hidden>Selecciona un rol</option>
        <option value="1">Usuario</option>
        <option value="2">Familiar</option>
        <option value="3">Soporte</option>
        <option value="4">Admin</option>
        <option value="5">SuperAdmin</option>
    </select>
    @error('role') <div class="alert alert-error p-1">{{ $message }}</div> @enderror
    @if ($role == 2)
    <select class="input input primary my-2" wire:model="taking_care_of">
        <option hidden selected>Elige un usuario en lista</option>
        @foreach ($normalusers as $paciente)
        <option>{{ $paciente->email }}</option>
        @endforeach
    </select>
    @endif
    <button class="btn btn-success w-full mt-2" wire:click="create">Crear usuario</button>
</div>
