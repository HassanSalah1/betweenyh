@extends('dashboard.layouts.contentLayoutMaster')

@section('title', $category->{'name_' . App::currentLocale()})

@section('content')
  <section>
    <div class="card">
      <div class="card-header">
        {{ $category->sort_order }} -
        {!! $category->{'name_' . App::currentLocale()} !!}
        @if ($category->slug)
          ({{ $category->slug }})
        @endif
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-3">
            <div class="mb-1">
              <img class="img-fluid rounded" src="{{ Storage::Url($category->image) }}" alt="{!! $category->{'name_' . App::currentLocale()} !!}" />
            </div>
          </div>
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-4">
                <div class="mt-2">
                  <h5 class="mb-75">@lang('messages.nameAr')</h5>
                  <p class="card-text">{{ $category->name_ar }}</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mt-2">
                  <h5 class="mb-75">@lang('messages.nameEn')</h5>
                  <p class="card-text">{{ $category->name_en }}</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mt-2">
                  <h5 class="mb-75">@lang('messages.icon')</h5>
                  {{-- <p class="card-text">{{ $category->sort_order }}</p> --}}
                  <img class="me-50" width="25" src="{{ Storage::Url($category->icon) }}"
                    alt="icon{{ $category->{'name_' . App::currentLocale()} }}">
                </div>
              </div>

              <div class="col-12">
                <div class="mt-2">
                  <h5 class="mb-75">@lang('messages.descAr')</h5>
                  <p class="card-text">{{ $category->desc_ar }}</p>
                </div>
              </div>
              <div class="col-12">
                <div class="mt-2">
                  <h5 class="mb-75">@lang('messages.descEn')</h5>
                  <p class="card-text">{{ $category->desc_en }}</p>
                </div>
              </div>
              @if ($category->children->count() > 0)
                <div class="col-12">
                  <div class="mt-2">
                    <h5 class="mb-75">@lang('messages.childrenCategories')</h5>
                    <div class="table-responsive">
                      <table class="dt-complex-header table table-bordered">
                        <thead>
                          <tr>
                            <th>@lang('messages.id')</th>
                            <th>@lang('messages.nameAr')</th>
                            <th>@lang('messages.nameEn')</th>
                            <th>@lang('messages.slug')</th>
                            <th>@lang('messages.sortOrder')</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($category->children as $child)
                            <tr>
                              <td>{{ $child->id }}</td>
                              <td>{{ $child->name_ar }}</td>
                              <td>{{ $child->name_en }}</td>
                              <td>{{ $child->slug }}</td>
                              <td>{{ $child->sort_order }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
