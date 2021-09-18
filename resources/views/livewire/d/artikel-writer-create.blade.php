<x-dashboard>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <div class="col-span-12 card">
        <h1>{{ $artikel ? "Edit artikel berjudul $artikel->judul" : 'Buat artikel baru'}}</h1>
    </div>

    <div class="card col-span-12">
        <form action="{{ route('d.artikel.writer.store') }}" method="POST">
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
                <textarea id="summernote" name="isi" >{{ old('isi') ?? $artikel->isi ??'' }}</textarea>
            </div>
            @error('isi')
                <small class="text-error">{{ $message }}</small>
            @enderror

            <div class=" mt-8">
                <button class="btn btn-sm btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <script>

        $(document).ready(function() {
            $('#summernote').summernote();
        });
      </script>

</x-dashboard>
