<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>

    <?php if(isset($og)) { ?>
        <meta property="fb:app_id" content="151273565510156" />
        <meta property="og:title" content="<?php echo $og['title']; ?>" />
        <meta property="og:type" content="text/html" />
        <meta property="og:url" content="<?php echo $og['url']; ?>" />
        <meta property="og:image" content="<?php echo $og['image']; ?>" />
        <meta property="og:description" content="<?php echo $og['discription']; ?>" />

    <?php } ?>

    <script src="{{ asset('frontend/scripts/jquery.js') }}"></script>
    <script type="text/javascript">
        var basepath = "{{ url('/')  }}";
        var AccessToken = 'pk.eyJ1IjoiZGF2aWQyNjgxIiwiYSI6ImNpdTVqMzA2dDBpOHgyenF0NDdtNDJ2czkifQ.5traouyL8zEPjtD-X4ggDQ';
    </script>
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('font-awesome/css/font-awesome.min.css') }}" />

    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.42.2/mapbox-gl.css' rel='stylesheet' />
    <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.css' rel='stylesheet' />
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v3.1.1/mapbox-gl-directions.css' type='text/css' />

    <link href='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.css' rel='stylesheet' />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/page-loader.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/styles/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/styles/techybirds.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/styles/loader.css') }}">
</head>
<body>
<div class="wrapper">

    <header class="header header--green">
        <div class="header__left">
            <a href="{{ url('/') }}" class="header__logo"></a>
        </div>
        <div class="header__right">
            <div class="header-navigation">
                <a href="{{ url('/list/rent')  }}" class="header-navigation__item">Listings</a>
                <a href="#" class="header-navigation__item">Explore Areas</a>
                <a href="#" class="header-navigation__item">About Us</a>
            </div>
            <div class="header__lang toggle-lang">
                <button type="button" class="toggle-lang__btn">EN</button>
                <div class="toggle-lang__list">
                    <a href="#" class="toggle-lang__link active">English</a>
                    <a href="#" class="toggle-lang__link">Español</a>
                    <a href="#" class="toggle-lang__link">Português</a>
                </div>
            </div>
            <a href="{{ url('property/add')  }}" class="header__btn">Add Property</a>
            @guest
            <div class="header__login login">
                <button type="button" class="login__btn login__btn--nologin js-popup-open" data-mfp-src="#login" href="{{ route('login') }}">
                    Log In
                </button>

            </div>
            @else
                <div class="header__login login">

                    <button type="button" class="login__btn">{{ Auth::user()->name }}</button>
                    <div class="login__list">
                        <a href="{{ url('my/properties/'.Auth::user()->name)  }}" class="login__item login__item--properties">My Properties</a>
                        <a href="{{ url('collections/'.Auth::user()->name)  }}" class="login__item login__item--properties">My Collection</a>
                        <a href="{{ route('logout') }}" class="login__item login__item--logout"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Log Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </header>

    @yield('content')

