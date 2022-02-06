@push('head')
    <meta name="description" content="{{ $artikel->desc }}" />
@endpush
@push('script')
<script>
    // document.addEventListener('alpine:init', () => {
    //     Alpine.data('artikel', () => ({
    //         isLogin : '{{ Auth::id() }}',
    //         komentar : '',
    //         komentarChild : '',
    //         parentId : 0,
    //         userTagId : 0,
    //         userTagNama : '',
    //         addKomentar(){
    //             if(this.komentar == ''){
    //                 alert('Isi komentar terlebih dahulu')
    //             } else if (this.isLogin  == null){
    //                 alert('Silakan Anda login terlebih dahulu')
    //             } else {
    //                 res = this.$wire.addKomentar(0, this.komentar, this.userTagId);
    //                 res.then(e => alert(e));
    //                 this.setUIKomentar();
    //                 this.userTagId = 0;
    //                 this.komentar = '';
    //             }
    //         },
    //         addKomentarChild(){
    //             if(this.komentarChild == ''){
    //                 alert('Isi komentar terlebih dahulu')
    //             } else if (this.isLogin  == null){
    //                 alert('Silakan Anda login terlebih dahulu')
    //             } else {
    //                 res = this.$wire.addKomentar(this.parentId, this.komentarChild, this.userTagId);
    //                 res.then(e => alert(e));
    //                 this.setUIKomentar();
    //                 this.userTagId = 0;
    //             }
    //         },
    //         openKomentarChild(el, parentId, userTagId, userTagNama, isReplyChild = false){

    //             // console.log(parentId);
    //             // clear form before
    //             formBefore = document.getElementById('komentar-child');
    //             if(formBefore != null){
    //                 parent.removeChild(formBefore);
    //             }
    //             // end clear form before
    //             this.komentarChild = '';
    //             this.parentId = parentId;
    //             this.userTagId = userTagId;
    //             this.userTagNama = userTagNama;
    //             html =
    //             `
    //                 <label class="text-sm">
    //                     <span>Balas Komentar</span>
    //                     <span class="text-secondary">@${this.userTagNama}</span>
    //                 </label>
    //                 <div class='flex space-x-2'>
    //                     <input type='text' placeholder='comment...' class='w-full input input-bordered' x-model='komentarChild'>
    //                     <button class='btn btn-primary' @click='addKomentarChild()'>Post</button>
    //                 </div>
    //             `;
    //             parent = el.parentNode.parentNode.parentNode.parentNode;
    //             sibling = el.parentNode.parentNode.parentNode.nextSibling;
    //             div = document.createElement('div');
    //             div.setAttribute('id', 'komentar-child');
    //             if(isReplyChild){
    //                 div.setAttribute('class', 'ml-8');
    //             }
    //             div.innerHTML = html;
    //             parent.insertBefore(div, sibling);
    //         },
    //         async setUIKomentar(){
    //             likes = await this.$wire.getLikesKomentar();
    //             likes = JSON.parse(likes);
    //             console.log(likes);
    //             let html = ``;
    //             let komentars = await this.$wire.getKomentar();
    //             komentars = JSON.parse(komentars);
    //             komentars.forEach(e => {
    //                 if( e.parent_id == 0 ){
    //                     date = new Date(e.updated_at);
    //                     date = `${date.getDate()} - ${date.getMonth() + 1} - ${date.getFullYear()}`;
    //                     html += this.UIKomentar(e.id, e.id, e.avatar, e.user, e.isi, date, e.likes, e.user_id, '', false);
    //                 }
    //                 // Child
    //                 komentars.forEach(i => {
    //                     if(i.parent_id == e.id){
    //                         date = new Date(e.updated_at);
    //                         date = `${date.getDate()} - ${date.getMonth() + 1} - ${date.getFullYear()}`;
    //                         html += this.UIKomentar(i.id, e.id, i.avatar, i.user, i.isi, date, i.likes, i.user_id, i.userTagNama, true)
    //                     }
    //                 })
    //             });
    //             t = document.getElementById('komentar');
    //             t.innerHTML = html;
    //         },
    //         UIKomentar(id, parentId, avatar, user, isi, date, likes, user_id, userTagNama, isChild){
    //             return `
    //                 <div class='flex items-center rounded-xl border p-2 space-x-2 ${!isChild || 'ml-8'}'>
    //                     <div class='rounded-full h-10 w-10 overflow-hidden'>
    //                         <img src='${avatar}' alt='avatar'>
    //                     </div>
    //                     <div class='flex flex-col flex-grow'>
    //                         <div>
    //                             <strong class='text-lg'>${user}</strong>
    //                             <span class="text-secondary">${userTagNama ? ('@'+ userTagNama) : ''}</span>
    //                         </div>
    //                         <p>${isi}</p>
    //                         <div class='flex space-x-4 text-xs'>
    //                             <span>${date}</span>
    //                             <span>${likes} like</span>
    //                             <span class='cursor-pointer' @click="openKomentarChild($event.target, ${parentId}, ${user_id}, '${user}', ${isChild})">Reply</span>
    //                         </div>
    //                     </div>
    //                     <svg @click="likesKomentar(${id})" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
    //                         <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
    //                     </svg>
    //                 </div>
    //             `
    //         },
    //         likesKomentar(komentarId){
    //             res = this.$wire.likesKomentar(komentarId);
    //             res.then(e => JSON.parse(e));
    //             res.then(e => alert(e))
    //             this.setUIKomentar();
    //         },
    //         init(){
    //             this.setUIKomentar();
    //         }
    //     }))
    // })
