@extends('dashboard.layouts.contentLayoutMaster')

@section('title', 'Edit Social')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('content')
  <!-- Basic multiple Column Form section start -->
  <section>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> </h4>
      </div>
      <div class="card-body">
        <form action="{{ route('socials.update', $social->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="row">

            @include('dashboard.socials.form')

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
          });
        });
      });
    });
  </script>
  <!-- Vue JS-->
  <script src="{{ mix('js/app.js') }}" defer></script>
@endsection
