<x-app-layout>
    <div class="flex flex-col justify-center items-center">
        <div class="grid grid-cols-12 gap-4 w-full sm:max-w-sm md:max-w-md lg:max-w-2xl xl:max-w-5xl 2xl:max-w-7xl">
            <div class="col-span-4">@livewire('chats-atendidos')</div>

            <div class="col-span-8">@livewire('chat', ['id_sala' => 1])</div>
        </div>

        <!-- Lista de imágenes por resolver (para añadirlas como nuevos chats) -->
        @livewire('chats-por-atender')
    </div>
</x-app-layout>