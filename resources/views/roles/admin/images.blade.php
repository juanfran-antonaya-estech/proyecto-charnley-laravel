<x-app-layout>
    <div class="flex flex-col h-screen">
        <div class="flex-shrink-0">
            <livewire:header />
        </div>
        <div class="flex-shrink-0">
            <livewire:admin.navigation />
        </div>
        <div class="flex-1 overflow-y-scroll p-4">
            @foreach ($imagesgroup as $images )
            <div class="grid grid-cols-3 md:grid-cols-6 gap-4">
                @foreach($images as $image)
                    <div class="card bg-base-200 shadow-xl tilt mb-4">
                        @if($image->sala != null)
                            @if($image->sala->reported)
                                <div class="badge badge-error absolute top-0 right-0 m-2">Reportado</div>
                            @endif
                        @endif
                        <figure><img src="{{ $image->url }}" alt="Image" /></figure>
                        <div class="card-body">
                            <h2 class="card-title">{{ $image->paciente->name }}</h2>
                            <p>{{ $image->description }}</p>
                            <div class="card-actions justify-end">
                                <button class="btn btn-primary">Ver</button>
                                <button class="btn btn-secondary">Eliminar</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
