<x-app-layout>

    <div class="grid grid-cols-5 grid-rows-5 gap-4 w-full h-screen p-4">
        <div class="row-span-5 bg-base-200 rounded overflow-y-scroll w-full">
            <livewire:support.assigned-chats />
        </div>
        <div class="col-span-4 row-span-1 bg-base-200 rounded overflow-y-scroll w-full">
            <livewire:support.unassigned-chats />
        </div>
        <div class="col-span-4 row-span-4 col-start-2 row-start-2 bg-base-200 rounded w-full">
            <livewire:support.chat-panel />
        </div>
    </div>

</x-app-layout>
