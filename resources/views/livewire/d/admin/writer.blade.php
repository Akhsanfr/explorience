<x-dashboard>
    <div class="col-span-12 card bg-base-200">
        <h1>Daftar Writer</h1>
    </div>
    <div class="col-span-12 card bg-base-200">
        <table class="table table-zebra table-compact">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kategori</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($writers as $writer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $writer->nama}}</td>
                        <td>{{ $writer->email }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary flex flex-row"
                                wire:click="open_modal({{ $writer->id }})"
                            >
                                @forelse ($writer->kategoris->sortBy('nama') as $kategori)
                                <span class="{{ $kategori->pivot->is_active ? 'text-success' : 'text-error' }}">
                                    {{ $kategori->nama }}
                                </span>
                                    {!! $loop->last ? '' : '&nbsp|&nbsp' !!}
                                @empty
                                    Tidak memiliki kategori
                                @endforelse
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            No data available !
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- Modal  --}}

    <x-modal>
        <x-slot name="judul">
            Pilih kategori untuk {{ $data_modal->nama ?? ''}}
        </x-slot>

        <ul class="flex flex-col space-y-4">
            @foreach ($kategoris->sortBy('nama') as $kategori)
                <li class="flex flex-row items-center space-x-4">
                    <span class="flex-grow">
                        {{ $kategori->nama }}
                    </span>
                    <span>
                        <input type="checkbox"
                        @if (!is_null($data_modal))
                            {{$data_modal->kategoris->pluck('nama')->contains($kategori->nama) ? 'checked' : '' }}
                        @endif
                        wire:click="pilih_kategori({{ $kategori->id }})"
                        class="checkbox checkbox-secondary">
                    </span>
                    <span>
                        <input type="checkbox"
                        @if (!is_null($data_modal))
                            {{$data_modal->kategoris_aktif->pluck('nama')->contains($kategori->nama) ? 'checked' : '' }}
                        @endif
                        wire:click="pilih_status({{ $kategori->id }})"
                        class="toggle toggle-primary">
                    </span>
                </li>

            @endforeach
        </ul>
    </x-modal>
</x-dashboard>
