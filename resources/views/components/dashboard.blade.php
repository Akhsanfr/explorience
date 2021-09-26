<div class="flex flex-row items-start">
    <div class="p-8">
        <x-sidebar></x-sidebar>
    </div>
    <div class="flex-grow p-8 grid grid-cols-12 gap-8">
        {{ $slot }}
    </div>
</div>
