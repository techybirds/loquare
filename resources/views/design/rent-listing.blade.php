@extends('layouts.app')
@section('title', 'Add Property')
@section('content')
    <main>
        

    <div class="page page--left-white">
        <div class="container">
            <div class="page__left">
                <div class="filter">
                    <form action="#">
                        <div class="search-field">
                            <input class="search-field__input" type="text" placeholder="City area or street address">
                            <button class="search-field__btn" type="button">find</button>
                        </div>

                        <div class="filter__map">
                            <div id="map"></div>
                        </div>
                        <script src="scripts/map.js"></script>
                        <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>

                        <div class="filter__section filter__section--row">
                            <div class="filter__label">Type:</div>
                            <div class="filter__actions">
                                <div class="checkbox">
                                    <input type="checkbox" id="ch1" id="ch1">
                                    <label for="ch1"><span></span>Flats</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" id="ch2" id="ch2">
                                    <label for="ch2"><span></span>Houses</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" id="ch3" id="ch3">
                                    <label for="ch3"><span></span>Townhouses</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" id="ch4" id="ch4">
                                    <label for="ch4"><span></span>Other</label>
                                </div>
                            </div>
                        </div>

                        <div class="filter__section filter__section--row-center">
                            <div class="filter__label">Budget:</div>
                            <div class="filter__between">
                                <div class="filter__between-item">
                                    from
                                    <select name="s1" id="s1" class="custom-select" style="width: 102px">
                                        <option>-min-</option>
                                        <option value="1">€500</option>
                                        <option value="1">€1,00</option>
                                        <option value="1">€5,000</option>
                                        <option value="1">€10,000</option>
                                    </select>
                                </div>
                                <div class="filter__between-item">
                                    to
                                    <select name="s2" id="s2" class="custom-select" style="width: 102px">
                                        <option>-max-</option>
                                        <option value="1">€10,000</option>
                                        <option value="2">€25,000</option>
                                        <option value="3">€50,000</option>
                                        <option value="4">-max-</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="filter__section filter__section--row">
                            <div class="filter__label">Beds:</div>
                            <div class="filter__actions filter__actions--cols">
                                <div class="checkbox">
                                    <input type="checkbox" id="ch5" id="ch5">
                                    <label for="ch5"><span></span>Studio</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" id="ch6" id="ch6">
                                    <label for="ch6"><span></span>1-BR</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" id="ch7" id="ch7">
                                    <label for="ch7"><span></span>2-BR</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" id="ch8" id="ch8">
                                    <label for="ch8"><span></span>3-BR</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" id="ch9" id="ch9">
                                    <label for="ch9"><span></span>4-BR</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" id="ch10" id="ch10">
                                    <label for="ch10"><span></span>5-BR+</label>
                                </div>
                            </div>
                        </div>

                        <div class="filter__section filter__section--extra">
                            <div class="filter__label">Extra Features:</div>
                            <div class="filter__actions">
                                <div class="filter__toggle-box">
                                    <div class="checkbox">
                                        <input type="checkbox" id="ch11" id="ch11">
                                        <label for="ch11">
                                            <span></span>
                                            <div class="checkbox__icon"><img src="assets/icons/icon-25x25-elevator.svg" /></div>
                                            Evevator
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="ch12" id="ch12">
                                        <label for="ch12">
                                            <span></span>
                                            <div class="checkbox__icon"><img src="assets/icons/icon-25x25-outdoor.svg" /></div>
                                            Outdoor
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="ch13" id="ch13">
                                        <label for="ch13">
                                            <span></span>
                                            <div class="checkbox__icon"><img src="assets/icons/icon-25x25-doorman.svg" /></div>
                                            Doorman
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="ch14" id="ch14">
                                        <label for="ch14">
                                            <span></span>
                                            <div class="checkbox__icon"><img src="assets/icons/icon-25x25-gym.svg" /></div>
                                            Gym
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="ch15" id="ch15">
                                        <label for="ch15">
                                            <span></span>
                                            <div class="checkbox__icon"><img src="assets/icons/icon-25x25-furniture.svg" /></div>
                                            Furnished
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="ch16" id="ch16">
                                        <label for="ch16">
                                            <span></span>
                                            <div class="checkbox__icon"><img src="assets/icons/icon-25x25-pool.svg" /></div>
                                            Pool
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="ch17" id="ch17">
                                        <label for="ch17">
                                            <span></span>
                                            <div class="checkbox__icon"><img src="assets/icons/icon-25x25-dishwasher.svg" /></div>
                                            Dishwasher
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="ch18" id="ch18">
                                        <label for="ch18">
                                            <span></span>
                                            <div class="checkbox__icon"><img src="assets/icons/icon-25x25-pets.svg" /></div>
                                            Pets
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="ch19" id="ch19">
                                        <label for="ch19">
                                            <span></span>
                                            <div class="checkbox__icon"><img src="assets/icons/icon-25x25-heating.svg" /></div>
                                            Heating
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="ch20" id="ch20">
                                        <label for="ch20">
                                            <span></span>
                                            <div class="checkbox__icon"><img src="assets/icons/icon-25x25-dogs.svg" /></div>
                                            Dogs
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="ch20" id="ch20">
                                        <label for="ch20">
                                            <span></span>
                                            <div class="checkbox__icon"><img src="assets/icons/icon-25x25-laundry.svg" /></div>
                                            Laundry
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="ch21" id="ch21">
                                        <label for="ch21">
                                            <span></span>
                                            <div class="checkbox__icon"><img src="assets/icons/icon-25x25-cat.svg" /></div>
                                            Cat
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="ch22" id="ch22">
                                        <label for="ch22">
                                            <span></span>
                                            <div class="checkbox__icon"><img src="assets/icons/icon-25x25-ac.svg" /></div>
                                            Central a/c
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" id="ch23" id="ch23">
                                        <label for="ch23"><span></span>Other</label>
                                    </div>
                                    <button type="button" class="filter__toggle-box-btn" data-see="see more extra features" data-hide="hide more extra features"></button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="page__right">
                <div class="sorting">
                    <div class="sorting__label">Sort By:</div>
                    <div class="sorting__item">
                        <select name="sort1" id="sort1" class="custom-select" style="width: 200px">
                            <option value="1">Most Relevant</option>
                            <option value="2">Price - Low to High</option>
                            <option value="3">New First</option>
                            <option value="4">Old First</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid--two">
                    <div class="grid__item">
                        <div class="card">
                            <a href="#" class="card__link"></a>
                            <button type="button" class="card__save">Save</button>
                            <div class="card__top">
                                <div class="card__slider">
                                    <div class="card__slider-img lazyload" data-sizes="auto" data-bgset="assets/images/placeholder-370x244.png 1x, assets/images/placeholder-740x488.png 2x"></div>
                                    <div class="card__slider-img lazyload" data-sizes="auto" data-bgset="assets/images/placeholder-370x244.png 1x, assets/images/placeholder-740x488.png 2x"></div>
                                    <div class="card__slider-img lazyload" data-sizes="auto" data-bgset="assets/images/placeholder-370x244.png 1x, assets/images/placeholder-740x488.png 2x"></div>
                                </div>
                            </div>
                            <div class="card__bottom">
                                <div class="card__title">1-Bedroom in Ciutadela</div>
                                <div class="card__footer">
                                    <div class="card__desc">1 bed, 2 baths 22 m</div>
                                    <div class="card__price">€1,150/mo</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid__item">
                        <div class="card">
                            <a href="#" class="card__link"></a>
                            <button type="button" class="card__save">Save</button>
                            <div class="card__top">
                                <div class="card__slider">
                                    <div class="card__slider-img lazyload" data-sizes="auto" data-bgset="assets/images/placeholder-370x244.png 1x, assets/images/placeholder-740x488.png 2x"></div>
                                    <div class="card__slider-img lazyload" data-sizes="auto" data-bgset="assets/images/placeholder-370x244.png 1x, assets/images/placeholder-740x488.png 2x"></div>
                                    <div class="card__slider-img lazyload" data-sizes="auto" data-bgset="assets/images/placeholder-370x244.png 1x, assets/images/placeholder-740x488.png 2x"></div>
                                </div>
                            </div>
                            <div class="card__bottom">
                                <div class="card__title">1-Bedroom in Ciutadela</div>
                                <div class="card__footer">
                                    <div class="card__desc">1 bed, 2 baths 22 m</div>
                                    <div class="card__price">€1,150/mo</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid__item">
                        <div class="card">
                            <a href="#" class="card__link"></a>
                            <button type="button" class="card__save">Save</button>
                            <div class="card__top">
                                <div class="card__slider">
                                    <div class="card__slider-img lazyload" data-sizes="auto" data-bgset="assets/images/placeholder-370x244.png 1x, assets/images/placeholder-740x488.png 2x"></div>
                                    <div class="card__slider-img lazyload" data-sizes="auto" data-bgset="assets/images/placeholder-370x244.png 1x, assets/images/placeholder-740x488.png 2x"></div>
                                    <div class="card__slider-img lazyload" data-sizes="auto" data-bgset="assets/images/placeholder-370x244.png 1x, assets/images/placeholder-740x488.png 2x"></div>
                                </div>
                            </div>
                            <div class="card__bottom">
                                <div class="card__title">1-Bedroom in Ciutadela</div>
                                <div class="card__footer">
                                    <div class="card__desc">1 bed, 2 baths 22 m</div>
                                    <div class="card__price">€1,150/mo</div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <img src="assets/icons/form-success.svg" alt="">
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
                            <img src="assets/icons/form-fail.svg" alt="">
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