@extends('layouts.app')
@section('title', 'Add Property')
@section('content')
    <main>
        
    <div class="page">
        <div class="container">
            <div class="page__title">Add Property</div>

            <div class="page__cols2">
                <div class="col">
                    <div class="steps">
                        <div class="steps__item complete">Tell us about the deal</div>
                        <div class="steps__item">Property details</div>
                        <div class="steps__item">Documentation</div>
                        <div class="steps__item">Your contact info</div>
                        <div class="steps__item">Publish listing</div>
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
                                    <textarea class="st-field" name="" id="" placeholder="Please describe your problem here and we will do our best to help you within 24 hours"></textarea>
                                </div>
                                <button type="submit" class="help__submit">submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="add-property">
                        <div class="add-property__section">
                            <div class="add-property__title">Tell us about the deal</div>
                            <div class="add-property__cols3bad">
                                <div class="col">
                                    <div class="st-label">Property type</div>
                                    <div class="radio">
                                        <input type="radio" id="r11" name="property_type1">
                                        <label for="r11"><span></span>Residential</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" id="r12" name="property_type1">
                                        <label for="r12"><span></span>Retail</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="st-label">Type of deal:</div>
                                    <div class="radio">
                                        <input class="js-toggle-add-property-fields" type="radio" id="r13" name="property_deal" data-type="rent">
                                        <label for="r13"><span></span>I’m renting</label>
                                    </div>
                                    <div class="radio">
                                        <input class="js-toggle-add-property-fields" type="radio" id="r14" name="property_deal" data-type="sell">
                                        <label for="r14"><span></span>I’m selling</label>
                                    </div>
                                </div>
                                <div class="col add-property__only-rent">
                                    <div class="st-label">For rent by:</div>
                                    <div class="radio">
                                        <input type="radio" id="r15" name="property_rentby">
                                        <label for="r15"><span></span>Management company or a broker</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" id="r16" name="property_rentby">
                                        <label for="r16"><span></span>Owner</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" id="r17" name="property_rentby">
                                        <label for="r17"><span></span>Tenant</label>
                                    </div>
                                </div>
                            </div>
                            <div class="add-property__only-selling">
                                <div class="add-property__row">
                                    <div class="st-label">Price</div>
                                    <div class="add-property__amount">
                                        <div class="amount-field amount-field--full">
                                            <input class="amount-field__input js-format" id="amount" type="text" value="1,150">
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
                                        <div class="st-label">Rent</div>
                                        <div class="add-property__amount">
                                            <div class="amount-field amount-field--full">
                                                <input class="amount-field__input js-format" id="amount2" type="text" value="1,150">
                                                <div class="amount-field__currency">€</div>
                                            </div>
                                            <span class="add-property__amount-textsm">
                                                /month
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="st-label">Lease duration</div>
                                        <div class="select-wrapper">
                                            <select class="custom-select" style="width: 160px;">
                                                <option value="1">6 month</option>
                                                <option value="2">1 year</option>
                                                <option value="3">3 years</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="add-property__section">
                            <div class="add-property__title">Property details</div>
                            <div class="add-property__cols2">
                                <div class="col">
                                    <label for="property_provincia" class="st-label">Provincia</label>
                                    <input id="property_provincia" class="st-field" type="text" >
                                </div>
                                <div class="col">
                                    <label for="property_city" class="st-label">City</label>
                                    <input id="property_city" class="st-field" type="text" >
                                </div>
                            </div>
                            <div class="add-property__row">
                                <label for="property_street" class="st-label">Street address</label>
                                <input id="property_street" class="st-field" type="text" >
                            </div>
                            <div class="add-property__cols3">
                                <div class="col">
                                    <div class="st-label">Property type</div>
                                    <div class="radio">
                                        <input type="radio" id="r1" name="property_type">
                                        <label for="r1"><span></span>Apartment</label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" id="r2" name="property_type">
                                        <label for="r2"><span></span>House</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="st-label">Number or bedrooms</div>
                                    <div class="add-property__innercols">
                                        <div>
                                            <div class="radio">
                                                <input type="radio" id="r3" name="property_bedrooms">
                                                <label for="r3"><span></span>0 (estudio)</label>
                                            </div>
                                            <div class="radio">
                                                <input type="radio" id="r4" name="property_bedrooms">
                                                <label for="r4"><span></span>1</label>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="radio">
                                                <input type="radio" id="r5" name="property_bedrooms">
                                                <label for="r5"><span></span>2</label>
                                            </div>
                                            <div class="radio">
                                                <input type="radio" id="r6" name="property_bedrooms">
                                                <label for="r6"><span></span>3</label>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="radio">
                                                <input type="radio" id="r7" name="property_bedrooms">
                                                <label for="r7"><span></span>4</label>
                                            </div>
                                            <div class="radio">
                                                <input type="radio" id="r8" name="property_bedrooms">
                                                <label for="r8"><span></span>5+</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="st-label">Number or bathrooms</div>
                                    <div class="add-property__innercols">
                                        <div>
                                            <div class="radio">
                                                <input type="radio" id="r9" name="property_bathrooms">
                                                <label for="r9"><span></span>1</label>
                                            </div>
                                            <div class="radio">
                                                <input type="radio" id="r10" name="property_bathrooms">
                                                <label for="r10"><span></span>2</label>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="radio">
                                                <input type="radio" id="r11" name="property_bathrooms">
                                                <label for="r11"><span></span>3</label>
                                            </div>
                                            <div class="radio">
                                                <input type="radio" id="r12" name="property_bathrooms">
                                                <label for="r12"><span></span>4+</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-property__cols2 add-property__cols2--small">
                                <div class="col">
                                    <label for="property_area" class="st-label">Area</label>
                                    <div class="field-wrap-with-text">
                                        <input id="property_area" class="st-field st-field--sm" type="text" data-mask="000000">
                                        m<sup>2</sup>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="property_year" class="st-label">Year of construction</label>
                                    <input id="property_year" class="st-field st-field--sm" type="text" data-mask="0000">
                                </div>
                            </div>
                            <div class="add-property__row">
                                <div class="st-label">Property features</div>
                                <div class="add-property__features">
                                    <div class="add-property__features-col">
                                        <div class="checkbox checkbox--small">
                                            <input type="checkbox" id="f1">
                                            <label for="f1">
                                                <span></span>
                                                <div class="checkbox__icon"><img src="assets/icons/icon-25x25-elevator.svg"></div>
                                                Evevator
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox--small">
                                            <input type="checkbox" id="f2">
                                            <label for="f2">
                                                <span></span>
                                                <div class="checkbox__icon"><img src="assets/icons/icon-25x25-doorman.svg"></div>
                                                Doorman
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox--small">
                                            <input type="checkbox" id="f3">
                                            <label for="f3">
                                                <span></span>
                                                <div class="checkbox__icon"><img src="assets/icons/icon-25x25-furniture.svg"></div>
                                                Furnished
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox--small">
                                            <input type="checkbox" id="f4">
                                            <label for="f4">
                                                <span></span>
                                                <div class="checkbox__icon"><img src="assets/icons/icon-25x25-dishwasher.svg"></div>
                                                Dishwasher
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox--small">
                                            <input type="checkbox" id="f5">
                                            <label for="f5">
                                                <span></span>
                                                <div class="checkbox__icon"><img src="assets/icons/icon-25x25-heating.svg"></div>
                                                Heating
                                            </label>
                                        </div>
                                    </div>
                                    <div class="add-property__features-col">
                                        <div class="checkbox checkbox--small">
                                            <input type="checkbox" id="f6">
                                            <label for="f6">
                                                <span></span>
                                                <div class="checkbox__icon"><img src="assets/icons/icon-25x25-outdoor.svg"></div>
                                                Outdoor space
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox--small">
                                            <input type="checkbox" id="f7">
                                            <label for="f7">
                                                <span></span>
                                                <div class="checkbox__icon"><img src="assets/icons/icon-25x25-gym.svg"></div>
                                                Gym
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox--small">
                                            <input type="checkbox" id="f8">
                                            <label for="f8">
                                                <span></span>
                                                <div class="checkbox__icon"><img src="assets/icons/icon-25x25-pool.svg"></div>
                                                Pool
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox--small">
                                            <input type="checkbox" id="f9">
                                            <label for="f9">
                                                <span></span>
                                                <div class="checkbox__icon"><img src="assets/icons/icon-25x25-pets.svg"></div>
                                                Pets
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox--small">
                                            <input type="checkbox" id="f10">
                                            <label for="f10">
                                                <span></span>
                                                <div class="checkbox__icon"><img src="assets/icons/icon-25x25-dogs.svg"></div>
                                                Dogs
                                            </label>
                                        </div>
                                    </div>
                                    <div class="add-property__features-col">
                                        <div class="checkbox checkbox--small">
                                            <input type="checkbox" id="f11">
                                            <label for="f11">
                                                <span></span>
                                                <div class="checkbox__icon"><img src="assets/icons/icon-25x25-laundry.svg"></div>
                                                Laundry
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox--small">
                                            <input type="checkbox" id="f12">
                                            <label for="f12">
                                                <span></span>
                                                <div class="checkbox__icon"><img src="assets/icons/icon-25x25-ac.svg"></div>
                                                Central a/c
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox--small">
                                            <input type="checkbox" id="f13">
                                            <label for="f13">
                                                <span></span>
                                                <div class="checkbox__icon"><img src="assets/icons/icon-25x25-cat.svg"></div>
                                                Cats
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox--small">
                                            <input type="checkbox" id="f14">
                                            <label for="f14"><span></span>Other</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-property__row">
                                <label for="property_description" class="st-label">Description</label>
                                <textarea name="" id="property_description" class="st-field"></textarea>
                            </div>
                            <div class="add-property__row">
                                <div class="st-label">Images</div>
                                <div class="add-property__files">
                                    <div class="file-input" id="file-list">
                                        <label for="file_images">add Picture</label>
                                        <input id="file_images" multiple data-name="propertyImages" name="property_images[]" accept="image/*" type="file" class="js-file-multiple" data-filelist="#file-list">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="add-property__section">
                            <div class="add-property__title">Documentation</div>
                            <div class="add-property__files">
                                <div class="file-input">
                                    <label for="file_doc1">add Energy Certificate</label>
                                    <input id="file_doc1" type="file" class="js-file-one">
                                    <div class="file-input__preview"></div>
                                </div>
                                <div class="file-input">
                                    <label for="file_doc2">add Certificate of Ownership</label>
                                    <input id="file_doc2" type="file" class="js-file-one">
                                    <div class="file-input__preview"></div>
                                </div>
                            </div>
                        </div>
                        <div class="add-property__section">
                            <div class="add-property__title">Your contact info</div>
                            <div class="add-property__cols2">
                                <div class="col">
                                    <label for="property_name" class="st-label">Name</label>
                                    <input id="property_name" class="st-field" type="text" placeholder="Your Name">
                                </div>
                                <div class="col">
                                    <label for="property_phone" class="st-label">Phone number</label>
                                    <input id="property_phone" data-mask="00 000-000-0000" class="st-field" type="tel" placeholder="Your Phone">
                                </div>
                            </div>
                            <div class="add-property__cols2">
                                <div class="col">
                                    <label for="property_email" class="st-label">Email</label>
                                    <input id="property_email" class="st-field" type="email" placeholder="Your Email">
                                </div>
                                <div class="col">
                                    <label for="property_soon" class="st-label">How soon you want to sell the apartment</label>
                                    <select class="custom-select" name="property_soon" id="property_soon" style="width: 100%;">
                                        <option value="1">Withing 1 month</option>
                                        <option value="2">Withing 3 month</option>
                                        <option value="3">Withing 6 month</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="add-property__section">
                            <div class="add-property__title">Publish Listing</div>
                            <div class="add-property__actions">
                                <div>
                                    <button class="add-property__submit" type="submit">publish listing</button>
                                    <button class="add-property__save" type="button">save for later</button>
                                </div>
                                <div>
                                    <button class="add-property__delete" type="button">delete listing</button>
                                </div>
                            </div>
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