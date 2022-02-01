@push('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush
@push('script')
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script>
            var quill = new Quill('#editor', {
                theme: 'snow'
            });
            quill.on('text-change', function(){
                const editorValue = document.querySelector('#editor .ql-editor').innerHTML;
                document.getElementById('target').value = editorValue
            });
            document.addEventListener('alpine:init', () => {
                Alpine.data('editor', () =>  ({
                    urlPrevImg : "{{ $artikel ? asset('storage/'.$artikel->gambar) : "" }}",
                    prevImg(event){
                        console.log(event.target.files[0]);
                        this.urlPrevImg = URL.createObjectURL(event.target.files[0])
                    },
                }))
            })
        </script>
@endpush

<x-dashboard>
    <div class="col-span-12 card">
        <h1>{{ $artikel ? "Edit artikel berjudul $artikel->judul" : 'Buat artikel baru'}}</h1>
    </div>

    <div class="card col-span-12" x-data="editor">
        <form action="{{ route('d.writer.artikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- ID  --}}
            <input type="hidden" value="{{ $artikel->id ?? null }}" name="edit_id">
            {{-- JUDUL --}}
            <div class="form-control">
                <label class="label">
                <span class="label-text">Judul</span>
                </label>
                <input type="text" class="input" name="judul" value="{{ old('judul') ?? $artikel->judul ?? '' }}">
            </div>
            @error('judul')
                <small class="text-error">{{ $message }}</small>
            @enderror
            {{-- KATEGORI --}}
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Kategori</span>
                </label>
                <select name="kategori_id" id="" class="select">
                    <option>Pilih kategori</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}"  {{ ($artikel->kategori_id ?? '') == $kategori->id ? 'selected' : '' }}> {{ $kategori->nama }}</option>
                    @endforeach
                </select>
            </div>
            @error('kategori_id')
                <small class="text-error">{{ $message }}</small>
            @enderror
            {{-- GAMBAR --}}
            <input type="hidden" value="{{ $artikel->id ?? null }}" name="edit_id">
            <div class="form-control items-start">
                <label class="label">
                    <span class="label-text">Gambar</span>
                </label>
                <div class="flex flex-row space-x-2 items-center">
                    <label for="gambar" class="btn btn-primary">Pilih Gambar</label>
                    <a target="_blank" :href="urlPrevImg">
                        <img :src="urlPrevImg" x-show="urlPrevImg" class="h-12"/>
                    </a>
                </div>
                <input id="gambar" type="file" class="hidden" name="gambar" @change="prevImg($event)">
            </div>
            @error('gambar')
                <small class="text-error">{{ $message }}</small>
            @enderror
            {{-- ISI --}}
            <div class="form-control">
                <label class="label">
                <span class="label-text">Isi</span>
                </label>
                <div id="editor">{!! old('isi') ?? $artikel->isi ??'' !!}</div>
                <textarea id="target" name="isi" class="hidden">{{ old('isi') ?? $artikel->isi ??'' }}</textarea>
            </div>
            @error('isi')
                <small class="text-error">{{ $message }}</small>
            @enderror

            <div class=" mt-8">
                <button class="btn btn-sm btn-primary">Submit</button>
            </div>
        </form>
    </div>

</x-dashboard>
