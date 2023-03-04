@extends('dashboard.layouts.contentLayoutMaster')

@section('title', __('messages.categories'))


@section('vendor-style')
  {{-- datatable files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
@endsection

@section('content')
  <section>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">@lang('messages.categoriesList')</h4>
        <a href="{{ route('categories.create') }}" class="btn btn-primary waves-effect waves-float waves-light">
          <i data-feather="plus"></i>
          <span>@lang('messages.categoryCreate')</span>
        </a>
      </div>
      <div class="card-datatable">
        <div class="table-responsivep px-1">
          <table id="categories-table" class="table table-bordered">
            <thead>
              <tr>
                <th>@lang('messages.id')</th>
                <th>@lang('messages.nameAr')</th>
                <th>@lang('messages.nameEn')</th>
                <th>@lang('messages.slug')</th>
                <th>@lang('messages.sortOrder')</th>
                <th>@lang('messages.image')</th>
                <th>@lang('messages.icon')</th>
                <th>@lang('messages.parentCategory')</th>
                <th>@lang('messages.actions')</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('vendor-script')
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  {{-- datatable files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
@endsection

@section('page-script')
  <script>
    $(document).ready(function() {
      axios.get('/axios/categories')
        .then((response) => {
          $("#categories-table").DataTable({
            data: response.data,
            columns: [{
                data: 'id'
              },
              {
                data: 'name_ar'
              },
              {
                data: 'name_en'
              },
              {
                data: 'slug'
              },
              {
                data: 'sort_order'
              },
              {
                data: 'image',
                render: (data, type, row) => {
                  if (row.image) {
                    return `
                      <a href="/${row.image.replace('public','storage')}" target="_balnk">
                        <img width="40" src="/${row.image.replace('public','storage')}" alt="image${row.id}">
                      </a>
                    `;
                  } else {
                    return '--';
                  }
                },
              },
              {
                data: 'icon',
                render: (data, type, row) => {
                  if (row.icon) {
                    return `
                      <a href="/${row.icon.replace('public','storage')}" target="_balnk">
                        <img width="25" src="/${row.icon.replace('public','storage')}" alt="icon${row.id}">
                      </a>
                    `;
                  } else {
                    return '--';
                  }
                },
              },
              {
                data: 'parent',
                render: (data, type, row) => {
                  let locale = '{{ App::currentLocale() }}';
                  if (row.parent) {
                    if (locale == 'ar') {
                      return row.parent.name_ar;
                    } else {
                      return row.parent.name_en;
                    }
                  } else {
                    return '--';
                  }
                },
              },
              {
                mData: 'action',
                mRender: (data, type, row) => {
                  let showUrl = '{{ route('categories.show', ':id') }}';
                  let deletUrl = '{{ route('categories.destroy', ':id') }}';

                  return `
                    <div class="d-inline-flex">
                      <a class="pe-50 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                          <circle cx="12" cy="12" r="1"></circle>
                          <circle cx="12" cy="5" r="1"></circle>
                          <circle cx="12" cy="19" r="1"></circle>
                        </svg>
                      </a>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a href="${showUrl.replace(':id', row.id)}" class="dropdown-item">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                          </svg>
                          @lang('messages.details')
                        </a>
                        @can('delete_categories')
                        <a href class="dropdown-item text-danger" onclick="event.preventDefault(); confirm('{{ __('messages.areYouSure') }}') ? document.getElementById('item-delete-${row.id}').submit() : false;">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                          </svg>
                          @lang('messages.delete')
                        </a>

                        <form id="item-delete-${row.id}" action="${deletUrl.replace(':id', row.id)}" method="POST" style="display: none;">
                          @csrf
                          @method('delete')
                        </form>
                        @endcan
                      </div>
                    </div>
                    <a href="/admin/categories/${row.id}/edit" class="me-25 btn btn-sm btn-icon btn-flat-primary waves-effect"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-small-4"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>
                  `;
                }
              },
            ],
            order: [
              [0, 'desc']
            ],
            language: {
              url: '{{ App::currentLocale() == 'ar' ? 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/ar.json' : '' }}'
            }
          });
        })
        .catch((error) => {
          console.log(error);
        })
    });
  </script>
@endsection
