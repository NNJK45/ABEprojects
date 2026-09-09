<div class="form-group abe-gallery-field">
    <div class="abe-gallery-field-head"><div><label class="form-label" for="{{ $galleryInputId }}">Galerie complémentaire</label><p class="form-note">Sélectionnez jusqu’à 10 images JPG, PNG ou WebP de 5 Mo maximum chacune.</p></div><span>Facultatif</span></div>

    @if($galleryOwner && $galleryOwner->images->isNotEmpty())
        <div class="abe-existing-gallery">
            @foreach($galleryOwner->images as $galleryImage)
                <label class="abe-existing-image">
                    <img src="{{ $galleryImage->image_url }}" alt="Image complémentaire">
                    <span><input type="checkbox" name="remove_gallery_images[]" value="{{ $galleryImage->id }}"><em class="icon ni ni-trash"></em> Supprimer</span>
                </label>
            @endforeach
        </div>
        <p class="form-note mb-3">Cochez les images que vous souhaitez supprimer lors de l’enregistrement.</p>
    @endif

    <div class="abe-multi-uploader" data-gallery-uploader>
        <input class="abe-file-input @error('gallery_images') is-invalid @enderror @error('gallery_images.*') is-invalid @enderror" id="{{ $galleryInputId }}" name="gallery_images[]" type="file" accept="image/jpeg,image/png,image/webp" multiple data-gallery-input>
        <label class="abe-multi-dropzone" for="{{ $galleryInputId }}"><span><em class="icon ni ni-upload-cloud"></em></span><strong>Ajouter plusieurs images</strong><small>Cliquez pour sélectionner les fichiers</small></label>
        <div class="abe-multi-summary" data-gallery-summary>Aucune nouvelle image sélectionnée</div>
        <div class="abe-multi-preview" data-gallery-preview></div>
    </div>
    @error('gallery_images')<span class="invalid-feedback d-block">{{ $message }}</span>@enderror
    @error('gallery_images.*')<span class="invalid-feedback d-block">{{ $message }}</span>@enderror
</div>
