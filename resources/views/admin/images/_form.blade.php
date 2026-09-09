@include('admin.components.feedback')
<div class="form-group">
    <label class="form-label" for="media-image">Fichier image</label>
    <p class="form-note mb-3">Formats acceptés : JPG, PNG ou WebP. Taille maximale : 5 Mo.</p>
    <div class="abe-image-uploader" data-image-uploader>
        <div class="abe-image-preview {{ $image?->image_url ? 'has-image' : '' }}" data-image-preview>
            <img src="{{ $image?->image_url ?? '' }}" alt="Aperçu de l’image" data-image-preview-element @if(! $image?->image_url) hidden @endif>
            <div class="abe-image-placeholder" data-image-placeholder @if($image?->image_url) hidden @endif>
                <span><em class="icon ni ni-img"></em></span>
                <strong>Aperçu de l’image</strong>
                <small>L’image sélectionnée apparaîtra ici</small>
            </div>
        </div>
        <div class="abe-image-upload-controls">
            <input class="abe-file-input @error('image_file') is-invalid @enderror" id="media-image" name="image_file" type="file" accept="image/jpeg,image/png,image/webp" data-image-input @if(! $image) required @endif>
            <label class="btn btn-outline-primary" for="media-image"><em class="icon ni ni-upload-cloud"></em><span>{{ $image?->url ? 'Remplacer l’image' : 'Importer une image' }}</span></label>
            <span class="abe-file-name" data-file-name>{{ $image?->url ? basename($image->url) : 'Aucun fichier sélectionné' }}</span>
            @error('image_file')<span class="invalid-feedback d-block">{{ $message }}</span>@enderror
        </div>
    </div>
</div>
<div class="form-group">
    <label class="form-label" for="programme_id">Programme</label>
    <select class="form-control" id="programme_id" name="programme_id"><option value="">Aucun</option>@foreach ($programmes as $programme)<option value="{{ $programme->id }}" @selected((string) old('programme_id', $image?->programme_id) === (string) $programme->id)>{{ $programme->nom }}</option>@endforeach</select>
</div>
<div class="form-group">
    <label class="form-label" for="evenement_id">Événement</label>
    <select class="form-control" id="evenement_id" name="evenement_id">
        <option value="">Aucun</option>
        @foreach ($evenements as $evenement)
            <option value="{{ $evenement->id }}" @selected((string) old('evenement_id', $image?->evenement_id) === (string) $evenement->id)>{{ $evenement->titre }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label class="form-label" for="actualite_id">Actualité</label>
    <select class="form-control" id="actualite_id" name="actualite_id">
        <option value="">Aucune</option>
        @foreach ($actualites as $actualite)
            <option value="{{ $actualite->id }}" @selected((string) old('actualite_id', $image?->actualite_id) === (string) $actualite->id)>{{ $actualite->titre }}</option>
        @endforeach
    </select>
    <div class="form-note">Choisissez exactement un programme, un événement ou une actualité.</div>
</div>
<button class="btn btn-primary" type="submit">Enregistrer</button>
<a class="btn btn-light" href="{{ route('admin.images.index') }}">Annuler</a>

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
