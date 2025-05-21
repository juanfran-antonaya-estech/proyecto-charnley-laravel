<x-app-layout>
    <div class="flex flex-col h-screen overflow-y-auto">
        <div class="flex-shrink-0">
            <livewire:header />
        </div>
        <div class="flex-shrink-0">
            <livewire:admin.navigation />
        </div>
        <div class="flex-1 overflow-hidden">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Paciente</th>
                        <th>Último mensaje</th>
                        <th>Enviado a familiar</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salas as $index => $sala )
                    <livewire:admin.chatrow salaId="{{ $sala->id }}" index="{{ $index }}" />
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
