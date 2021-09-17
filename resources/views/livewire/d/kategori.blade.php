<x-dashboard>
    <div class="card col-span-12">
        <h1>Kategori Artikel</h1>
    </div>
    <div>
        <button class="btn btn-primary whitespace-nowrap" wire:click="open_modal">Tambah Kategori</button>
    </div>
    <div class="card col-span-12">
        <table class="table table-compact table-zebra">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nama - EN</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategoris as $kategori)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kategori->nama }}</td>
                        <td>{{ $kategori->nama_en }}</td>
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
        <button class="btn btn-primary w-96 mt-8" wire:click="save_modal">Submit</button>

    </x-modal>

</x-dashboard>
