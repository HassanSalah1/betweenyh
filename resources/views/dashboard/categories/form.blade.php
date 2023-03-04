<div class="col-md-6">
  <div class="mb-1">
    <label class="form-label" for="name_ar">@lang('messages.nameAr')</label>
    <input type="text" id="name_ar" class="form-control @error('name_ar') is-invalid @enderror" placeholder="@lang('messages.nameAr')" name="name_ar"
      value="{{ isset($category) ? $category->name_ar : old('name_ar') }}" />
    @error('name_ar')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>
<div class="col-md-6">
  <div class="mb-1">
    <label class="form-label" for="name_en">@lang('messages.nameEn')</label>
    <input type="text" id="name_en" class="form-control @error('name_en') is-invalid @enderror" placeholder="@lang('messages.nameEn')" name="name_en"
      value="{{ isset($category) ? $category->name_en : old('name_en') }}" />
    @error('name_en')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>

<div class="col-md-3">
  <div class="mb-1">
    <label class="form-label" for="sort_order">@lang('messages.sortOrder')</label>
    <input type="number" min="0" id="sort_order" class="form-control @error('sort_order') is-invalid @enderror" placeholder="@lang('messages.sortOrder')" name="sort_order"
      value="{{ isset($category) ? $category->sort_order : old('sort_order') }}" />
    @error('sort_order')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>
<div class="col-md-4">
  <div class="mb-1">
    <label for="icon" class="form-label">@lang('messages.icon') (@lang('messages.onlySvgType'))</label>
    <input class="form-control  @error('icon') is-invalid @enderror" name="icon" type="file" accept="image/svg+xml" id="icon" />
    @error('icon')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>
<div class="col-md-5">
  <div class="mb-1">
    <label class="form-label" for="parent_id">@lang('messages.parentCategory') (@lang('messages.notChildCategory'))</label>
    <select id="parent_id" class="form-control custom-select select2" name="parent_id" data-placeholder="@lang('messages.pleaseSelect')">
      <option></option>
      @foreach ($categories as $parentCategory)
        <option value="{{ $parentCategory->id }}"
          {{ (old('parent_id') && old('parent_id') == $parentCategory->id) || (isset($category->parent) && $category->parent->id == $parentCategory->id) ? 'selected' : '' }}>
          {{ $parentCategory->{'name_' . App::currentLocale()} }}
        </option>
      @endforeach
    </select>
    @error('parent_id')
      <div style="display: block;" class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>

<div class="col-md-6">
  <div class="mb-1">
    <label class="form-label" for="desc_ar">@lang('messages.descAr')</label>
    <input type="text" id="desc_ar" class="form-control @error('desc_ar') is-invalid @enderror" placeholder="@lang('messages.descAr')" name="desc_ar"
      value="{{ isset($category) ? $category->desc_ar : old('desc_ar') }}" />
    @error('desc_ar')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>
<div class="col-md-6">
  <div class="mb-1">
    <label class="form-label" for="desc_en">@lang('messages.descEn')</label>
    <input type="text" id="desc_en" class="form-control @error('desc_en') is-invalid @enderror" placeholder="@lang('messages.descEn')" name="desc_en"
      value="{{ isset($category) ? $category->desc_en : old('desc_en') }}" />
    @error('desc_en')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>
