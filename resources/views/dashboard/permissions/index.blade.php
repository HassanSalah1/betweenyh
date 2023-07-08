@extends('dashboard.layouts.contentLayoutMaster')

@section('title', __('Manage') . ' ' . __('Permissions'))


@section('vendor-style')
  {{-- datatable files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
@endsection

@section('content')
  <section>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">@lang('Permissions List')</h4>
        <a href="{{ route('permissions.create') }}" class="btn btn-primary waves-effect waves-float waves-light">
          <i data-feather="plus"></i>
          <span>@lang('Create Permission')</span>
        </a>
      </div>
      <div class="card-datatable">
        <div class="table-responsivep px-1">
          <table id="permissions-table" class="table table-bordered">
            <thead>
              <tr>
                <th>@lang('ID')</th>
                <th>@lang('Name')</th>
                {{-- <th>@lang('messages.descAr')</th>
                <th>@lang('messages.descEn')</th> --}}
                <th>@lang('Actions')</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('vendor-script')
{{--  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>--}}
<script src="https://unpkg.com/axios@1.4.0/dist/axios.min.js"></script>

  {{-- datatable files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
@endsection

@section('page-script')
  <script>
    $(document).ready(function() {
      axios.get('/axios/permissions')
        .then((response) => {
          $("#permissions-table").DataTable({
            data: response.data,
            columns: [{
                data: 'id'
              },
              {
                data: 'name'
              },
              // {
              //   data: 'd_name_ar'
              // },
              // {
              //   data: 'd_name_en'
              // },
              {
                mData: 'action',
                mRender: (data, type, row) => {
                  let deletUrl = '{{ route('permissions.destroy', ':id') }}';
                  deletUrl = deletUrl.replace(':id', row.id);

                  return `
                    <a href="/admin/permissions/${row.id}/edit" class="me-25 btn btn-sm btn-icon btn-flat-primary waves-effect"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-small-4"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>
                    @can('delete_permissions')
                      <a href class="text-danger btn btn-sm btn-icon btn-flat-danger waves-effect"
                      onclick="event.preventDefault(); confirm('{{ __('messages.areYouSure') }}') ? document.getElementById('item-delete-${row.id}').submit() : false;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                      </a>
                      <form id="item-delete-${row.id}" action="${deletUrl}" method="POST"
                      style="display: none;">
                      @csrf
                      @method('delete')
                    </form>
                    @endcan
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
