<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Gestion de stock</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<style>
      .brand-image {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 10px;
      }


      /* Custom styles for the form */
      body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
        }

      .btn {
    display: inline-block;
    padding: 5px 10px;
    color: #ffffff; /* Couleur du texte en blanc */
    background-color: #24d12a !important; /* Couleur de fond verte avec !important */
    border: 1px solid #24d12a !important; /* Bordure verte avec !important */
    border-radius: 4px;
    cursor: pointer;
}
.btn:hover {
    background-color: #4452e9 !important; /* Couleur de survol légèrement différente avec !important */
}

.bg-welcome-color {
    background-color: #2d2830; /* Remplacez cette valeur par la couleur de votre choix */
}

</style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-yellow-900 antialiased">
        <div class="min-h-screen flex items-center justify-center bg-welcome-color">
            <div class="w-full sm:max-w-md px-2 py-2 bg-white shadow-md overflow-hidden sm:rounded-lg" style="border: 10px solid #3a5083;">
                {{ $slot }}
            </div>
        </div>

    </body>


</html>


{{--<!doctype html>
<html lang="fr-FR" prefix="og: http://ogp.me/ns#">
    <head>
        <meta name =" cf-2fa-verify "content ="vm0lGwZI63Z76Sg4I1NT">
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="profile" href="https://gmpg.org/xfn/11"/>
        <link rel="icon" href="/favicon.gif" type="image/gif" >

<!-- Google Tag Manager for WordPress by gtm4wp.com -->
<script data-cfasync="false" data-pagespeed-no-defer type="text/javascript">//<![CDATA[
	var gtm4wp_datalayer_name = "dataLayer";
	var dataLayer = dataLayer || [];
//]]>
</script>
<!-- End Google Tag Manager for WordPress by gtm4wp.com -->
<!-- Optimisation pour les moteurs de recherche par Rank Math – https://s.rankmath.com/home -->
<title>Login</title><link rel="stylesheet" href="https://www.consulting-web.com/wp-content/cache/min/1/3182c098b3567456e1b82e5d3548dccb.css" media="all" data-minify="1" />
<meta name="description" content="Vous avez un projet de création de site Internet vitrine ? Nous concevons des sites Internet vitrine sur mesure avec Wordpress."/>
<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
<link rel="canonical" href="https://www.consulting-web.com/savoir-faire/developpement-web/creation-de-site-vitrine/" />
<meta property="og:locale" content="fr_FR">
<meta property="og:type" content="article">
<meta property="og:title" content="JLCW | Spécialiste de la création de site Internet vitrine">
<meta property="og:description" content="Vous avez un projet de création de site Internet vitrine ? Nous concevons des sites Internet vitrine sur mesure avec Wordpress.">
<meta property="og:url" content="https://www.consulting-web.com/savoir-faire/developpement-web/creation-de-site-vitrine/">
<meta property="og:site_name" content="Agence JLCW">
<meta property="article:publisher" content="https://www.facebook.com/jlconsultingweb">
<meta property="article:author" content="https://www.facebook.com/JulienLayralPro/">
<meta property="og:updated_time" content="2020-06-02T15:50:21+02:00">
<meta property="fb:admins" content="https://www.facebook.com/JulienLayralPro, https://www.facebook.com/melaniejl.consultingweb.9">
<meta property="og:image" content="https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine.jpg">
<meta property="og:image:secure_url" content="https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine.jpg">
<meta property="og:image:width" content="1920">
<meta property="og:image:height" content="1080">
<meta property="og:image:alt" content="header-site-vitrine">
<meta property="og:image:type" content="image/jpeg">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="JLCW | Spécialiste de la création de site Internet vitrine">
<meta name="twitter:description" content="Vous avez un projet de création de site Internet vitrine ? Nous concevons des sites Internet vitrine sur mesure avec Wordpress.">
<meta name="twitter:image" content="https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine.jpg">
<script type="application/ld+json" class="rank-math-schema">{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": [
                "LocalBusiness",
                "Organization"
            ],
            "@id": "https://www.consulting-web.com/#organization",
            "name": "JLCW",
            "url": "https://www.consulting-web.com",
            "email": "contact@consulting-web.com",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "5 Avenue Albert Raimond",
                "addressLocality": "Saint-Etienne",
                "addressRegion": "Loire",
                "postalCode": "42270",
                "addressCountry": "France"
            },
            "logo": {
                "@type": "ImageObject",
                "url": "https://www.consulting-web.com/wp-content/uploads/2020/06/logo-jlcw-1.png"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": "45.47218704223633",
                "longitude": "4.373348712921143"
            },
            "hasMap": "https://www.google.com/maps/search/?api=1&query=45.47218704223633,4.373348712921143",
            "openingHours": [
                "Monday,Tuesday,Wednesday,Thursday,Friday 09:00-17:00"
            ],
            "image": {
                "@type": "ImageObject",
                "url": "https://www.consulting-web.com/wp-content/uploads/2020/06/logo-jlcw-1.png"
            },
            "telephone": "+33477399366"
        },
        {
            "@type": "WebSite",
            "@id": "https://www.consulting-web.com/#website",
            "url": "https://www.consulting-web.com",
            "name": "JLCW",
            "publisher": {
                "@id": "https://www.consulting-web.com/#organization"
            },
            "inLanguage": "fr-FR",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://www.consulting-web.com/?s={search_term_string}",
                "query-input": "required name=search_term_string"
            }
        },
        {
            "@type": "ImageObject",
            "@id": "https://www.consulting-web.com/savoir-faire/developpement-web/creation-de-site-vitrine/#primaryImage",
            "url": "https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine.jpg",
            "width": 1920,
            "height": 1080
        },
        {
            "@type": "BreadcrumbList",
            "@id": "https://www.consulting-web.com/savoir-faire/developpement-web/creation-de-site-vitrine/#breadcrumb",
            "itemListElement": [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "item": {
                        "@id": "https://www.consulting-web.com",
                        "name": "Accueil"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "item": {
                        "@id": "https://www.consulting-web.com/savoir-faire/developpement-web/",
                        "name": "D\u00e9veloppement web"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 3,
                    "item": {
                        "@id": "https://www.consulting-web.com/savoir-faire/developpement-web/creation-de-site-vitrine/",
                        "name": "Cr\u00e9ation de site vitrine"
                    }
                }
            ]
        },
        {
            "@type": "WebPage",
            "@id": "https://www.consulting-web.com/savoir-faire/developpement-web/creation-de-site-vitrine/#webpage",
            "url": "https://www.consulting-web.com/savoir-faire/developpement-web/creation-de-site-vitrine/",
            "name": "JLCW | Sp\u00e9cialiste de la cr\u00e9ation de site Internet vitrine",
            "datePublished": "2020-03-04T13:46:45+01:00",
            "dateModified": "2020-06-02T15:50:21+02:00",
            "isPartOf": {
                "@id": "https://www.consulting-web.com/#website"
            },
            "primaryImageOfPage": {
                "@id": "https://www.consulting-web.com/savoir-faire/developpement-web/creation-de-site-vitrine/#primaryImage"
            },
            "inLanguage": "fr-FR",
            "breadcrumb": {
                "@id": "https://www.consulting-web.com/savoir-faire/developpement-web/creation-de-site-vitrine/#breadcrumb"
            }
        }
    ]
}</script>
<!-- /Extension Rank Math WordPress SEO -->

