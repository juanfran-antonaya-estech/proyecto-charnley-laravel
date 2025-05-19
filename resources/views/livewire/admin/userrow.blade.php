<tr
@if ($user->nOfTimesReported->count() > 0)
    class="bg-base-200"
@endif
>
    <th>{{ $index + 1 }}</td>
    <td><a class="link" href="{{ route('admin.user', $user->id) }}">{{ $user->name }}</a></td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->nOfTimesReported->count() }}</td>
    <td class="join">
        <button wire:click="delete" class="btn btn-error join-item">Eliminar</button>
    </td>
</tr>
