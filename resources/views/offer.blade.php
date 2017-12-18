@extends('layouts.app')
@section('title', 'Loquare | '.$property['direccion'])
@section('content')
<main>


    <div class="container">
        <div class="my-properties my-properties--top">
            <div class="my-properties__left">
                <div class="my-properties__img lazyload" data-sizes="auto" data-bgset="{{ asset('frontend/assets/images/my-properties.jpg') }} 1x, {{ asset('frontend/assets/images/my-properties_2x.jpg') }} 2x"></div>
                <div class="my-properties__img lazyload" data-sizes="auto" data-bgset="{{ asset('frontend/assets/images/my-properties.jpg') }} 1x, {{ asset('frontend/assets/images/my-properties_2x.jpg') }} 2x"></div>
                <div class="my-properties__img lazyload" data-sizes="auto" data-bgset="{{ asset('frontend/assets/images/my-properties.jpg') }} 1x, {{ asset('frontend/assets/images/my-properties_2x.jpg') }} 2x"></div>
                <div class="my-properties__img lazyload" data-sizes="auto" data-bgset="{{ asset('frontend/assets/images/my-properties.jpg') }} 1x, {{ asset('frontend/assets/images/my-properties_2x.jpg') }} 2x"></div>
            </div>
            <div class="my-properties__center">
                <a href="#" class="my-properties__title"><?php echo $property['direccion']; ?></a>
                <div class="my-properties__price">&euro;<?php echo $property['price']; ?>/mo</div>
                <div class="my-properties__status">Status: <i>didn’t viewed the apartment</i></div>
                <div class="my-properties__desc">
                    <div><?php echo $property['sizem2']; ?>m<sup>2</sup></div>
                </div>
            </div>
        </div>

        <div class="box-twice">
            <div class="box-twice__item">
                <form action="#">
                    <div class="discuss">
                        <div class="discuss__top">
                            <div class="discuss__title">Discuss Offer</div>
                            <div class="discuss__desc">
                                <?php echo $property['comunidad_autonoma']; ?>
                            </div>
                        </div>
                        <div class="discuss__bottom">
                            <div class="discuss__section">
                                <div class="discuss__subtitle">How do you like to get paid?</div>
                                <div class="discuss__radios">
                                    <div class="radio">
                                        <input type="radio" id="r1" name="r" checked>
                                        <label for="r1">
                                            <span></span>
                                            Doesn’t matter
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <input type="radio" id="r2" name="r">
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
                                <div class="discuss__subtitle">Amount to earn</div>
                                <div class="amount">
                                    <div class="amount__row">
                                        <div class="amount__col">
                                            <div class="amount-field amount-field--focus">
                                                <div class="input-autosize-buffer"></div>
                                                <input class="amount-field__input input-autosize" id="amount" type="text" value="<?php echo $property['price']; ?>">
                                                <div class="amount-field__term">mo</div>
                                                <div class="amount-field__currency">€</div>
                                            </div>
                                        </div>
                                        <div class="amount__col">
                                            <div class="list-price">
                                                <div class="list-price__title">List price</div>
                                                <div class="list-price__slider" id="list-price" data-input="amount" data-min="0" data-max="2000"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="amount__row">
                                        <button type="button" class="btn btn--green">submit</button>
                                        <button type="button" class="compare-btn">Compare Price</button>
                                    </div>
                                </div>
                            </div>
                            <div class="discuss__section">
                                <div class="discuss__subtitle">Refund description</div>
                                <div class="refund">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>Price</th>
                                            <th>Refund</th>
                                            <th>Commission</th>
                                            <th>Percentage</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>600</td>
                                            <td>521,25</td>
                                            <td>78,75</td>
                                            <td>0.13</td>
                                        </tr>
                                        <tr>
                                            <td>600</td>
                                            <td>521,25</td>
                                            <td>78,75</td>
                                            <td>0.13</td>
                                        </tr>
                                        <tr>
                                            <td>600</td>
                                            <td>521,25</td>
                                            <td>78,75</td>
                                            <td>0.13</td>
                                        </tr>
                                        <tr>
                                            <td>600</td>
                                            <td>521,25</td>
                                            <td>78,75</td>
                                            <td>0.13</td>
                                        </tr>
                                        <tr>
                                            <td>600</td>
                                            <td>521,25</td>
                                            <td>78,75</td>
                                            <td>0.13</td>
                                        </tr>
                                        <tr>
                                            <td>600</td>
                                            <td>521,25</td>
                                            <td>78,75</td>
                                            <td>0.13</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="refund__bottom">
                                        <button type="button" class="refund__btn js-show-table" data-target=".refund">show all</button>
                                    </div>
                                </div>
                            </div>
                            <div class="discuss__section">
                                <div class="discuss__subtitle">Schedule a visit to the apartment</div>
                                <div class="discuss__notify">You get a proposal to visit your apartment. Please respond.</div>
                                <div class="discuss__dates">
                                    <div class="discuss__dates-title">David propose to visit your apartment at:</div>
                                    <div class="discuss__dates-cols">
                                        <div class="discuss__dates-col">
                                            <input type="text" disabled value="15:00">
                                        </div>
                                        <div class="discuss__dates-col">
                                            <input type="text" disabled value="Today, June 19, 2017">
                                        </div>
                                        <div class="discuss__dates-col">
                                            <button type="button" class="btn btn--green">accept visit</button>
                                        </div>
                                    </div>
                                    <div class="discuss__dates-title">or submit other date</div>
                                    <div class="discuss__dates-cols">
                                        <div class="discuss__dates-col">
                                            <div class="timepicker-w">
                                                <input type="text" class="timepicker" id="timepicker" name="timepicker">
                                            </div>
                                        </div>
                                        <div class="discuss__dates-col">
                                            <input type="text" id="datepicker" class="datepicker" value="Today, June 19, 2017">
                                        </div>
                                        <div class="discuss__dates-col">
                                            <button type="button" class="btn btn--dark">submit new date</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="discuss__btns">
                                <button type="button" class="btn btn--gray">dismiss visit</button>
                            </div>
                        </div>
                    </div>
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
                                <img src="{{ asset('assets/icons/form-success.svg') }}" alt="">
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
                                <img src="{{ asset('assets/icons/form-fail.svg') }}" alt="">
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
</main>
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function(){ $(".page_loader").fadeOut(500) }, 1000);
    });
</script>
@endsection