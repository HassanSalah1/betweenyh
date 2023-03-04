@isset($pageConfigs)
  {!! Helper::updatePageConfig($pageConfigs) !!}
@endisset

<!DOCTYPE html>
@php
  $configData = Helper::applClasses();
@endphp

{{-- {{ dd($configData['theme'], $configData['layoutTheme']) }} --}}
<html class="loading {{ $configData['theme'] === 'light' ? '' : $configData['layoutTheme'] }}"
  lang="@if (session()->has('locale')) {{ session()->get('locale') }}@else{{ $configData['defaultLanguage'] }} @endif"
  data-textdirection="{{ $configData['direction'] === 'rtl' ? 'rtl' : 'ltr' }}" @if ($configData['theme'] === 'dark') data-layout="dark-layout" @endif>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{--
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="author" content="PIXINVENT"> --}}

  <title>@yield('title') - @lang('Khutwah')</title>
  <link rel="apple-touch-icon" href="{{ asset('images/ico/favicon-32x32.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo/icon.svg') }}">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
  {{-- Include core + vendor Styles --}}
  @include('dashboard.panels.styles')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
@isset($configData['mainLayoutType'])
  @extends($configData['mainLayoutType'] === 'horizontal' ? 'dashboard.layouts.horizontalLayoutMaster' : 'dashboard.layouts.verticalLayoutMaster')
@endisset
