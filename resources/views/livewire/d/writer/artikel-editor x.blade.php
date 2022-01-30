@push('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush
@push('script')
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script>
            // Init WYSIWYG
                // var quill = new Quill('#editor', {
                //         theme: 'snow'
                //     });
                // quill.on('text-change', function(){
                //     const editorValue = document.querySelector('#editor .ql-editor').innerHTML;
                //     document.getElementById('target').value = editorValue
                // })
            // Init apline
            document.addEventListener('alpine:init', () => {
                console.log("up....")
                Alpine.data('editor', () => ({
                    artikel : {},
                    save() {
                        // this.artikel.then(e => console.log(e))
                        // console.log(this.artikel)
                        this.$wire.save(this.artikel)
                    },
                    init(){
                        this.artikel = this.$wire.artikel;
                        // console.log("init...")
                        // console.log("res :",res);
                        // this.artikel = res;
                        // const artikel = await res.json();
                        // console.log(this.artikel)
                    }
                }));
            })
            Livewire.hook('component.initialized', component => {

                console.log("init...")
                const target = document.getElementById('target')
                target.innerHTML = `<div id="editor">{!! old('isi') ?? $artikel->isi ??'' !!}</div>`
                const  quill = new Quill('#editor', {
                        theme: 'snow'
                    });
                quill.on('text-change', function(){
                    const editorValue = document.querySelector('#editor .ql-editor').innerHTML;
                    document.getElementById('target').value = editorValue
                })
            })
            Livewire.hook('element.updated', (el, component) => {

                // console.log("el :", el)
                const target = document.getElementById('target')
                target.innerHTML = "";
                target.innerHTML = `<div id="editor">{!! old('isi') ?? $artikel->isi ??'' !!}</div>`
                const  quill = new Quill('#editor', {
                        theme: 'snow'
                    });
                quill.on('text-change', function(){
                    const editorValue = document.querySelector('#editor .ql-editor').innerHTML;
                    document.getElementById('target').value = editorValue
                })
                // console.log('exe...');
                // console.log("component :", component)
                // if(el.hasAttribute("wire:id")){
                //     console.log("reinit quill...")
                //     console.log(document.getElementById('editor'))

                //     // var quill = new Quill('#editor', {
                //     //     theme: 'snow'
                //     // });
                //     // console.log(quill)
                //     // Get value from WYSIWYG to form

                // }

            })
        </script>
@endpush

<x-dashboard>
    <div class="col-span-12 card">
        <h1>{{ $artikel ? "Edit artikel berjudul $artikel->judul" : 'Buat artikel baru'}}</h1>
    </div>

    <div class="card col-span-12">
        <div x-data="editor">
            {{-- @csrf --}}
            <input type="hidden" value="{{ $artikel->id ?? null }}" name="edit_id">
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
            <div class="form-control">
                <label class="label">
                <span class="label-text">Judul</span>
                </label>
                <input type="text" class="input" name="judul" wire:model.debounce.2000ms="artikel.judul" @input.debounce="">
            </div>
            @error('judul')
                <small class="text-error">{{ $message }}</small>
            @enderror
            <div class="form-control">
                <label class="label">
                <span class="label-text">Isi</span>
                </label>
                <div id="target">

                    {{-- <div id="editor">{!! old('isi') ?? $artikel->isi ??'' !!}</div> --}}
                </div>
                <textarea id="target" name="isi" class="hidden">{{ old('isi') ?? $artikel->isi ??'' }}</textarea>
            </div>
            @error('isi')
                <small class="text-error">{{ $message }}</small>
            @enderror

            <div class=" mt-8">
                <button class="btn btn-sm btn-primary" @click="save">Submit</button>
            </div>
        </div>
    </div>

</x-dashboard>
