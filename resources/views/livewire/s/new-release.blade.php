<div class="grid grid-cols-12 gap-8 p-8">
    @forelse ($artikels as $artikel)
        <x-card :judul="$artikel->judul" :kategori="$artikel->kategori->nama" :slug="$artikel->slug"></x-card>
    @empty
        No Data available...
    @endforelse
</div>