</div>
<footer class="footer">
    <div class="container">
        <div class="footer__left">
            <a class="footer__logo" href="#"></a>
            <div class="footer__copyrights">© 2017 All Rights Reserved</div>
            <div class="footer__social">
                <a href="#" class="footer__social-item footer__social-item--fb"></a>
                <a href="#" class="footer__social-item footer__social-item--tw"></a>
                <a href="#" class="footer__social-item footer__social-item--g"></a>
                <a href="#" class="footer__social-item footer__social-item--in"></a>
            </div>
        </div>
        <div class="footer__right">
            <div class="footer-nav">
                <div class="footer-nav__col">
                    <div class="footer-nav__item">
                        <a href="#">About</a>
                    </div>
                    <div class="footer-nav__item">
                        <a href="#">All Listings</a>
                    </div>
                    <div class="footer-nav__item">
                        <a href="#">Media</a>
                    </div>
                    <div class="footer-nav__item">
                        <a href="#">Contact Us</a>
                    </div>
                </div>
                <div class="footer-nav__col">
                    <div class="footer-nav__item">
                        <a href="#">How it works</a>
                    </div>
                    <div class="footer-nav__item">
                        <a href="#">Renting Real Estate</a>
                    </div>
                    <div class="footer-nav__item">
                        <a href="#">Buying</a>
                    </div>
                    <div class="footer-nav__item">
                        <a href="#">Selling</a>
                    </div>
                </div>
                <div class="footer-nav__col">
                    <div class="footer-nav__item">
                        <a href="#">FAQ</a>
                    </div>
                    <div class="footer-nav__item">
                        <a href="#">Blog</a>
                    </div>
                    <div class="footer-nav__item">
                        <a href="#">Guarantee</a>
                    </div>
                    <div class="footer-nav__item">
                        <a href="#">Terms of Usage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="login" class="mfp-hide popup">
        <div class="popup__inner">
            <div class="popup__title">Log In</div>
            <div class="popup-form popup-form--login">
                <form action="#">
                    <div class="popup-form__row">
                        <input class="st-field" type="email" name="login_email" id="login_email" placeholder="e-mail">
                    </div>
                    <div class="popup-form__row">
                        <input class="st-field" type="password" name="login_password" id="login_password"
                               placeholder="password">
                    </div>
                    <div class="popup-form__row">
                        <a href="#" class="popup__link popup__link--bold">forgot password?</a>
                    </div>
                    <div class="popup-form__btns">
                        <button class="popup__ok-btn" type="submit">log in</button>
                    </div>

                    <div class="popup__social-login">
                        <div class="popup__social-login-t">or</div>

                        <div class="popup__center-links">
                            <a href="#" class="popup__social-enter popup__social-enter--fb">
                                login with Facebook
                            </a>
                            <a href="#" class="popup__social-enter popup__social-enter--google">
                                login with Google
                            </a>
                        </div>

                        <div class="popup__signup">
                            Don’t have an account? <a href="#">Sign Up</a>
                        </div>
                    </div>


                </form>
            </div>


        </div>
    </div>

    <?php
    if(Auth::check())
    {
        $collections = Loquare::collections(Auth::user()->id); ?>

        <div id="save-to-collection" class="mfp-hide popup popup--460">
            <div class="popup__inner">
                <div class="popup__title popup__title--sm">Save to collection</div>
                <div class="popup-form popup-form--save-to-collection">
                    <form action="<?php echo url('/'); ?>/savein/collection" method="post">
                        {{ csrf_field() }}
                        <input value="0" name="property" id="collect_property" type="hidden">
                        <div class="popup-form__row">
                            <div class="search-add">
                                <input class="search-add__field" type="text" placeholder="Search or add new collection">
                                <button class="search-add__btn" type="button">Search/Add</button>
                            </div>
                            <div class="list-checks">
                                <?php if($collections != false) { foreach($collections as $collection) { ?>
                                    <div class="list-checks__item">
                                        <input type="radio" id="collect<?= $collection->id; ?>" name="collect" value="<?= $collection->id; ?>">
                                        <label for="collect<?= $collection->id; ?>"><?= $collection->collection; ?><span class="list-checks__count">(<?= $collection->total_property; ?>)</span></label>
                                    </div>
                                <?php } } ?>
                            </div>
                        </div>

                        <div class="popup-form__row">
                            <label class="popup__label" for="collection_comment">Add your private comment</label>
                            <textarea name="collection_comment" id="collection_comment" class="st-field"
                                      placeholder="This comment will only be seen by you"></textarea>
                        </div>

                        <div class="popup-form__btns">
                            <button class="popup__ok-btn" type="submit">save apartment</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    <?php } ?>

    <div id="unsave" class="mfp-hide popup popup--400">
        <div class="popup__inner">
            <div class="popup__subtitle">
                Do you really want to <br> unsave apartment <br> “1-Bedroom in Ciutadela” ?
            </div>
            <div class="popup__btns">
                <button type="button" class="popup__ok-btn">yes, unsave this apartment</button>
                <button type="button" class="popup__cancel-btn">no, leave this apartment</button>
            </div>
        </div>
    </div>

    <div id="delete-collection" class="mfp-hide popup popup--400">
        <div class="popup__inner">
            <div class="popup__subtitle">
                Do you really want to <br> delete collection <br> “<span></span>” ?
            </div>
            <div class="popup__btns">
                <button type="button" class="popup__ok-btn">yes, unsave this apartment</button>
                <button type="button" class="popup__cancel-btn">no, leave this apartment</button>
            </div>
        </div>
    </div>

    <div id="visit-form-success" class="mfp-hide popup popup--460">
        <div class="popup__inner visit-react visit-react--success">
            <div class="visit-react__title">Success!</div>
            <div class="visit-react__img">
                <img src="{{ asset('frontend/assets/icons/subscribed-success-icon.svg') }}" alt="">
            </div>
            <div class="visit-react__desc">
                Congratulations!<br>
                Your message was successfully sent
            </div>
        </div>
    </div>

    <div id="visit-form-fail" class="mfp-hide popup popup--460">
        <div class="popup__inner visit-react visit-react--fail">
            <div class="visit-react__title">Failure!</div>
            <div class="visit-react__img">
                <img src="{{ asset('frontend/assets/icons/subscribed-failure-icon.svg') }}" alt="">
            </div>
            <div class="visit-react__desc">
                Sorry, something went wrong.<br>
                Please try again.
            </div>
        </div>
    </div>


    <div id="delete-image-file" class="mfp-hide popup popup--400">
        <div class="popup__inner">
            <div class="popup__subtitle">
                Do you really want to <br> delete image  <br>?
            </div>
            <div class="popup__btns">
                <button type="button" class="popup__ok-btn">yes, delete this apartment</button>
                <button type="button" class="popup__cancel-btn">no, leave this apartment</button>
            </div>
        </div>
    </div>

    <div id="delete-energy-certificate" class="mfp-hide popup popup--400">
        <div class="popup__inner">
            <div class="popup__subtitle">
                Do you really want to <br> delete energy certificate <br>?
            </div>
            <div class="popup__btns">
                <button type="button" class="popup__ok-btn">yes, delete this apartment</button>
                <button type="button" class="popup__cancel-btn">no, leave this apartment</button>
            </div>
        </div>
    </div>

    <div id="delete-owner-certificate" class="mfp-hide popup popup--400">
        <div class="popup__inner">
            <div class="popup__subtitle">
                Do you really want to <br> delete owner certificate <br>?
            </div>
            <div class="popup__btns">
                <button type="button" class="popup__ok-btn">yes, delete this apartment</button>
                <button type="button" class="popup__cancel-btn">no, leave this apartment</button>
            </div>
        </div>
    </div>




    @include('layouts.notification')

