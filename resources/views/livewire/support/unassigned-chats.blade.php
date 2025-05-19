<div class="grid grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-8 h-full p-2" wire:poll.750ms.keep-alive>
    @foreach ($unassignedChats as $chat)
            <div class="tilt card shadow-xl aspect-square border-error bg-base-100 hover:scale-110">
                <figure>
                    <img src="{{ $chat->imagen->url }}" alt="Chat Image" class="w-full object-cover rounded-lg aspect-square" />
                </figure>
                <div
                class="card-body cursor-pointer bg-base-300 transition duration-300 ease-in-out absolute text-xs w-full h-full p-4 opacity-0 hover:opacity-75 rounded-lg"
                wire:click="abrirChat({{ $chat->id }})"
                >
                    <p>{{ $chat->ultimomensaje->content }}</p>
                </div>
                <div class="status status-success animate-ping absolute right-0 scale-120"></div>
                <div class="status status-success absolute right-0 scale-120"></div>
            </div>
    @endforeach

</div>
