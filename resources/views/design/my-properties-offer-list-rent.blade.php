@extends('layouts.app')
@section('title', 'Add Property')
@section('content')
    <main>
        

    <div class="page page--left-white">
        <div class="container">
            <div class="page__left">
                <div class="offers-nav">
                    <div class="offers-nav__title">My Property Offers</div>
                    <a href="#" class="offers-nav__item active">
                        <span class="offers-nav__item-name">1-Bedroom in Ciutadela</span>
                        <span class="offers-nav__item-count">Offers: 2</span>
                    </a>
                    <a href="#" class="offers-nav__item">
                        <span class="offers-nav__item-name">1-Bedroom in Barceloneta</span>
                        <span class="offers-nav__item-count">Offers: 4</span>
                    </a>
                </div>
            </div>
            <div class="page__right">
                <div class="my-properties my-properties--top">
                    <div class="my-properties__left">
                        <div class="my-properties__img lazyload" data-sizes="auto" data-bgset="assets/images/my-properties.jpg 1x, assets/images/my-properties_2x.jpg 2x"></div>
                        <div class="my-properties__img lazyload" data-sizes="auto" data-bgset="assets/images/my-properties.jpg 1x, assets/images/my-properties_2x.jpg 2x"></div>
                    </div>
                    <div class="my-properties__center">
                        <a href="#" class="my-properties__title">1-Bedroom in Ciutadela</a>
                        <div class="my-properties__price">€1,150/mo</div>
                        <div class="my-properties__status">Status: <i>didn’t viewed the apartment</i></div>
                        <div class="my-properties__desc">
                            <div>1 bed, 2 baths</div>
                            22 m
                        </div>
                    </div>
                </div>

                <div class="offers-list">
                    <div class="offer">
                        <div class="offer__left">
                            <div 
                                class="offer__avatar lazyload" 
                                data-sizes="auto"
                                data-bgset="assets/images/avatar.jpg 1x, assets/images/avatar@2x.jpg 2x, assets/images/avatar@3x.jpg 3x"></div>
                        </div>
                        <div class="offer__right">
                            <div class="offer__title">Stanley Rios</div>
                            <div class="offer__info">
                                <div>Amount offered: <span class="offer__cost">€1,100/mo</span></div>
                                <div>Visit scheduled: <span class="offer__date">22/07/2017</span></div>
                            </div>
                            <div class="offer__btns">
                                <a href="#" class="btn btn--green">approve</a>
                                <a href="#" class="btn btn--outline">reject</a>
                            </div>
                        </div>
                    </div>
                    <div class="offer">
                        <div class="offer__left">
                            <div 
                                class="offer__avatar lazyload" 
                                data-sizes="auto"
                                data-bgset="assets/images/avatar.jpg 1x, assets/images/avatar@2x.jpg 2x, assets/images/avatar@3x.jpg 3x"></div>
                        </div>
                        <div class="offer__right">
                            <div class="offer__title">Stanley Rios</div>
                            <div class="offer__info">
                                <div>Amount offered: <span class="offer__cost">€1,100/mo</span></div>
                                <div>Visit scheduled: <span class="offer__date">22/07/2017</span></div>
                            </div>
                            <div class="offer__btns">
                                <a href="#" class="btn btn--green">approve</a>
                                <a href="#" class="btn btn--outline">reject</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div>

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