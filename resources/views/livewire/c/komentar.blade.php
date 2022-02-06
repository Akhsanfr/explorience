@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('cKomentar', () => ({
                setPulse(targetId){
                    const target = document.getElementById(targetId);
                    target.classList.add('border-secondary');
                    target.classList.remove('border-primary');
                    setTimeout(() => {
                        target.classList.add('border-primary')
                        target.classList.remove('border-secondary')
                    }, 500);
                },
                isLogin : {{ $auth_user_id ? 'true' : 'false' }}
            }))
        })
    </script>
@endpush
<section x-data="cKomentar">
    <div class="form-control mt-8">
        <label class="label">
            <span class="label-text">Tinggalkan Komentar</span>
        </label>
        <div class="flex space-x-2">
            <input
                wire:model.defer="komentar.isi"
                @focus="!isLogin && alert('Silakan Anda login terlebih dahulu!')"
                type="text" placeholder="comment..." class="w-full input input-primary input-bordered">
            <button
                @click="isLogin ? $wire.storeKomentar : alert('Silakan Anda login terlebih dahulu!')"
                class="btn btn-primary" >Post</button>
        </div>
    </div>
    <div class="space-y-4 mt-8" x-data="{ reply : 0 }" @close-form-child-komentar.window="reply = 0">
        @forelse ($komentars as $komentar_parent)
            @if ($komentar_parent->parent_id === null)
                <div>
                    <div
                        id="komentar-{{ $komentar_parent->id }}"
                        class="flex items-center rounded-xl p-2 space-x-2 transition duration-500 border border-primary"
                        >
                        <div class='rounded-full h-10 w-10 overflow-hidden'>
                            <img src='{{$komentar_parent->user->avatar}}' alt='avatar'>
                        </div>
                        <div class='flex flex-col flex-grow'>
                            <div>
                                <strong class='text-lg'>{{$komentar_parent->user->nama}}</strong>
                            </div>
                            <p>{{ $komentar_parent->isi }}</p>
                            <div class='flex space-x-4 text-xs'>
                                <span>{{ $komentar_parent->created_at->translatedFormat('D, d M Y') }}</span>
                                <span>{{$komentar_parent->likes_count}} like</span>
                                <span class='cursor-pointer hover:text-secondary' @click="isLogin ? reply = {{ $komentar_parent->id}} : alert('Silakan Anda login terlebih dahulu')">Reply</span>
                            </div>
                        </div>
                        <svg
                            @click=" isLogin ? $wire.likes({{ $komentar_parent->id }}) : alert('Silakan Anda login terlebih dahulu') "
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 cursor-pointer {{ $komentar_parent->likes->contains(function ($value) use ($auth_user_id) { return $value->id === $auth_user_id ; }) ? 'text-secondary' : '' }}"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div x-show="reply === {{ $komentar_parent->id}} ">
                        <label class="text-sm">
                            <span>Balas Komentar </span>
                            <span class="text-secondary">@ {{ $komentar_parent->user->nama }}</span>
                        </label>
                        <div class='flex space-x-2 '>
                            <div class="flex-grow">
                                <input
                                    type='text'
                                    wire:model.defer="child_komentar.isi"
                                    wire:keydown.enter="storeChildKomentar({{ $komentar_parent->id }}, {{ $komentar_parent->id }})"
                                    placeholder='comment...' class="w-full input input-bordered @error('child_komentar.isi') input-error @else input-primary @enderror">
                                @error('child_komentar.isi') <small class="text-error">{{ $message }}</small> @enderror
                            </div>
                            <button
                                wire:click="storeChildKomentar({{ $komentar_parent->id }}, {{ $komentar_parent->id}})"
                                class='btn btn-primary' >Post</button>
                        </div>
                    </div>
                </div>
                @foreach ($komentars as $komentar_child )
                    @if($komentar_child->parent_id === $komentar_parent->id)
                    <div class="ml-8">
                        <div id="komentar-{{ $komentar_child->id }}" class="flex items-center rounded-xl p-2 space-x-2 transition duration-500 border border-primary">
                            <div class='rounded-full h-10 w-10 overflow-hidden'>
                                <img src='{{$komentar_child->user->avatar}}' alt='avatar'>
                            </div>
                            <div class='flex flex-col flex-grow'>
                                <div>
                                    <strong class='text-lg'>{{$komentar_child->user->nama}}</strong>
                                    <span class="text-secondary cursor-pointer" @click="setPulse(`komentar-{{ $komentar_child->parent->id }}`)">{{'@'}}{{ $komentar_child->parent->user->nama }}</span>
                                </div>
                                <p>{{ $komentar_child->isi }}</p>
                                <div class='flex space-x-4 text-xs'>
                                    <span>{{ $komentar_child->created_at->translatedFormat('D, d M Y') }}</span>
                                    <span>{{$komentar_child->likes_count}} like</span>
                                    <span class='cursor-pointer hover:text-secondary' @click="isLogin ? reply = {{ $komentar_child->id}} : alert('Silakan Anda login terlebih dahulu')">Reply</span>
                                </div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                @click=" isLogin ? $wire.likes({{ $komentar_child->id }}) : alert('Silakan Anda login terlebih dahulu') "
                                class="h-5 w-5 cursor-pointer {{ $komentar_child->likes->contains(function ($value) use ($auth_user_id) { return $value->id === $auth_user_id ; }) ? 'text-secondary' : '' }}"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div x-show="reply === {{ $komentar_child->id}} ">
                            <label class="text-sm">
                                <span>Balas Komentar</span>
                                <span class="text-secondary">{{ $komentar_child->user->nama }}</span>
                            </label>
                            <div class='flex space-x-2 '>
                                <div class="flex-grow">
                                    <input type='text'
                                        wire:model.defer="child_komentar.isi"
                                        wire:keydown.enter="storeChildKomentar({{ $komentar_parent->id }}, {{ $komentar_child->id }})"
                                        placeholder='comment...' class="w-full input input-bordered @error('child_komentar.isi') input-error @else input-primary @enderror">
                                    @error('child_komentar.isi') <small class="text-error">{{ $message }}</small> @enderror
                                </div>
                                <button
                                    wire:click="storeChildKomentar({{ $komentar_parent->id }}, {{ $komentar_child->id}})"
                                    class='btn btn-primary' >Post</button>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            @endif
        @empty
            No komentar yet
        @endforelse
    </div>
</section>
