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
                            <a href="#" class="discuss__nav-item active">2. Documentation</a>
                            <a href="#" class="discuss__nav-item">3. Review &amp; Sign</a>
                        </div>
                        <div class="discuss__top">
                            <div class="discuss__title">Upload Documentation</div>
                            <div class="dnd" data-name="passport">
                                <div class="dnd__drag">Drag Files Here</div>
                                <div class="st-label">Passport upload</div>
                                <div id="file-list1" class="dnd__files"></div>
                                <div class="dnd__cols2">
                                    <div class="col">
                                        <div class="dnd__file">
                                            <label for="passport">upload</label>
                                            <input data-name="passport" type="file" id="passport" multiple accept="image/*" class="js-file-multiple" data-filelist="#file-list1">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="dnd__desc">
                                            Upload first and second pages of your passport
                                        </div>
                                    </div>
                                </div>
                                <label for="comment1" class="discuss__label">Comments</label>
                                <textarea name="comment1" id="comment1" class="st-field st-field--sm" placeholder="Type a comment here…"></textarea>
                            </div>
                        </div>
                        <div class="discuss__section">
                            <div class="dnd" data-name="funds">
                                <div class="dnd__drag">Drag Files Here</div>
                                <div class="st-label">Proof of funds</div>
                                <div id="file-list2" class="dnd__files"></div>
                                <div class="dnd__cols2">
                                    <div class="col">
                                        <div class="dnd__file">
                                            <label for="funds">upload</label>
                                            <input data-name="funds" type="file" id="funds" multiple accept="image/*" class="js-file-multiple" data-filelist="#file-list2">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="dnd__desc">
                                            Upload proof of funds. You can get it from your bank manager
                                        </div>
                                    </div>
                                </div>
                                <label for="comment2" class="discuss__label">Comments</label>
                                <textarea name="comment2" id="comment2" class="st-field st-field--sm" placeholder="Type a comment here…"></textarea>
                            </div>
                        </div>
                        <div class="discuss__section">
                            <div class="dnd" data-name="another">
                                <div class="dnd__drag">Drag Files Here</div>
                                <div class="st-label">Another document</div>
                                <div id="file-list3" class="dnd__files"></div>
                                <div class="dnd__cols2">
                                    <div class="col">
                                        <div class="dnd__file">
                                            <label for="another">upload</label>
                                            <input data-name="another" type="file" id="another" multiple accept="image/*" class="js-file-multiple" data-filelist="#file-list3">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="dnd__desc">
                                            Additional documents that you want to provide
                                        </div>
                                    </div>
                                </div>
                                <label for="comment3" class="discuss__label">Comments</label>
                                <textarea name="comment3" id="comment3" class="st-field st-field--sm" placeholder="Type a comment here…"></textarea>
                            </div>
                        </div>
                    </div>
                    <button class="next" type="button">next step: review &amp; sign</button>
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