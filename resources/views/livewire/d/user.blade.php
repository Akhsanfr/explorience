<x-dashboard>
    <div class="card w-full bg-base-200 p-4 col-span-12">Daftar User Explorience</div>
    <div class="card col-span-12 bg-base-200 p-4 ">
        <table class="table table-zebra table-compact">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->nama}}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary flex flex-row"
                                wire:click="open_modal({{ $user->id }})"
                            >
                                @forelse ($user->roles->sortBy('nama') as $role)
                                    {{ $role->nama }} {{ $loop->last ? '' : '|' }}
                                @empty
                                    No Role
                                @endforelse
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        No data available !
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- Modal  --}}

    <x-modal>
        <x-slot name="judul">
            Pilih role untuk {{ $data_modal->nama ?? ''}}
        </x-slot>

        <ul class="flex flex-col space-y-4">
            @foreach ($roles->sortBy('nama') as $role)
                <li class="flex flex-row items-center justify-between">
                    <span>
                        {{ $role->nama }}
                    </span>
                    <span>
                        <input type="checkbox"
                        @if (!is_null($data_modal))
                            {{$data_modal->roles->pluck('nama')->contains($role->nama) ? 'checked' : '' }}
                        @endif
                        wire:click="pilih_role({{ $role->id }})"
                        class="checkbox">
                    </span>
                </li>

            @endforeach
        </ul>
    </x-modal>
</x-dashboard>
