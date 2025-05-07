<x-app-layout>
    <div class="py-12 flex flex-col">
        <div class="flex flex-row">
            <div> <!-- Lista de chats -->

            </div>

            @livewire('chat', ['id_sala' => 1])
        </div>

        <!-- Lista de imágenes por resolver (para añadirlas como nuevos chats) -->
        @livewire('chats-por-atender')
    </div>
</x-app-layout>