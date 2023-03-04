@extends('dashboard.layouts.contentLayoutMaster')

@section('title', __('messages.categoryCreate'))

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('content')
  <section>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">@lang('messages.categoryInfo')</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">

            @include('dashboard.categories.form')

            <div id="app">
              @error('image')
                <div style="display: block;" class="invalid-feedback">{{ $message }}</div>
              @enderror
              <image-cropper :width="435" :height="685"></image-cropper>
            </div>

            <div class="col-12">
              <button type="submit" class="btn btn-primary me-1">@lang('messages.submit')</button>
              <button type="reset" class="btn btn-outline-secondary">@lang('messages.reset')</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
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
          });
        });
      });
    });
  </script>
  <!-- Vue JS-->
  <script src="{{ mix('js/app.js') }}" defer></script>
@endsection
