@extends('layouts.app')
@section('title', 'Collections - '.Auth::user()->name)
@section('content')

    <main>

        <div class="page <?php  echo ($collections != false)?"page--left-white":""; ?>">

            <?php if($collections != false){  ?>
            <div class="container">
                <div class="page__left">
                    <div class="collection-nav">
                        <div class="collection-nav__title">My Collections</div>
                        <?php foreach($collections as $collection) { ?>

                        <div class="collection-nav__item <?php echo ($collect_id == $collection['id'])?"active":"";?>" data-id="<?php echo $collection['id']; ?>" data-of="<?php echo Auth::user()->name; ?>">
                            <a href="javascript:void(0)" class="collection-nav__link"></a>
                            <div class="collection-nav__item-left">
                                <div class="collection-nav__item-text"><?php echo $collection['collection']; ?></div>
                                <input type="text" class="collection-nav__item-name" value="<?php echo $collection['collection']; ?>" tabindex="-1">
                                <div class="collection-nav__item-count">(<span class="total_in_collection"><?php echo $collection['total_property']; ?></span>)</div>
                            </div>
                            <div class="collection-nav__item-right">
                                <button class="collection-nav__edit js-rename-collection">
                                    <svg width="19px" height="19px" viewBox="0 0 19 19" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-415.000000, -325.000000)" fill-rule="nonzero" fill="#E2E2E2">
                                                <g transform="translate(135.000000, 135.000000)">
                                                    <path d="M280,193.838459 C280.001064,193.347618 280.398704,192.949978 280.889545,192.948914 L290.425077,192.948914 L289.616751,194.728003 L280.889545,194.728003 C280.398704,194.72694 280.001064,194.3293 280,193.838459 Z M280,204.766322 C280.001064,205.257162 280.398704,205.654803 280.889545,205.655866 L285.66988,205.655866 C285.680834,205.059083 285.739682,204.464142 285.845855,203.876777 L280.889545,203.876777 C280.398704,203.877841 280.001064,204.275481 280,204.766322 L280,204.766322 Z M280.889545,198.365468 L287.967226,198.365468 L288.775551,196.586378 L280.889545,196.586378 C280.398263,196.586378 280,196.984641 280,197.475923 C280,197.967205 280.398263,198.365468 280.889545,198.365468 L280.889545,198.365468 Z M280,201.111453 C280.001064,201.602294 280.398704,201.999934 280.889545,202.000998 L286.354443,202.000998 C286.451133,201.735424 286.55878,201.473073 286.677386,201.213944 L287.12796,200.221909 L280.889545,200.221909 C280.398704,200.222972 280.001064,200.620613 280,201.111453 Z M297.514361,194.90978 L296.53006,194.468875 L296.916819,193.623808 C297.296656,192.863653 297.230623,191.956679 296.744686,191.259558 C296.25875,190.562437 295.430639,190.186678 294.586013,190.28005 C293.741386,190.373422 293.015348,190.92099 292.693416,191.707419 L288.085187,201.852096 C287.242895,203.707643 287.004135,205.780729 287.402559,207.779171 C287.440167,207.970189 287.567637,208.131321 287.744872,208.211883 C287.922107,208.292444 288.127324,208.282533 288.295971,208.185267 L288.295971,208.185267 C290.062819,207.169268 291.466293,205.624432 292.308591,203.768485 L295.8571,195.959829 L296.8356,196.402668 C296.908995,196.436056 296.941784,196.522343 296.909084,196.596047 L295.004298,200.792378 C294.876875,201.060726 294.90418,201.376951 295.075717,201.619484 C295.247255,201.862018 295.536321,201.993106 295.83179,201.962355 C296.127259,201.931603 296.383136,201.743798 296.501053,201.471139 L298.405839,197.274809 C298.809519,196.375447 298.411261,195.318898 297.514361,194.90978 Z"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                                <button class="collection-nav__delete js-popup-open" data-mfp-src="#delete-collection" type="button">
                                    <svg width="15px" height="18px" viewBox="0 0 15 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-463.000000, -209.000000)" fill-rule="nonzero" fill="#E2E2E2">
                                                <g transform="translate(135.000000, 135.000000)">
                                                    <g transform="translate(328.000000, 74.000000)">
                                                        <path d="M15.0001579,2.0041579 L15.0001579,3.12726316 C15.0001579,3.52563158 14.6771053,3.84868422 14.2787368,3.84868422 L0.72142106,3.84868422 C0.32305264,3.84868422 0,3.52563158 0,3.12726316 L0,2.0041579 C0,1.60578948 0.32305264,1.28273684 0.72142106,1.28273684 L5.39336842,1.28273684 L5.39336842,0.721421052 C5.39336842,0.323052632 5.71594736,0 6.11431578,0 L8.8858421,0 C9.28421052,0 9.60726316,0.323052632 9.60726316,0.721421052 L9.60726316,1.28273684 L14.2787368,1.28273684 C14.6771053,1.28273684 15.0001579,1.60578948 15.0001579,2.0041579 Z M3.48821052,15.3625263 L3.48821052,7.74236842 L4.7581579,7.74236842 L4.7581579,15.3625263 L3.48821052,15.3625263 Z M7.03752632,15.3625263 L7.03752632,7.74236842 L8.30747368,7.74236842 L8.30747368,15.3625263 L7.03752632,15.3625263 Z M10.5868421,15.3625263 L10.5868421,7.74236842 L11.8567895,7.74236842 L11.8567895,15.3625263 L10.5868421,15.3625263 Z M1.13494736,16.6736842 C1.13494736,17.406 1.72894736,18 2.46173684,18 L12.5388947,18 C13.2712105,18 13.8652105,17.406 13.8652105,16.6736842 L13.8652105,5.26973684 L1.13494736,5.26973684 L1.13494736,16.6736842 Z"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <?php } ?>

                    </div>
                </div>

                <div class="page__right">
                    <?php foreach($collections as $collection) { ?>
                        <div class="collections" id="collection_<?php echo $collection['id']; ?>">
                            <div class="collection_properties">
                                <?php if($collection['total_property'] <= 0) { ?>
                                    <h3 class="not_fond">Opps! You don't have added any property to this collection</h3>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="load_more hidden">
                        <buttn class="btn btn-primary btn-sm">Load More</buttn>
                    </div>
                </div>

                <?php } else { ?>
                <div class="container">
                    <h3 class="not_fond">
                        Oops! You don't have created any collection yet! <br/>
                    </h3>
                </div>
                <?php } ?>

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
        </div>
    </main>

@endsection