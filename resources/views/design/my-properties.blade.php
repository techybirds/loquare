@extends('layouts.app')
@section('title', 'Add Property')
@section('content')

<main>
        
<div class="page">
    <div class="container">
        <div class="page__title">My Properties</div>

        <div class="page-top">
            <div class="page-top__left">
                <a href="#" class="round-btn round-btn--green">add property</a>
            </div>
            <div class="page-top__right">
                <div class="filter-big">
                    <div class="filter-big__title">Filter</div>
                    <div class="filter-big__items">
                        <a href="#" class="filter-big__item filter-big__item--active">
                            <span>all</span>
                        </a>
                        <a href="#" class="filter-big__item">
                            <span>rent</span>
                        </a>
                        <a href="#" class="filter-big__item">
                            <span>sale</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-properties-list">
            <div class="my-properties">
                <div class="my-properties__left">
                    <div class="my-properties__img lazyload" data-sizes="auto" data-bgset="assets/images/my-properties.jpg 1x, assets/images/my-properties_2x.jpg 2x"></div>
                </div>
                <div class="my-properties__center">
                    <a href="#" class="my-properties__title">1-Bedroom in Ciutadela</a>
                    <div class="my-properties__top">
                        <div class="my-properties__info">ID number: 4122861BB</div>
                        <div class="my-properties__info">Used Appartment</div>
                        <div class="my-properties__info">Published: 06/06/2017</div>
                    </div>
                    <div class="my-properties__price">€1,150/mo</div>
                    <div class="my-properties__desc">
                        <div>1 bed, 2 baths</div>
                        22 m
                    </div>
                    <div class="my-properties__equip">
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-furniture.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-elevator.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-heating.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-dishwasher.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-laundry.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-ac.svg" />
                        </div>
                    </div>
                </div>
                <div class="my-properties__right">
                    <div class="switcher">
                        <input type="checkbox" id="s1" name="pub">
                        <label for="s1">
                            <span class="switcher__control"></span>
                            <span class="switcher__text">
                                <div class="switcher__text-inner">
                                    <div>UnPublished</div>
                                    <div>Published</div>
                                </div>
                            </span>
                        </label>
                    </div>
                    <div class="my-properties__actions">
                        <a href="#" class="my-properties__action">
                            <span class="icon icon--offers icon--offers-new"></span>
                            offers(12)
                        </a>
                        <a href="#" class="my-properties__action">
                            <span class="icon icon--edit"></span>
                            edit property
                        </a>
                        <a href="#" class="my-properties__action">
                            <span class="icon icon--trash"></span>
                            delete property
                        </a>
                    </div>
                </div>
            </div>
            <div class="my-properties">
                <div class="my-properties__left">
                    <div class="my-properties__img lazyload" data-sizes="auto" data-bgset="assets/images/my-properties.jpg 1x, assets/images/my-properties_2x.jpg 2x"></div>
                </div>
                <div class="my-properties__center">
                    <a href="#" class="my-properties__title">1-Bedroom in Ciutadela</a>
                    <div class="my-properties__top">
                        <div class="my-properties__info">ID number: 4122861BB</div>
                        <div class="my-properties__info">Used Appartment</div>
                        <div class="my-properties__info">Published: 06/06/2017</div>
                    </div>
                    <div class="my-properties__price">€1,150/mo</div>
                    <div class="my-properties__desc">
                        <div>1 bed, 2 baths</div>
                        22 m
                    </div>
                    <div class="my-properties__equip">
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-furniture.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-elevator.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-heating.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-dishwasher.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-laundry.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-ac.svg" />
                        </div>
                    </div>
                </div>
                <div class="my-properties__right">
                    <div class="switcher">
                        <input type="checkbox" id="s2" name="pub">
                        <label for="s2">
                            <span class="switcher__control"></span>
                            <span class="switcher__text">
                                <div class="switcher__text-inner">
                                    <div>UnPublished</div>
                                    <div>Published</div>
                                </div>
                            </span>
                        </label>
                    </div>
                    <div class="my-properties__actions">
                        <a href="#" class="my-properties__action">
                            <span class="icon icon--offers"></span>
                            offers(12)
                        </a>
                        <a href="#" class="my-properties__action">
                            <span class="icon icon--edit"></span>
                            edit property
                        </a>
                        <a href="#" class="my-properties__action">
                            <span class="icon icon--trash"></span>
                            delete property
                        </a>
                    </div>
                </div>
            </div>
            <div class="my-properties">
                <div class="my-properties__left">
                    <div class="my-properties__img lazyload" data-sizes="auto" data-bgset="assets/images/my-properties.jpg 1x, assets/images/my-properties_2x.jpg 2x"></div>
                </div>
                <div class="my-properties__center">
                    <a href="#" class="my-properties__title">1-Bedroom in Ciutadela</a>
                    <div class="my-properties__top">
                        <div class="my-properties__info">ID number: 4122861BB</div>
                        <div class="my-properties__info">Used Appartment</div>
                        <div class="my-properties__info">Published: 06/06/2017</div>
                    </div>
                    <div class="my-properties__price">€1,150/mo</div>
                    <div class="my-properties__desc">
                        <div>1 bed, 2 baths</div>
                        22 m
                    </div>
                    <div class="my-properties__equip">
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-furniture.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-elevator.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-heating.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-dishwasher.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-laundry.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-ac.svg" />
                        </div>
                    </div>
                </div>
                <div class="my-properties__right">
                    <div class="switcher">
                        <input type="checkbox" id="s3" name="pub">
                        <label for="s3">
                            <span class="switcher__control"></span>
                            <span class="switcher__text">
                                <div class="switcher__text-inner">
                                    <div>UnPublished</div>
                                    <div>Published</div>
                                </div>
                            </span>
                        </label>
                    </div>
                    <div class="my-properties__actions">
                        <a href="#" class="my-properties__action">
                            <span class="icon icon--offers"></span>
                            offers(12)
                        </a>
                        <a href="#" class="my-properties__action">
                            <span class="icon icon--edit"></span>
                            edit property
                        </a>
                        <a href="#" class="my-properties__action">
                            <span class="icon icon--trash"></span>
                            delete property
                        </a>
                    </div>
                </div>
            </div>
            <div class="my-properties">
                <div class="my-properties__left">
                    <div class="my-properties__img lazyload" data-sizes="auto" data-bgset="assets/images/my-properties.jpg 1x, assets/images/my-properties_2x.jpg 2x"></div>
                </div>
                <div class="my-properties__center">
                    <a href="#" class="my-properties__title">1-Bedroom in Ciutadela</a>
                    <div class="my-properties__top">
                        <div class="my-properties__info">ID number: 4122861BB</div>
                        <div class="my-properties__info">Used Appartment</div>
                        <div class="my-properties__info">Published: 06/06/2017</div>
                    </div>
                    <div class="my-properties__price">€1,150/mo</div>
                    <div class="my-properties__desc">
                        <div>1 bed, 2 baths</div>
                        22 m
                    </div>
                    <div class="my-properties__equip">
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-furniture.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-elevator.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-heating.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-dishwasher.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-laundry.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-ac.svg" />
                        </div>
                    </div>
                </div>
                <div class="my-properties__right">
                    <div class="switcher">
                        <input type="checkbox" id="s4" name="pub">
                        <label for="s4">
                            <span class="switcher__control"></span>
                            <span class="switcher__text">
                                <div class="switcher__text-inner">
                                    <div>UnPublished</div>
                                    <div>Published</div>
                                </div>
                            </span>
                        </label>
                    </div>
                    <div class="my-properties__actions">
                        <a href="#" class="my-properties__action">
                            <span class="icon icon--offers"></span>
                            offers(12)
                        </a>
                        <a href="#" class="my-properties__action">
                            <span class="icon icon--edit"></span>
                            edit property
                        </a>
                        <a href="#" class="my-properties__action">
                            <span class="icon icon--trash"></span>
                            delete property
                        </a>
                    </div>
                </div>
            </div>
            <div class="my-properties">
                <div class="my-properties__left">
                    <div class="my-properties__img lazyload" data-sizes="auto" data-bgset="assets/images/my-properties.jpg 1x, assets/images/my-properties_2x.jpg 2x"></div>
                </div>
                <div class="my-properties__center">
                    <a href="#" class="my-properties__title">1-Bedroom in Ciutadela</a>
                    <div class="my-properties__top">
                        <div class="my-properties__info">ID number: 4122861BB</div>
                        <div class="my-properties__info">Used Appartment</div>
                        <div class="my-properties__info">Published: 06/06/2017</div>
                    </div>
                    <div class="my-properties__price">€1,150/mo</div>
                    <div class="my-properties__desc">
                        <div>1 bed, 2 baths</div>
                        22 m
                    </div>
                    <div class="my-properties__equip">
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-furniture.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-elevator.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-heating.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-dishwasher.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-laundry.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-ac.svg" />
                        </div>
                    </div>
                </div>
                <div class="my-properties__right">
                    <div class="switcher">
                        <input type="checkbox" id="s5" name="pub">
                        <label for="s5">
                            <span class="switcher__control"></span>
                            <span class="switcher__text">
                                <div class="switcher__text-inner">
                                    <div>UnPublished</div>
                                    <div>Published</div>
                                </div>
                            </span>
                        </label>
                    </div>
                    <div class="my-properties__actions">
                        <a href="#" class="my-properties__action">
                            <span class="icon icon--offers"></span>
                            offers(12)
                        </a>
                        <a href="#" class="my-properties__action">
                            <span class="icon icon--edit"></span>
                            edit property
                        </a>
                        <a href="#" class="my-properties__action">
                            <span class="icon icon--trash"></span>
                            delete property
                        </a>
                    </div>
                </div>
            </div>
            <div class="my-properties">
                <div class="my-properties__left">
                    <div class="my-properties__img lazyload" data-sizes="auto" data-bgset="assets/images/my-properties.jpg 1x, assets/images/my-properties_2x.jpg 2x"></div>
                </div>
                <div class="my-properties__center">
                    <a href="#" class="my-properties__title">1-Bedroom in Ciutadela</a>
                    <div class="my-properties__top">
                        <div class="my-properties__info">ID number: 4122861BB</div>
                        <div class="my-properties__info">Used Appartment</div>
                        <div class="my-properties__info">Published: 06/06/2017</div>
                    </div>
                    <div class="my-properties__price">€1,150/mo</div>
                    <div class="my-properties__desc">
                        <div>1 bed, 2 baths</div>
                        22 m
                    </div>
                    <div class="my-properties__equip">
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-furniture.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-elevator.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-heating.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-dishwasher.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-laundry.svg" />
                        </div>
                        <div class="my-properties__equip-item">
                            <img src="assets/icons/icon-25x25-ac.svg" />
                        </div>
                    </div>
                </div>
                <div class="my-properties__right">
                    <div class="switcher">
                        <input type="checkbox" id="s6" name="pub">
                        <label for="s6">
                            <span class="switcher__control"></span>
                            <span class="switcher__text">
                                <div class="switcher__text-inner">
                                    <div>UnPublished</div>
                                    <div>Published</div>
                                </div>
                            </span>
                        </label>
                    </div>
                    <div class="my-properties__actions">
                        <a href="#" class="my-properties__action">
                            <span class="icon icon--offers"></span>
                            offers(12)
                        </a>
                        <a href="#" class="my-properties__action">
                            <span class="icon icon--edit"></span>
                            edit property
                        </a>
                        <a href="#" class="my-properties__action">
                            <span class="icon icon--trash"></span>
                            delete property
                        </a>
                    </div>
                </div>
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
                                <input type="text" id="contact-name" name="contact-name" placeholder="John Smith" required>
                                <label for="contact-name">Name</label>
                            </div>
                        </div>
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