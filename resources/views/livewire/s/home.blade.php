<div>
    <div class="">
        <img src="https://picsum.photos/seed/picsum/300/200" alt="" class="object-cover w-full h-80">
    </div>
    <div class="grid grid-cols-12 gap-8 container mx-auto px-8">
        <div class="flex flex-col col-span-12 space-y-4">
            <div class="flex flex-row justify-between items-end">
                <h2 class="font-bold text-2xl">New Release</h2>
                <a href="{{ route('new-release') }}">More...</a>
            </div>
            <span class="w-full h-px bg-base-content"></span>
            <div class="col-span-12 grid grid-cols-12 gap-x-8">
                @forelse ($newRelease as $artikel)
                    <x-card :judul="$artikel->judul" :kategori="$artikel->kategori->nama" :slug="$artikel->slug"></x-card>
                @empty
                    <p>No Data available ... </p>
                @endforelse
            </div>
        </div>
        <div class="flex flex-col col-span-12 space-y-4">
            <div class="flex flex-row justify-between items-end">
                <h2 class="font-bold text-2xl">Hayuk Sinau</h2>
                <a href="{{ route('trending') }}">More...</a>
            </div>
            <span class="w-full h-px bg-base-content"></span>
            <div class="col-span-12 grid grid-cols-12 gap-x-8">
                @forelse ($hayukSinau as $artikel)
                    <x-card :judul="$artikel->judul" :kategori="$artikel->kategori->nama" :slug="$artikel->slug"></x-card>
                @empty
                    <p>No Data available ... </p>
                @endforelse
            </div>
        </div>
        <div class="flex flex-col col-span-12 space-y-4">
            <div class="flex flex-row justify-between items-end">
                <h2 class="font-bold text-2xl">Explorience Dishes</h2>
                <a href="{{ route('trending') }}">More...</a>
            </div>
            <span class="w-full h-px bg-base-content"></span>
            <div class="col-span-12 grid grid-cols-12 gap-x-8">
                @forelse ($dishes as $artikel)
                    <x-card :judul="$artikel->judul" :kategori="$artikel->kategori->nama" :slug="$artikel->slug"></x-card>
                @empty
                    <p>No Data available ... </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
