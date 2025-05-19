<div>
    @if($sala != null)
        <div class="grid grid-cols-4 grid-rows-1 gap-4 h-full">
            <div class="col-span-3">
                <!-- Parte de chat -->


                <div class="w-full h-100 justify-end overflow-y-scroll rounded p-4">
                    @foreach($sala->mensajes as $mensaje)
                        @if($mensaje->sender->id == $user->id)
                            <div class="chat chat-end">
                                <div class="chat-header">
                                    Tú
                                    <time class="text-xs opacity-50">{{ $mensaje->created_at }}</time>
                                </div>
                                <div class="chat-bubble chat-bubble-primary">{{ $mensaje->content }}</div>
                            </div>
                        @else
                            <div class="chat chat-start">
                                <div class="chat-header">
                                    {{ $mensaje->sender->name }}
                                    <time class="text-xs opacity-50">{{ $mensaje->created_at }}</time>
                                </div>
                                <div class="chat-bubble">{{ $mensaje->content }}</div>
                            </div>
                        @endif
                    @endforeach

                </div>
                <div class="join w-full">
                    <input type="text" placeholder="Escribe un mensaje" class="input input-bordered join-item w-full" wire:model="messageContent" />
                    <button class="btn btn-primary join-item" wire:click="send">Enviar</button>
                </div>
            </div>
            <div class="col-span-2 col-start-4">
                <!-- Parte de detalle -->

                <figure class="diff aspect-16/9" tabindex="0">
                    <div class="diff-item-1" role="img" tabindex="0">
                        <img alt="imagen original" src="{{ $sala->imagen->url }}" />
                    </div>
                    <div class="diff-item-2" role="img">
                    <img
                        alt="imagen modificada"
                        src="{{ $sala->imagen->imagenMod->url ?? '' }}" />
                    </div>
                    <div class="diff-resizer"></div>
                </figure>
                <div class="w-full h-50 flex flex-col gap-2 overflow-y-scroll p-2">
                    @foreach($sala->imagen->subimagenes as $subim )
                                <img
                                src="{{ asset($subim->url) }}"
                                class="object-contain max-h-50 aspect-ratio-auto" />
                                <p class="bg-neutral">{{ $subim->objeto }} <span class="text-info">{{ number_format($subim->seguridad, 2) }}</span></p>
                    @endforeach
                </div>
            </div>
        </div>

    @else
        <div class="grid grid-cols-5 grid-rows-1 gap-4">
            <div class="col-span-3">
                <h1 class="text-2xl font-bold">Selecciona un chat</h1>
            </div>
            <div class="col-span-2 col-start-4">
                <h1 class="text-2xl font-bold">Selecciona un chat</h1>
            </div>
        </div>
    @endif
</div>
