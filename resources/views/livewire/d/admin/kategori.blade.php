<x-dashboard>
    <div class="card col-span-12">
        <h1>Kategori Artikel</h1>
    </div>
    <div class="card col-span-12">
        <button class="btn btn-primary btn-sm w-min whitespace-nowrap" wire:click="open_modal">Tambah Kategori</button>
        <table class="table table-compact table-zebra">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nama - EN</th>
                    <th>Thumbnail</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategoris as $kategori)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kategori->nama }}</td>
                        <td>{{ $kategori->nama_en }}</td>
                        <td><img
                            src="{{ asset($kategori->thumbnail) }}" class="h-5 cursor-pointer"
                            alt="img"
                            @click="imgShow = true; imgSrc = '{{ asset($kategori->thumbnail) }}'; imgTitle = 'Show thumbnail'"
                            ></td>
                        <td><button class="btn btn-sm btn-primary" wire:click="open_modal({{ $kategori->id }})">Edit</button></td>
                    </tr>
                @empty
                    <tr>
                        No Data Available !
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>
    <x-modal>
        <x-slot name="judul">
            Tambah data kategori
        </x-slot>

        <form wire:submit.prevent="save_modal">
            <div class="form-control">
                <label class="label">
                <span class="label-text">Nama Kategori</span>
                </label>
                <input type="text" class="input input-sm input-bordered" wire:model="data_modal.nama">
                <small class="text-error">@error('data_modal.nama'){{$message}}@enderror</small>
            </div>
            <div class="form-control">
                <label class="label">
                <span class="label-text">Nama Kategori - EN</span>
                </label>
                <input type="text" class="input input-sm input-bordered" wire:model="data_modal.nama_en">
                <small class="text-error">@error('data_modal.nama_en'){{$message}}@enderror</small>
            </div>
            <div class="form-control">
                <label class="label">
                <span class="label-text">Deskripsi</span>
                </label>
                <textarea class="textarea textarea-bordered h-8" wire:model="data_modal.desc"></textarea>
                <small class="text-error">@error('data_modal.desc'){{$message}}@enderror</small>
            </div>
            <div class="form-control">
                <label class="label">
                <span class="label-text">Deskripsi - EN</span>
                </label>
                <textarea class="textarea textarea-bordered h-8" wire:model="data_modal.desc_en"></textarea>
                <small class="text-error">@error('data_modal.desc_en'){{$message}}@enderror</small>
            </div>
            <div class="form-control">
                <label class="label">
                <span class="label-text">Nama Kategori - EN</span>
                </label>
                <input type="file" class="input input-sm input-bordered" wire:model="thumbnail">
                <small class="text-error">@error('thumbnail'){{$message}}@enderror</small>
            </div>
            <button class="btn btn-primary w-96 mt-8">Submit</button>
        </form>


    </x-modal>

</x-dashboard>
