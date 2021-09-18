<x-dashboard>
    <div class="col-span-12 card">
        <h1>Artikel</h1>
    </div>
    <div class="col-span-12 card">
        <a href="{{ route('d.artikel.writer.create') }}" class="btn btn-primary btn-sm">Tulis artikel baru</a>
        <table class="table table-compact table-zebra">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($artikels as $artikel)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $artikel->judul }}</td>
                        <td>{{ $artikel->kategori->nama }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('artikel', ['slug' => $artikel->slug]) }}" class="btn btn-sm btn-primary">View</a>
                                <a wire:click="edit({{ $artikel->id }})" class="btn btn-sm btn-secondary">Edit</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>No data available!</tr>
                @endforelse
            </tbody>

        </table>
    </div>
</x-dashboard>
