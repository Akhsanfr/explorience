<div class="grid grid-cols-12 gap-8 container mx-auto px-8">
    <div class="flex flex-col col-span-12 space-y-4">
        <h2 class="font-bold text-2xl">Hayuk Sinau</h2>
        <span class="w-full h-px bg-base-content"></span>
        <div class="col-span-12 grid grid-cols-12 gap-8">
            @forelse ($hayukSinaus as $artikel)
                <x-card :judul="$artikel->judul" :kategori="$artikel->kategori->nama" :slug="$artikel->slug"></x-card>
            @empty

            @endforelse
        </div>
    </div>
    <div class="flex flex-col col-span-12 space-y-4">
        <h2 class="font-bold text-2xl">Trivia</h2>
        <span class="w-full h-px bg-base-content"></span>
        <div class="col-span-12 grid grid-cols-12 gap-8">
            @forelse ($trivias as $artikel)
                <x-card :judul="$artikel->judul" :kategori="$artikel->kategori->nama" :slug="$artikel->slug"></x-card>
            @empty

            @endforelse
        </div>
    </div>
    <div class="flex flex-col col-span-12 space-y-4">
        <h2 class="font-bold text-2xl">Indonesiaku</h2>
        <span class="w-full h-px bg-base-content"></span>
        <div class="col-span-12 grid grid-cols-12 gap-8">
            @forelse ($indonesiakus as $artikel)
                <x-card :judul="$artikel->judul" :kategori="$artikel->kategori->nama" :slug="$artikel->slug"></x-card>
            @empty

            @endforelse
        </div>
    </div>
    <div class="flex flex-col col-span-12 space-y-4">
        <h2 class="font-bold text-2xl">Lentera Islami</h2>
        <span class="w-full h-px bg-base-content"></span>
        <div class="col-span-12 grid grid-cols-12 gap-8">
            @forelse ($lenteraIslamis as $artikel)
                <x-card :judul="$artikel->judul" :kategori="$artikel->kategori->nama" :slug="$artikel->slug"></x-card>
            @empty

            @endforelse
        </div>
    </div>
</div>