<link rel='dns-prefetch' href='//www.consulting-web.com' />
<link rel='dns-prefetch' href='//cdnjs.cloudflare.com' />

<link rel="alternate" type="application/rss+xml" title="Agence JLCW &raquo; Flux" href="https://www.consulting-web.com/feed/" />
<link rel="alternate" type="application/rss+xml" title="Agence JLCW &raquo; Flux des commentaires" href="https://www.consulting-web.com/comments/feed/" />
<style>
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>



<link rel='stylesheet' id='twentynineteen-print-style-css'  href='https://www.consulting-web.com/wp-content/themes/twentynineteen/print.css?ver=1.0.0' media='print' />


<script>
var cnArgs = {"ajaxUrl":"https:\/\/www.consulting-web.com\/wp-admin\/admin-ajax.php","nonce":"c59a0b8e08","hideEffect":"fade","position":"bottom","onScroll":"0","onScrollOffset":"100","onClick":"0","cookieName":"jlcwcookies_accepted","cookieTime":"2592000","cookieTimeRejected":"2592000","cookiePath":"\/","cookieDomain":"","redirection":"0","cache":"1","refuse":"0","revokeCookies":"0","revokeCookiesOpt":"automatic","secure":"1","coronabarActive":"0"};
</script>
<script src='https://www.consulting-web.com/wp-content/plugins/jlcw_cookies/js/front.js?ver=1.0' defer></script>
<script>
var slide_in = {"demo_dir":"https:\/\/www.consulting-web.com\/wp-content\/plugins\/convertplug\/modules\/slide_in\/assets\/demos"};
</script>
<script src='https://www.consulting-web.com/wp-includes/js/jquery/jquery.js?ver=1.12.4-wp' defer></script>
<script src='https://www.consulting-web.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1' defer></script>
<script src='https://www.consulting-web.com/wp-content/plugins/duracelltomi-google-tag-manager/js/gtm4wp-form-move-tracker.js?ver=1.11.2' defer></script>
<script src='https://www.consulting-web.com/wp-content/plugins/Ultimate_VC_Addons/assets/min-js/ultimate-params.min.js?ver=3.16.25' defer></script>
<script src='https://www.consulting-web.com/wp-content/plugins/Ultimate_VC_Addons/assets/min-js/headings.min.js?ver=3.16.25' defer></script>
<script>
var sibErrMsg = {"invalidMail":"Veuillez entrer une adresse e-mail valide.","requiredField":"Veuillez compl\u00e9ter les champs obligatoires.","invalidDateFormat":"Veuillez entrer une date valide.","invalidSMSFormat":"Please fill out valid phone number"};
var ajax_sib_front_object = {"ajax_url":"https:\/\/www.consulting-web.com\/wp-admin\/admin-ajax.php","ajax_nonce":"d90ae93d34","flag_url":"https:\/\/www.consulting-web.com\/wp-content\/plugins\/mailin\/img\/flags\/"};
</script>
<script src='https://www.consulting-web.com/wp-content/plugins/mailin/js/mailin-front.js?ver=1611219580' defer></script>
<link rel='https://api.w.org/' href='https://www.consulting-web.com/wp-json/' />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://www.consulting-web.com/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://www.consulting-web.com/wp-includes/wlwmanifest.xml" />
<meta name="generator" content="WordPress 5.4.10" />
<link rel='shortlink' href='https://www.consulting-web.com/?p=106' />
<link rel="alternate" type="application/json+oembed" href="https://www.consulting-web.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.consulting-web.com%2Fsavoir-faire%2Fdeveloppement-web%2Fcreation-de-site-vitrine%2F" />
<link rel="alternate" type="text/xml+oembed" href="https://www.consulting-web.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.consulting-web.com%2Fsavoir-faire%2Fdeveloppement-web%2Fcreation-de-site-vitrine%2F&#038;format=xml" />

