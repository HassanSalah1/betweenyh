<div class="col-md-6">
  <div class="mb-1">
    <label class="form-label" for="name">@lang('Name')</label>
    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="@lang('Name')" name="name"
      value="{{ isset($page) ? $page->name : old('name') }}" />
    @error('name')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>
<div class="col-md-6">
  <div class="mb-1">
    <label class="form-label" for="slug">@lang('Slug')</label>
    <input type="text" id="slug"  class="form-control @error('slug') is-invalid @enderror" placeholder="@lang('Slug')" name="slug"
      value="{{ isset($page) ? $page->slug : old('slug') }}" />
    @error('slug')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>

<div class="col-md-12">
  <div class="mb-1">
    <label class="form-label" for="body">@lang('Body')</label>
    <textarea class="form-control @error('body') is-invalid @enderror" id="body"
              name="body">{{ isset($page) ? $page->body : old('body') }}</textarea>

    @error('body')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>
