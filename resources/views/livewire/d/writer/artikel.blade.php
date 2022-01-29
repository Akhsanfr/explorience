<x-dashboard>
    <div class="col-span-12 card">
        <h1>Artikel written by {{ Auth::user()->nama }}</h1>
    </div>
    <div class="col-span-12 card">
        <a href="{{ route('d.writer.artikel.editor', ["id" => "new"]) }}" class="btn btn-primary btn-sm w-min whitespace-nowrap">Tulis artikel baru</a>
        <table class="table table-compact table-zebra">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($artikels as $artikel)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $artikel->judul }}</td>
                        <td>{{ $artikel->kategori->nama }}</td>
                        <td>{!! $artikel->status_aktivasi === "aktif" ? "<span class='badge badge-success'>Aktif</span>" : ($artikel->status_aktivasi === "tidak aktif" ? "<span class='badge badge-warning'>Tidak aktif</span>": "<span class='badge badge-error'>Ditolak</span>") !!}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('artikel', ['slug' => $artikel->slug]) }}" class="btn btn-sm btn-primary">View</a>
                                {{-- Writer hanya dapat mengedit ketika "status_aktivasi" bernilai aktif --}}
                                {{-- <a wire:click="edit({{ $artikel->id }})" class="btn btn-sm {{$artikel->status_aktivasi === 'aktif' ? 'btn-disabled' : 'btn-secondary '}}">Edit</a> --}}
                                <a href="{{ route('d.writer.artikel.editor', ['id' => $artikel->id ]) }}" class="btn btn-sm {{$artikel->status_aktivasi === 'aktif' ? 'btn-disabled' : 'btn-secondary '}}">Edit</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>No data available!</tr>
                @endforelse
            </tbody>

        </table>
        {{ $artikels->onEachSide(1)->links('pagination::tailwind') }}
    </div>
</x-dashboard>
