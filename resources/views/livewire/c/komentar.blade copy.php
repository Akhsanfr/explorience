@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('cKomentar', () => ({
                openReply(parentId, userTagId = null){
                    const target = document.getElementById(`komentar-${parentId}`)
                    const oldReply = document.getElementById('reply')
                    console.log(oldReply);
                    if(oldReply !== null){
                        oldReply.parentElement.removeChild(oldReply);
                    }
                    const html = `
                        <label class="text-sm">
                            <span>Balas Komentar</span>
                            <span class="text-secondary">@Usertagname</span>
                        </label>
                        <div class='flex space-x-2' x-data="{ isi : '' }">
                            <input type="hidden" wire:model.defer="child_komentar.parent_id" value="${parentId}"/>
                            <input type="hidden" wire:model.defer="child_komentar.user_tag_id" value="${userTagId}"/>
                            <input type='text' wire.model.defer="child_komentar.isi" placeholder='comment...' class='w-full input input-bordered'>
                            @error('child_komentar.isi') <span class="error">{{ $message }}</span> @enderror
                            <button @click="$wire.storeChildKomentar" class='btn btn-primary' >Post</button>
                        </div>
                    `;

                    const reply = document.createElement('div');
                    reply.setAttribute('id', 'reply');
                    reply.innerHTML = html;
                    target.appendChild(reply);
                }
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
            <input wire:model.defer="komentar.isi" type="text" placeholder="comment..." class="w-full input input-primary input-bordered">
            <button wire:click="storeKomentar" wire:keydown.enter="storeKomentar" class="btn btn-primary" >Post</button>
        </div>
    </div>
    <div class="space-y-4 mt-8">
        @forelse ($komentars as $komentar_parent)
            @if ($komentar_parent->parent_id === null)
                <div id="komentar-{{ $komentar_parent->id }}">
                    <div class="flex items-center rounded-xl border p-2 space-x-2">
                        <div class='rounded-full h-10 w-10 overflow-hidden'>
                            <img src='{{$komentar_parent->user->avatar}}' alt='avatar'>
                        </div>
                        <div class='flex flex-col flex-grow'>
                            <div>
                                <strong class='text-lg'>{{$komentar_parent->user->nama}}</strong>
                                <span class="text-secondary">${userTagNama ? ('@'+ userTagNama) : ''}</span>
                            </div>
                            <p>{{ $komentar_parent->isi }}</p>
                            <div class='flex space-x-4 text-xs'>
                                <span>${date}</span>
                                <span>${likes} like</span>
                                <span class='cursor-pointer' @click="openReply({{ $komentar_parent->id }}, {{ $komentar_parent->user_id }})">Reply</span>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                @foreach ($komentars as $komentar_child )
                    @if($komentar_child->parent_id === $komentar_parent->id)
                    <div id="komentar-{{ $komentar_child->id }}" class="ml-8">
                        <div class="flex items-center rounded-xl border p-2 space-x-2">
                            <div class='rounded-full h-10 w-10 overflow-hidden'>
                                <img src='{{$komentar_child->user->avatar}}' alt='avatar'>
                            </div>
                            <div class='flex flex-col flex-grow'>
                                <div>
                                    <strong class='text-lg'>{{$komentar_child->user->nama}}</strong>
                                    <span class="text-secondary">${userTagNama ? ('@'+ userTagNama) : ''}</span>
                                </div>
                                <p>{{ $komentar_child->isi }}</p>
                                <div class='flex space-x-4 text-xs'>
                                    <span>${date}</span>
                                    <span>${likes} like</span>
                                    <span class='cursor-pointer' @click="openReply({{ $komentar_child->id }}, {{ $komentar_child->user_id }} )">Reply</span>
                                </div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                            </svg>
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
