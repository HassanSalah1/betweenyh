<div class="col-md-4">
  <div class="mb-1">
    <label class="form-label" for="name">{{ __('Name') }}</label>
    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Full Name') }}" name="name"
      value="{{ isset($user) ? $user->name : old('name') }}" />
    @error('name')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>
<div class="col-md-4">
  <div class="mb-1">
    <label class="form-label" for="email">{{ __('Email') }}</label>
    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="someone@example.com" name="email"
      value="{{ isset($user) ? $user->email : old('email') }}" />
    @error('email')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>
<div class="col-md-4">
  <div class="mb-1">
    <label class="form-label" for="password">{{ __('Password') }}</label>
    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="*********" name="password" />
    @error('password')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>
<div class="col-12">
  <div class="mb-1">
    <label class="form-label" for="roles">{{ __('Roles') }}</label>
    <div class="pb-25">
      <span class="btn btn-success btn-sm select-all">{{ __('Select All') }}</span>
      <span class="btn btn-danger btn-sm deselect-all">{{ __('Unselect All') }}</span>
    </div>

    <select id="roles" class="custom-select select2" data-placeholder="{{ __('Please Select') . ' ' . __('Roles') }}" name="roles[]" multiple>
      @foreach ($roles as $role)
        <option value="{{ $role->id }}" {{ isset($user) && $user->hasRole($role) ? 'selected' : '' }}>
          {{ $role->name }}
        </option>
      @endforeach
    </select>
    @error('roles')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>
