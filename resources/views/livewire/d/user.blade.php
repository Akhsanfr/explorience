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
    {{-- Modal --}}
    <div class="fixed top-0 left-0 bg-base-300 bg-opacity-80 w-screen h-screen z-50 flex flex-col justify-center items-center"
        x-show="$wire.user_modal"
    >
    <div class="space-y-4">
        <div class="card p-4 bg-base-100 flex flex-row items-center space-x-2">
            <span>Pilih Role {{ $user_modal->nama ?? ''}}</span>
            <button class="btn btn-xs btn-error" wire:click="close_modal">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <div class="card p-4 bg-base-100">
            <ul class="flex flex-col space-y-4">
                @foreach ($roles->sortBy('nama') as $role)
                    <li class="flex flex-row items-center justify-between">
                        <span>
                            {{ $role->nama }}
                        </span>
                        <span>
                            <input type="checkbox"
                            @if (!is_null($user_modal))
                                {{$user_modal->roles->pluck('nama')->contains($role->nama) ? 'checked' : '' }}
                            @endif
                            wire:click="pilih_role({{ $role->id }})"
                            class="checkbox">
                        </span>
                    </li>

                @endforeach
            </ul>
        </div>
    </div>
    </div>
</x-dashboard>