<!-- Google Tag Manager for WordPress by gtm4wp.com -->
<script data-cfasync="false" data-pagespeed-no-defer type="text/javascript">//<![CDATA[
	var dataLayer_content = {"pageTitle":"JLCW | Spécialiste de la création de site Internet vitrine","pagePostType":"savoir-faire","pagePostType2":"single-savoir-faire","deviceType":"","deviceManufacturer":"","deviceModel":""};
	dataLayer.push( dataLayer_content );//]]>
</script>
<script data-cfasync="false">//<![CDATA[
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.'+'js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TKPJZ74');//]]>
</script>
<!-- End Google Tag Manager -->
<!-- End Google Tag Manager for WordPress by gtm4wp.com -->
<!-- Facebook Pixel Code -->
<script type='text/javascript'>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
</script>
<!-- End Facebook Pixel Code -->
<script type='text/javascript'>
  fbq('init', '1572413729688138', {}, {
    "agent": "wordpress-5.4.10-3.0.0"
});
</script><script type='text/javascript'>
  fbq('track', 'PageView', []);
</script>
<!-- Facebook Pixel Code -->
<noscript>
<img height="1" width="1" style="display:none" alt="fbpx"
src="https://www.facebook.com/tr?id=1572413729688138&ev=PageView&noscript=1" />
</noscript>
<!-- End Facebook Pixel Code -->
<meta name="generator" content="Powered by WPBakery Page Builder - drag and drop page builder for WordPress."/>
<link rel="icon" href="https://www.consulting-web.com/wp-content/uploads/2020/07/cropped-logo-jlcw-32x32.png" sizes="32x32" />
<link rel="icon" href="https://www.consulting-web.com/wp-content/uploads/2020/07/cropped-logo-jlcw-192x192.png" sizes="192x192" />
<link rel="apple-touch-icon" href="https://www.consulting-web.com/wp-content/uploads/2020/07/cropped-logo-jlcw-180x180.png" />
<meta name="msapplication-TileImage" content="https://www.consulting-web.com/wp-content/uploads/2020/07/cropped-logo-jlcw-270x270.png" />
<style type="text/css" data-type="vc_custom-css">footer#colophon{
    padding-top: 0;
}</style><style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1589360922217{padding-bottom: 100px !important;}.vc_custom_1589481952711{padding-top: 0px !important;}.vc_custom_1589813213368{padding-bottom: 0px !important;}.vc_custom_1590742778753{margin-top: 25px !important;}.vc_custom_1589481249246{background-color: #fcde1a !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1589364516201{padding-right: 40px !important;}.vc_custom_1589364531227{padding-left: 40px !important;}.vc_custom_1589367890813{margin-bottom: 0px !important;}.vc_custom_1589367898279{margin-bottom: 0px !important;}</style><noscript><style> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript><noscript><style id="rocket-lazyload-nojs-css">.rll-youtube-player, [data-lazy-src]{display:none !important;}</style></noscript>    </head>

    <body class="savoir-faire-template-default single single-savoir-faire postid-106 wp-custom-logo wp-embed-responsive singular image-filters-enabled footer-default loading wpb-js-composer js-comp-ver-6.2.0 vc_responsive">
                <div id="body_overflow">
            <div id="logo-load">
                <div id="bg-logo-load">
                </div>
                <div id="symbol-logo-load">
                </div>
                <span></span>
            </div>
        </div>

        <div id="jlcw-left-bar-container">
            <div id="jlcw-left-bar">
                <!-- Conteneur pour centrer le contenu -->
                <div class="container">
                    <div class="min-h-screen flex items-center justify-center bg-welcome-color">
                        <div class="w-full sm:max-w-md px-2 py-2 bg-white shadow-md overflow-hidden sm:rounded-lg" style="border: 10px solid #3a5083;">
                            {{ $slot }} <!-- Votre formulaire de connexion ici -->
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content">Aller au contenu</a>

                            <header id="masthead"
                        class="site-header featured-image header-savoir-faire-container">


                    <div id="jlcw-header">
                        <div class="site-branding-container">
                            <div id="top-bar">
    <div class="top-bar-left">
        <div class="site-branding">

    </div>
        <div class="top-bar-right top-bar-fade">


<a href="/demande-de-devis" class="top-bar-cta animated-arrow">
	<span class='the-arrow -left'>

</span>
<span class='main'>

<span class='the-arrow -right'>

</span>
</span>
</a></div></section>            </div>
</div>
                        </div><!-- .site-branding-container -->
                        <div id="header-sf-106" class="header-single header-sf">
    <div class="header-cover-container">
                    <div data-bg="https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine.jpg" class="header-cover rocket-lazyload" style=""><img width="1920" height="1080" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%201920%201080'%3E%3C/svg%3E" class="attachment-full size-full wp-post-image" alt="header-site-vitrine" data-lazy-srcset="https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine.jpg 1920w, https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine-300x169.jpg 300w, https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine-1024x576.jpg 1024w, https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine-768x432.jpg 768w, https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine-1536x864.jpg 1536w, https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine-991x557.jpg 991w, https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine-650x366.jpg 650w, https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine-1568x882.jpg 1568w" data-lazy-sizes="(max-width: 1920px) 100vw, 1920px" title="Agence Web : création de site Internet vitrine 1" data-lazy-src="https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine.jpg"><noscript><img width="1920" height="1080" src="https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine.jpg" class="attachment-full size-full wp-post-image" alt="header-site-vitrine" srcset="https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine.jpg 1920w, https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine-300x169.jpg 300w, https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine-1024x576.jpg 1024w, https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine-768x432.jpg 768w, https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine-1536x864.jpg 1536w, https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine-991x557.jpg 991w, https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine-650x366.jpg 650w, https://www.consulting-web.com/wp-content/uploads/2020/03/header-site-vitrine-1568x882.jpg 1568w" sizes="(max-width: 1920px) 100vw, 1920px" title="Agence Web : création de site Internet vitrine 1"></noscript>            </div>
                <div class="header-title-container">

            <div id="breadcrumb">
                <div class="block"></div>
                            </div>

                    </div>

<!--        -->    </div>

</div>
                    </div>



                </header><!-- #masthead -->

                        <div id="content" class="site-content">

    <div class="wrap">
        <div id="primary" class="content-area">

        </div><!-- #primary -->
    </div><!-- .wrap -->


</div><!-- #content -->

</div><!-- #page -->

			<script type="text/javascript" id="modal">
				document.addEventListener("DOMContentLoaded", function(){
					startclock();
				});
				function stopclock (){
					if(timerRunning) clearTimeout(timerID);
					timerRunning = false;
						//document.cookie="time=0";
					}
					function showtime () {
						var now = new Date();
						var my = now.getTime() ;
						now = new Date(my-diffms) ;
						//document.cookie="time="+now.toLocaleString();
						timerID = setTimeout('showtime()',10000);
						timerRunning = true;
					}
					function startclock () {
						stopclock();
						showtime();
					}
					var timerID = null;
					var timerRunning = false;
					var x = new Date() ;
					var now = x.getTime() ;
					var gmt = 1696508482 * 1000 ;
					var diffms = (now - gmt) ;
				</script>
								<script type="text/javascript" id="info-bar">
					document.addEventListener("DOMContentLoaded", function(){
						startclock();
					});
					function stopclock (){
						if(timerRunning) clearTimeout(timerID);
						timerRunning = false;
						//document.cookie="time=0";
					}
					function showtime () {
						var now = new Date();
						var my = now.getTime() ;
						now = new Date(my-diffms) ;
						//document.cookie="time="+now.toLocaleString();
						timerID = setTimeout('showtime()',10000);
						timerRunning = true;
					}
					function startclock () {
						stopclock();
						showtime();
					}
					var timerID = null;
					var timerRunning = false;
					var x = new Date() ;
					var now = x.getTime() ;
					var gmt = 1696508482 * 1000 ;
					var diffms = (now - gmt) ;
				</script>
								<script type="text/javascript" id="slidein">
					document.addEventListener("DOMContentLoaded", function(){
						startclock();
					});
					function stopclock (){
						if(timerRunning) clearTimeout(timerID);
						timerRunning = false;
						//document.cookie="time=0";
					}

					function showtime () {
						var now = new Date();
						var my = now.getTime() ;
						now = new Date(my-diffms) ;
						//document.cookie="time="+now.toLocaleString();
						timerID = setTimeout('showtime()',10000);
						timerRunning = true;
					}

					function startclock () {
						stopclock();
						showtime();
					}
					var timerID = null;
					var timerRunning = false;
					var x = new Date() ;
					var now = x.getTime() ;
					var gmt = 1696508482 * 1000 ;
					var diffms = (now - gmt) ;
				</script>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TKPJZ74"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) --><!-- Instagram Feed JS -->
<script type="text/javascript">
var sbiajaxurl = "https://www.consulting-web.com/wp-admin/admin-ajax.php";
</script>
<div id='fb-pxl-ajax-code'></div><script type="text/html" id="wpb-modifications"></script>
<script>
"use strict";var _createClass=function(){function defineProperties(target,props){for(var i=0;i<props.length;i++){var descriptor=props[i];descriptor.enumerable=descriptor.enumerable||!1,descriptor.configurable=!0,"value"in descriptor&&(descriptor.writable=!0),Object.defineProperty(target,descriptor.key,descriptor)}}return function(Constructor,protoProps,staticProps){return protoProps&&defineProperties(Constructor.prototype,protoProps),staticProps&&defineProperties(Constructor,staticProps),Constructor}}();function _classCallCheck(instance,Constructor){if(!(instance instanceof Constructor))throw new TypeError("Cannot call a class as a function")}var RocketBrowserCompatibilityChecker=function(){function RocketBrowserCompatibilityChecker(options){_classCallCheck(this,RocketBrowserCompatibilityChecker),this.passiveSupported=!1,this._checkPassiveOption(this),this.options=!!this.passiveSupported&&options}return _createClass(RocketBrowserCompatibilityChecker,[{key:"_checkPassiveOption",value:function(self){try{var options={get passive(){return!(self.passiveSupported=!0)}};window.addEventListener("test",null,options),window.removeEventListener("test",null,options)}catch(err){self.passiveSupported=!1}}},{key:"initRequestIdleCallback",value:function(){!1 in window&&(window.requestIdleCallback=function(cb){var start=Date.now();return setTimeout(function(){cb({didTimeout:!1,timeRemaining:function(){return Math.max(0,50-(Date.now()-start))}})},1)}),!1 in window&&(window.cancelIdleCallback=function(id){return clearTimeout(id)})}},{key:"isDataSaverModeOn",value:function(){return"connection"in navigator&&!0===navigator.connection.saveData}},{key:"supportsLinkPrefetch",value:function(){var elem=document.createElement("link");return elem.relList&&elem.relList.supports&&elem.relList.supports("prefetch")&&window.IntersectionObserver&&"isIntersecting"in IntersectionObserverEntry.prototype}},{key:"isSlowConnection",value:function(){return"connection"in navigator&&"effectiveType"in navigator.connection&&("2g"===navigator.connection.effectiveType||"slow-2g"===navigator.connection.effectiveType)}}]),RocketBrowserCompatibilityChecker}();
</script>
<script>
var RocketPreloadLinksConfig = {"excludeUris":"\/|\/savoir-faire\/developpement-web\/creation-de-site-vitrine\/wordpress-copy\/|\/savoir-faire\/developpement-web\/creation-de-site-vitrine\/wordpress-copy-copy\/|\/__trashed\/|\/(.+\/)?feed\/?.+\/?|\/(?:.+\/)?embed\/|\/(index\\.php\/)?wp\\-json(\/.*|$)|\/wp-admin\/|\/logout\/|\/wp-login.php","usesTrailingSlash":"1","imageExt":"jpg|jpeg|gif|png|tiff|bmp|webp|avif","fileExt":"jpg|jpeg|gif|png|tiff|bmp|webp|avif|php|pdf|html|htm","siteUrl":"https:\/\/www.consulting-web.com","onHoverDelay":"100","rateThrottle":"3"};
</script>
<script>
(function() {
"use strict";var r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},e=function(){function i(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(e,t,n){return t&&i(e.prototype,t),n&&i(e,n),e}}();function i(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}var t=function(){function n(e,t){i(this,n),this.browser=e,this.config=t,this.options=this.browser.options,this.prefetched=new Set,this.eventTime=null,this.threshold=1111,this.numOnHover=0}return e(n,[{key:"init",value:function(){!this.browser.supportsLinkPrefetch()||this.browser.isDataSaverModeOn()||this.browser.isSlowConnection()||(this.regex={excludeUris:RegExp(this.config.excludeUris,"i"),images:RegExp(".("+this.config.imageExt+")$","i"),fileExt:RegExp(".("+this.config.fileExt+")$","i")},this._initListeners(this))}},{key:"_initListeners",value:function(e){-1<this.config.onHoverDelay&&document.addEventListener("mouseover",e.listener.bind(e),e.listenerOptions),document.addEventListener("mousedown",e.listener.bind(e),e.listenerOptions),document.addEventListener("touchstart",e.listener.bind(e),e.listenerOptions)}},{key:"listener",value:function(e){var t=e.target.closest("a"),n=this._prepareUrl(t);if(null!==n)switch(e.type){case"mousedown":case"touchstart":this._addPrefetchLink(n);break;case"mouseover":this._earlyPrefetch(t,n,"mouseout")}}},{key:"_earlyPrefetch",value:function(t,e,n){var i=this,r=setTimeout(function(){if(r=null,0===i.numOnHover)setTimeout(function(){return i.numOnHover=0},1e3);else if(i.numOnHover>i.config.rateThrottle)return;i.numOnHover++,i._addPrefetchLink(e)},this.config.onHoverDelay);t.addEventListener(n,function e(){t.removeEventListener(n,e,{passive:!0}),null!==r&&(clearTimeout(r),r=null)},{passive:!0})}},{key:"_addPrefetchLink",value:function(i){return this.prefetched.add(i.href),new Promise(function(e,t){var n=document.createElement("link");n.rel="prefetch",n.href=i.href,n.onload=e,n.onerror=t,document.head.appendChild(n)}).catch(function(){})}},{key:"_prepareUrl",value:function(e){if(null===e||"object"!==(void 0===e?"undefined":r(e))||!1 in e||-1===["http:","https:"].indexOf(e.protocol))return null;var t=e.href.substring(0,this.config.siteUrl.length),n=this._getPathname(e.href,t),i={original:e.href,protocol:e.protocol,origin:t,pathname:n,href:t+n};return this._isLinkOk(i)?i:null}},{key:"_getPathname",value:function(e,t){var n=t?e.substring(this.config.siteUrl.length):e;return n.startsWith("/")||(n="/"+n),this._shouldAddTrailingSlash(n)?n+"/":n}},{key:"_shouldAddTrailingSlash",value:function(e){return this.config.usesTrailingSlash&&!e.endsWith("/")&&!this.regex.fileExt.test(e)}},{key:"_isLinkOk",value:function(e){return null!==e&&"object"===(void 0===e?"undefined":r(e))&&(!this.prefetched.has(e.href)&&e.origin===this.config.siteUrl&&-1===e.href.indexOf("?")&&-1===e.href.indexOf("#")&&!this.regex.excludeUris.test(e.href)&&!this.regex.images.test(e.href))}}],[{key:"run",value:function(){"undefined"!=typeof RocketPreloadLinksConfig&&new n(new RocketBrowserCompatibilityChecker({capture:!0,passive:!0}),RocketPreloadLinksConfig).init()}}]),n}();t.run();
}());
</script>
<script>
var ajaxurl = "https:\/\/www.consulting-web.com\/wp-admin\/admin-ajax.php";
</script>
<script src='https://www.consulting-web.com/wp-content/themes/jlcw/dist/bundle.js' defer></script>
<script src='https://www.consulting-web.com/wp-content/plugins/Ultimate_VC_Addons/assets/min-js/content-box.min.js?ver=3.16.25' defer></script>
<script src='https://www.consulting-web.com/wp-includes/js/wp-embed.min.js?ver=5.4.10' defer></script>
<script src='https://www.consulting-web.com/wp-content/plugins/js_composer/assets/js/dist/js_composer_front.min.js?ver=6.2.0' defer></script>
<script src='https://www.consulting-web.com/wp-content/plugins/js_composer/assets/lib/vc_waypoints/vc-waypoints.min.js?ver=6.2.0' defer></script>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>

		<!-- JLCW Cookies plugin v1.0 by JLCw https://wwwconsutling-web.com/ -->
		<div id="jlcwcookies" role="banner" class="jlcwcookies-hidden cookie-revoke-hidden jc-position-bottom" aria-label="JLCW Cookies" style="background-color: rgba(0,0,0,1);"><div class="jlcwcookies-container" style="color: #fff;"><span id="jc-notice-text" class="jc-text-container">Ce site utilise des cookies pour améliorer votre expérience. Ils nous permettent également d’optimiser le fonctionnement de notre site. En continuant sur notre site, vous acceptez l'utilisation de nos cookies.</span><span id="jc-notice-buttons" class="jc-buttons-container">
		<a href="#" id="jc-accept-cookie" data-cookie-set="accept" class="jc-set-cookie" aria-label="Ok" style="background: #5cb85c;">Ok</a></span><a href="javascript:void(0);" id="jc-close-notice" data-cookie-set="accept" class="jc-close-icon" aria-label="Ok"></a></div>
			</div>
		<!-- / JLCW Cookies plugin --><script>window.lazyLoadOptions={elements_selector:"img[data-lazy-src],.rocket-lazyload,iframe[data-lazy-src]",data_src:"lazy-src",data_srcset:"lazy-srcset",data_sizes:"lazy-sizes",class_loading:"lazyloading",class_loaded:"lazyloaded",threshold:300,callback_loaded:function(element){if(element.tagName==="IFRAME"&&element.dataset.rocketLazyload=="fitvidscompatible"){if(element.classList.contains("lazyloaded")){if(typeof window.jQuery!="undefined"){if(jQuery.fn.fitVids){jQuery(element).parent().fitVids()}}}}}};window.addEventListener('LazyLoad::Initialized',function(e){var lazyLoadInstance=e.detail.instance;if(window.MutationObserver){var observer=new MutationObserver(function(mutations){var image_count=0;var iframe_count=0;var rocketlazy_count=0;mutations.forEach(function(mutation){for(var i=0;i<mutation.addedNodes.length;i++){if(typeof mutation.addedNodes[i].getElementsByTagName!=='function'){continue}
if(typeof mutation.addedNodes[i].getElementsByClassName!=='function'){continue}
images=mutation.addedNodes[i].getElementsByTagName('img');is_image=mutation.addedNodes[i].tagName=="IMG";iframes=mutation.addedNodes[i].getElementsByTagName('iframe');is_iframe=mutation.addedNodes[i].tagName=="IFRAME";rocket_lazy=mutation.addedNodes[i].getElementsByClassName('rocket-lazyload');image_count+=images.length;iframe_count+=iframes.length;rocketlazy_count+=rocket_lazy.length;if(is_image){image_count+=1}
if(is_iframe){iframe_count+=1}}});if(image_count>0||iframe_count>0||rocketlazy_count>0){lazyLoadInstance.update()}});var b=document.getElementsByTagName("body")[0];var config={childList:!0,subtree:!0};observer.observe(b,config)}},!1)</script><script data-no-minify="1" async src="https://www.consulting-web.com/wp-content/plugins/wp-rocket/assets/js/lazyload/17.5/lazyload.min.js"></script><script>function lazyLoadThumb(e){var t='<img data-lazy-src="https://i.ytimg.com/vi/ID/hqdefault.jpg" alt="" width="480" height="360"><noscript><img src="https://i.ytimg.com/vi/ID/hqdefault.jpg" alt="" width="480" height="360"></noscript>',a='<button class="play" aria-label="play Youtube video"></button>';return t.replace("ID",e)+a}function lazyLoadYoutubeIframe(){var e=document.createElement("iframe"),t="ID?autoplay=1";t+=0===this.parentNode.dataset.query.length?'':'&'+this.parentNode.dataset.query;e.setAttribute("src",t.replace("ID",this.parentNode.dataset.src)),e.setAttribute("frameborder","0"),e.setAttribute("allowfullscreen","1"),e.setAttribute("allow", "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"),this.parentNode.parentNode.replaceChild(e,this.parentNode)}document.addEventListener("DOMContentLoaded",function(){var e,t,p,a=document.getElementsByClassName("rll-youtube-player");for(t=0;t<a.length;t++)e=document.createElement("div"),e.setAttribute("data-id",a[t].dataset.id),e.setAttribute("data-query", a[t].dataset.query),e.setAttribute("data-src", a[t].dataset.src),e.innerHTML=lazyLoadThumb(a[t].dataset.id),a[t].appendChild(e),p=e.querySelector('.play'),p.onclick=lazyLoadYoutubeIframe});</script>
</body>
</html>--}}

