<div class="grid grid-cols-12 gap-8 p-8 container mx-auto">
    <div class="col-span-4 pt-96">
        <div class="sticky top-24 flex flex-col items-start w-4/5">
            <span class="text-xl font-bold">{{ $artikel->kategori->nama }}</span>
            <span class="text-l">{{ $artikel->kategori->desc }}</span>
            <button class="btn btn-primary btn-sm mt-2">Follow</button>
            <span class="h-px w-full bg-secondary rounded mt-4"></span>
            <div class="mt-2 flex space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer text-primary" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                </svg>
            </div>
            @can('creator', $artikel->slug)
                <div class="mt-8">
                    <button wire:click="edit({{ $artikel->id }})" class="btn btn-primary btn-xs">Edit artikel ini</button>
                </div>
            @endcan
            @can('supervisor', $artikel->slug)
                <div class="mt-8">
                    <button wire:click="verif" class="btn btn-primary btn-xs">{{ $artikel->is_active ? 'Unverifikasi' : 'Verifikasi' }}</button>
                </div>
                <div class="mt-4">
                    <a href="{{ route('d.artikel.supervisor') }}" class="btn btn-secondary btn-xs">Daftar Artikel</a>
                </div>
            @endcan
        </div>
    </div>
    {{-- Main Content --}}
    <div class="col-span-8">
        <h1 class="text-3xl font-bold text-base-content capitalize">{{ $artikel->judul }}</h1>
        {{-- Kotak info --}}
        <div class="flex items-center">
            <img src="{{ $artikel->writer->avatar }}" alt="" class="rounded-full h-16 w-16">
            <div class="mr-auto flex flex-col leading-4 ml-4">
                <b>{{ $artikel->writer->nama }}</b>
                <span>{{ $artikel->updated_at }}</span>
            </div>
            <div class="flex space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z" /></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z" /></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z" /></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z" /></svg>
            </div>
        </div>
        <article class="prose text-base-content mt-8">
            <img src="https://picsum.photos/seed/picsum/300/200" alt="" class="">
            {!! $artikel->isi !!}
        </article>
        <div class="form-control mt-8">
            <label class="label">
              <span class="label-text">Tinggalkan Komenter</span>
            </label>
            <input type="text" placeholder="username" class="input input-bordered input-primary">
        </div>
    </div>
    <div class="col-span-12 grid grid-cols-12 gap-x-8">
        <div class="card col-span-4 bg-base-200">
            <figure class="h-36 overflow-hidden">
                <img src="https://picsum.photos/seed/picsum/300/200" alt="" class="">
            </figure>
            <div class="card-body p-4">
                <h2 class="truncate font-bold">Ekonomi di Sepanjang Jalan Bintaro di Masa Pandemi</h2>
                <span>Ekonomi</span>
            </div>
        </div>
        <div class="card col-span-4 bg-base-200">
            <figure class="h-36 overflow-hidden">
                <img src="https://picsum.photos/seed/picsum/300/200" alt="" class="">
            </figure>
            <div class="card-body p-4">
                <h2 class="truncate font-bold">Fakta Seru tentang Relativitas yang Perlu Kamu Ketahui</h2>
                <span>Fisika</span>
            </div>
        </div>
        <div class="card col-span-4 bg-base-200">
            <figure class="h-36 overflow-hidden">
                <img src="https://picsum.photos/seed/picsum/300/200" alt="" class="">
            </figure>
            <div class="card-body p-4">
                <h2 class="truncate font-bold">What if what-what how money Can Buy</h2>
                <span>Bahasa Inggris</span>
            </div>
        </div>
    </div>
</div>
