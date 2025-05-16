<div class="absolute right-40 top-60 w-20 overflow-visible flex flex-col items-center justify-center">
    <div
        wire:click="toggleHints()"
        class="mask mask-squircle w-20 shadow-2xl min-w-20 d-block">
        <img src="https://i.blogs.es/95932a/840_560/650_1200.jpeg"/>
    </div>
    @if ($showHints)
        <table class="table d-block" wire:transition>
            <thead>
                <tr>
                    <th>Rol</th>
                    <th>Mail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $roles[$usuario->role] }}</td>
                        <td>{{ $usuario->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
