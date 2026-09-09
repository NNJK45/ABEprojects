@include('admin.components.feedback')
<div class="form-group"><label class="form-label" for="titre">Titre</label><input class="form-control" id="titre" name="titre" value="{{ old('titre', $evenement?->titre) }}" required maxlength="255"></div>
<div class="form-group"><label class="form-label" for="programme_id">Programme</label><select class="form-control" id="programme_id" name="programme_id"><option value="">Aucun</option>@foreach ($programmes as $programme)<option value="{{ $programme->id }}" @selected((string) old('programme_id', $evenement?->programme_id) === (string) $programme->id)>{{ $programme->nom }}</option>@endforeach</select></div>
<div class="row"><div class="col-md-6"><div class="form-group"><label class="form-label" for="date">Date</label><input class="form-control" id="date" name="date" type="date" value="{{ old('date', $evenement?->date?->format('Y-m-d')) }}" required></div></div><div class="col-md-6"><div class="form-group"><label class="form-label" for="annee_event">Année</label><input class="form-control" id="annee_event" name="annee_event" type="number" min="1900" max="2200" value="{{ old('annee_event', $evenement?->annee_event) }}" required></div></div></div>
<div class="form-group"><label class="form-label" for="lieu">Lieu</label><input class="form-control" id="lieu" name="lieu" value="{{ old('lieu', $evenement?->lieu) }}" required maxlength="255"></div>
<div class="form-group">
    <label class="form-label" for="event-image">Image de l’événement</label>
    <p class="form-note mb-3">Formats acceptés : JPG, PNG ou WebP. Taille maximale : 5 Mo.</p>
    <div class="abe-image-uploader" data-image-uploader>
        <div class="abe-image-preview {{ $evenement?->image_url ? 'has-image' : '' }}" data-image-preview>
            <img src="{{ $evenement?->image_url ?? '' }}" alt="Aperçu de l’image de l’événement" data-image-preview-element @if(! $evenement?->image_url) hidden @endif>
            <div class="abe-image-placeholder" data-image-placeholder @if($evenement?->image_url) hidden @endif>
                <span><em class="icon ni ni-calendar"></em></span>
                <strong>Aperçu de l’image</strong>
                <small>L’image sélectionnée apparaîtra ici</small>
            </div>
        </div>
        <div class="abe-image-upload-controls">
            <input class="abe-file-input @error('image_file') is-invalid @enderror" id="event-image" name="image_file" type="file" accept="image/jpeg,image/png,image/webp" data-image-input @if(! $evenement) required @endif>
            <label class="btn btn-outline-primary" for="event-image"><em class="icon ni ni-upload-cloud"></em><span>{{ $evenement?->image ? 'Remplacer l’image' : 'Importer une image' }}</span></label>
            <span class="abe-file-name" data-file-name>{{ $evenement?->image ? basename($evenement->image) : 'Aucun fichier sélectionné' }}</span>
            @error('image_file')<span class="invalid-feedback d-block">{{ $message }}</span>@enderror
        </div>
    </div>
</div>
@include('admin.components.gallery-upload', ['galleryOwner' => $evenement, 'galleryInputId' => 'event-gallery'])
<div class="form-group"><label class="form-label" for="description">Description</label><textarea class="form-control" id="description" name="description" rows="8" required>{{ old('description', $evenement?->description) }}</textarea></div>
<button class="btn btn-primary">Enregistrer</button><a class="btn btn-light" href="{{ route('admin.evenements.index') }}">Annuler</a>

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
