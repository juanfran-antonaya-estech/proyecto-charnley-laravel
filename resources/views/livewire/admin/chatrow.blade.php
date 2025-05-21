
<tr
@if($sala?->reported)
    class="bg-base-200"
@endif
>
    <th>{{ $index }}</th>
    <td><a class="link" href="{{ route('admin.user', $sala?->paciente) }}">{{ $sala?->paciente->name }}</a></td>
    <td>{{ $sala->ultimomensaje->content }}</td>
    <td>{{ $sala->visible_by_familiar ? "Sí" : "No" }}</td>
    <td>
        @if ($sala->imagen != null)
        <a href="{{ route('admin.image', $sala?->imagen) }}" class="btn btn-primary">Ver imagen</a>
        @endif
    </td>
    <td>
        <span class="join">
            <a class="btn join-item btn-primary" href="{{ route('admin.chat', $sala?->id) }}">Ver chat</a>
            <button class="btn join-item btn-error" wire:click="deleteUser">Eliminar usuario</button>
            <button class="btn join-item btn-warning" wire:click="deleteImage">Eliminar Imagen</button>
            @if ($sala->reported)
                <button class="btn join-item btn-success" wire:click="free">Falso positivo</button>
            @endif
        </span>
    </td>
</tr>

