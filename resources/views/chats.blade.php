<x-app-layout>
    <div class="flex flex-col justify-center items-center">
        <div class="flex flex-row w-full sm:max-w-sm md:max-w-md lg:max-w-2xl xl:max-w-5xl 2xl:max-w-7xl">
            @livewire('chats-atendidos')

            @livewire('chat', ['id_sala' => 1])
        </div>

        <!-- Lista de imágenes por resolver (para añadirlas como nuevos chats) -->
        @livewire('chats-por-atender')
    </div>
</x-app-layout>