@extends('layouts.app')
@section('title', 'Collections - '.Auth::user()->name)
@section('content')

    <main>

        <div class="page">
            <div class="container">
                <div class="page__title">My Properties</div>
                <div class="page-top">
                    <div class="page-top__left">
                        <a href="{{ url('property/add')  }}" class="round-btn round-btn--green">add property</a>
                    </div>
                    <div class="page-top__right">
                        <div class="filter-big">
                            <div class="filter-big__title">Filter</div>
                            <div class="filter-big__items">
                                <a href="javascript:void(0)" class="filter-big__item filter_for active" data-type="">
                                    <span>all</span>
                                </a>
                                <a href="javascript:void(0)" class="filter-big__item filter_for" data-type="RENT">
                                    <span>rent</span>
                                </a>
                                <a href="javascript:void(0)" class="filter-big__item filter_for" data-type="SALE">
                                    <span>sale</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='my-properties-block'>
                    <div class="my_properties_list" id='my_properties'></div>
                    <div class='load_more hidden'>
                        <buttn class="btn btn-primary btn-sm ">Load More</buttn>
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

    <div id="delete-property" class="mfp-hide popup popup--400">
        <div class="popup__inner">
            <div class="popup__subtitle">
                Do you really want to <br> delete property <br> “<span></span>” ?
            </div>
            <div class="popup__btns">
                <button type="button" class="popup__ok-btn">yes, Delete this property</button>
                <button type="button" class="popup__cancel-btn">no, leave this property</button>
            </div>
        </div>
    </div>

@endsection