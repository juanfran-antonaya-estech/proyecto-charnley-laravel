<div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-8 h-full p-2" wire:poll.750ms.keep-alive>
    @foreach ($unassignedChats as $chat)
            <div class="tilt card shadow-xl aspect-square border-error bg-base-100">
                <figure>
                    <img src="{{ $chat->imagen->url }}" alt="Chat Image" class="w-full object-cover rounded-lg aspect-square" />
                </figure>
                <div
                class="card-body cursor-pointer hover:bg-base-300 transition duration-300 ease-in-out"

                >
                    <p>{{ $chat->ultimomensaje->content }}</p>
                </div>
            </div>
    @endforeach

</div>
