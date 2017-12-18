@extends('layouts.app')
@section('title', 'Add Property')
@section('content')
    <main>
        

    <div class="page page--left-white page--account">
        <div class="container">
            <div class="page__left">
                <div class="offers-nav">
                    <div class="offers-nav__title">Hello David!</div>
                    <a href="#" class="offers-nav__item active">My Profile</a>
                    <a href="#" class="offers-nav__item">Notification &amp; Updates</a>
                </div>
                <button type="button" class="signout-btn">Sign Out</button>
            </div>
            <div class="page__right">
                <div class="account-settings">
                    <form action="#" class="form">
                        <div class="form__row form__row--two">
                            <div class="form__field">
                                <div class="field">
                                    <label for="account_email">Email</label>
                                    <input type="email" id="account_email" name="account_email">
                                </div>
                            </div>
                            <div class="form__field">
                                <div class="field">
                                    <label for="account_password">Change Password</label>
                                    <input type="password" id="account_password" name="account_password">
                                </div>
                            </div>
                        </div>
                        <div class="form__row form__row--two">
                            <div class="form__field">
                                <div class="field">
                                    <label for="account_name">First and Last Name</label>
                                    <input type="text" id="account_name" name="account_name">
                                </div>
                            </div>
                            <div class="form__field">
                                <div class="field">
                                    <label for="account_phone">Your Phone Number</label>
                                    <input type="tel" id="account_phone" name="account_phone">
                                </div>
                            </div>
                        </div>
                        <div class="form__btns form__btns--left">
                            <button class="account-settings__submit" type="submit">Update</button>
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