@include('admin.components.feedback')
<div class="form-group">
    <label class="form-label" for="url">URL de l’image</label>
    <input class="form-control" id="url" name="url" type="url" value="{{ old('url', $image?->url) }}" required maxlength="255">
</div>
<div class="form-group">
    <label class="form-label" for="evenement_id">Événement</label>
    <select class="form-control" id="evenement_id" name="evenement_id">
        <option value="">Aucun</option>
        @foreach ($evenements as $evenement)
            <option value="{{ $evenement->id }}" @selected((string) old('evenement_id', $image?->evenement_id) === (string) $evenement->id)>{{ $evenement->nom }}</option>
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
    <div class="form-note">Choisissez exactement un événement ou une actualité.</div>
</div>
<button class="btn btn-primary" type="submit">Enregistrer</button>
<a class="btn btn-light" href="{{ route('admin.images.index') }}">Annuler</a>
