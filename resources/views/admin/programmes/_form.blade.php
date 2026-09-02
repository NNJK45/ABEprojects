@include('admin.components.feedback')
<div class="form-group">
    <label class="form-label" for="nom">Nom</label>
    <input class="form-control" id="nom" name="nom" value="{{ old('nom', $programme?->nom) }}" required maxlength="255">
</div>
<div class="form-group">
    <label class="form-label" for="description">Description</label>
    <textarea class="form-control" id="description" name="description" rows="8" required>{{ old('description', $programme?->description) }}</textarea>
</div>
<button class="btn btn-primary" type="submit">Enregistrer</button>
<a class="btn btn-light" href="{{ route('admin.programmes.index') }}">Annuler</a>
