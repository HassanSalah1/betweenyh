const mix = require('laravel-mix')

/*  ################# Dashboard ################# */
const sassOptions = {
    precision: 5,
    includePaths: ['node_modules', 'resources/assets/'],
}

mix.copy('resources/fonts/', 'public/fonts/')

//  Admin CSS
mix.sass('resources/scss/core.scss', 'public/css', { sassOptions })
    .sass('resources/scss/base/themes/dark-layout.scss', 'public/css/base/themes', { sassOptions })
    .sass('resources/scss/base/core/menu/menu-types/vertical-menu.scss', 'public/css/base/core/menu/menu-types', { sassOptions })
    .sass('resources/scss/overrides.scss', 'public/css', { sassOptions })
    .sass('resources/scss/base/custom-rtl.scss', 'public/css/rtl', {
        sassOptions,
    })
    .sass('resources/scss/style-rtl.scss', 'public/css/rtl', { sassOptions })
    .sass('resources/scss/base/plugins/extensions/ext-component-toastr.scss', 'public/css/base/plugins/extensions', { sassOptions })
    // .sass('resources/scss/base/plugins/extensions/ext-component-ratings.scss', 'public/css/base/plugins/extensions', { sassOptions })
    .sass('resources/scss/base/pages/authentication.scss', 'public/css/base/pages', { sassOptions })
    .sass('resources/scss/base/plugins/forms/form-quill-editor.scss', 'public/css/base/plugins/forms', { sassOptions })

//  Admin Vendors Css
mix.copy('resources/vendors/css/vendors.min.css', 'public/vendors/css/vendors.min.css')
mix.copy('resources/vendors/css/vendors-rtl.min.css', 'public/vendors/css/vendors-rtl.min.css')
mix.copy('resources/vendors/css/forms/select/select2.min.css', 'public/vendors/css/forms/select/select2.min.css')
mix.copy('resources/vendors/css/extensions/toastr.min.css', 'public/vendors/css/extensions/toastr.min.css')
mix.copy('resources/vendors/css/tables/datatable/dataTables.bootstrap5.min.css', 'public/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')
mix.copy('resources/vendors/css/tables/datatable/responsive.bootstrap5.min.css', 'public/vendors/css/tables/datatable/responsive.bootstrap5.min.css')
// mix.copy('resources/vendors/css/extensions/jquery.rateyo.min.css', 'public/vendors/css/extensions/jquery.rateyo.min.css')

//  Quill Editor Css
mix.copy('resources/vendors/css/editors/quill/katex.min.css', 'public/vendors/css/editors/quill/katex.min.css')
mix.copy('resources/vendors/css/editors/quill/monokai-sublime.min.css', 'public/vendors/css/editors/quill/monokai-sublime.min.css')
mix.copy('resources/vendors/css/editors/quill/quill.snow.css', 'public/vendors/css/editors/quill/quill.snow.css')
mix.copy('resources/vendors/css/editors/quill/quill.bubble.css', 'public/vendors/css/editors/quill/quill.bubble.css')

//  Admin JS
mix.js('resources/js/core/app-menu.js', 'public/js/core')
mix.js('resources/js/core/app.js', 'public/js/core')
mix.js('resources/js/scripts/forms/form-select2.js', 'public/js/scripts/forms')
mix.js('resources/js/scripts/forms/form-quill-editor.js', 'public/js/scripts/forms')

//  Admin Vendors JS
mix.copy('resources/vendors/js/vendors.min.js', 'public/vendors/js/vendors.min.js')
mix.copy('resources/vendors/js/ui/jquery.sticky.js', 'public/vendors/js/ui/jquery.sticky.js')
mix.copy('resources/vendors/js/forms/select/select2.full.min.js', 'public/vendors/js/forms/select/select2.full.min.js')
mix.copy('resources/vendors/js/extensions/toastr.min.js', 'public/vendors/js/extensions/toastr.min.js')
// mix.copy('resources/vendors/js/extensions/jquery.rateyo.min.js', 'public/vendors/js/extensions/jquery.rateyo.min.js')

//  Admin datatable Vendors JS
mix.copy('resources/vendors/js/tables/datatable/jquery.dataTables.min.js', 'public/vendors/js/tables/datatable/jquery.dataTables.min.js')
mix.copy('resources/vendors/js/tables/datatable/dataTables.bootstrap5.min.js', 'public/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')

//  Quill Editor JS.
mix.copy('resources/vendors/js/editors/quill/katex.min.js', 'public/vendors/js/editors/quill/katex.min.js')
mix.copy('resources/vendors/js/editors/quill/highlight.min.js', 'public/vendors/js/editors/quill/highlight.min.js')
mix.copy('resources/vendors/js/editors/quill/quill.min.js', 'public/vendors/js/editors/quill/quill.min.js')

// mix.copy('resources/css/rtl.css', 'public/css')
mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [require('tailwindcss')])

if (mix.inProduction()) {
    mix.version()
}
