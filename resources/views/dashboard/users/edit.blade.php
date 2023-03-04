@extends('dashboard.layouts.contentLayoutMaster')

@section('title', __('Edit User'))

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('content')
  <!-- Basic multiple Column Form section start -->
  <section>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">{{ __('Users') }}</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
          @csrf
          @method('put')
          <div class="row">

            @include('dashboard.users.form')

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
            allowClear: true,
            closeOnSelect: false,
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
