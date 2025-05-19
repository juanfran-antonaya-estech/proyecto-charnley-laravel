<x-app-layout>
    <div class="flex flex-col h-screen">
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
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Veces reportado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user )
                    <livewire:admin.userrow userId="{{ $user->id }}" index="{{ $index }}" />
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
