<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') | {{ config('app.name') }}</title>

        <!-- header -- CSS -->  
        <link rel="stylesheet" id="gtranslate-style-css" href="{{ asset('plugins/gtranslate/gtranslate-style24.css')}}" type="text/css" media="all">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}"> 
        <link rel="stylesheet" href="{{ asset('css/bootstrap-responsive.css')}}">
        <link rel="stylesheet" href="{{ asset('fancybox/source/jquery.fancybox.css')}}">
        <link rel="stylesheet" href="{{ asset('css/vector-icons.css')}}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/linecon.css')}}">
        <link rel="stylesheet" href="{{ asset('css/steadysets.css')}}">
        <link rel="stylesheet" href="{{ asset('css/hoverex-all.css')}}">
        <link rel="stylesheet" href="{{ asset('css/jquery.easy-pie-chart.css')}}">
        <link rel="stylesheet" href="{{ asset('css/idangerous.swiper.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/elementor/assets/lib/animations/animations.min.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/elementor/assets/css/frontend.min.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/elementor-pro/assets/css/frontend.min.css')}}">
        <link rel="stylesheet" href="{{ asset('elementor/css/global.css')}}">
        <link rel="stylesheet" href="{{ asset('elementor/css/post-941.css')}}">
        <link rel="stylesheet" href="{{ asset('css/fontsGoogleApis.css')}}">
        <link rel="stylesheet" href="{{ asset('css/initial_style.css')}}">
        <link rel="stylesheet" href="{{ asset('css/dynamic-css.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/sweetalert-master/dist/sweetalert.css')}}">
        <link type="text/css" rel="stylesheet" charset="UTF-8" href="https://translate.googleapis.com/translate_static/css/translateelement.css">
          
        @yield('extracss')

        <!-- header -- JS -->
        <script src="{{ asset('js/jquery.js')}}"></script>
        <script src="{{ asset('js/jquery-migrate.min.js')}}"></script>
        <script src="{{ asset('plugins/revslider/public/assets/js/jquery.themepunch.tools.min.js')}}"></script>
        <script src="{{ asset('plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js')}}"></script>
        <script type="text/javascript">
             /* <![CDATA[ */  
            var codeless_global = { 
                ajaxurl: 'https://visonic.es/wp-admin/admin-ajax.php',
                button_style: 'default'
                }; 
             /* ]]> */ 
        </script>
        <script type="text/javascript" charset="UTF-8" src="https://translate.googleapis.com/translate_static/js/element/main_es.js"></script>
        <script type="text/javascript" charset="UTF-8" src="https://translate.googleapis.com/element/TE_20181015_01/e/js/element/element_main.js"></script>

        @yield('extrajs')

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109150220-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-109150220-1');
        </script>
        
    </head>
    <body class="page-template-default page page-id-941 do-etfw header_1 page_header_yes page_header_centered sticky_active header_shadow_shadow1 wpb-js-composer js-comp-ver-5.0.1 vc_responsive elementor-default elementor-page elementor-page-941" data-elementor-device-mode="tablet" style="position: relative; min-height: 100%; top: 0px;">
        <div class="viewport">
            @yield('content')    
        </div>


        <script type="text/javascript">
            /* <![CDATA[ */
            var ajax_var = {"url":"https:\/\/visonic.es\/wp-admin\/admin-ajax.php","nonce":"d2849b7585"};
            /* ]]> */
        </script>
        <script src="{{ asset('js/post-like.js')}}"></script>
        <script type="text/javascript">
            /* <![CDATA[ */
            var wpcf7 = {"apiSettings":{"root":"https:\/\/visonic.es\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"},"recaptcha":{"messages":{"empty":"Por favor, prueba que no eres un robot."}}};
            /* ]]> */
        </script>
        <script src="{{ asset('plugins/contact-form-7/includes/js/scripts.js')}}"></script>
        <script src="{{ asset('js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('js/jquery.easing.1.1.js')}}"></script>
        <script src="{{ asset('js/jquery.easing.1.3.js')}}"></script>
        <script src="{{ asset('js/jquery.mobilemenu.js')}}"></script>
        <script src="{{ asset('js/isotope.js')}}"></script>
        <script src="{{ asset('js/jquery.flexslider-min.js')}}"></script>
        <script src="{{ asset('fancybox/source/jquery.fancybox.js')}}"></script>
        <script src="{{ asset('fancybox/source/helpers/jquery.fancybox-media.js')}}"></script>
        <script src="{{ asset('js/jquery.carouFredSel-6.1.0-packed.js')}}"></script>
        <script src="{{ asset('js/jquery.hoverex.js')}}"></script>
        <script src="{{ asset('js/tooltip.js')}}"></script>
        <script src="{{ asset('js/jquery.parallax.js')}}"></script>
        <script src="{{ asset('js/modernizr.custom.66803.js')}}"></script>
        <script src="{{ asset('js/jquery.appear.js')}}"></script>
        <script src="{{ asset('js/jquery.easy-pie-chart.js')}}"></script>
        <script src="{{ asset('js/odometer.min.js')}}"></script>
        <script src="{{ asset('js/animations.js')}}"></script>
        <script src="{{ asset('js/main.js')}}"></script>
        <script src="{{ asset('js/comment-reply.min.js')}}"></script>
        <script src="{{ asset('js/jquery.placeholder.min.js')}}"></script>
        <script src="{{ asset('js/jquery.countdown.min.js')}}"></script>
        <script src="{{ asset('js/waypoints.min.js')}}"></script>
        <script src="{{ asset('js/idangerous.swiper.min.js')}}"></script>
        <script src="{{ asset('js/background-check.min.js')}}"></script>
        <script src="{{ asset('js/jquery.fullPage.js')}}"></script>
        <script src="{{ asset('js/skrollr.min.js')}}"></script>
        <script src="{{ asset('js/select2.min.js')}}"></script>
        <script src="{{ asset('js/jquery.slicknav.min.js')}}"></script>
        <script src="{{ asset('js/classie.js')}}"></script>
        <script src="{{ asset('js/jquery.mixitup.js')}}"></script>
        <script src="{{ asset('js/imagesloaded.min.js')}}"></script>
        <script src="{{ asset('js/masonry.min.js')}}"></script>
        <script src="{{ asset('js/jquery.onepage.js')}}"></script>
        <script src="{{ asset('js/jquery.infinitescroll.min.js')}}"></script>
        <!--<script src="{{ asset('plugins/easy-twitter-feed-widget/js/twitter-widgets.js')}}"></script>-->
        <script src="{{ asset('js/wp-embed.min.js')}}"></script>
        <script src="{{ asset('plugins/elementor-pro/assets/lib/sticky-kit/jquery.sticky-kit.min.js')}}"></script>
        <script type="text/javascript">
            /* <![CDATA[ */
            var ElementorProFrontendConfig = {"ajaxurl":"https:\/\/visonic.es\/wp-admin\/admin-ajax.php","nonce":"0b672dd33e","shareButtonsNetworks":{"facebook":{"title":"Facebook","has_counter":true},"twitter":{"title":"Twitter"},"google":{"title":"Google+","has_counter":true},"linkedin":{"title":"LinkedIn","has_counter":true},"pinterest":{"title":"Pinterest","has_counter":true},"reddit":{"title":"Reddit","has_counter":true},"vk":{"title":"VK","has_counter":true},"odnoklassniki":{"title":"OK","has_counter":true},"tumblr":{"title":"Tumblr"},"delicious":{"title":"Delicious"},"digg":{"title":"Digg"},"skype":{"title":"Skype"},"stumbleupon":{"title":"StumbleUpon","has_counter":true},"telegram":{"title":"Telegram"},"pocket":{"title":"Pocket","has_counter":true},"xing":{"title":"XING","has_counter":true},"whatsapp":{"title":"WhatsApp"},"email":{"title":"Email"},"print":{"title":"Print"}},"facebook_sdk":{"lang":"es_ES","app_id":""}};
            /* ]]> */
        </script>
        <script src="{{ asset('plugins/elementor-pro/assets/js/frontend.min.js')}}"></script>
        <script src="{{ asset('js/jquery/ui/position.min.js')}}"></script>
        <script src="{{ asset('plugins/elementor/assets/lib/dialog/dialog.min.js')}}"></script>
        <script src="{{ asset('plugins/elementor/assets/lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{ asset('plugins/elementor/assets/lib/swiper/swiper.jquery.min.js')}}"></script>
        <script type="text/javascript">
            /* <![CDATA[ */
            var elementorFrontendConfig = {"isEditMode":"","is_rtl":"","breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"version":"2.2.4","urls":{"assets":"\/plugins\/elementor\/assets\/"},"settings":{"page":[],"general":{"elementor_global_image_lightbox":"yes","elementor_enable_lightbox_in_editor":"yes"}},"post":{"id":941,"title":"Formulario consulta tu reparaci\u00f3n.","excerpt":""}};
            /* ]]> */
        </script>
        <script src="{{ asset('plugins/elementor/assets/js/frontend.min.js')}}"></script>
        <div id="goog-gt-tt" class="skiptranslate" dir="ltr"><div style="padding: 8px;"><div><div class="logo"><img src="https://www.gstatic.com/images/branding/product/1x/translate_24dp.png" width="20" height="20" alt="Google Traductor de Google"></div></div></div><div class="top" style="padding: 8px; float: left; width: 100%;"><h1 class="title gray">Texto original</h1></div><div class="middle" style="padding: 8px;"><div class="original-text"></div></div><div class="bottom" style="padding: 8px;"><div class="activity-links"><span class="activity-link">Sugiere una traducción mejor</span><span class="activity-link"></span></div><div class="started-activity-container"><hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;"><div class="activity-root"></div></div></div><div class="status-message" style="display: none;"></div></div>
        <script src="{{ asset('plugins/sweetalert-master/dist/sweetalert-dev.js')}}"></script>
        @yield('extracssFooter')

        @yield('extrajsFooter')
    </body>
</html>
