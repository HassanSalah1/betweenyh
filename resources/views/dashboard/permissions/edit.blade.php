@extends('dashboard.layouts.contentLayoutMaster')

@section('title', __('Edit Permission'))

@section('content')
  <!-- Basic multiple Column Form section start -->
  <section>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> {{ __('Permissions') }}</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
          @csrf
          @method('put')
          <div class="row">
            <div class="col-12">
              <div class="mb-1">
                <label class="form-label" for="name">{{ __('Permission') }}</label>
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('messages.permission') }}" name="name"
                  value="{{ old('name', $permission->name) }}" />
                @error('name')
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
