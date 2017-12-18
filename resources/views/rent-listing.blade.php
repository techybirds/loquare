@extends('layouts.app')
@section('title', 'Loquare | Rent-listing')
@section('content')
<main>

    <div class="page page--left-white">
        <div class="container">
            <div class="page__left">
                <div class="filter">
                    <div class="search-field">
                        <input class="search-field__input" type="text" placeholder="City area or street address" aria-describedby="find_address" id="mapbox_search">
                        <button class="search-field__btn" type="button" id="find_address">find</button>
                    </div>

                    <div rel="searchbox-list" class="search-list hidden" id="searchresults">
                        <ul id="searchlist"></ul>
                    </div>

                    <div class="filter__map">
                        <div id="retailer_map"></div>
                        <i class="fa fa-arrows-alt full_screenmap"></i>
                    </div>

                    <div>
                        <div class="filter__actions sale_rent_option">
                            <div class="filter-big__items">
                                <a href="#" class="filter-big__item filter_for active" data-type="">
                                    <span>all</span>
                                </a>
                                <a href="#" class="filter-big__item filter_for"  data-type="RENT">
                                    <span>rent</span>
                                </a>
                                <a href="#" class="filter-big__item filter_for" data-type="SALE">
                                    <span>sale</span>
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="filter__section filter__section--row">
                        <div class="filter__label">Type:</div>
                        <div class="filter__actions">
                            <?php foreach($property_types as $ptype){  ?>
                                <div class="checkbox">
                                    <input type="checkbox" name="property_type[]"  value="<?=$ptype->id?>" id="property_type-<?=$ptype->id?>" class="property_type_filter">
                                    <label for="property_type-<?=$ptype->id?>"><span></span><?=$ptype->property_type_name?></label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="filter__section filter__section--row-center">
                        <div class="filter__label">Budget:</div>
                        <div class="filter__between">
                            <div class="filter__between-item">
                                from
                                <select name="minprice" id="minprice" class="custom-select" style="width: 102px">
                                    <option value="">- min -</option>
                                </select>
                            </div>
                            <div class="filter__between-item">
                                to
                                <select name="maxprice" id="maxprice" class="custom-select" style="width: 102px">
                                    <option value="">- max -</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="filter__section filter__section--row-center">
                        <div class="filter__label">Size(m<sup>2</sup>):</div>
                        <div class="filter__between">
                            <div class="filter__between-item">
                                from
                                <select name="minsize" id="minsize" class="custom-select" style="width: 102px">
                                    <option value="">- min -</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="300">300</option>
                                    <option value="400">400</option>
                                    <option value="500">500</option>
                                </select>
                            </div>
                            <div class="filter__between-item">
                                to
                                <select name="maxsize" id="maxsize" class="custom-select" style="width: 102px">
                                    <option value="">- max -</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="300">300</option>
                                    <option value="400">400</option>
                                    <option value="500">500</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="filter__section filter__section--row">
                        <div class="filter__label">Beds:</div>
                        <div class="filter__actions filter__actions--cols">
                            <div class="checkbox">
                                <input type="checkbox" name="rooms[]" id="room-1" value="1" class="room_filter"/>
                                <label for="room-1"><span></span>1-BR</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="rooms[]" id="room-2" value="2" class="room_filter"/>
                                <label for="room-2"><span></span>2-BR</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="rooms[]" id="room-3" value="3" class="room_filter"/>
                                <label for="room-3"><span></span>3-BR</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="rooms[]" id="room-4" value="4" class="room_filter"/>
                                <label for="room-4"><span></span>4-BR</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="rooms[]" id="room-5" value="5" class="room_filter"/>
                                <label for="room-5"><span></span>5-BR+</label>
                            </div>
                        </div>
                    </div>

                    <div class="filter__section filter__section--extra">
                        <div class="filter__label">Extra Features:</div>
                        <div class="filter__actions">
                            <div class="filter__toggle-box">
                                <div class="checkbox">
                                    <input type="checkbox" class="features" id="feature_evevator" value="elevetor">
                                    <label for="feature_evevator">
                                        <span></span>
                                        <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-elevator.svg') }} "/></div>
                                        Evevator
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" class="features" id="feature_outdoot" value="outdoor_space">
                                    <label for="feature_outdoot">
                                        <span></span>
                                        <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-outdoor.svg') }}" /></div>
                                        Outdoor
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" class="features" id="feature_doorman" value="doorman">
                                    <label for="feature_doorman">
                                        <span></span>
                                        <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-doorman.svg') }}" /></div>
                                        Doorman
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" class="features" id="feature_gym" value="gym">
                                    <label for="feature_gym">
                                        <span></span>
                                        <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-gym.svg') }}" /></div>
                                        Gym
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" class="features" id="feature_furnished" value="furnished">
                                    <label for="feature_furnished">
                                        <span></span>
                                        <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-furniture.svg') }}" /></div>
                                        Furnished
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" class="features" id="feature_pool" value="pool">
                                    <label for="feature_pool">
                                        <span></span>
                                        <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-pool.svg') }}" /></div>
                                        Pool
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" class="features" id="feature_dishwasher" value="dishwasher">
                                    <label for="feature_dishwasher">
                                        <span></span>
                                        <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-dishwasher.svg') }}" /></div>
                                        Dishwasher
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" class="features" id="feature_pets" value="pets">
                                    <label for="feature_pets">
                                        <span></span>
                                        <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-pets.svg') }}" /></div>
                                        Pets
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" class="features" id="feature_heating" value="heating">
                                    <label for="feature_heating">
                                        <span></span>
                                        <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-heating.svg') }}" /></div>
                                        Heating
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" class="features" id="feature_dogs" value="dogs">
                                    <label for="feature_dogs">
                                        <span></span>
                                        <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-dogs.svg') }}" /></div>
                                        Dogs
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" class="features" id="feature_laundry" value="laundry">
                                    <label for="feature_laundry">
                                        <span></span>
                                        <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-laundry.svg') }}" /></div>
                                        Laundry
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" class="features" id="feature_cat" value="cats">
                                    <label for="feature_cat">
                                        <span></span>
                                        <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-cat.svg') }}" /></div>
                                        Cat
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" class="features" id="feature_central_ac" value="central_ac">
                                    <label for="feature_central_ac">
                                        <span></span>
                                        <div class="checkbox__icon"><img src="{{ asset('frontend/assets/icons/icon-25x25-ac.svg') }}" /></div>
                                        Central a/c
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" class="features" id="feature_other" value="others">
                                    <label for="feature_other"><span></span>Other</label>
                                </div>
                                <button type="button" class="filter__toggle-box-btn" data-see="see more extra features" data-hide="hide more extra features"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page__right">
                <div class="sorting">
                    <div class="sorting__label">Sort By:</div>
                    <div class="sorting__item">
                        <select name="sort_filter" id="sort_filter" class="custom-select" style="width: 200px">
                            <option value="">Sort</option>
                            <option value="price-ASC">Price - Low to High</option>
                            <option value="price-DESC">Price - High to Low</option>
                            <option value="construction-DESC">New First</option>
                            <option value="construction-ASC">Old First</option>
                        </select>
                    </div>

                    <div class="pull-left" style="margin-left: 10px;"><span id="results"> Searching ... </span> </div>
                </div>
                <div class="grid grid--two" id="filteredResults" style="clear:both;"></div>
                <div style="text-align: center">
                    <ul class="pagination pagination-sm listing-pagination" id="pages"></ul>
                </div>
            </div>
        </div>
        <div>

            <div class="contact-us contact-us--small">
                <div class="container">
                    <form action="#" id="contact-us-form">
                        <div class="form">
                            <div class="form__inner">
                                <div class="contact-us__title">Got questions? Contact us today</div>
                                <div class="form__row form__row--three">
                                    <div class="form__field">
                                        <div class="field field--contact">
                                            <input type="email" id="contact-email" name="contact-email" placeholder="example@gmail.com" required>
                                            <label for="contact-email">Email</label>
                                        </div>
                                    </div>
                                    <div class="form__field">
                                        <div class="field field--contact">
                                            <input type="tel" id="contact-phone" name="contact-phone" placeholder="+11-111-111-1111" required>
                                            <label for="contact-phone">Phone</label>
                                        </div>
                                    </div>
                                    <div class="form__field">
                                        <button type="submit" class="form__submit form__submit--large">send contact request</button>
                                    </div>
                                </div>
                            </div>

                            <div class="form__reaction form__reaction--success">
                                <div class="form__reaction-inner">
                                    <div class="form__reaction-title">Congratulations!</div>
                                    <div class="form__reaction-img">
                                        <img src="{{ asset('frontend/assets/icons/form-success.svg') }}" alt="">
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
                                        <img src="{{ asset('frontend/assets/icons/form-fail.svg') }}" alt="">
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
    </div>
</main>
@endsection