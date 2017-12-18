@extends('layouts.app')
@section('title', 'Add Property')
@section('content')
<main>
        

    <div class="page page--left-white page--account">
        <div class="container">
            <div class="page__left">
                <div class="offers-nav">
                    <div class="offers-nav__title">Hello David!</div>
                    <a href="#" class="offers-nav__item">My Profile</a>
                    <a href="#" class="offers-nav__item active">Notification &amp; Updates</a>
                </div>
                <button type="button" class="signout-btn">Sign Out</button>
            </div>
            <div class="page__right">
                <div class="account-settings">
                    <form action="#" class="form">
                        <div class="account-settings__title">Fedd Email Frequency</div>
                        <div class="account-settings__block">
                            <div class="account-settings__block-left">
                                <div class="account-setting__desc">
                                    Never miss a new listing that matches your criteria. Shop stress-free from your inbox.
                                </div>
                            </div>
                            <div class="account-settings__block-right">
                                <select class="custom-select" name="account_email_frequency" id="account_email_frequency" style="width: 180px">
                                    <option>Weekly updates</option>
                                    <option value="1">Weekly updates2</option>
                                    <option value="2">Weekly updates3</option>
                                </select>
                            </div>
                        </div>
                        <div class="account-settings__title">Feature Updates</div>
                        <div class="account-settings__block">
                            <div class="account-settings__block-left">
                                <div class="account-setting__desc">
                                    We test and announce features, products, and deals via email. Stay in the know.
                                </div>
                            </div>
                            <div class="account-settings__block-right">
                                <div class="toggle">
                                    <div class="toggle__item">
                                        <input type="radio" id="account_toggle1" checked name="account_toggle">
                                        <label for="account_toggle1"><span>Yes</span></label>
                                    </div>
                                    <div class="toggle__item">
                                        <input type="radio" id="account_toggle2" name="account_toggle">
                                        <label for="account_toggle2"><span>No</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account-settings__title">Feature Updates</div>
                        <div class="account-settings__block">
                            <div class="account-settings__block-left">
                                <div class="account-setting__desc">
                                    We test and announce features, products, and deals via email. Stay in the know.
                                </div>
                            </div>
                            <div class="account-settings__block-right">
                                <div class="toggle">
                                    <div class="toggle__item">
                                        <input type="radio" id="account_toggle3" checked name="account_toggle2">
                                        <label for="account_toggle3"><span>Yes</span></label>
                                    </div>
                                    <div class="toggle__item">
                                        <input type="radio" id="account_toggle4" name="account_toggle2">
                                        <label for="account_toggle4"><span>No</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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