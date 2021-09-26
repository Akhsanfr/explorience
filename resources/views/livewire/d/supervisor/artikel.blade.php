<x-dashboard>
    <div class="col-span-12 card">
        <h1>Daftar Semua Artikel</h1>
    </div>
    <div class="col-span-12 card">
        <table class="table table-compact table-zebra">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Verifikator</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($artikels as $artikel)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $artikel->judul }}</td>
                        <td>{{ $artikel->kategori->nama }}</td>
                        <td>{{ $artikel->writer->nama }}</td>
                        <td>{{ $artikel->supervisor->nama ?? 'Belum terverifikasi' }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('artikel', ['slug' => $artikel->slug]) }}">View</a>
                        </td>
                    </tr>
                @empty
                    <tr><td>No data available!</td></tr>
                @endforelse
            </tbody>

        </table>
    </div>
</x-dashboard>
