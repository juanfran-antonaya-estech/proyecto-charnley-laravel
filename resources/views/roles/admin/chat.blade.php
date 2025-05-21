<x-app-layout>
    <div class="flex flex-col h-full overflow-hidden">
        <div class="flex-shrink-0">
            <livewire:header />
        </div>
        <div class="flex-shrink-0">
            <livewire:admin.navigation />
        </div>
        <div class="flex-1 overflow-hidden">
            <livewire:support.chat-panel selectedSalaId="{{ $sala }}" />
        </div>
    </div>
</x-app-layout>

