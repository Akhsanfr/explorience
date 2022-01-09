<a class="card col-span-3 bg-base-200" href="{{ route('artikel', ['slug' => $slug]) }}">
    <figure class="h-24 overflow-hidden">
        <img src="https://picsum.photos/seed/picsum/300/200" alt="" class="">
    </figure>
    <div class="card-body p-4">
        <h2 class="truncate font-bold">{{ $judul }}</h2>
        <span>{{ $kategori }}</span>
    </div>
</a>
