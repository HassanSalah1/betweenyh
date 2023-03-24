<div class="col-md-6">
  <div class="mb-1">
    <label class="form-label" for="name">Name</label>
    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name"
      value="{{ isset($social) ? $social->name : old('name') }}" />
    @error('name')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>


<div class="col-md-3">
  <div class="mb-1">
    <label class="form-label" for="sort">Sort</label>
    <input type="number" min="0" id="sort" class="form-control @error('sort') is-invalid @enderror" placeholder="Sort" name="sort"
      value="{{ isset($social) ? $social->sort : old('sort') }}" />
    @error('sort')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>
<div class="col-md-3">
  <div class="mb-1">
    <label for="image" class="form-label">Image </label>
    <input class="form-control  @error('image') is-invalid @enderror" name="image" type="file"  id="image" />
    @error('image')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>
