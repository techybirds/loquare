@extends('layouts.app')
@section('title', 'Add Property')
@section('content')
    <main>
        

    <div class="container">
        <div class="my-properties my-properties--top">
            <div class="my-properties__left">
                <div class="my-properties__img lazyload" data-sizes="auto" data-bgset="assets/images/my-properties.jpg 1x, assets/images/my-properties_2x.jpg 2x"></div>
                <div class="my-properties__img lazyload" data-sizes="auto" data-bgset="assets/images/my-properties.jpg 1x, assets/images/my-properties_2x.jpg 2x"></div>
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

        <div class="box-twice">
            <div class="box-twice__item">
                <form action="#">
                    <div class="discuss">
                        <div class="discuss__nav">
                            <a href="#" class="discuss__nav-item active">1. Details</a>
                            <a href="#" class="discuss__nav-item">2. Documentation</a>
                            <a href="#" class="discuss__nav-item">3. Review &amp; Sign</a>
                        </div>
                        <div class="discuss__top">
                            <div class="discuss__title">Create an Offer</div>
                            <div class="discuss__desc">
                                Fill in the info below to get started. The real estate agent will then review, prepare your offer contract and personally guide you through each step of your purchase.
                            </div>
                        </div>
                        <div class="discuss__bottom">
                            <div class="discuss__section">
                                <div class="discuss__subtitle">How will you be paying?</div>
                                <div class="discuss__radios discuss__radios--start">
                                    <div class="radio">
                                        <input type="radio" id="r2" name="r" checked>
                                        <label for="r2">
                                            <span></span>
                                            All cash
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" id="r3" name="r">
                                        <label for="r3">
                                            <span></span>
                                            Credit Card / Debit Card
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="discuss__section">
                                <div class="discuss__subtitle">Offer amount</div>
                                <div class="amount">
                                    <div class="amount__row">
                                        <div class="amount__col">
                                            <div class="amount-field amount-field--full">
                                                <input class="amount-field__input" id="amount" type="text" value="1150">
                                                <div class="amount-field__currency">€</div>
                                            </div>
                                            <div class="amount__desc">Your refund will be: €115</div>
                                        </div>
                                        <div class="amount__col">
                                            <div class="list-price">
                                                <div class="list-price__title">List price</div>
                                                <div class="list-price__slider" id="list-price" data-input="amount" data-min="0" data-max="2000"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="amount__row amount__row--nm">
                                        <button type="button" class="btn btn--green">submit offer</button>
                                    </div>
                                </div>
                            </div>
                            <div class="discuss__section">
                                <div class="discuss__subtitle">
                                    Schedule a visit to the apartment
                                    <button class="discuss__logout" class="button">Sign Out</button>
                                </div>
                                <div class="discuss__cols2">
                                    <div class="col">
                                        <label for="b_fname" class="discuss__label">Buyer First Name</label>
                                        <input type="text" id="b_fname" class="st-field">
                                    </div>
                                    <div class="col">
                                        <label for="b_lname" class="discuss__label">Buyer Last Name</label>
                                        <input type="text" id="b_lname" class="st-field">
                                    </div>
                                </div>
                                <div class="discuss__cols2">
                                    <div class="col">
                                        <label for="b_email" class="discuss__label">Buyer email</label>
                                        <input type="text" id="b_email" class="st-field" placeholder="Type email here">
                                        <div class="discuss__sminfo">
                                            Entering a different email address here will change it on your account and in all of your future communications with Loquare.
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="datepicker" class="discuss__label">Preferred date of visit</label>
                                        <div class="datepicker-wrap">
                                            <input type="text" id="datepicker" class="datepicker" value="Today, June 19, 2017">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="discuss__btns">
                                <button type="button" class="btn btn--green">schedule visit</button>
                            </div>
                        </div>
                    </div>
                    <button class="next" type="button">next step: documentation</button>
                </form>
            </div>
            <div class="box-twice__item">
                <div class="chat"></div>
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