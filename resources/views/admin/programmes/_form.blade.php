@include('admin.components.feedback')
<div class="form-group">
    <label class="form-label" for="nom">Nom</label>
    <input class="form-control" id="nom" name="nom" value="{{ old('nom', $programme?->nom) }}" required maxlength="255">
</div>
<div class="form-group">
    <label class="form-label" for="description">Description</label>
    <textarea class="form-control" id="description" name="description" rows="8" required>{{ old('description', $programme?->description) }}</textarea>
</div>
<div class="form-group">
    <label class="form-label" for="programme-image">Image du programme</label>
    <p class="form-note mb-3">Formats acceptés : JPG, PNG ou WebP. Taille maximale : 5 Mo.</p>
    <div class="abe-image-uploader" data-image-uploader>
        <div class="abe-image-preview {{ $programme?->image_url ? 'has-image' : '' }}" data-image-preview>
            <img src="{{ $programme?->image_url ?? '' }}" alt="Aperçu de l’image du programme" data-image-preview-element @if(! $programme?->image_url) hidden @endif>
            <div class="abe-image-placeholder" data-image-placeholder @if($programme?->image_url) hidden @endif>
                <span><em class="icon ni ni-img"></em></span>
                <strong>Aperçu de l’image</strong>
                <small>L’image sélectionnée apparaîtra ici</small>
            </div>
        </div>
        <div class="abe-image-upload-controls">
            <input class="abe-file-input @error('image') is-invalid @enderror" id="programme-image" name="image" type="file" accept="image/jpeg,image/png,image/webp" data-image-input>
            <label class="btn btn-outline-primary" for="programme-image"><em class="icon ni ni-upload-cloud"></em><span>{{ $programme?->image ? 'Remplacer l’image' : 'Importer une image' }}</span></label>
            <span class="abe-file-name" data-file-name>{{ $programme?->image ? basename($programme->image) : 'Aucun fichier sélectionné' }}</span>
            @error('image')<span class="invalid-feedback d-block">{{ $message }}</span>@enderror
        </div>
    </div>
</div>
@include('admin.components.gallery-upload', ['galleryOwner' => $programme, 'galleryInputId' => 'programme-gallery'])
<button class="btn btn-primary" type="submit">Enregistrer</button>
<a class="btn btn-light" href="{{ route('admin.programmes.index') }}">Annuler</a>

@section('js')
<script>
document.querySelectorAll('[data-image-uploader]').forEach(function (uploader) {
    const input = uploader.querySelector('[data-image-input]');
    const image = uploader.querySelector('[data-image-preview-element]');
    const placeholder = uploader.querySelector('[data-image-placeholder]');
    const fileName = uploader.querySelector('[data-file-name]');

    input.addEventListener('change', function () {
        const file = this.files && this.files[0];
        if (!file) return;

        fileName.textContent = file.name;
        const reader = new FileReader();
        reader.addEventListener('load', function (event) {
            image.src = event.target.result;
            image.hidden = false;
            placeholder.hidden = true;
            uploader.querySelector('[data-image-preview]').classList.add('has-image');
        });
        reader.readAsDataURL(file);
    });
});
</script>
@endsection
