@include('admin.components.feedback')
<div class="form-group"><label class="form-label" for="name">Nom</label><input class="form-control" id="name" name="name" value="{{ old('name', $user?->name) }}" required></div>
<div class="form-group"><label class="form-label" for="email">Email</label><input class="form-control" id="email" name="email" type="email" value="{{ old('email', $user?->email) }}" required></div>
<div class="form-group"><label class="form-label" for="role">Rôle</label><select class="form-control" id="role" name="role" required>@foreach($roles as $role)<option value="{{ $role->value }}" @selected(old('role', $user?->role?->value) === $role->value)>{{ ucfirst($role->value) }}</option>@endforeach</select></div>
<div class="form-group"><label class="form-label" for="password">Mot de passe {{ $user ? '(laisser vide pour conserver)' : '' }}</label><input class="form-control" id="password" name="password" type="password" {{ $user ? '' : 'required' }} minlength="12"></div>
<div class="form-group"><label class="form-label" for="password_confirmation">Confirmation</label><input class="form-control" id="password_confirmation" name="password_confirmation" type="password" {{ $user ? '' : 'required' }}></div>
<button class="btn btn-primary" type="submit">Enregistrer</button><a class="btn btn-light" href="{{ route('admin.users.index') }}">Annuler</a>
