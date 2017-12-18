@extends('layouts.app')
@section('title', 'Loquare | Edit Property')
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
    </style>

    <main>

        <div class="page">
            <div class="container">
                <div class="page__title">Edit Property</div>

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
                                <div class="steps__item <?php echo ($property['status'] == 1)?"complete":""; ?>" id='publish'>Publish listing</div>
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
                    <?php   if($property !=''){?> 
						<form action="{{ url('/property/update') }}" method="post" enctype="multipart/form-data" id="add_property_form">
                            {{csrf_field()}}
                            <input type='hidden' name='property_id' value='<?php echo $property['id']; ?>'>
                            <div class="col">
                                <div class="add-property">
                                    <div class="add-property__section" id='slideToabout'>
                                        <div class="add-property__title">Tell us about the deal</div>
                                        <div class="add-property__cols3bad">
                                            <div class="col">
                                                <div class="st-label"> <span class="fild-error property_for-error"></span> Property type</div>
                                                <div class="radio">
												    <input type="radio" name="property_for" id="residential" value="RESIDENTIAL" <?php echo ($property['property_for'] == 'RESIDENTIAL')?"checked":"" ?>>
                                                    <label for="residential"><span></span>Residential</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" name="property_for" id="retailer" value="RETAILER" <?php echo ($property['property_for'] == 'RETAILER')?"checked":"" ?>>
                                                    <label for="retailer"><span></span>Retail</label>
                                                </div>
                                            </div>
											
                                            <div class="col">
                                                <div class="st-label"><span class="fild-error property_deal-error"></span> Type of deal:</div>
                                                <div class="radio">
                                                    <input class="js-toggle-add-property-fields" type="radio" id="rent" name="property_deal" data-type="rent" value="RENT" <?php echo ($property['property_deal'] == 'RENT')?"checked":"" ?>>
                                                    <label for="rent"><span></span>I’m renting</label>
                                                </div>
                                                <div class="radio">
                                                    <input class="js-toggle-add-property-fields" type="radio" id="sale" name="property_deal" data-type="sale" value="SALE" <?php echo ($property['property_deal'] == 'SALE')?"checked":"" ?>>
                                                    <label for="sale"><span></span>I’m selling</label>
                                                </div>
                                            </div>
                                            <div class="col add-property__only-rent">
                                                <div class="st-label"><span class="fild-error rent_by-error"></span> For rent by:</div>
                                                <div class="radio">
                                                    <input type="radio" id="management_broker" name="rent_by" value="MANAGEMENT/BROKER" <?php echo ($property['rent_by'] == 'MANAGEMENT/BROKER')?"checked":"" ?>>
                                                    <label for="management_broker"><span></span>Management company or a broker</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" name="rent_by" id="owner" value="OWNER"  <?php echo ($property['rent_by'] == 'OWNER')?"checked":"" ?> >
                                                    <label for="owner"><span></span>Owner</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" name="rent_by" id="tenant" value="TENANT"  <?php echo ($property['rent_by'] == 'TENANT')?"checked":"" ?>>
                                                    <label for="tenant"><span></span>Tenant</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-property__only-sale">
                                            <div class="add-property__row">
                                                <div class="st-label"><span class="fild-error price_sale-error"></span> Price</div>
                                                <div class="add-property__amount">
                                                    <div class="amount-field amount-field--full">
                                                        <input class="amount-field__input js-format" id="price_sale" name="price_sale" type="text" placeholder="1,150" value="<?php echo ($property['property_deal'] == 'SALE')?$property['price']:""?>">
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
                                                            <input class="amount-field__input js-format" id="price_rent" name="price_rent" type="text" placeholder="1,150" value="<?php echo ($property['property_deal'] == 'RENT')?$property['price']:""?>">
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
                                                            <option value="6_month"  <?php echo ($property['lease_duration'] == '6_month')?"selected":"" ?> >6 month</option>
                                                            <option value="1_year"  <?php echo ($property['lease_duration'] == '1_year')?"selected":"" ?>>1 year</option>
                                                            <option value="3_year" <?php echo ($property['lease_duration'] == '3_year')?"selected":"" ?>>3 years</option>
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
                                                <input name="comunidad_autonoma" id="comunidad_autonoma" class="st-field" type="text" value="<?php echo $property['comunidad_autonoma']; ?>">
                                            </div>
                                            <div class="col">
                                                <label for="cops" class="st-label"><span class="fild-error cops-error"></span>Zipcode</label>
                                                <input name="cops" id="cops" class="st-field" type="text" value="<?php echo $property['cops']; ?>">
                                            </div>
                                        </div>
                                        <div class="add-property__cols2">
                                            <div class="col">
                                                <label for="provincia" class="st-label"><span class="fild-error provincia-error"></span>Provincia</label>
                                                <input name="provincia" id="provincia" class="st-field" type="text" value="<?php echo $property['provincia']; ?>">
                                            </div>
                                            <div class="col">
                                                <label for="localidad" class="st-label"><span class="fild-error localidad-error"></span>City</label>
                                                <input name="localidad" id="localidad" class="st-field" type="text" value="<?php echo $property['localidad']; ?>">
                                            </div>
                                        </div>

                                        <div class="add-property__cols2">
                                            <div class="col">
                                                <label for="hood" class="st-label"><span class="fild-error dist_id-error"></span>Hood</label>
                                                <input name="hood" id="hood" class="st-field" type="text" value="<?php echo $property['hoods']; ?>">
                                            </div>
                                            <div class="col">
                                                <label for="dist_id" class="st-label"><span class="fild-error dist_id-error"></span>District</label>
                                                <input name="dist_id" id="dist_id" class="st-field" type="text" value="<?php echo $property['dist_id']; ?>">
                                            </div>
                                        </div>

                                        <div class="add-property__cols2">
                                            <div class="col">
                                                <label for="direccion" class="st-label"><span class="fild-error direccion-error"></span>Street address</label>
                                                <input name="direccion" id="direccion" class="st-field" type="text" value="<?php echo $property['direccion']; ?>">
                                            </div>
                                            <div class="col"> <span class="fild-error map-error"></span>
                                                <button class="add_location" type="button"> <i class="fa fa-map-marker"></i> Update Location</button>
                                                <input name="latitude" id="latitude" class="hidden" type="text" value="<?php echo $property['latitude']; ?> ">
                                                <input name="longitude" id="longitude" class="hidden" type="text" value="<?php echo $property['longitude']; ?>" >

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
                                                    <input type="radio" name="property_type" id="property_type_<?php echo $type['id']; ?>" value="<?php echo $type['id']; ?>" <?php echo ($property['property_type'] == $type['id'])?"checked":"" ?>>
                                                    <label for="property_type_<?php echo $type['id']; ?>"><span></span><?php echo $type['property_type_name']; ?></label>
                                                </div>
                                                <?php }} ?>
                                            </div>

                                            <div class="col">
                                                <div class="st-label"><span class="fild-error rooms-error"></span>Number or bedrooms</div>
                                                <div class="add-property__innercols">
                                                    <div>
                                                        <div class="radio">
                                                            <input type="radio" name="rooms" id="room_0" value="0" <?php echo ($property['rooms'] == 0 )?"checked":"" ?>>
                                                            <label for="room_0"><span></span>0 (estudio)</label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="rooms" id="room_1" value="1"  <?php echo ($property['rooms'] == 1 )?"checked":"" ?>>
                                                            <label for="room_1"><span></span>1</label>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="radio">
                                                            <input type="radio" name="rooms" id="room_2" value="2"  <?php echo ($property['rooms'] == 2 )?"checked":"" ?>>
                                                            <label for="room_2"><span></span>2</label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="rooms" id="room_3" value="3"  <?php echo ($property['rooms'] == 3 )?"checked":"" ?>>
                                                            <label for="room_3"><span></span>3</label>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="radio">
                                                            <input type="radio" name="rooms" id="room_4" value="4"  <?php echo ($property['rooms'] == 4 )?"checked":"" ?>>
                                                            <label for="room_4"><span></span>4</label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="rooms" id="room_5" value="5"  <?php echo ($property['rooms'] == 5 )?"checked":"" ?>>
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
                                                            <input type="radio" name="bathrooms" id="bathroom_1" value="1" <?php echo ($property['bathrooms'] == 1 )?"checked":"" ?>>
                                                            <label for="bathroom_1"><span></span>1</label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="bathrooms" id="bathroom_2" value="2" <?php echo ($property['bathrooms'] == 2 )?"checked":"" ?>>
                                                            <label for="bathroom_2"><span></span>2</label>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="radio">
                                                            <input type="radio" name="bathrooms" id="bathroom_3" value="3" <?php echo ($property['bathrooms'] == 3 )?"checked":"" ?>>
                                                            <label for="bathroom_3"><span></span>3</label>
                                                        </div>
                                                        <div class="radio">
                                                            <input type="radio" name="bathrooms" id="bathroom_4" value="4" <?php echo ($property['bathrooms'] == 4 )?"checked":"" ?>>
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
                                                    <input name="sizem2" id="sizem2" class="st-field st-field--sm" type="text" data-mask="000000" value="<?php echo $property['sizem2']; ?>"> m<sup>2</sup>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="construction" class="st-label"><span class="fild-error construction-error"></span>Year of construction</label>
                                                <input name="construction" id="construction" class="st-field st-field--sm" type="text" data-mask="0000" placeholder="<?php echo date('Y'); ?>" value="<?php echo $property['construction']; ?>">
                                            </div>
                                            <div class="col">
                                                <label for="usability" class="st-label"><span class="fild-error usability-error"></span>Property Status</label>
                                                <div class="switcher">
                                                    <input type="checkbox" id="usability" name="usability" <?php echo ($property['usability'] == 1)?"checked":"" ?>>
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
                                                        <input type="checkbox" class="feature_inputs"  name="elevetor" id="elevetor" value="1" <?php echo ($property['elevetor'] == 1)?"checked":"" ?>>
                                                        <label for="elevetor">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-elevator.svg') }} ">
                                                            </div>
                                                            Evevator
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="doorman" id="doorman" value="1" <?php echo ($property['doorman'] == 1)?"checked":"" ?>>
                                                        <label for="doorman">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-doorman.svg') }}">
                                                            </div>
                                                            Doorman
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="furnished" id="furnished" value="1" <?php echo ($property['furnished'] == 1)?"checked":"" ?>>
                                                        <label for="furnished">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-furniture.svg') }}">
                                                            </div>
                                                            Furnished
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="dishwasher" id="dishwasher" value="1" <?php echo ($property['dishwasher'] == 1)?"checked":"" ?>>
                                                        <label for="dishwasher">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-dishwasher.svg') }}">
                                                            </div>
                                                            Dishwasher
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="heating" id="heating" value="1"  <?php echo ($property['heating'] == 1)?"checked":"" ?>>
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
                                                        <input type="checkbox" class="feature_inputs" name="outdoor_space" id="outdoor_space" value="1" <?php echo ($property['outdoor_space'] == 1)?"checked":"" ?>>
                                                        <label for="outdoor_space">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-outdoor.svg') }}">
                                                            </div>
                                                            Outdoor space
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="gym" id="gym" value="1"  <?php echo ($property['gym'] == 1)?"checked":"" ?>>
                                                        <label for="gym">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-gym.svg') }}">
                                                            </div>
                                                            Gym
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="pool" id="pool" value="1"  <?php echo ($property['pool'] == 1)?"checked":"" ?>>
                                                        <label for="pool">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-pool.svg') }}">
                                                            </div>
                                                            Pool
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="pets" id="pets" value="1"  <?php echo ($property['pets'] == 1)?"checked":"" ?>>
                                                        <label for="pets">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-pets.svg')}}">
                                                            </div>
                                                            Pets
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="dogs" id="dogs" value="1" <?php echo ($property['dogs'] == 1)?"checked":"" ?>>
                                                        <label for="dogs">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-dogs.svg') }}" ></div>
                                                            Dogs
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="add-property__features-col">
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="laundry" id="laundry" value="1"  <?php echo ($property['laundry'] == 1)?"checked":"" ?>>
                                                        <label for="laundry">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-laundry.svg') }}" ></div>
                                                            Laundry
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="central_ac" id="central_ac" value="1"  <?php echo ($property['central_ac'] == 1)?"checked":"" ?>>
                                                        <label for="central_ac">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-ac.svg') }}" ></div>
                                                            Central a/c
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="cats" id="cats" value="1" <?php echo ($property['cats'] == 1)?"checked":"" ?>>
                                                        <label for="cats">
                                                            <span></span>
                                                            <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-cat.svg') }}"></div>
                                                            Cats
                                                        </label>
                                                    </div>
                                                    <div class="checkbox checkbox--small">
                                                        <input type="checkbox" class="feature_inputs" name="others" id="others" value="1" <?php echo ($property['others'] == 1)?"checked":"" ?>>
                                                        <label for="others"><span></span>Other</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-property__row">
                                            <label for="discription" class="st-label"><span class="fild-error discription-error"></span>Description</label>
                                            <textarea name="discription" id="discription" class="st-field"><?php echo $property['discription']; ?></textarea>
                                        </div>
                                        <div class="add-property__row">
                                            <div class="st-label"><span class="fild-error property_image-error"></span>Images</div>
                                            <div class="add-property__files">
                                                
												
												<div class="file-input" id="file-list">
                                                     <?php if(!empty($images)) { ?>
                                                     <?php foreach($images as $image){ ?>
                                                        <button data-name="propertyImages" type="button" class="file-input__item propertyimages delete_image_popup" data-mfp-src="#delete-image-file"  data-image-id='<?php echo $image['id'];?>' data-id="<?php echo $image['id']; ?>" style="background-image: url('<?php echo url('storage/Property/'.$property['id'].'/'.$image['filename'])?>')"></button>
                                                     <?php } } ?>
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
                                                <?php if($energy_certificate != false) { ?>
                                                <?php if(strstr($energy_certificate['filename'], ".") == '.doc' ||    strstr($energy_certificate['filename'], '.') == '.odt' ||  strstr($energy_certificate['filename'], '.') == '.docx') { ?>
                                                <button  type="button" class="file-input__item energy_certificate_preview delete_energy_popup energyCertificate"  data-name="energyCertificate"  data-image-id='<?php echo $energy_certificate['id'];?>'  data-id="1"   data-mfp-src="#delete-energy-certificate"   style="background-image: url('{{ asset('/frontend/images') }}/docIcon.png')"></button>
                                                <?php } else if(strstr($energy_certificate['filename'], ".") == '.pdf' ) { ?>
                                                <button  type="button" class="file-input__item energy_certificate_preview delete_energy_popup energyCertificate"  data-name="energyCertificate"  data-image-id='<?php echo $energy_certificate['id'];?>'  data-id="1"   data-mfp-src="#delete-energy-certificate"   style="background-image: url('{{ asset('/frontend/images') }}/pdfIcon.svg')"></button>
                                                <?php } else { ?>
                                                <button  type="button" class="file-input__item energy_certificate_preview delete_energy_popup energyCertificate"  data-name="energyCertificate"  data-image-id='<?php echo $energy_certificate['id'];?>'  data-id="1"   data-mfp-src="#delete-energy-certificate"   style="background-image: url(<?php echo url('/storage/enrgycertificats/'.$property['id'].'/'.$energy_certificate['filename'])?>)"></button>
                                                <?php } ?>
                                                <?php }  ?>

                                                <label for="energy_certificate"><span class="fild-error energy_certificate-error"></span>add Energy Certificate</label>
                                                <input name="energy_certificate" data-name="energyCertificate" data-filelist="#energy-certificate" id="energy_certificate" type="file" class="js-file-one">
                                                <div class="file-input__preview"></div>
                                            </div>

                                            <div class="file-input" id='owner-certificate'>
                                                <?php if($owner_certificate != false) { ?>
                                                <?php if(strstr($owner_certificate['filename'], ".") == '.doc' ||    strstr($owner_certificate['filename'], '.') == '.odt' ||  strstr($owner_certificate['filename'], '.') == '.docx'){?>
                                                <button  type="button" class="file-input__item owner_certificate_preview delete_owner_popup ownerCertificate" data-name="ownerCertificate"  data-mfp-src="#delete-owner-certificate"    data-image-id='<?php echo $owner_certificate['id'];?>'  data-id="1"  style="background-image: url('{{ asset('/frontend/images') }}/docIcon.png')"></button>
                                                <?php }else if(strstr($owner_certificate['filename'], ".") == '.pdf' ){  ?>
                                                <button  type="button" class="file-input__item owner_certificate_preview delete_owner_popup ownerCertificate" data-name="ownerCertificate"  data-mfp-src="#delete-owner-certificate"    data-image-id='<?php echo $owner_certificate['id'];?>'  data-id="1" style="background-image: url('{{ asset('/frontend/images') }}/pdfIcon.svg')"></button>
                                                <?php }else{ ?>
                                                <button  type="button" class="file-input__item owner_certificate_preview delete_owner_popup ownerCertificate" data-name="ownerCertificate"  data-mfp-src="#delete-owner-certificate"    data-image-id='<?php echo $owner_certificate['id'];?>'  data-id="1" style="background-image: url(<?php echo url('/storage/ownercertificates/'.$property['id'].'/'.$owner_certificate['filename'])?>)"></button>
                                                <?php } ?>
                                                <?php } ?>

                                                <label for="owner_certificate"><span class="fild-error owner_certificate-error"></span>add Certificate of Ownership</label>
                                                <input name="owner_certificate" data-name="ownerCertificate" data-filelist="#owner-certificate" id="owner_certificate" type="file" class="js-file-one">
                                                <div class="file-input__preview"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-property__section" id='slideTocontact'>
                                        <div class="add-property__title">Your contact info</div>
                                        <div class="add-property__cols2">
                                            <div class="col">
                                                <label for="contact_name" class="st-label"><span class="fild-error contact_name-error"></span>Name</label>
                                                <input name="contact_name" id="contact_name" class="st-field" type="text" placeholder="Your Name" value="<?php echo $contact['contact_name']; ?>">
                                            </div>
                                            <div class="col">
                                                <label for="contact_phone" class="st-label"><span class="fild-error contact_phone-error"></span>Phone number</label>
                                                <input name="contact_phone" id="contact_phone" data-mask="00 000-000-0000" class="st-field" type="tel"
                                                       placeholder="Your Phone" value="<?php echo $contact['contact_phone']; ?>">
                                            </div>
                                        </div>
                                        <div class="add-property__cols2">
                                            <div class="col">
                                                <label for="contact_email" class="st-label"><span class="fild-error contact_email-error"></span>Email</label>
                                                <input name="contact_email" id="contact_email" class="st-field" type="email" placeholder="Your Email" value="<?php echo $contact['contact_email']; ?>">
                                            </div>
                                            <div class="col">
                                                <label for="property_soon" class="st-label"><span class="fild-error duration-error"></span>How soon you want to sell the apartment</label>
                                                <select class="custom-select" name="duration" id="duration" style="width: 100%;">
                                                    <option value="1" <?php echo ($contact['duration'] == 1)?"selected":"" ?>>Withing 1 month</option>
                                                    <option value="2" <?php echo ($contact['duration'] == 2)?"selected":"" ?>>Withing 3 month</option>
                                                    <option value="3" <?php echo ($contact['duration'] == 3)?"selected":"" ?>>Withing 6 month</option>
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
                    <?php } ?>
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