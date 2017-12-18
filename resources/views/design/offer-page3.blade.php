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
                            <a href="#" class="discuss__nav-item completed">1. Details</a>
                            <a href="#" class="discuss__nav-item completed">2. Documentation</a>
                            <a href="#" class="discuss__nav-item active">3. Review &amp; Sign</a>
                        </div>
                        <div class="discuss__top">
                            <div class="discuss__title">Review and Sign</div>
                            <div class="discuss__subtitle">Passport upload</div>
                            <div class="discuss__result">
                                <b>Apartment:</b> 1-Bedroom in Ciutadela <br>
                                <b>Condition:</b> used apartment <br>
                                <b>Units:</b> 1 bed,  2 baths <br>
                                <b>Area:</b> 22m <br>
                                <b>Price:</b> <span class="price">€1,050,000</span> <br>
                                <b>Description:</b><br> 
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus orci lectus, convallis in vestibulum sit amet, vulputate in metus. Curabitur vel porttitor neque.
                                <b>Features:</b>
                                <div class="discuss__features">
                                    <div class="discuss__features-item">
                                        <img src="assets/icons/icon-25x25-furniture.svg" />
                                    </div>
                                    <div class="discuss__features-item">
                                        <img src="assets/icons/icon-25x25-elevator.svg" />
                                    </div>
                                    <div class="discuss__features-item">
                                        <img src="assets/icons/icon-25x25-heating.svg" />
                                    </div>
                                    <div class="discuss__features-item">
                                        <img src="assets/icons/icon-25x25-dishwasher.svg" />
                                    </div>
                                    <div class="discuss__features-item">
                                        <img src="assets/icons/icon-25x25-laundry.svg" />
                                    </div>
                                    <div class="discuss__features-item">
                                        <img src="assets/icons/icon-25x25-ac.svg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="discuss__bottom">
                            <div class="discuss__subtitle">Sign</div>
                            <div class="discuss__result">
                                To review and sign document for apartment, you need to visit notorius <b>27 Jul 2017, 15:00</b> at the address: <b>Barcelona, Via La ietana 125</b>
                            </div>
                        </div>
                    </div>
                    <button class="next next--green" type="button">accept meeting</button>
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