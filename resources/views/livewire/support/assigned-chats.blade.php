<ul class="menu bg-base-100 w-full mx-4 mt-2" wire:poll.750ms.keep-alive>
    @foreach ($salas as $sala)
        <li>
            @if($selectedSalaId == $sala->id)
                <a
                class="selected"
                >{{ $user->id == $sala->ultimomensaje->id_sender ? "Tú" : $sala->ultimomensaje->sender->name}}: {{ $sala->ultimomensaje->content }}</a>
            @else
                <a
                wire:click="abrirChat({{ $sala->id }})"
                >{{ $user->id == $sala->ultimomensaje->id_sender ? "Tú" : $sala->ultimomensaje->sender->name}}: {{ $sala->ultimomensaje->content }}</a>
            @endif
        </li>
    @endforeach
</ul>
