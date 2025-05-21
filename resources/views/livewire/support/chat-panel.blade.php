<div class="h-full w-full border-2 rounded-lg p-2 flex flex-col overflow-hidden" wire:poll.1000ms>
    @if($sala != null)
    <div class="grid grid-cols-4 gap-4 h-full min-h-0 rounded-lg">
        <div class="col-span-2 flex flex-col h-full min-h-0">
            <!-- Parte de chat -->
            <div class="flex-1 min-h-0 flex flex-col">
                <div class="flex-1 min-h-0 w-full flex flex-col justify-end overflow-y-auto rounded p-4">
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
                            @if ($user->role >= 4)
                                <a href="{{ route('admin.user', $mensaje->sender->id) }}" class="link">{{ $mensaje->sender->name }}</a>
                            @else
                                {{ $mensaje->sender->name }}
                            @endif
                            <time class="text-xs opacity-50">{{ $mensaje->created_at }}</time>
                        </div>
                        <div class="chat-bubble">{{ $mensaje->content }}</div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="mt-2 flex flex-row gap-2">
                    <div class="join flex-1">
                        <input type="text" placeholder="Escribe un mensaje" class="input input-bordered join-item w-full" wire:model="messageContent" />
                        <button class="btn btn-primary join-item" wire:click="send">Enviar</button>
                    </div>
                    <div class="join rounded">
                        @if (!$sala->reported)
                        <button class="btn join-item btn-error" wire:click="report">
                            @if($confirmreport)
                            <p class="font-bold">¿Seguro?</p>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5" />
                            </svg>
                            @endif
                        </button>
                        @endif
                        @if (!$sala->visible_by_familiar)
                        <button class="btn join-item btn-info" wire:click="tofamiliar">
                            @if($confirmtoparent)
                            <p class="font-bold">¿Seguro?</p>
                            @else
                            Enviar al familiar
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                            </svg>

                            @endif
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-2 flex flex-col h-full min-h-0">
            <!-- Parte de detalle -->
            @if ($user->role >= 4)
            <a href="{{ route('admin.image', $sala->imagen->id) }}" class="bg-error p-4 rounded hover:bg-neutral hover:scale-102 transition duration-150 ease-in-out">
            @endif
            <figure class="diff aspect-16/9 shadow-lg" tabindex="0">
                <div class="diff-item-1" role="img" tabindex="0">
                    <img class="rounded" alt="imagen original" src="{{ $sala->imagen->url }}" />
                </div>
                <div class="diff-item-2" role="img">
                    <img class="rounded" alt="imagen modificada" src="{{ $sala->imagen->imagenMod->url ?? '' }}" />
                </div>
                <div class="diff-resizer"></div>
            </figure>
            @if($user->role >= 4)
            </a>
            @endif
            <div class="w-full flex-1 flex flex-col gap-2 overflow-y-auto no-scrollbar px-2">
                @foreach($sala->imagen->subimagenes as $subim )
                <div class="h-wrap flex flex-col items-center justify-center border-2 border-primary bg-base-200 rounded-lg p-1">
                    <img src="{{ asset($subim->url) }}" class="max-h-40 min-w-15 object-contain mb-1 rounded shadow" />
                    <p class="w-full text-center">{{ $subim->objeto }} <span class="text-info">{{ number_format($subim->seguridad, 2) }}</span></p>
                </div>
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

