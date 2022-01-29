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
                    </tr>
                @empty
                    <tr>No data available!</tr>
                @endforelse
            </tbody>

        </table>
        {{ $artikels->links() }}
    </div>
</x-dashboard>
