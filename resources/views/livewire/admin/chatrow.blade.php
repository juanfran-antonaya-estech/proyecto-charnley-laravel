<tr
@if($sala->reported)
    class="bg-base-200"
@endif
>
    <td>{{ $index }}</td>
    <td><a class="link" href="{{ route('admin.user', $sala->paciente) }}">{{ $sala->paciente->name }}</a></td>
    <td>{{ $sala->ultimomensaje->content }}</td>
    <td>{{ $sala->visible_by_familiar ? "Sí" : "No" }}</td>
    <td>
        <a href="{{ route('admin.image', $sala->imagen) }}" class="btn btn-primary">Ver imagen</a>
    </th>
    <td>
        <span class="join">
            <a class="btn join-item btn-primary" href="{{ route('admin.chat', $sala->id) }}">Ver chat</a>
            <button class="btn join-item btn-error" wire:click="deleteUser">{{ $this->confirmUserDelete ? "¿Seguro?" : "Eliminar usuario" }}</button>
            <button class="btn join-item btn-warning" wire:click="deleteImage">{{ $this->confirmImageDelete ? "¿Seguro?" : "Eliminar imagen" }}</button>
            @if ($sala->reported)
                <button class="btn join-item btn-success" wire:click="free">{{ $this->confirmFree ? "¿Seguro?" : "Falso positivo" }}</button>
            @endif
        </span>
    </td>
</tr>

