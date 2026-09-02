@include('admin.components.feedback')
<div class="form-group"><label class="form-label" for="titre">Titre</label><input class="form-control" id="titre" name="titre" value="{{ old('titre', $actualite?->titre) }}" required maxlength="255"></div>
<div class="form-group"><label class="form-label" for="date_publication">Date de publication</label><input class="form-control" id="date_publication" name="date_publication" type="date" value="{{ old('date_publication', $actualite?->date_publication?->format('Y-m-d')) }}" required></div>
<div class="form-group"><label class="form-label" for="image">URL de l'image</label><input class="form-control" id="image" name="image" type="url" value="{{ old('image', $actualite?->image) }}" required maxlength="255"></div>
<div class="form-group"><label class="form-label" for="contenu">Contenu</label><textarea class="form-control" id="contenu" name="contenu" rows="10" required>{{ old('contenu', $actualite?->contenu) }}</textarea></div>
<button class="btn btn-primary">Enregistrer</button><a class="btn btn-light" href="{{ route('admin.actualites.index') }}">Annuler</a>
