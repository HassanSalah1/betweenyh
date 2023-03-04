@extends('dashboard.layouts.contentLayoutMaster')

@section('title', __('Dashboard'))

@section('vendor-style')
  {{-- vendor css files --}}
  {{--
<link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}"> --}}
@endsection

@section('page-style')
  {{-- Page css files --}}
  {{--
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}"> --}}
@endsection

@section('content')
  <!-- Dashboard Starts -->
  <h1>Test Dashboard</h1>
  {{-- {{ dd($menuData) }} --}}
  <!-- Dashboard ends -->
@endsection

@section('vendor-script')
  {{-- vendor files --}}
  {{-- <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script> --}}
@endsection
@section('page-script')
  {{-- Page js files --}}
  {{-- <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script> --}}
@endsection