</footer>
<div class="loader-container">
    <div class="loader-wrap">
        <div class="loader">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('frontend/scripts/picturefill.js') }}"></script>
<script src="{{ asset('frontend/scripts/ls.bgset.js') }}"></script>
<script src="{{ asset('frontend/scripts/lazysizes.js') }}"></script>
<script src="{{ asset('frontend/scripts/jquery.validate.js') }}"></script>
<script src="{{ asset('frontend/scripts/wNumb.js') }}"></script>
<script src="{{ asset('frontend/scripts/nouislider.js') }}"></script>
<script src="{{ asset('frontend/scripts/wickedpicker.js') }}"></script>
<script src="{{ asset('frontend/scripts/pikaday.js') }}"></script>
<script src="{{ asset('frontend/scripts/slick.js') }}"></script>
<script src="{{ asset('frontend/scripts/select2.js') }}"></script>

<script src="{{ asset('frontend/scripts/myStackedChart.js') }}"></script>
<script src="{{ asset('frontend/scripts/jquery.dotdotdot.js') }}"></script>
<script src="{{ asset('frontend/scripts/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('frontend/scripts/jquery.textarea_autosize.js') }}"></script>
<script src="{{ asset('frontend/scripts/velocity.js') }}"></script>
<script src="{{ asset('frontend/scripts/jquery.mask.js') }}"></script>
<script src="{{ asset('frontend/scripts/share.js') }}"></script>
<script src="{{ asset('frontend/scripts/imagesUpload.js') }}"></script>
<script src="{{ asset('frontend/scripts/dnd.js') }}"></script>
<script src="{{ asset('frontend/scripts/common.js') }}"></script>


<script type="text/javascript" src="http://cdn.leafletjs.com/leaflet/v1.0.0-beta.2/leaflet.js"></script>
<script type="text/javascript" src="//rawgit.com/mapbox/mapbox-gl-leaflet/master/leaflet-mapbox-gl.js"></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.0.0/leaflet.markercluster.js'></script>

<script type="text/javascript" src='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.js'></script>
<script type="text/javascript" src="https://js.cit.api.here.com/v3/3.0/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.cit.api.here.com/v3/3.0/mapsjs-service.js"></script>

<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.42.2/mapbox-gl.js'></script>
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v3.1.1/mapbox-gl-directions.js'></script>

<?php if( isset($scripts) && $scripts != false) { ?>
<?php foreach($scripts as $script) {?>
<script type="text/javascript" src="<?php echo $script; ?>"></script>
<?php } ?>
<?php } ?>


<script src="{{ asset('frontend/js/functions.js') }}"></script>

</body>
</html>
