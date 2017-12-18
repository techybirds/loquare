@extends('layouts.app')
@section('title', 'Loquare | Add Property')
@section('content')
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.1.1/mapbox-gl-geocoder.css' type='text/css' />
    <style type="text/css">
        .popup_map
        {
            position: fixed;
            top:0;
            bottom:0;
            left:0;
            right:0;
            z-index: 99;
        }
        .close_map
        {
            position: absolute;
            right: 30px;
            top:30px;
            z-index: 999;
            float: right;
        }
        #property_location
        {
            position: absolute;
            height: 100%;
            width: 100%;
        }
        .add_location
        {
            margin-top: 27px;
            width: 100%;
            padding: 12px;
            border-radius: 0;
            border: 1px solid #CCC;
            background-color: #00AB8A;
            color: #FFF;
        }
        #how_to_add
        {
            display: inline-block;
            position: relative;
            float: right;
            padding: 6px;
            background-color: #00AB8A;
            color: #FFF;
        }

        .processbar {
            top: 50%;
            left: 50%;
            height: 20px;
            width: 200px;
            margin-top: 0px;
            border-radius: 20px;
            background-image: -webkit-linear-gradient(-45deg, #00ab8a 25%, rgba(255, 154, 26, 0) 25%, rgba(255, 154, 26, 0) 50%, #00ab8a 50%, #00ab8a 75%, rgba(255, 154, 26, 0) 75%);
            background-image: -moz-linear-gradient(-45deg, #00ab8a 25%, rgba(255, 154, 26, 0) 25%, rgba(255, 154, 26, 0) 50%, #00ab8a 50%, #00ab8a 75%, rgba(255, 154, 26, 0) 75%);
            background-image: -o-linear-gradient(-45deg, #00ab8a 25%, rgba(255, 154, 26, 0) 25%, rgba(255, 154, 26, 0) 50%, #00ab8a 50%, #00ab8a 75%, rgba(255, 154, 26, 0) 75%);
            background-image: linear-gradient(-45deg, #00ab8a 25%, rgba(255, 154, 26, 0) 25%, rgba(255, 154, 26, 0) 50%, #00ab8a 50%, #00ab8a 75%, rgba(255, 154, 26, 0) 75%);
            background-color: #d3d3d3;
            background-size: 50px 50px;
            border: 1px solid #00ab8a;
            border-bottom-color: #00ab8a;
            -webkit-box-shadow: inset 0 10px 0 rgba(255, 255, 255, 0.2);
            box-shadow: inset 0 10px 0 rgba(255, 255, 255, 0.2);
            -webkit-animation: move 2s linear infinite;
            -moz-animation: move 2s linear infinite;
            -ms-animation: move 2s linear infinite;
            animation: move 2s linear infinite;
            margin: 30px auto;
        }


        @-webkit-keyframes move {
            0%   { background-position: 0 0; }
            100% { background-position: 50px 50px; }
        }

        @-moz-keyframes move {
            0%   { background-position: 0 0; }
            100% { background-position: 50px 50px; }
        }

        @-ms-keyframes move {
            0%   { background-position: 0 0; }
            100% { background-position: 50px 50px; }
        }

        @-webkit-keyframes move {
            0%   { background-position: 0 0; }
            100% { background-position: 50px 50px; }
        }
        .add_property_loader
        {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 999999;
            background-color: rgba(255,255,255,0.9);
            padding-top: 10%;
            text-align: center;
            display: none;
        }
    </style>

    <main>
        <div class="add_property_loader">
            <div class="loquare_load">
                <svg width="155" height="43" viewBox="0 0 155 43" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>logo-white</title>
                    <g fill="none" fill-rule="evenodd">
                        <g transform="translate(129 7)">
                            <path d="M20.939 9.061c-.834-2.277-3.862-4.944-7.57-5.061-4.194-.132-7.406 2.616-8.35 5.061h15.92zm4.909 3.966H4.78c-.588 0-.575-.001-.496.547.412 2.826 1.971 4.905 4.502 6.325 1.487.834 3.104 1.132 4.83 1.028 2.588-.157 4.63-1.268 6.25-3.161.3-.351.525-.76.8-1.132.073-.1.2-.232.304-.233 1.411-.015 2.824-.01 4.245-.01-1.49 4.852-6.898 8.94-13.047 8.492-7.753-.564-12.58-6.96-12-13.429C.812 4.288 7.445-.557 14.205.116 21.53.845 26.18 6.925 25.848 13.027z" fill="#00AB8A" mask="url(#b)"/>
                        </g>
                        <path d="M99.487 10.97c-4.71.003-8.526 3.828-8.52 8.558.004 4.618 3.772 8.506 8.54 8.502 4.8-.002 8.525-3.983 8.517-8.52-.007-4.714-3.904-8.604-8.537-8.54m8.51 19.992v-2.355c-.53.44-1 .868-1.51 1.244-1.704 1.256-3.64 1.867-5.735 2.082a12.267 12.267 0 0 1-6.227-.97c-2.47-1.07-4.406-2.77-5.782-5.085-1.245-2.096-1.828-4.373-1.733-6.805.119-3.029 1.17-5.694 3.216-7.96a12.382 12.382 0 0 1 4.938-3.348c1.803-.67 3.675-.888 5.591-.7 1.865.182 3.607.746 5.2 1.728 2.469 1.52 4.244 3.615 5.258 6.343.58 1.555.792 3.16.787 4.808-.01 3.49-.003 6.98-.003 10.471 0 .568 0 .568-.588.568h-2.924c-.139 0-.277-.012-.488-.021M62 8.506c-.002-.378.093-.516.498-.505a65.46 65.46 0 0 0 3.07.001c.349-.007.433.111.432.442-.01 4.395-.009 8.79-.006 13.187.003 2.87 2.073 5.528 4.89 6.192 2.991.705 5.85-.542 7.318-3.242.514-.946.747-1.946.745-3.02-.011-4.345-.005-8.69-.005-13.034 0-.516.001-.517.537-.517 1.036 0 2.073.01 3.109-.007.329-.005.412.109.411.421-.008 4.358.014 8.715-.013 13.072-.017 2.871-.987 5.395-3.046 7.455-1.738 1.738-3.854 2.706-6.314 2.981-1.97.22-3.843-.099-5.629-.91-2.002-.907-3.527-2.35-4.63-4.231-.992-1.695-1.38-3.536-1.364-5.483.018-1.96.005-3.921.005-5.882 0-2.307.007-4.613-.008-6.92zM26.444 20.083c.083-5.389-4.513-9.663-9.698-9.536-4.782.118-9.422 4.086-9.18 9.953.198 4.81 4.175 8.935 9.421 8.968 5.154.032 9.457-4.26 9.457-9.385M16.955 32C10.361 32.007 4.987 26.657 5 20.016 5.014 13.23 10.443 7.85 17.244 8.003c6.602.149 11.596 5.327 11.752 11.716.169 6.895-5.396 12.326-12.041 12.28m101.985-1.031c-.16.01-.284.024-.409.025-1.03.002-2.06-.01-3.09.007-.318.005-.442-.067-.441-.42.01-7.332.01-14.664.002-21.995 0-.314.089-.421.408-.416 1.055.016 2.111.013 3.166.001.278-.003.383.074.368.368-.024.493-.006.989-.006 1.519.1-.035.176-.043.23-.083 2.404-1.746 5.085-2.267 7.988-1.825.843.128.844.122.844.966 0 1.018 0 2.037-.002 3.055 0 .072-.018.144-.033.254l-.82-.23c-2.989-.848-5.937.362-7.45 3.077-.516.927-.753 1.94-.753 3.001-.002 4.073-.001 8.146-.001 12.22v.476zM2 0v31c-.625 0-1.236.004-1.847-.01-.049 0-.123-.12-.139-.199-.024-.123-.01-.26-.01-.39V.552C.004.001.004 0 .448 0H2m43 15a5 5 0 1 0 0 10 5 5 0 0 0 0-10" fill="#00ab8a"/>
                        <path d="M44.998 28.38c-4.762 0-8.622-3.817-8.622-8.526 0-4.71 3.86-8.527 8.622-8.527 4.762 0 8.622 3.818 8.622 8.527s-3.86 8.526-8.622 8.526zm12.993-8.156c.003-.123.005-.246.005-.37 0-7.1-5.82-12.854-12.998-12.854C37.82 7 32 12.755 32 19.854c0 7.098 5.82 12.854 12.998 12.854 3.236 0 6.195-1.17 8.47-3.104V35L58 31.24V20.213l-.01.01zm.006 20.157l.003-.117c0-.06-.003-.118-.007-.176L57.917 34s-5.199 4.435-5.457 4.809l-.067.059.015.02A2.541 2.541 0 0 0 52 40.264C52 41.775 53.343 43 55 43c1.513 0 2.763-1.02 2.97-2.349l.03-.01-.003-.26z" fill="#00ab8a"/>
                    </g>
                </svg>
            </div>
            <h4> Please wait! Loquare is adding your property...</h4>
            <div class="processbar"></div>
        </div>

        <div class="page">
            <div class="container">
                <div class="page__title">Add Property</div>

                <?php if($success != "") { ?>
                <div class="alert alert-success">
                    <strong>Success!</strong> <?php echo $success; ?>
                </div>
                <?php } if($error != "") { ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> <?php echo $error; ?>
                </div>
                <?php } ?>

                <div class="page__cols2">

                    <div class="col" id="sidebar"  >
                        <div class='inside filterSlide'>
                            <div class="steps ">

                                <div class="steps__item" id='about'> <!-- <i class="fa fa-check-circle" style="font-size:30px;color:green"></i> -->Tell us about the deal</div>
                                <div class="steps__item" id='property'>Property details</div>
                                <div class="steps__item" id='document'>Documentation</div>
                                <div class="steps__item" id='contact'>Your contact info</div>
                                <div class="steps__item" id='publish'>Publish listing</div>
                            </div>

                            <div class="help">
                                <div class="help__title">Need help adding a property?</div>
                                <div class="help__desc">Call us now</div>
                                <a href="tel:+343404919" class="help__phone">+34 340 4919</a>
                                <div class="help__desc">Or send us a message using the form:</div>
                                <div class="help__form">
                                    <form action="#">
                                        <div class="help__cols">
                                            <div class="col">
                                                <input type="text" class="st-field" placeholder="Your Name">
                                            </div>
                                            <div class="col">
                                                <input type="tel" class="st-field" placeholder="Your Phone">
                                            </div>
                                        </div>
                                        <div class="help__row">
                                            <input type="email" class="st-field" placeholder="Your Email">
                                        </div>
                                        <div class="help__row">
                                            <textarea class="st-field" name="" id=""  placeholder="Please describe your problem here and we will do our best to help you within 24 hours"></textarea>
                                        </div>
                                        <button type="submit" class="help__submit">submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id='content' class="main_content">
                        <form action="{{ url('/property/submit') }}" method="post" enctype="multipart/form-data" id="add_property_form">
                            {{csrf_field()}}
                            <div class="col">
                                <div class="add-property">
                                    <div class="add-property__section" id='slideToabout'>
                                        <div class="add-property__title">Tell us about the deal</div>
                                        <div class="add-property__cols3bad">
                                            <div class="col">
                                                <div class="st-label"> <span class="fild-error property_for-error"></span> Property type</div>
                                                <div class="radio">
                                                    <input type="radio" name="property_for" id="residential" value="RESIDENTIAL">
                                                    <label for="residential"><span></span>Residential</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" name="property_for" id="retailer" value="RETAILER">
                                                    <label for="retailer"><span></span>Retail</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="st-label"><span class="fild-error property_deal-error"></span> Type of deal:</div>
                                                <div class="radio">
                                                    <input class="js-toggle-add-property-fields" type="radio" id="rent" name="property_deal" data-type="rent" value="RENT">
                                                    <label for="rent"><span></span>I’m renting</label>
                                                </div>
                                                <div class="radio">
                                                    <input class="js-toggle-add-property-fields" type="radio" id="sale" name="property_deal" data-type="sale" value="SALE">
                                                    <label for="sale"><span></span>I’m selling</label>
                                                </div>
                                            </div>
                                            <div class="col add-property__only-rent">
                                                <div class="st-label"><span class="fild-error rent_by-error"></span> For rent by:</div>
                                                <div class="radio">
                                                    <input type="radio" id="management_broker" name="rent_by" value="MANAGEMENT/BROKER">
                                                    <label for="management_broker"><span></span>Management company or a broker</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" name="rent_by" id="owner" value="OWNER" >
                                                    <label for="owner"><span></span>Owner</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" name="rent_by" id="tenant" value="TENANT">
                                                    <label for="tenant"><span></span>Tenant</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-property__only-sale">
                                            <div class="add-property__row">
                                                <div class="st-label"><span class="fild-error price_sale-error"></span> Price</div>
                                                <div class="add-property__amount">
                                                    <div class="amount-field amount-field--full">
                                                        <input class="amount-field__input js-format" id="price_sale" name="price_sale" type="text" placeholder="1,150">
                                                        <div class="amount-field__currency">€</div>
                                                    </div>
                                                    <span class="add-property__amount-text">
                                                        Your refund will be €23,500
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="add-property__only-rent">
                                            <div class="add-property__cols2">
                                                <div class="col">
                                                    <div class="st-label"><span class="fild-error price_rent-error"></span>Rent</div>
                                                    <div class="add-property__amount">
                                                        <div class="amount-field amount-field--full">
                                                            <input class="amount-field__input js-format" id="price_rent" name="price_rent" type="text" placeholder="1,150">
                                                            <div class="amount-field__currency">€</div>
                                                        </div>
                                                        <span class="add-property__amount-textsm">
                                                            /month
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="st-label"><span class="fild-error lease_duration-error"></span>Lease duration</div>
                                                    <div class="select-wrapper">
                                                        <select class="custom-select" style="width: 160px;" name="lease_duration" id="lease_duration">
                                                            <option  value="6_month">6 month</option>
                                                            <option  value="1_year">1 year</option>
                                                            <option  value="3_year">3 years</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-property__section" id='slideToproperty'>
                                        <div class="add-property__title">Property details</div>
                                        <div class="add-property__cols2">
                                            <div class="col">
                                                <label for="comunidad_autonoma" class="st-label"><span class="fild-error comunidad_autonoma-error"></span>Comunidad Aut&oacute;noma</label>
                                                <input name="comunidad_autonoma" id="comunidad_autonoma" class="st-field" type="text">
                                            </div>
                                            <div class="col">
                                                <label for="cops" class="st-label"><span class="fild-error cops-error"></span>Zipcode</label>
                                                <input name="cops" id="cops" class="st-field" type="text">
                                            </div>
                                        </div>
                                        <div class="add-property__cols2">
                                            <div class="col">
                                                <label for="provincia" class="st-label"><span class="fild-error provincia-error"></span>Provincia</label>
                                                <input name="provincia" id="provincia" class="st-field" type="text">
                                            </div>
                                            <div class="col">
                                                <label for="localidad" class="st-label"><span class="fild-error localidad-error"></span>City</label>
                                                <input name="localidad" id="localidad" class="st-field" type="text">
                                            </div>
                                        </div>

                                        <div class="add-property__cols2">
                                            <div class="col">
                                                <label for="hood" class="st-label"><span class="fild-error dist_id-error"></span>Hood</label>
                                                <input name="hood" id="hood" class="st-field" type="text">
                                            </div>
                                            <div class="col">
                                                <label for="dist_id" class="st-label"><span class="fild-error dist_id-error"></span>District</label>
                                                <input name="dist_id" id="dist_id" class="st-field" type="text">
                                            </div>
                                        </div>

                                        <div class="add-property__cols2">
                                            <div class="col">
                                                <label for="direccion" class="st-label"><span class="fild-error direccion-error"></span>Street address</label>
                                                <input name="direccion" id="direccion" class="st-field" type="text">
                                            </div>
                                            <div class="col"> <span class="fild-error map-error"></span>
                                                <button class="add_location" type="button"> <i class="fa fa-map-marker"></i> Add Location</button>
                                                <input name="latitude" id="latitude" class="hidden" type="text" >
                                                <input name="longitude" id="longitude" class="hidden" type="text" >

                                                <div class="hidden popup_map" >
                                                    <button class="close_map" type="button"> close </button>
                                                    <div id="property_location"></div>
                                                    <div id='how_to_add' class='hidden'>
                                                        <p>Search Your location with search box, then on map click on your property location for exact location.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-property__cols3">

                                            <div class="col">
                                                <div class="st-label"><span class="fild-error property_type-error"></span>Property type</div>
                                                <?php if($property_types != false){ foreach($property_types as $type){ ?>
                                                <div class="radio">
                                                    <input type="radio" name="property_type" id="property_type_<?php echo $type['id']; ?>" value="<?php echo $type['id']; ?>">
                                                    <label for="property_type_<?php echo $type['id']; ?>"><span></span><?php echo $type['property_type_name']; ?></label>
                                                </div>
                                                <?php }} ?>
                                            </div>

                                            <div class="col">
                                                <div class="st-label"><span class="fild-error rooms-error"></span>Number or bedrooms</div>
                                                <div class="add-property__innercols">
                                                    <div>
                                                        <div class="radio">
                                                            <input type="radio" name="rooms" id="room_0" value="0">
                                                            <label for="room_0"><span></span>0 (estudio)</label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="rooms" id="room_1" value="1">
                                                            <label for="room_1"><span></span>1</label>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="radio">
                                                            <input type="radio" name="rooms" id="room_2" value="2">
                                                            <label for="room_2"><span></span>2</label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="rooms" id="room_3" value="3">
                                                            <label for="room_3"><span></span>3</label>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="radio">
                                                            <input type="radio" name="rooms" id="room_4" value="4">
                                                            <label for="room_4"><span></span>4</label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="rooms" id="room_5" value="5">
                                                            <label for="room_5"><span></span>5+</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="st-label"><span class="fild-error bathrooms-error"></span>Number or bathrooms</div>
                                                <div class="add-property__innercols">
                                                    <div>
                                                        <div class="radio">
                                                            <input type="radio" name="bathrooms" id="bathroom_1" value="1">
                                                            <label for="bathroom_1"><span></span>1</label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="bathrooms" id="bathroom_2" value="2">
                                                            <label for="bathroom_2"><span></span>2</label>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="radio">
                                                            <input type="radio" name="bathrooms" id="bathroom_3" value="3">
                                                            <label for="bathroom_3"><span></span>3</label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="bathrooms" id="bathroom_4" value="4">
                                                            <label for="bathroom_4"><span></span>4+</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-property__cols2 add-property__cols2--small">
                                            <div class="col">
                                                <label for="sizem2" class="st-label"><span class="fild-error sizem2-error"></span>Area</label>
                                                <div class="field-wrap-with-text">
                                                    <input name="sizem2" id="sizem2" class="st-field st-field--sm" type="text" data-mask="000000"> m<sup>2</sup>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="construction" class="st-label"><span class="fild-error construction-error"></span>Year of construction</label>
                                                <input name="construction" id="construction" class="st-field st-field--sm" type="text" data-mask="0000" placeholder="<?php echo date('Y'); ?>">
                                            </div>
                                            <div class="col">
                                                <label for="usability" class="st-label"><span class="fild-error usability-error"></span>Property Status</label>
                                                <div class="switcher">
                                                    <input type="checkbox" id="usability" name="usability">
                                                    <label for="usability">
                                                        <span class="switcher__control"></span>
                                                        <span class="switcher__text">
                                                                <div class="switcher__text-inner">
                                                                    <div>UN USED</div>
                                                                    <div>USED</div>
                                                                </div>
                                                            </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-property__row">
                                            <div class="st-label"><span class="fild-error property_features-error"></span>Property features</div>
                                            <div class="add-property__features">
                                                <div class="add-property__features-col">
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs"  name="elevetor" id="elevetor" value="1">
                                                        <label for="elevetor">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-elevator.svg') }} ">
                                                            </div>
                                                            Evevator
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="doorman" id="doorman" value="1">
                                                        <label for="doorman">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-doorman.svg') }}">
                                                            </div>
                                                            Doorman
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="furnished" id="furnished" value="1">
                                                        <label for="furnished">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-furniture.svg') }}">
                                                            </div>
                                                            Furnished
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="dishwasher" id="dishwasher" value="1">
                                                        <label for="dishwasher">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-dishwasher.svg') }}">
                                                            </div>
                                                            Dishwasher
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="heating" id="heating" value="1">
                                                        <label for="heating">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-heating.svg') }}">
                                                            </div>
                                                            Heating
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="add-property__features-col">
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="outdoor_space" id="outdoor_space" value="1">
                                                        <label for="outdoor_space">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-outdoor.svg') }}">
                                                            </div>
                                                            Outdoor space
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="gym" id="gym" value="1">
                                                        <label for="gym">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-gym.svg') }}">
                                                            </div>
                                                            Gym
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="pool" id="pool" value="1">
                                                        <label for="pool">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-pool.svg') }}">
                                                            </div>
                                                            Pool
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="pets" id="pets" value="1">
                                                        <label for="pets">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-pets.svg')}}">
                                                            </div>
                                                            Pets
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="dogs" id="dogs" value="1">
                                                        <label for="dogs">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-dogs.svg') }}"></div>
                                                            Dogs
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="add-property__features-col">
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="laundry" id="laundry" value="1">
                                                        <label for="laundry">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-laundry.svg') }}"></div>
                                                            Laundry
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="central_ac" id="central_ac" value="1">
                                                        <label for="central_ac">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-ac.svg') }}"></div>
                                                            Central a/c
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="cats" id="cats" value="1">
                                                        <label for="cats">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-cat.svg') }}"></div>
                                                            Cats
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="others" id="others" value="1">
                                                        <label for="others"><span></span>Other</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-property__row">
                                            <label for="discription" class="st-label"><span class="fild-error discription-error"></span>Description</label>
                                            <textarea name="discription" id="discription" class="st-field"></textarea>
                                        </div>
                                        <div class="add-property__row">
                                            <div class="st-label"><span class="fild-error property_image-error"></span>Images</div>
                                            <div class="add-property__files">
                                                <div class="file-input" id="file-list">
                                                    <label for="property_image">add Picture</label>
                                                    <input  name="property_image[]" id="property_image" multiple data-name="propertyImages"  accept="image/*" type="file" class="js-file-multiple" data-filelist="#file-list">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-property__section" id='slideTodocument'>
                                        <div class="add-property__title">Documentation</div>
                                        <div class="add-property__files">
                                            <div class="file-input"  id='energy-certificate'>
                                                <label for="energy_certificate"><span class="fild-error energy_certificate-error"></span>add Energy Certificate</label>
                                                <input name="energy_certificate" id="energy_certificate" data-name="energyCertificate" type="file" class="js-file-one  document" data-filelist="#energy-certificate" >
                                            </div>
                                            <div class="file-input" id='owner-certificate'>

                                                <label for="owner_certificate"><span class="fild-error owner_certificate-error"></span>add Certificate of Ownership</label>
                                                <input name="owner_certificate" id="owner_certificate" data-name="ownerCertificate" type="file" class="js-file-one document" data-filelist="#owner-certificate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-property__section" id='slideTocontact'>
                                        <div class="add-property__title">Your contact info</div>
                                        <div class="add-property__cols2">
                                            <div class="col">
                                                <label for="contact_name" class="st-label"><span class="fild-error contact_name-error"></span>Name</label>
                                                <input name="contact_name" id="contact_name" class="st-field" type="text" placeholder="Your Name">
                                            </div>
                                            <div class="col">
                                                <label for="contact_phone" class="st-label"><span class="fild-error contact_phone-error"></span>Phone number</label>
                                                <input name="contact_phone" id="contact_phone" data-mask="00 000-000-0000" class="st-field" type="tel"
                                                       placeholder="Your Phone">
                                            </div>
                                        </div>
                                        <div class="add-property__cols2">
                                            <div class="col">
                                                <label for="contact_email" class="st-label"><span class="fild-error contact_email-error"></span>Email</label>
                                                <input name="contact_email" id="contact_email" class="st-field" type="email" placeholder="Your Email">
                                            </div>
                                            <div class="col">
                                                <label for="property_soon" class="st-label"><span class="fild-error duration-error"></span>How soon you want to sell the apartment</label>
                                                <select class="custom-select" name="duration" id="duration" style="width: 100%;">
                                                    <option value="1">Withing 1 month</option>
                                                    <option value="2">Withing 3 month</option>
                                                    <option value="3">Withing 6 month</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-property__section" id='slideTopublish'>
                                        <div class="add-property__title">Publish Listing</div>
                                        <div class="add-property__actions">
                                            <div>
                                                <button class="add-property__submit" type="button">publish listing </button>
                                                <button class="add-property__save" type="button">save for later</button>
                                            </div>
                                            <div>
                                                <button class="add-property__delete" type="button">delete listing</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="contact-us">
                <div class="container">
                    <form action="#" id="contact-us-form">
                        <div class="form">
                            <div class="form__inner">
                                <div class="contact-us__title">Got questions? Contact us today</div>
                                <div class="form__row form__row--three">
                                    <div class="form__field">
                                        <div class="field field--contact">
                                            <input type="text" id="contact-name" name="contact-name"
                                                   placeholder="John Smith" required>
                                            <label for="contact-name">Name</label>
                                        </div>
                                    </div>
                                    <div class="form__field">
                                        <div class="field field--contact">
                                            <input type="email" id="contact-email" name="contact-email"
                                                   placeholder="example@gmail.com" required>
                                            <label for="contact-email">Email</label>
                                        </div>
                                    </div>
                                    <div class="form__field">
                                        <div class="field field--contact">
                                            <input type="tel" id="contact-phone" name="contact-phone"
                                                   placeholder="+11-111-111-1111" required>
                                            <label for="contact-phone">Phone</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form__row">
                                    <div class="form__field">
                                        <div class="field field--contact">
                                            <textarea name="contact-message" id="contact-message" required></textarea>
                                            <label for="contact-message">Message</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form__btns">
                                    <button type="submit" class="form__submit">send message</button>
                                </div>
                            </div>

                            <div class="form__reaction form__reaction--success">
                                <div class="form__reaction-inner">
                                    <div class="form__reaction-title">Congratulations!</div>
                                    <div class="form__reaction-img">
                                        <img src="{{ asset('frontend/assets/icons/form-success.svg ') }}" alt="">
                                    </div>
                                    <div class="form__reaction__desc">
                                        Your message was <br> successfully sent
                                    </div>
                                </div>
                            </div>

                            <div class="form__reaction form__reaction--fail">
                                <div class="form__reaction-inner">
                                    <div class="form__reaction-title">Failure!</div>
                                    <div class="form__reaction-img">
                                        <img src="{{ asset('frontend/assets/icons/form-fail.svg ') }}" alt="">
                                    </div>
                                    <div class="form__reaction__desc">
                                        Sorry, something went wrong. <br>
                                        Please try again.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection