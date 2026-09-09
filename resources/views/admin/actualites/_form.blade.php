@include('admin.components.feedback')
<div class="form-group"><label class="form-label" for="titre">Titre</label><input class="form-control" id="titre" name="titre" value="{{ old('titre', $actualite?->titre) }}" required maxlength="255"></div>
<div class="form-group"><label class="form-label" for="date_publication">Date de publication</label><input class="form-control" id="date_publication" name="date_publication" type="date" value="{{ old('date_publication', $actualite?->date_publication?->format('Y-m-d')) }}" required></div>
<div class="form-group">
    <label class="form-label" for="news-image">Image de l’actualité</label>
    <p class="form-note mb-3">Formats acceptés : JPG, PNG ou WebP. Taille maximale : 5 Mo.</p>
    <div class="abe-image-uploader" data-image-uploader>
        <div class="abe-image-preview {{ $actualite?->image_url ? 'has-image' : '' }}" data-image-preview>
            <img src="{{ $actualite?->image_url ?? '' }}" alt="Aperçu de l’image de l’actualité" data-image-preview-element @if(! $actualite?->image_url) hidden @endif>
            <div class="abe-image-placeholder" data-image-placeholder @if($actualite?->image_url) hidden @endif>
                <span><em class="icon ni ni-file-docs"></em></span>
                <strong>Aperçu de l’image</strong>
                <small>L’image sélectionnée apparaîtra ici</small>
            </div>
        </div>
        <div class="abe-image-upload-controls">
            <input class="abe-file-input @error('image_file') is-invalid @enderror" id="news-image" name="image_file" type="file" accept="image/jpeg,image/png,image/webp" data-image-input @if(! $actualite) required @endif>
            <label class="btn btn-outline-primary" for="news-image"><em class="icon ni ni-upload-cloud"></em><span>{{ $actualite?->image ? 'Remplacer l’image' : 'Importer une image' }}</span></label>
            <span class="abe-file-name" data-file-name>{{ $actualite?->image ? basename($actualite->image) : 'Aucun fichier sélectionné' }}</span>
            @error('image_file')<span class="invalid-feedback d-block">{{ $message }}</span>@enderror
        </div>
    </div>
</div>
@include('admin.components.gallery-upload', ['galleryOwner' => $actualite, 'galleryInputId' => 'news-gallery'])
<div class="form-group"><label class="form-label" for="contenu">Contenu</label><textarea class="form-control" id="contenu" name="contenu" rows="10" required>{{ old('contenu', $actualite?->contenu) }}</textarea></div>
<button class="btn btn-primary">Enregistrer</button><a class="btn btn-light" href="{{ route('admin.actualites.index') }}">Annuler</a>

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
