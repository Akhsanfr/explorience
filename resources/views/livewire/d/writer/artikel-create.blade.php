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
            })
        </script>
@endpush

<x-dashboard>
    <div class="col-span-12 card">
        <h1>{{ $artikel ? "Edit artikel berjudul $artikel->judul" : 'Buat artikel baru'}}</h1>
    </div>

    <div class="card col-span-12">
        <form action="{{ route('d.writer.artikel.store') }}" method="POST">
            @csrf
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
                <input type="text" class="input" name="judul" value="{{ old('judul') ?? $artikel->judul ?? '' }}">
            </div>
            @error('judul')
                <small class="text-error">{{ $message }}</small>
            @enderror
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
