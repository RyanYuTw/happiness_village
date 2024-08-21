<!-- laravel style -->
<script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset('assets/js/config.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

{{--<link rel="modulepreload" href="{{ asset('assets/js/template-customizer.js') }}" />--}}
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<link rel="modulepreload" href="{{ asset('assets/js/config.js') }}" />
<script type="module" src="{{ asset('assets/js/config.js') }}"></script>
{{--<script type="module">--}}
{{--    window.templateCustomizer = new TemplateCustomizer({--}}
{{--        cssPath: '',--}}
{{--        themesPath: '',--}}
{{--        defaultStyle: "light",--}}
{{--        defaultShowDropdownOnHover: "1", // true/false (for horizontal layout only)--}}
{{--        displayCustomizer: "1",--}}
{{--        lang: 'en',--}}
{{--        pathResolver: function(path) {--}}
{{--            var resolvedPaths = {--}}
{{--                // Core stylesheets--}}
{{--                'core.scss': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/core-CJ3e866c.css',--}}
{{--                'core-dark.scss': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/core-dark-ChaG_aud.css',--}}

{{--                // Themes--}}
{{--                'theme-default.scss': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/theme-default-BDdRDG98.css',--}}
{{--                'theme-default-dark.scss': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/theme-default-dark-D2iqss1w.css',--}}
{{--                'theme-bordered.scss': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/theme-bordered-BrWDfhG2.css',--}}
{{--                'theme-bordered-dark.scss': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/theme-bordered-dark-DOu2D5aG.css',--}}
{{--                'theme-semi-dark.scss': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/theme-semi-dark-DhJ0hdki.css',--}}
{{--                'theme-semi-dark-dark.scss': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/build/assets/theme-semi-dark-dark-DHDVl4RN.css',--}}
{{--            }--}}
{{--            return resolvedPaths[path] || path;--}}
{{--        },--}}
{{--        'controls': ["rtl","style","headerType","contentLayout","layoutCollapsed","layoutNavbarOptions","themes"],--}}
{{--    });--}}
{{--</script>--}}
{{--<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5DDHKGP'); </script>--}}