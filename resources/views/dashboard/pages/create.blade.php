@extends('dashboard.layouts.contentLayoutMaster')

@section('title', __('Create Page'))

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('content')
  <section>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">@lang('Page Info')</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">

            @include('dashboard.pages.form')

            <div class="col-12">
              <button type="submit" class="btn btn-primary me-1">@lang('Submit')</button>
              <button type="reset" class="btn btn-outline-secondary">@lang('Reset')</button>
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
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

  <script>
    $(document).ready(function() {
      $(function() {
        setInterval(function () {
          $('.mce-notification-inner').css('display', 'none');
          $('#mceu_90').css('display', 'none');
          $('#mceu_91').css('display', 'none');
          $('#mceu_92').css('display', 'none');
          $('#mceu_93').css('display', 'none');
          $('#mceu_46').css('display', 'none');
          $('#mceu_45').css('display', 'none');
        }, 1000);

        if ($("textarea").length > 0) {
          tinymce.init({
            selector: "textarea",
            theme: "modern",
            height: 300,
            relative_urls: false,
            remove_script_host: false,
            plugins: [
              "advlist autolink link image imagetools lists charmap  print preview hr anchor pagebreak spellchecker",
              "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
              "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [
              {title: 'Bold text', inline: 'b'},
              {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
              {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
              {title: 'Example 1', inline: 'span', classes: 'example1'},
              {title: 'Example 2', inline: 'span', classes: 'example2'},
              {title: 'Table styles'},
              {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ],
            images_upload_handler: function (blobInfo, success, failure) {
              var xhr, formData;
              xhr = new XMLHttpRequest();
              xhr.withCredentials = false;
              xhr.open('POST', '{{url('/upload/image')}}');
              var token = '{{ csrf_token() }}';
              xhr.setRequestHeader("X-CSRF-Token", token);
              xhr.onload = function () {
                var json;
                if (xhr.status != 200) {
                  failure('HTTP Error: ' + xhr.status);
                  return;
                }
                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                  failure('Invalid JSON: ' + xhr.responseText);
                  return;
                }
                success(json.location);
              };
              formData = new FormData();
              formData.append('file', blobInfo.blob(), blobInfo.filename());
              xhr.send(formData);
            },
          });
        }




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
