<div class="grid grid-cols-3 gap-8 p-8">
    @foreach ($kategoris as $kategori)
        <div class="rounded-xl overflow-hidden">
            <a href="{{ route('exploreByKategori', ['nama' => $kategori->nama]) }}">
                <img src="{{ asset("kategori/".$kategori->thumbnail) }}" alt="thumb">
            </a>
        </div>
    @endforeach
</div>