</script>
@endpush

<div class="grid grid-cols-12 gap-8 p-8 container mx-auto">
    <div class="col-span-4 pt-96">
        <div class="sticky top-24 flex flex-col items-start w-4/5">
            <span class="text-xl font-bold">{{ $artikel->kategori->nama }}</span>
            <span class="text-l">{{ $artikel->kategori->desc }}</span>
            <button class="btn btn-primary btn-sm mt-2">Follow</button>
            <span class="h-px w-full bg-secondary rounded mt-4"></span>
            <div class="mt-2 flex space-x-2">
                {{-- @set-color-likes.window="warna = event.detail.val" --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" :class="warna" viewBox="0 0 20 20" fill="currentColor"
                    x-data="{
                                warna : '',
                                setLikes(){
                                    $wire.likes().then(r =>  {
                                        r = JSON.parse(r);
                                        if(r.status === 'OK'){
                                            alert(`Sukses merubah data`)
                                            this.warna = r.warna
                                        } else {
                                            alert(`Gagal, ${r.message}`)
                                        }
                                    })
                                }
                            }"
                    x-init="warna = await $wire.setColorLikes()"
                    @click="setLikes()"
                    >
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                </svg>
            </div>
            @can('team')
                <div class="flex flex-col space-y-2 mt-2">
                    {!! $artikel->status_aktivasi === "aktif" ? "<span class='badge badge-success'>Aktif</span>" : ($artikel->status_aktivasi === "tidak aktif" ? "<span class='badge badge-warning'>Tidak aktif</span>": "<span class='badge badge-error'>Ditolak</span>") !!}
                    <a href="{{ route('d.artikel') }}" class="btn btn-primary btn-xs">Daftar Artikel</a>
                    @can('creator', $artikel->slug)
                        <a href="{{ route('d.writer.artikel.editor', ["id" => $artikel->id]) }}" class="btn btn-primary btn-xs">Edit artikel ini</a>
                    @endcan
                    @can('supervisor', $artikel->slug)
                        <button wire:click="verif" class="btn btn-primary btn-xs">{{ $artikel->is_active ? 'Unverifikasi' : 'Verifikasi' }}</button>
                    @endcan
                </div>
            @endcan
        </div>
    </div>
    {{-- Main Content --}}
    <div class="col-span-8">
        <h1 class="text-3xl font-bold text-base-content capitalize">{{ $artikel->judul }}</h1>
        {{-- Kotak info --}}
        <div class="flex items-center">
            <img src="{{ $artikel->writer->avatar }}" alt="" class="rounded-full h-16 w-16">
            <div class="mr-auto flex flex-col leading-4 ml-4">
                <b>{{ $artikel->writer->nama }}</b>
                <span>Dibuat pada {{ $artikel->created_at->translatedFormat('l, d F Y') }}</span>
                <span>Diperbarui pada {{ $artikel->updated_at->translatedFormat('l, d F Y') }}</span>
            </div>
            <div class="flex space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z" /></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z" /></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z" /></svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z" /></svg>
            </div>
        </div>
        <article class="prose text-base-content mt-8">
            <img src="{{ asset("storage/".$artikel->gambar) }}" alt="" class="">
            {!! $artikel->isi !!}
        </article>
        {{-- KOMENTAR --}}
            <livewire:c.komentar :artikelId="$artikel->id" :auth_user_id="$auth_user_id" />
        {{-- END KOMENTAR --}}
    </div>
    <div class="col-span-12 grid grid-cols-12 gap-x-8">
        <div class="card col-span-4 bg-base-200">
            <figure class="h-36 overflow-hidden">
                <img src="https://picsum.photos/seed/picsum/300/200" alt="" class="">
            </figure>
            <div class="card-body p-4">
                <h2 class="truncate font-bold">Ekonomi di Sepanjang Jalan Bintaro di Masa Pandemi</h2>
                <span>Ekonomi</span>
            </div>
        </div>
        <div class="card col-span-4 bg-base-200">
            <figure class="h-36 overflow-hidden">
                <img src="https://picsum.photos/seed/picsum/300/200" alt="" class="">
            </figure>
            <div class="card-body p-4">
                <h2 class="truncate font-bold">Fakta Seru tentang Relativitas yang Perlu Kamu Ketahui</h2>
                <span>Fisika</span>
            </div>
        </div>
        <div class="card col-span-4 bg-base-200">
            <figure class="h-36 overflow-hidden">
                <img src="https://picsum.photos/seed/picsum/300/200" alt="" class="">
            </figure>
            <div class="card-body p-4">
                <h2 class="truncate font-bold">What if what-what how money Can Buy</h2>
                <span>Bahasa Inggris</span>
            </div>
        </div>
    </div>
</div>
