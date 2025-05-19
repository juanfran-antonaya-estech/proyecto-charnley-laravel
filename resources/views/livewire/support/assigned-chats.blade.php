<ul class="menu bg-base-100 w-full mt-2 overflow-hidden" wire:poll.750ms.keep-alive>
    @foreach ($salas as $sala)
        <li>
            <a
            @if($selectedSalaId == $sala->id)
                class="selected"
                @else
                wire:click="abrirChat({{ $sala->id }})"
                @endif
                >{{ $user->id == $sala->ultimomensaje->id_sender ? "Tú" : $sala->ultimomensaje->sender->name}}: {{ $sala->ultimomensaje->content }}</a>
                <div class="absolute right-0 status w-1 aspect-square {{ $user->id == $sala->ultimomensaje->id_sender ? "status-error" : "status-success animate-ping" }}"></div>
        </li>
    @endforeach
</ul>
