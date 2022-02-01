<x-dashboard>
    @can('supervisor')
        <div class="alert alert-error col-span-12">
            <div class="flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                </svg>
                <label>Verifikasi artikel dapat dilakukan pada halaman view artikel</label>
            </div>
        </div>
    @endcan
    <div class="col-span-12 card">
        @can('writer')
            <h1>Artikel written by {{ Auth::user()->nama }}</h1>
            @else
            <h1> Daftar artikel</h1>
        @endcan
    </div>
    <div class="col-span-12 card space-y-4">
        @can('writer')
            <a href="{{ route('d.writer.artikel.editor', ["id" => "new"]) }}" class="btn btn-primary btn-sm w-min whitespace-nowrap">Tulis artikel baru</a>
        @endcan
        <table class="table table-compact table-zebra">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    @cannot('writer')
                        <th>Writer</th>
                    @endcannot
                    <th>Supervisor</th>
                    <th>Tanggal Create</th>
                    <th>Tanggal Edit</th>
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
                        @cannot('writer')
                            <td>{{ $artikel->writer->nama}}</td>
                        @endcannot
                        <td>{{ $artikel->supervisor->nama ?? "Belum ada supervisor"}}</td>
                        <td>{{ Carbon\Carbon::parse($artikel->created_at)->format('Y-m-d H:i:s') }}</td>
                        <td>{{ Carbon\Carbon::parse($artikel->updated_at)->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('artikel', ['slug' => $artikel->slug]) }}" class="btn btn-sm btn-primary">View</a>
                                {{-- Writer hanya dapat mengedit ketika "status_aktivasi" bernilai aktif --}}
                                @can('writer')
                                    <a href="{{ route('d.writer.artikel.editor', ['id' => $artikel->id ]) }}" class="btn btn-sm {{$artikel->status_aktivasi === 'aktif' ? 'btn-disabled' : 'btn-primary '}}">Edit</a>
                                @endcan
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
