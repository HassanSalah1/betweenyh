@extends('dashboard.layouts.contentLayoutMaster')

@section('title', 'User Permissions')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('content')
  <!-- Basic multiple Column Form section start -->
  <section>
    <div class="card">
      <div class="card-body">
        <form action="{{ route('users.permissions.update', $user->id) }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-12">
              <div class="mb-1">
                <label class="form-label" for="permissions">Roles</label>
                <div class="pb-25">
                  <span class="btn btn-success btn-sm select-all">{{ __('Select All') }}</span>
                  <span class="btn btn-danger btn-sm deselect-all">{{ __('Unselect All') }}</span>
                </div>

                <select id="permissions" class="custom-select select2" data-placeholder="Select Roles" name="permissions[]" multiple>
                  @foreach ($permissions as $permission)
                    <option value="{{ $permission->id }}" {{ isset($user) && $user->permissions->contains($permission) ? 'selected' : '' }}>
                      {{ $permission->name }}
                    </option>
                  @endforeach
                </select>
                @error('permissions')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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
    $(document).ready(function() {
      $(function() {
        $('.select2').each(function() {
          $(this).select2({
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
            closeOnSelect: !$(this).attr('multiple'),
          });
        });
      });
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
