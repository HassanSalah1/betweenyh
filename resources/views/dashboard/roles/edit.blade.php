@extends('dashboard.layouts.contentLayoutMaster')

@section('title', __('Edit Role'))

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('content')
  <!-- Basic multiple Column Form section start -->
  <section>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">{{ __('Roles') }}</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
          @csrf
          @method('put')
          <div class="row">
            <div class="col-12">
              <div class="mb-1">
                <label class="form-label" for="name">{{ __('Roles') }}</label>
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Role Name" name="name"
                  value="{{ old('name', $role->name) }}" />
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- <div class="col-12">
                <div class="mb-1">
                  <label class="form-label" for="d_name_ar">{{ __('Name Ar') }}</label>
                  <input type="text" id="d_name_ar" class="form-control @error('d_name_ar') is-invalid @enderror" placeholder="{{ __('Name Ar') }}" name="d_name_ar"
                    value="{{ old('d_name_ar', $role->d_name_ar) }}" />
                  @error('d_name_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-12">
                <div class="mb-1">
                  <label class="form-label" for="d_name_en">{{ __('Name En') }}</label>
                  <input type="text" id="d_name_en" class="form-control @error('d_name_en') is-invalid @enderror" placeholder="{{ __('Name En') }}" name="d_name_en"
                    value="{{ old('d_name_en', $role->d_name_en) }}" />
                  @error('d_name_en')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div> --}}

              <div class="col-12">
                <div class="mb-1">
                  <label class="form-label" for="permissions">{{ __('Permissions') }}</label>
                  <div class="pb-25 mb-1">
                    <span class="btn btn-success btn-sm select-all">{{ __('Select All') }}</span>
                    <span class="btn btn-danger btn-sm deselect-all">{{ __('Unselect All') }}</span>
                  </div>

                  <select id="permissions" class="custom-select select2" data-placeholder="{{ __('Select') . ' ' . __('Permissions') }}" name="permissions[]" multiple>
                    @foreach ($permissions as $permission)
                      <option value="{{ $permission->id }}" {{ isset($role) && $role->hasPermissionTo($permission) ? 'selected' : '' }}>
                        {{ $permission->name }}</option>
                    @endforeach
                  </select>
                  @error('permissions')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary me-1">@lang('Submit')</button>
              <button type="reset" class="btn btn-outline-secondary">@lang('Reset')</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- Basic Floating Label Form section end -->
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
  <script>
    $('.select2').select2({
      placeholder: $(this).data('placeholder'),
      allowClear: true,
      closeOnSelect: false,
    });

    $('.select-all').click(function() {
      let select2 = $(this).parent().parent().find('.select2');
      select2.find('option').prop('selected', 'selected');
      select2.trigger('change');
    })
    $('.deselect-all').click(function() {
      let select2 = $(this).parent().parent().find('.select2');
      select2.find('option').prop('selected', '');
      select2.trigger('change');
    })
  </script>
@endsection
