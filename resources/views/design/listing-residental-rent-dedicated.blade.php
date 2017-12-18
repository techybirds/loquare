@extends('layouts.app')
@section('title', 'Add Property')
@section('content')
    <main>
        

    <div class="page page--nopad">
        <div class="big-slider">
            <div class="big-slider__item" style="background-image: url(assets/images/placeholder-1920x608-white.png)"></div>
            <div class="big-slider__item" style="background-image: url(assets/images/placeholder-1920x608.png)"></div>
            <div class="big-slider__item" style="background-image: url(assets/images/placeholder-1920x608-white.png)"></div>
            <div class="big-slider__item" style="background-image: url(assets/images/placeholder-1920x608.png)"></div>
            <div class="big-slider__item" style="background-image: url(assets/images/placeholder-1920x608-white.png)"></div>
        </div>

        <div class="residental">
            <div class="residental__left">
                <div class="residental__content">
                    <div class="residental__title">1-Br Apartment in Badalona for Rent</div>
                    <div class="residental__id">ID number: 4122861BB</div>
                    <div class="residental__price">$1,150/mo</div>
                    <div class="residental__subtitle">Description</div>
                    <div class="residental__desc">
                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. 
                    </div>
                    <div class="residental__subtitle">Features &amp; Characteristics</div>
                    <div class="residental__features">
                        <div class="residental__feature">
                            <div class="residental__feature-icon">
                                <img src="assets/icons/icon-25x25-furniture.svg" />
                            </div>
                            Furnished
                        </div>
                        <div class="residental__feature">
                            <div class="residental__feature-icon">
                                <img src="assets/icons/icon-25x25-heating.svg" />
                            </div>
                            Heating
                        </div>
                        <div class="residental__feature">
                            <div class="residental__feature-icon">
                                <img src="assets/icons/icon-25x25-elevator.svg" />
                            </div>
                            Elevator
                        </div>
                        <div class="residental__feature">
                            <div class="residental__feature-icon">
                                <img src="assets/icons/icon-25x25-dishwasher.svg" />
                            </div>
                            Dishwasher
                        </div>
                        <div class="residental__feature">
                            <div class="residental__feature-icon">
                                <img src="assets/icons/icon-25x25-ac.svg" />
                            </div>
                            Central a/c
                        </div>
                        <div class="residental__feature">
                            <div class="residental__feature-icon">
                                <img src="assets/icons/icon-25x25-pool.svg" />
                            </div>
                            Pool
                        </div>
                    </div>
                </div>
            </div>
            <div class="residental__right">
                <div class="visit">
                    <div class="visit__title">Get more info / Schedule Visit</div>
                    <div class="visit__form">
                        <form action="#" id="visit-form">
                            <div class="visit__row">
                                <div class="visit__field">
                                    <input type="text" name="visit_name" placeholder="Your name" required data-msg-required="Please enter your name">
                                </div>
                            </div>
                            <div class="visit__row">
                                <div class="visit__field">
                                    <input type="tel" name="visit_phone" placeholder="Your phone" required data-msg-required="Please enter your phone">
                                </div>
                            </div>
                            <div class="visit__row">
                                <div class="visit__field">
                                    <input type="email" name="visit_email" placeholder="Your email" required data-msg-required="Please enter your email">
                                </div>
                            </div>
                            <div class="visit__row">
                                <div class="visit__field">
                                    <textarea name="visit_msg" required placeholder="Tell briefly about yourself, let the owner/realtor know when you want to view the apartment" data-msg-required="Please tell briefly about yourself, let the owner/realtor know when you want to view the apartment"></textarea>
                                </div>
                            </div>
                            <div class="visit__row">
                                <button type="submit" class="visit__submit">submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="visit__footer">
                        <a href="#" class="visit__make">make offer</a>
                        <a href="#save-to-collection" class="visit__save js-popup-open">save listing</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="infosection">
            <div class="container">
                <div class="infosection__tabs">
                    <button class="infosection__tab active js-tab" data-target="#target1" type="button">
                        <svg width="18px" height="20px" viewBox="0 0 18 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-136.000000, -1471.000000)">
                                    <g transform="translate(135.000000, 1421.000000)">
                                        <g transform="translate(0.000000, 50.000000)">
                                            <rect fill="#D8D8D8" fill-rule="evenodd" opacity="0" x="0" y="0" width="20" height="20"></rect>
                                            <path d="M1.8,14.5999641 C1.8,15.5198658 2.44418586,15.7754048 3.03907273,16.337945 L3.03907273,18.1777485 C3.03907273,18.7397616 3.48508687,19.2 4.03030303,19.2 L5.02153333,19.2 C5.56674949,19.2 6.0128101,18.7398095 6.0128101,18.1777485 L6.0128101,17.1555449 L13.9427455,17.1555449 L13.9427455,18.1777485 C13.9427455,18.7397616 14.3889919,19.2 14.9340222,19.2 L15.9252525,19.2 C16.4702364,19.2 16.9164828,18.7398095 16.9164828,18.1777485 L16.9164828,16.337945 C17.5113697,15.7754048 18.1555556,15.4689785 18.1555556,14.5999641 L18.1555556,4.84099364 C18.1555556,1.26320921 14.3391354,0.8 9.97777778,0.8 C5.6164202,0.8 1.8,1.26320921 1.8,4.84099364 L1.8,14.5999641 Z M5.37777778,15.1111111 C4.50876111,15.1111111 3.84444444,14.4467944 3.84444444,13.5777778 C3.84444444,12.708809 4.50876111,12.0444444 5.37777778,12.0444444 C6.24679444,12.0444444 6.91111111,12.708809 6.91111111,13.5777778 C6.91111111,14.4467944 6.24679444,15.1111111 5.37777778,15.1111111 Z M14.5777778,15.1111111 C13.7087611,15.1111111 13.0444444,14.4467944 13.0444444,13.5777778 C13.0444444,12.708809 13.7087611,12.0444444 14.5777778,12.0444444 C15.4467944,12.0444444 16.1111111,12.708809 16.1111111,13.5777778 C16.1111111,14.4467944 15.4467944,15.1111111 14.5777778,15.1111111 Z M16.1111111,10 L3.84444444,10 L3.84444444,4.88888889 L16.1111111,4.88888889 L16.1111111,10 Z" fill="#5D6872" fill-rule="nonzero"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        Transportation
                    </button>
                    <button class="infosection__tab js-tab" data-target="#target2" type="button">
                        <svg width="22px" height="16px" viewBox="0 0 22 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Listing-Residental-Rent-Dedicated" transform="translate(-317.000000, -1363.000000)">
                                    <g id="tabs" transform="translate(135.000000, 1346.000000)">
                                        <g id="tab-1" transform="translate(167.000000, 0.000000)">
                                            <g id="icon-25x25-people" transform="translate(15.000000, 14.000000)">
                                                <rect id="Rectangle" fill="#D8D8D8" fill-rule="evenodd" opacity="0" x="0" y="0" width="22" height="22"></rect>
                                                <path d="M15.6438582,14.8656547 C17.0390088,15.3597317 17.9259259,16.6840616 17.9259259,18.1866667 L16.5257927,18.1866667 L4.07407407,18.1866667 C4.07407407,17.0813606 4.527498,16.0575517 5.39946709,15.4004803 C6.14686917,14.8299997 6.97399414,14.7434089 7.87087663,14.5549466 C8.20471623,14.4836365 9.03682387,14.3206421 9.13647748,13.9335302 C9.2361311,13.5464184 9.22616573,13.118558 9.23114841,12.721259 C9.2361311,12.588826 9.19128697,12.5786389 9.10159872,12.4767673 C8.92222222,12.2679307 8.76775913,12.0387198 8.69301892,11.7687602 C8.58339995,11.3663676 8.53855582,10.9436008 8.49869438,10.5310211 C8.04527045,10.6583605 7.97551292,9.72623599 7.89579003,9.46646359 C7.84098055,9.28309483 7.58188116,8.23381806 8.06520117,8.38153178 C7.91572076,8.10647864 7.86589395,7.76520901 7.83101519,7.45959442 C7.7512923,6.78724231 7.73136158,6.08942232 7.97053024,5.44763167 C8.46879829,4.12839534 9.80415667,3.47641754 11.1345324,3.52225973 C12.4449774,3.56300834 13.6856648,4.30667052 14.0892619,5.63100043 C14.2835865,6.2676975 14.243725,6.98079822 14.1440714,7.63277602 C14.1091926,7.88236127 14.0593658,8.15741441 13.9347988,8.38153178 C14.4529976,8.21853733 14.119158,9.41043424 14.0643485,9.58361585 C13.9896083,9.8332011 13.9347988,10.6532669 13.5013056,10.5310211 C13.4514788,11.0505659 13.4265654,11.6668887 13.1575007,12.1253106 C13.0877431,12.2424628 12.7688516,12.5124224 12.7688516,12.6397618 C12.7688516,12.8333177 12.7738343,13.0268736 12.7837996,13.2204295 C12.7987477,13.4649212 12.7987477,13.7399743 12.8784706,13.9742788 C12.9631761,14.2136769 13.3667732,14.3002677 13.5710631,14.3715778 C14.243725,14.6109759 14.9711964,14.6262566 15.6438582,14.8656547 Z M5.79156202,14.2391245 C5.32324164,14.4786011 4.89134618,14.8097921 4.53750411,15.1919356 C4.46465428,15.2683643 4.20447629,15.7422222 4.13683001,15.7422222 L2.85155075,15.7422222 L0,15.7422222 C0,14.7231729 0.676462769,13.999648 1.58708573,13.7041237 C1.91490999,13.5971235 3.00245398,13.5003138 3.14815366,13.1334561 C3.24181773,12.8990747 3.19498569,12.5780742 3.17937502,12.3284072 C2.65901904,12.3691691 1.93052067,12.2672642 1.49862521,11.9666447 C1.3841469,11.890216 1.67554624,11.5233582 1.7327854,11.3755961 C1.80563524,11.1819767 1.85246728,10.9832621 1.88368863,10.7794523 C1.95133491,10.3055943 1.93052067,9.82664119 1.91490999,9.35278328 C1.88889219,8.52225812 1.8628744,7.61530427 2.34160189,6.88668404 C2.77349735,6.22430201 3.53842064,5.96444444 4.31375104,5.96444444 C5.56780895,5.96444444 6.55128174,6.59115975 6.78544193,7.83949511 C6.94154872,8.65473453 6.81145973,9.48016444 6.86349533,10.3004991 C6.88951313,10.7183093 6.96756652,11.1361195 7.14448756,11.518263 C7.20172671,11.6405489 7.42027622,11.8647397 7.29539079,11.9564542 C7.19131959,12.0277876 7.07684128,12.0838353 6.9571594,12.1296925 C6.67616718,12.2366927 6.37436071,12.2978357 6.0777578,12.3335024 C6.00490797,12.3436929 5.6770837,12.3233119 5.6250481,12.3742644 C5.55219827,12.4405026 5.60423387,12.8481223 5.60943743,12.9398367 C5.6250481,13.1436466 5.6770837,13.2098848 5.86441185,13.2812182 C6.16621832,13.3984089 6.88430957,13.4493614 7.09245196,13.7092189 C7.20172671,13.8467906 7.13408044,13.9436003 6.98838076,13.958886 C6.6085209,13.9945527 6.22866104,14.0353147 5.87481897,14.1983626 C5.95807593,14.1576006 5.98929729,14.1423149 5.83319049,14.2187436 C5.40129503,14.4327439 5.61464098,14.3257437 5.79156202,14.2391245 Z M20.3896494,13.698193 C21.3068717,13.9931027 21.989577,14.7202076 22,15.7422222 L17.8203844,15.7422222 C17.7057316,15.3354502 17.2836009,14.9998634 16.9709114,14.7507155 C16.5539922,14.4202133 16.0797465,14.1303882 15.542963,14.0337799 C15.3761953,14.003272 14.703913,14.0846264 14.8602577,13.7592088 C14.9644875,13.5405689 15.3188689,13.5253149 15.53254,13.4693838 C15.7409996,13.4134526 16.2986291,13.3422675 16.3559555,13.0931197 C16.37159,13.0270192 16.4080704,12.3863534 16.3559555,12.3863534 C16.0432661,12.3761841 15.7305766,12.3355069 15.4283102,12.2643218 C15.2302735,12.2185599 15.0322369,12.1575441 14.8498347,12.0660204 C14.5215108,11.9033116 14.7091245,11.8067033 14.8394117,11.5321322 C15.5950779,9.89487499 14.2922052,7.03730182 16.5018773,6.17291136 C17.2679664,5.86783238 18.325899,5.88308633 19.0398733,6.31528156 C19.8320199,6.79323864 20.0613254,7.72372954 20.0821714,8.57286605 C20.1082289,9.59488066 19.8528658,10.7745194 20.4209183,11.7050103 C20.5251481,11.8778884 20.618955,11.898227 20.4157068,12.0151739 C20.3271115,12.0660204 20.2333046,12.101613 20.1394978,12.1372055 C19.9362497,12.2083906 19.72779,12.2490678 19.5141189,12.2795757 C19.2796018,12.3100836 19.0294503,12.3456762 18.8001447,12.3253376 C18.7845102,12.5388929 18.7011264,12.9914267 18.8522596,13.1693894 C19.1545261,13.5253149 19.9675186,13.5659921 20.3896494,13.698193 Z" id="icon-demogr-def" fill="#5D6872" fill-rule="nonzero"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        Demographic
                    </button>
                    <button class="infosection__tab js-tab" data-target="#target3" type="button">
                        <svg width="22px" height="22px" viewBox="0 0 22 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-476.000000, -1360.000000)">
                                    <g transform="translate(135.000000, 1346.000000)">
                                        <g transform="translate(326.000000, 0.000000)">
                                            <g transform="translate(15.000000, 14.000000)">
                                                <rect fill="#D8D8D8" fill-rule="evenodd" opacity="0" x="0" y="0" width="22" height="22"></rect>
                                                <path d="M20.7167068,11.2434263 L20.7167068,11.2434263 L20.7167068,11.2434263 L11.2231029,1.67996793 L11.2231029,1.67996793 L11.1553237,1.61217404 L11.1372493,1.61217404 C10.7622045,1.2551262 10.3284177,1.0698229 9.78618429,1.05626412 L9.78618429,1.05626412 L5.28112811,0.889039186 L5.08230918,0.88 C4.57622463,0.889039186 4.07917731,1.08338168 3.69509529,1.47206666 L1.47193817,3.69118673 C1.06526309,4.09795009 0.88,4.63578163 0.88,5.16909359 C0.88,5.16909359 0.88,5.16909359 0.88,5.17361318 L0.893555836,5.36343608 L1.19630284,9.76099989 L1.19630284,9.77003908 L1.19630284,9.85591134 L1.19630284,9.85591134 C1.24148896,10.2491159 1.39964038,10.6378009 1.66623849,10.958692 L1.91476215,11.20275 L11.2366587,20.6396598 L11.3767357,20.7797672 C11.9144505,21.2543244 12.7323193,21.2317265 13.2429225,20.7164929 L20.7167068,13.1868512 C21.249903,12.6535393 21.2589402,11.7812579 20.7167068,11.2434263 Z M5.64235294,8.02352941 C4.3277451,8.02352941 3.26117647,6.95696078 3.26117647,5.64235294 C3.26117647,4.3277451 4.3277451,3.26117647 5.64235294,3.26117647 C6.95696078,3.26117647 8.02352941,4.3277451 8.02352941,5.64235294 C8.02352941,6.95696078 6.95696078,8.02352941 5.64235294,8.02352941 Z" fill="#5D6872" fill-rule="nonzero"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        Pricing
                    </button>
                    <button class="infosection__tab js-tab" data-target="#target4" type="button">
                        <svg width="22px" height="20px" viewBox="0 0 22 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Listing-Residental-Rent-Dedicated" transform="translate(-476.000000, -1361.000000)">
                                    <g id="tabs" transform="translate(135.000000, 1346.000000)">
                                        <g id="tab-1" transform="translate(326.000000, 0.000000)">
                                            <g id="icon-25x25-education" transform="translate(15.000000, 14.000000)">
                                                <rect id="Rectangle" fill="#D8D8D8" fill-rule="evenodd" opacity="0" x="0" y="0" width="22" height="22"></rect>
                                                <path d="M11,1.76 L22,7.23867969 L17.4819464,10.1986224 L10.9927321,14.4266667 L3.14285714,9.37232031 L3.14285714,19.1766667 L1.57142857,18.385 L1.57142857,8.35888802 L0,7.31626302 L11,1.76 Z M17.4166667,11.8433333 L17.4166667,15.51 C16.6018519,16.1648915 13.75,18.26 11,20.0933333 C8.25,18.26 5.39814815,16.1641037 4.58333333,15.51 L4.58333333,11.8433333 L11,16.4266667 L17.4166667,11.8433333 Z" id="icon-schools-def" fill="#5D6872" fill-rule="nonzero"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        Schools
                    </button>
                    <button class="infosection__tab js-tab" data-target="#target5" type="button">
                        <svg width="22px" height="18px" viewBox="0 0 25 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-153.000000, -1725.000000)">
                                    <g transform="translate(153.000000, 1723.000000)">
                                        <rect fill="#D8D8D8" fill-rule="evenodd" opacity="0" x="0" y="0" width="25" height="25"></rect>
                                        <path d="M11.3333516,13.9166484 L11.3333516,21.0625 L5.5,21.0625 L5.5,23.25 L19.5,23.25 L19.5,21.0625 L13.6666484,21.0625 L13.6666484,13.9166484 L25,2.25 L23,2.25 L2,2.25 L0,2.25 L11.3333516,13.9166484 Z M7.30770479,6.25 L5,4.25 L20,4.25 L17.6922952,6.25 L7.30770479,6.25 Z" fill="#5D6872" fill-rule="nonzero"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        Recreation
                    </button>
                    <button class="infosection__tab js-tab" data-target="#target6" type="button">
                        <svg width="22px" height="15px" viewBox="0 0 22 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Listing-Residental-Rent-Dedicated" transform="translate(-744.000000, -1363.000000)">
                                    <g id="tabs" transform="translate(135.000000, 1346.000000)">
                                        <g id="tab-1" transform="translate(594.000000, 0.000000)">
                                            <g id="icon-25x25-planet" transform="translate(15.000000, 14.000000)">
                                                <rect id="Rectangle" fill="#D8D8D8" fill-rule="evenodd" opacity="0" x="0" y="0" width="22" height="22"></rect>
                                                <path d="M4.25806452,11.3264516 C5.94678772,12.3451913 7.94631218,13.3535192 10.0793741,14.2550095 C12.0205387,15.0754154 13.9089348,15.7397296 15.6129032,16.2129344 C14.4146039,17.1514397 12.8917869,17.7135484 11.2337289,17.7135484 C7.51630128,17.7135484 4.47721981,14.8896182 4.25806452,11.3264516 Z M4.96774194,7.86764639 C5.02726653,7.71223906 5.09200677,7.55959683 5.16183848,7.41002214 C5.59175674,6.48855216 6.21217026,5.6819635 6.96951519,5.04560138 C8.10499446,4.09146865 9.54803128,3.52 11.1191826,3.52 C14.6418962,3.52 17.5217193,6.39095273 17.7294759,10.0134513 C17.7374235,10.1522248 17.7419355,10.2919057 17.7419355,10.432753 C17.7419355,11.3391445 17.5744967,12.2047508 17.2706232,12.9979028 C17.2110572,13.1533102 17.146317,13.3059092 17.0765681,13.4554839 C16.8218293,13.3916705 16.559474,13.3213765 16.2905785,13.2445153 C14.6867259,12.7861566 12.8851755,12.1114287 11.0807689,11.2932179 C8.77888905,10.2495218 6.61981854,9.03892598 4.96774194,7.86764639 Z M18.4622595,11.8917352 C20.9242869,13.461579 22.2370274,14.6407876 21.964605,15.5355397 C21.8080267,16.0498363 21.1302795,16.2941935 20.0747504,16.2941935 C17.9224423,16.2941935 14.2010847,15.2771964 10.1378672,13.459012 C4.08201363,10.7492621 -0.441485866,7.28546134 0.0343508409,5.72234497 C0.190929219,5.20809265 0.875723295,4.83901183 1.9242914,4.96373539 C2.86277338,5.0753581 3.9815955,5.3620718 5.0873551,5.77452704 C4.75718269,6.15993965 4.70759668,6.2793078 4.4573033,6.72208086 C3.45548528,6.49923376 2.58197215,6.3799984 1.92420546,6.3799984 C1.83500219,6.3799984 1.75452159,6.38216712 1.68220507,6.38588492 C1.76973255,6.49551596 1.88102179,6.62373603 2.02217437,6.77103198 C2.4985267,7.26780176 3.18370749,7.84100786 4.00359554,8.42855408 C5.78044216,9.7017258 8.15348115,11.0269026 10.6856766,12.1599484 C12.58825,13.0112818 14.4901789,13.71408 16.1860293,14.1923493 C17.753317,14.6344142 19.1343348,14.877842 20.0747504,14.877842 C20.1638678,14.877842 20.2443483,14.8756733 20.3167078,14.8719555 C20.2291804,14.7623245 20.1178911,14.6341044 19.9767385,14.4868084 C19.5425386,14.0339442 18.934358,13.5175674 18.2091302,12.9847261 C18.3601226,12.4948608 18.4082907,12.4034647 18.4622595,11.8917352 Z" id="icon-planet-def" fill="#5D6872" fill-rule="nonzero"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        Satellite
                    </button>
                    <button class="infosection__tab js-tab" data-target="#target7" type="button">
                        <svg width="22px" height="22px" viewBox="0 0 22 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Listing-Residental-Rent-Dedicated" transform="translate(-875.000000, -1360.000000)">
                                    <g id="tabs" transform="translate(135.000000, 1346.000000)">
                                        <g id="tab-1" transform="translate(725.000000, 0.000000)">
                                            <g id="icon-25x25-3d" transform="translate(15.000000, 14.000000)">
                                                <rect id="Rectangle" fill="#D8D8D8" fill-rule="evenodd" opacity="0" x="0" y="0" width="22" height="22"></rect>
                                                <path d="M20.558355,7.32 C20.8678834,7.32 21.1200442,7.54736314 21.12,7.82870234 L21.12,15.9601531 C21.12,16.3743973 20.876995,16.7388685 20.5124875,16.9381376 L20.5010316,16.9443758 L12.7725079,21.0454068 C12.7656079,21.0495657 12.7564079,21.0536802 12.7495521,21.0578833 C12.6693171,21.0973035 12.5776262,21.12 12.4812912,21.12 C12.1698608,21.12 11.92,20.8916193 11.92,20.6092625 L11.92,12.3865833 C11.92,11.9919828 12.1400491,11.6452087 12.4744354,11.4386839 C12.4744354,11.4376221 12.4767354,11.4366045 12.4767354,11.4366045 L12.6487054,11.3482961 L20.233213,7.41344054 L20.3341039,7.36256146 C20.4028389,7.33455584 20.4785181,7.32 20.558355,7.32 Z M19.8693338,4.70690878 C19.8693338,4.70690878 20.2,4.83867288 20.2,5.12613003 C20.2,5.45419122 19.8647344,5.63270746 19.8647344,5.63270746 L11.6977481,9.90258953 L11.5843705,9.96075327 C11.4134779,10.0374056 11.2190524,10.08 11.0153835,10.08 C10.8139919,10.08 10.6222903,10.0374498 10.4533179,9.96283213 L10.3237307,9.89741451 L2.17063193,5.63483055 C2.17063193,5.63483055 1.8,5.41641796 1.8,5.12617426 C1.8,4.85251718 2.1567444,4.70690878 2.1567444,4.70690878 L10.277424,1.0918664 C10.277424,1.0918664 10.7511184,0.88 11.0153835,0.88 C11.2796485,0.88 11.7556203,1.0918664 11.7556203,1.0918664 L19.8693338,4.70690878 Z M9.52556731,11.4386839 C9.85986346,11.6452087 10.0799558,11.9919828 10.08,12.3865833 L10.08,20.6092625 C10.08,20.8916193 9.82784038,21.12 9.51871154,21.12 C9.41092115,21.12 9.31003077,21.0931447 9.22519615,21.0453626 L1.49635577,16.9443316 L1.48715577,16.9380933 C1.12260577,16.7388685 0.88,16.3754592 0.88,15.9601089 L0.88,7.8286581 C0.88,7.54731889 1.13180577,7.32 1.44128846,7.32 C1.52147885,7.32 1.59945769,7.3345116 1.66558269,7.36256146 L1.76642885,7.41344054 L9.34899808,11.3482961 L9.52556731,11.4386839 Z" id="icon-cube-def" fill="#5D6872" fill-rule="nonzero"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        3D View
                    </button>
                </div>
            </div>
            <div class="container infosection__inner js-tab__content active" id="target1">
                <div class="infosection__withmap">
                    <div class="col">
                        <div class="infosection__subtitle">Nearby Transportation</div>
                        <div class="infosection__list">
                            <div class="infosection__list-item">
                                <img src="assets/icons/i-bus.svg" />
                                Bus 24, CAP Larrard, 100 m, 1 minutes walk
                            </div>
                            <div class="infosection__list-item">
                                <img src="assets/icons/i-bus.svg" />
                                Bus 22, Bus Stop Name, 340 m, 3 minutes walk
                            </div>
                            <div class="infosection__list-item">
                                <img src="assets/icons/i-subway.svg" />
                                Subway L3, Subway station name, 640 m, 8 minutes walk
                            </div>
                            <div class="infosection__list-item">
                                <img src="assets/icons/i-subway.svg" />
                                Subway L3, Subway station name, 640 m, 8 minutes walk
                            </div>
                            <div class="infosection__list-item">
                                <img src="assets/icons/i-bus.svg" />
                                Bus 22, Bus Stop Name, 340 m, 3 minutes walk
                            </div>
                            <div class="infosection__list-item">
                                <img src="assets/icons/i-subway.svg" />
                                Subway L3, Subway station name, 640 m, 8 minutes walk
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="infosection__map"></div>
                    </div>
                </div>
            </div>
            <div class="container infosection__inner js-tab__content" id="target2">
                <div class="infosection__charts">
                    <div class="infosection__charts-item">
                        <div class="infosection__chart-title">Age</div>
                        <canvas class="infosection__chart js-chart" data-data='[41, 29, 10, 20]' width="150px" height="150px"></canvas>
                        <div class="infosection__chart-legend">
                            <div>
                                <div class="infosection__chart-label">41% - 20-30 y.o.</div>
                                <div class="infosection__chart-label">29% - 30-40 y.o.</div>
                                <div class="infosection__chart-label">10% - 40-50 y.o.</div>
                                <div class="infosection__chart-label">20% - other</div>
                            </div>
                        </div>
                    </div>
                    <div class="infosection__charts-item">
                        <div class="infosection__chart-title">Nationality</div>
                        <canvas class="infosection__chart js-chart" data-data='[41, 25, 12, 8]' width="150px" height="150px"></canvas>
                        <div class="infosection__chart-legend">
                            <div>
                                <div class="infosection__chart-label">41% - White (Spanish)</div>
                                <div class="infosection__chart-label">25% - Latin</div>
                                <div class="infosection__chart-label">12% - European (UE)</div>
                                <div class="infosection__chart-label">8% - other</div>
                            </div>
                        </div>
                    </div>
                    <div class="infosection__charts-item">
                        <div class="infosection__chart-title">Sex</div>
                        <canvas class="infosection__chart js-chart" data-data='[75, 20, 5]' width="150px" height="150px"></canvas>
                        <div class="infosection__chart-legend">
                            <div>
                                <div class="infosection__chart-label">75% - Male</div>
                                <div class="infosection__chart-label">20% - Female</div>
                                <div class="infosection__chart-label">5% - unknown</div>
                            </div>
                        </div>
                    </div>
                    <div class="infosection__charts-item">
                        <div class="infosection__chart-title">Economic Index</div>
                        <canvas class="infosection__chart js-chart" data-data='[41, 25, 12, 8]' width="150px" height="150px"></canvas>
                        <div class="infosection__chart-legend">
                            <div>
                                <div class="infosection__chart-label">41% - Index 4</div>
                                <div class="infosection__chart-label">25% - Index 2</div>
                                <div class="infosection__chart-label">12% - Index 3</div>
                                <div class="infosection__chart-label">8% - Index 1</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container infosection__inner js-tab__content" id="target3">
                <div class="infosection__withmap">
                    <div class="col">
                        <div class="infosection__subtitle">
                            Average Pricing
                            <div class="chart-toggle">
                                <button class="chart-toggle__btn js-chart-toggle active" data-data='[80000, 100000, 90000, 120000, 100000, 300000, 500000, 400000, 700000]' data-labels='["", "Jan`16", "", "", "Jun`16", "", "", "Jan`16", ""]'><span>Rent</span></button>
                                <button class="chart-toggle__btn js-chart-toggle" data-data='[200000, 100000, 300000, 1200000, 100000, 3000000, 500000, 100000, 700000]' data-labels='["", "Jan`16", "", "", "Jun`16", "", "", "Jan`16", ""]'><span>Sale</span></button>
                            </div>
                        </div>
                        <div class="infosection__checks infosection__checks--small">
                            <div class="radio">
                                <input type="radio" id="c21" name="checks">
                                <label for="c21"><span></span>Studio</label>
                            </div>
                            <div class="radio">
                                <input type="radio" id="c22" name="checks">
                                <label for="c22"><span></span>3-Bedrooms</label>
                            </div>
                            <div class="radio">
                                <input type="radio" id="c23" name="checks">
                                <label for="c23"><span></span>1-Bedroom</label>
                            </div>
                            <div class="radio">
                                <input type="radio" id="c24" name="checks">
                                <label for="c24"><span></span>4-Bedrooms</label>
                            </div>
                            <div class="radio">
                                <input type="radio" id="c25" name="checks">
                                <label for="c25"><span></span>2-Bedrooms</label>
                            </div>
                            <div class="radio">
                                <input type="radio" id="c26" name="checks">
                                <label for="c26"><span></span>5-Bedrooms+</label>
                            </div>
                        </div>
                        <div class="infosection__chartstacked">
                            <canvas class="js-chartstacked" data-data='[80000, 100000, 90000, 120000, 100000, 300000, 500000, 400000, 700000]' data-labels='["", "Jan`16", "", "", "Jun`16", "", "", "Jan`16", ""]' width="400px" height="240px"></canvas>
                        </div>
                        <div class="infosection__desc">
                            Loquare insight: real estate has been growing over the last 2 years. Average growth in price was 8,7% (regular inflation growth is 3,5%). We anticipate this apartment to grow in price for the next year.
                            <br>
                            <br>
                            Our conclusion: good timing for rental
                        </div>
                    </div>
                    <div class="col">
                        <div class="infosection__map"></div>
                    </div>
                </div>
            </div>
            <div class="container infosection__inner js-tab__content" id="target4">
                <div class="infosection__withmap">
                    <div class="col">
                        <div class="infosection__subtitle">Schools</div>
                        <div class="infosection__checks">
                            <div class="radio">
                                <input type="radio" id="c1" name="checks">
                                <label for="c1"><span></span>Show all</label>
                            </div>
                            <div class="radio">
                                <input type="radio" id="c2" name="checks">
                                <label for="c2"><span></span>High schools</label>
                            </div>
                            <div class="radio">
                                <input type="radio" id="c3" name="checks">
                                <label for="c3"><span></span>Pre-schools</label>
                            </div>
                            <div class="radio">
                                <input type="radio" id="c4" name="checks">
                                <label for="c4"><span></span>Universities</label>
                            </div>
                            <div class="radio">
                                <input type="radio" id="c5" name="checks">
                                <label for="c5"><span></span>Middle schools</label>
                            </div>
                            <div class="radio">
                                <input type="radio" id="c6" name="checks">
                                <label for="c6"><span></span>Other</label>
                            </div>
                        </div>
                        <div class="infosection__listnum">
                            <div class="infosection__listnum-item">
                                <span>1</span>
                                BBS - Business School
                            </div>
                        </div>
                        <div class="infosection__listnum">
                            <div class="infosection__listnum-item">
                                <span>2</span>
                               UPF Barcelona School of Management
                            </div>
                        </div>
                        <div class="infosection__listnum">
                            <div class="infosection__listnum-item">
                                <span>3</span>
                                Saint George British School
                            </div>
                        </div>
                        <div class="infosection__listnum">
                            <div class="infosection__listnum-item">
                                <span>4</span>
                                Universitat de Barcelona
                            </div>
                        </div>
                        <div class="infosection__listnum">
                            <div class="infosection__listnum-item">
                                <span>5</span>
                                Universitat Ramon Llull
                            </div>
                        </div>
                        <div class="infosection__listnum">
                            <div class="infosection__listnum-item">
                                <span>6</span>
                                Institut de Formació Contínua (IL3)
                            </div>
                        </div>
                        <div class="infosection__listnum">
                            <div class="infosection__listnum-item">
                                <span>7</span>
                                Escola Bressol Donald
                            </div>
                        </div>
                        <div class="infosection__listnum">
                            <div class="infosection__listnum-item">
                                <span>8</span>
                                Ninets Escola Infantil
                            </div>
                        </div>
                        <div class="infosection__listnum">
                            <div class="infosection__listnum-item">
                                <span>9</span>
                                Virolai Em Sa
                            </div>
                        </div>
                        <div class="infosection__listnum">
                            <div class="infosection__listnum-item">
                                <span>10</span>
                                Kinder Barcelona
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="infosection__map"></div>
                    </div>
                </div>
            </div>
            <div class="container infosection__inner js-tab__content" id="target5">
                <div class="infosection__withmap">
                    <div class="col">
                        <div class="infosection__subtitle">Other Businesses</div>
                        <div class="infosection__desc">Choose the certain type of recreation to get more details</div>
                        <div class="infosection__btns">
                            <button class="infosection__iconbtn" type="button">

                                Restaurants
                            </button>
                            <button class="infosection__iconbtn" type="button">
                                <div class="icon">
                                    <svg width="23px" height="23px" viewBox="0 0 23 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-370.000000, -968.000000)">
                                                <g transform="translate(135.000000, 140.000000)">
                                                    <g transform="translate(234.000000, 827.000000)">
                                                        <rect fill="#D8D8D8" fill-rule="evenodd" opacity="0" x="0" y="0" width="25" height="25"></rect>
                                                        <path d="M23.7500354,8.87630208 C24.1298349,9.89315365 24.0741318,11.1895391 23.6009547,12.3445104 C22.9747438,13.8704766 21.7331031,14.8958333 20.5114677,14.8958333 C20.2102516,14.8958333 19.9201761,14.8328229 19.6493271,14.7087786 C18.3023896,14.0925703 17.8601787,12.0731823 18.6207359,10.0115677 C19.2352672,8.34724219 20.4539677,7.22916667 21.6533818,7.22916667 C21.9344729,7.22916667 22.2103531,7.2891224 22.4732359,7.40741667 C23.0460797,7.6656875 23.487512,8.17372396 23.7500354,8.87630208 Z M6.37928543,10.0115677 C7.13984272,12.0731823 6.69763178,14.0925703 5.35069428,14.7087786 C5.07978543,14.8328229 4.78970991,14.8958333 4.48855366,14.8958333 C3.26691824,14.8958333 2.02527761,13.8704766 1.39906668,12.3445104 C0.925829698,11.1895391 0.870126573,9.89315365 1.24992605,8.87630208 C1.51244949,8.17372396 1.95382189,7.6656875 2.52672553,7.40741667 C2.78960834,7.2891224 3.06554845,7.22916667 3.34663959,7.22916667 C4.54605366,7.22916667 5.76475418,8.34724219 6.37928543,10.0115677 Z M9.04680626,9.78078906 C7.39901199,9.70909375 5.92353803,7.90413281 5.68778803,5.67139583 C5.54433751,4.32170312 5.8981422,2.97590365 6.63432189,2.07141667 C7.14199897,1.44778125 7.78318386,1.08127865 8.4885172,1.0115599 C8.60465522,1.00047917 8.83291824,1 8.83291824,1 C10.4317177,1.06953906 11.6216682,2.75494792 11.8601734,5.01320052 C12.0162021,6.47855208 11.8104599,7.90305469 11.0694886,8.81293229 C10.6102672,9.37679167 10.0261031,9.7083151 9.38000678,9.77174479 C9.27003803,9.78258594 9.15791303,9.78564062 9.04680626,9.78078906 Z M12.4999807,11.5416667 C16.3333141,11.5416667 20.1666474,16.0981823 20.1666474,20.4738125 C20.1666474,21.7794219 19.5118662,22.8295755 18.8688844,23.259987 C18.0747854,23.7913229 17.5151188,24 16.3511031,24 C14.9678688,24 14.5946578,23.5161615 13.947124,23.0892839 C13.4788583,22.7807005 13.0743818,22.5139844 12.5000406,22.5139844 C11.9256995,22.5139844 11.5212229,22.7807005 11.0528974,23.0892839 C10.4053636,23.5161615 10.0320927,24 8.64891824,24 C7.48484272,24 6.92517605,23.7913229 6.13107709,23.259987 C5.48809532,22.8295755 4.83331407,21.7794219 4.83331407,20.4738125 C4.83331407,16.0981823 8.66664741,11.5416667 12.4999807,11.5416667 Z M15.6313948,9.76066406 C14.9852984,9.69723438 14.4011344,9.36571094 13.9418531,8.80185156 C13.2009417,7.89197396 12.9952594,6.46753125 13.1512281,5.00211979 C13.3896734,2.74392708 14.5796839,1.06959896 16.1784833,1.0000599 C16.1784833,1.0000599 16.4304651,1.00760677 16.5466031,1.0187474 C17.2519964,1.08846615 17.8693427,1.43682031 18.3770198,2.06045573 C19.1131396,2.96488281 19.4670641,4.31074219 19.3236136,5.6604349 C19.0879234,7.89305208 17.6123896,9.69807292 15.9645953,9.76970833 C15.8535484,9.7745599 15.7413636,9.7715651 15.6313948,9.76066406 Z" fill="#5D6872" fill-rule="nonzero"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                Pets
                            </button>
                            <button class="infosection__iconbtn" type="button">
                                <div class="icon">
                                    <svg width="22px" height="25px" viewBox="0 0 22 25" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-155.000000, -1593.000000)">
                                                <g transform="translate(153.000000, 1593.000000)">
                                                    <rect x="0" y="1" width="25" height="25"></rect>
                                                    <path d="M12.7365027,7.50820732 C12.7084157,7.52701933 12.6814473,7.54744996 12.6557342,7.56939557 C12.5333577,7.66974431 12.4109812,7.77498811 12.3032899,7.88512697 L12.2812621,7.90960227 C12.1858084,8.02218865 12.0976973,8.1396701 12.0120338,8.25959908 L11.9973486,8.28162685 C11.9581881,8.3501577 11.9214752,8.41868854 11.8847622,8.49456198 L11.865182,8.53616999 C11.8331465,8.59667346 11.8061329,8.65970516 11.7844135,8.72462981 C11.7599382,8.79805572 11.7379104,8.87148162 11.7207777,8.94490753 L11.6938548,9.05504639 C11.6869694,9.09064387 11.6820668,9.12659637 11.6791697,9.16273772 L11.6791697,9.18966055 C11.6584794,9.34234134 11.6584794,9.49711542 11.6791697,9.64979622 L11.6791697,9.69140423 C11.6864637,9.74907894 11.6970874,9.8062835 11.7109876,9.86273134 L11.7109876,9.89210171 C11.7256727,9.94349984 11.7403579,9.99489797 11.7525956,10.0267159 C11.7857887,10.1287531 11.8292511,10.2271584 11.8823147,10.3204195 L11.9092375,10.3693701 C11.9608349,10.454677 12.0180713,10.5364433 12.0805646,10.6141231 L12.1001449,10.6361509 L12.1246202,10.6630737 C12.1745037,10.7183897 12.227627,10.7706957 12.2837096,10.8197156 L12.3081849,10.8392959 C12.352749,10.8768762 12.3993206,10.9120092 12.4476941,10.9445397 C12.5250835,10.9973446 12.6069862,11.04321 12.6924472,11.0816014 L12.7218175,11.093839 C12.7675414,11.1138415 12.8150778,11.1294138 12.8637743,11.1403421 L12.8760119,11.1403421 C12.9757611,11.1609846 13.0795445,11.1368281 13.1599254,11.0742588 C13.2359251,11.0147682 13.2830799,10.925797 13.2896445,10.8295058 L13.2896445,10.7316046 C13.2896445,10.7022342 13.2896445,10.6630737 13.2896445,10.6165706 L13.3092248,10.4183207 L13.3361476,10.2665738 C13.3532631,10.1890049 13.3787016,10.11351 13.412021,10.041401 C13.4242587,10.0193733 13.4364963,9.9973455 13.4462865,9.97776526 L13.4634192,9.95573749 L13.490342,9.92147207 L13.5368451,9.874969 L13.5368451,9.874969 L13.5368451,9.874969 L13.6004809,9.82846592 L13.615166,9.82846592 L13.6983821,9.77462026 C13.7379049,9.75381491 13.7763028,9.73093952 13.813416,9.70608941 C13.866536,9.6852238 13.9173828,9.65898028 13.9651628,9.62776845 L14.0508264,9.58371291 L14.1903356,9.510287 L14.4742491,9.35364507 C14.7365058,9.19121703 14.9718454,8.98890762 15.1717952,8.75400018 C15.3829465,8.50664038 15.5441894,8.22072523 15.6466161,7.9120498 C15.7417927,7.62772388 15.7816706,7.32780897 15.7640975,7.0284914 C15.7493153,6.77625992 15.6930852,6.528186 15.5976655,6.29423235 C15.4674218,5.97200853 15.2627811,5.68517596 15.0004681,5.45717703 C14.93309,5.39841523 14.8610599,5.34521122 14.7850855,5.29808757 L14.7532676,5.27850733 C14.7143014,5.25325395 14.6733789,5.2311558 14.6308911,5.21242402 C14.5360469,5.17479658 14.4294135,5.18106913 14.339635,5.22955673 C14.2478422,5.28035975 14.1846232,5.37067254 14.1683079,5.47430974 L14.1511751,5.57465848 C14.1511751,5.59913378 14.1511751,5.63095168 14.1340424,5.66766463 L14.1120147,5.77780349 C14.0701534,5.99318561 14.0120629,6.20509336 13.93824,6.4117138 C13.9032077,6.50873214 13.8589495,6.60216621 13.8060734,6.69073224 C13.761633,6.76335079 13.7090816,6.8306822 13.6494315,6.89142971 C13.5875021,6.95392891 13.5212555,7.01199694 13.4511815,7.06520436 C13.3728605,7.12394508 13.2847495,7.18513334 13.1868483,7.24632159 L13.0375489,7.3197475 L12.9983884,7.3442228 L12.9372002,7.38338328 L12.8074811,7.47149437 L12.7365027,7.50820732 Z M12.9151724,3.19321162 C12.9992544,3.59619962 13.0058993,4.01150506 12.9347526,4.41697671 C12.8536658,4.8599843 12.6874277,5.28306028 12.4452466,5.66276957 C12.2173725,6.02599397 11.9341189,6.35136405 11.6057438,6.62709646 L11.2435093,6.90366737 L11.0648396,7.035834 L10.9449106,7.12149755 C10.8865758,7.17485151 10.822556,7.22163522 10.7540033,7.26100677 C10.7041447,7.30548764 10.6518499,7.34716006 10.5973613,7.38583081 C10.5655434,7.4176487 10.5288305,7.44946659 10.4921175,7.47883696 L10.4651947,7.50086473 C10.4413489,7.52833415 10.41602,7.55448011 10.3893213,7.57918569 C10.3893213,7.57918569 10.3746361,7.59387087 10.3672935,7.603661 L10.3036577,7.68442949 C10.2941164,7.70456799 10.283495,7.72417676 10.2718398,7.74317022 L10.2522596,7.77743564 L10.2522596,7.80191094 C10.2522596,7.83372883 10.2326793,7.86309919 10.2179942,7.89736462 C10.1812885,8.01757889 10.1582987,8.14155939 10.1494633,8.26694167 L10.1494633,8.49211445 L10.1396732,8.7882656 C10.1396732,8.85924397 10.1396732,8.92043223 10.1543584,8.96448777 L10.1714911,9.09910193 C10.1841209,9.20146887 10.1522097,9.30433332 10.0838596,9.38157823 C10.0155096,9.45882313 9.91729476,9.50301893 9.81415167,9.50294441 L9.78722884,9.50294441 C9.72356239,9.49680445 9.66052208,9.48534258 9.59876902,9.46867899 L9.56205607,9.46867899 C9.43580145,9.43518937 9.31290449,9.39012715 9.19492654,9.33406483 C9.12106386,9.29882179 9.04916433,9.25960386 8.97954389,9.21658338 L8.94527846,9.19700314 C8.86018013,9.14330364 8.77844341,9.0844532 8.70052545,9.02078097 L8.6564699,8.98651554 L8.63444213,8.9669353 C8.5351873,8.87516602 8.44198574,8.77705911 8.35542369,8.67323168 L8.31136815,8.61449096 C8.22284613,8.50081065 8.14578193,8.37865569 8.08130031,8.24980896 C8.05682501,8.20330589 8.02745465,8.1396701 7.99808429,8.07113926 L7.98095158,8.02953125 C7.95218845,7.95760485 7.92767101,7.88405252 7.90752567,7.80925353 L7.89039296,7.74806528 C7.83200166,7.5458732 7.80072611,7.33682081 7.79738681,7.12639261 L7.79738681,7.07499448 C7.7948605,7.02852572 7.7948605,6.98195402 7.79738681,6.93548526 L7.81207199,6.77884333 C7.81207199,6.67359953 7.8365473,6.56835573 7.85612754,6.4606644 C7.87171141,6.3700289 7.89463036,6.2808087 7.92465838,6.19388362 L7.94423862,6.13024783 C7.97850405,6.0225565 8.015217,5.91976024 8.05437748,5.81696397 L8.06661513,5.79004114 C8.15717375,5.60647637 8.25997002,5.42291161 8.36766134,5.24668944 L8.38724158,5.21731908 C8.51940821,5.0410969 8.66381249,4.86976979 8.81311183,4.70578527 C8.84214531,4.67210691 8.87320497,4.64022989 8.90611798,4.61033159 L8.9966766,4.52466804 C9.04807473,4.47571743 9.10436792,4.42676683 9.16066112,4.3753687 L9.25856233,4.28725761 L9.2805901,4.26767737 L9.49107769,4.09879779 C9.62079679,3.98865893 9.73583071,3.8809676 9.83862698,3.77817133 C9.93114316,3.68388076 10.0170125,3.58329097 10.0956176,3.47712512 C10.1728154,3.37058373 10.2376815,3.25563114 10.2889725,3.1344709 C10.3486751,2.99150931 10.3945712,2.8431666 10.4260342,2.69146794 C10.4890365,2.37832814 10.5283086,2.06087884 10.5435157,1.74182623 C10.5435157,1.68798057 10.5435157,1.63168737 10.5435157,1.58028924 C10.5435157,1.52889111 10.5435157,1.47504544 10.5435157,1.43588496 L10.5435157,1.29637574 C10.5459454,1.18394392 10.6004566,1.07901738 10.6910519,1.01238915 C10.7816471,0.945760907 10.8980497,0.924988869 11.0060989,0.956169045 C11.0655885,0.971814914 11.1237053,0.992278609 11.1798735,1.0173573 L11.2263766,1.03693754 C11.3375683,1.08557336 11.4447727,1.14285817 11.547003,1.20826465 C11.948876,1.46593461 12.2842969,1.81477236 12.5260151,2.22643721 C12.7083503,2.52493446 12.8398577,2.85163523 12.9151724,3.19321162 Z M23.5154256,17.0902879 C23.8166973,15.8791791 23.5435789,14.5968058 22.7749565,13.6135617 C22.006334,12.6303177 20.8278152,12.0557149 19.5797971,12.0557184 L3.25966587,12.0557184 C2.96681788,12.0552723 2.68671615,12.1754702 2.48527274,12.3880277 C2.28382934,12.6005852 2.17883276,12.8867325 2.19499025,13.1791347 C2.323258,15.1235401 2.65633437,17.0489841 3.1886875,18.923488 C3.58873565,20.3300562 4.37671646,21.5955754 5.46244303,22.5752031 L4.05756071,22.5752031 C3.40399752,22.5752031 2.87417987,23.1050207 2.87417987,23.7585839 C2.87417987,24.4121471 3.40399752,24.9419647 4.05756071,24.9419647 L17.3672298,24.9419647 C18.020793,24.9419647 18.5506106,24.4121471 18.5506106,23.7585839 C18.5506106,23.1050207 18.020793,22.5752031 17.3672298,22.5752031 L15.9598999,22.5752031 C16.7110908,21.8970381 17.3229512,21.0790074 17.7612821,20.1668334 L19.5797971,20.1668334 C21.442535,20.1668386 23.0657604,18.8979367 23.5154256,17.0902879 Z M21.1315312,16.4979856 C20.9594842,17.215642 20.3177882,17.7217115 19.5797971,17.7217507 L18.5444918,17.7217507 C18.7938499,16.6671078 18.9826186,15.5990527 19.1098713,14.5228288 L19.5797971,14.5228288 C20.0719575,14.5225249 20.5368113,14.7489886 20.8399276,15.1367289 C21.1430439,15.5244691 21.2506145,16.0302392 21.1315312,16.5077758 L21.1315312,16.4979856 Z" fill="#5D6872" fill-rule="nonzero"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                Coffee/tea
                            </button>
                            <button class="infosection__iconbtn" type="button">
                                <div class="icon">
                                    <svg width="25px" height="23px" viewBox="0 0 25 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-356.000000, -1594.000000)">
                                                <g transform="translate(356.000000, 1592.000000)">
                                                    <rect x="0" y="0" width="25" height="25"></rect>
                                                    <path d="M16.3460966,5.84615385 C17.4146444,5.84615385 18.2692308,4.99138304 18.2692308,3.92307692 C18.2692308,2.85477081 17.4146444,2 16.3460966,2 C15.2776633,2 14.4230769,2.85477081 14.4230769,3.92307692 C14.4230769,4.99138304 15.2776633,5.84615385 16.3460966,5.84615385 Z M19.7114818,13.5384615 C16.8028931,13.5384615 14.4230769,15.9182777 14.4230769,18.8269231 C14.4230769,21.7355684 16.8028931,24.1153846 19.7114818,24.1153846 C22.6201838,24.1153846 25,21.7355684 25,18.8269231 C25,15.9182777 22.6201838,13.5384615 19.7114818,13.5384615 Z M19.711487,22.1923077 C17.8363744,22.1923077 16.3461538,20.7020872 16.3461538,18.8269231 C16.3461538,16.951759 17.8363744,15.4615385 19.711487,15.4615385 C21.5867026,15.4615385 23.0769231,16.951759 23.0769231,18.8269231 C23.0769231,20.7020872 21.5867026,22.1923077 19.711487,22.1923077 Z M15.8171207,11.0658687 L20.1923077,11.0658687 L20.1923077,9.23435229 L16.9085319,9.23435229 L14.9766036,5.79258962 C14.6638232,5.25841643 14.0910528,4.88461538 13.4659942,4.88461538 C12.9972979,4.88461538 12.5286016,5.09821598 12.2160444,5.41878858 L8.21312475,9.37171601 C7.90056755,9.69228861 7.69230769,10.1730044 7.69230769,10.6537202 C7.69230769,11.3480366 8.20581445,11.8822671 8.72663151,12.2027824 L12.1565575,14.3931615 L12.1565575,19.3076923 L13.9422798,19.3076923 L13.9422798,12.897385 L11.7473481,11.0658687 L14.1429503,8.51702746 L15.8171207,11.0658687 Z M5.28846154,13.5384615 C2.37981619,13.5384615 0,15.9182777 0,18.8269231 C0,21.7355684 2.37981619,24.1153846 5.28846154,24.1153846 C8.19710689,24.1153846 10.5769231,21.7355684 10.5769231,18.8269231 C10.5769231,15.9182777 8.19716355,13.5384615 5.28846154,13.5384615 Z M5.28846154,22.1923077 C3.41350348,22.1923077 1.92307692,20.7020872 1.92307692,18.8269231 C1.92307692,16.951759 3.41350348,15.4615385 5.28846154,15.4615385 C7.16341959,15.4615385 8.65384615,16.951759 8.65384615,18.8269231 C8.65384615,20.7020872 7.16341959,22.1923077 5.28846154,22.1923077 Z" fill="#5D6872" fill-rule="nonzero"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                Fitness
                            </button>
                            <button class="infosection__iconbtn" type="button">
                                <div class="icon">
                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-153.000000, -1659.000000)">
                                                <g transform="translate(152.000000, 1659.000000)">
                                                    <rect fill="#D8D8D8" fill-rule="evenodd" opacity="0" x="0" y="0" width="25" height="25"></rect>
                                                    <path d="M8.68858791,10.3932292 C8.15958791,10.3932292 7.73025458,9.96389583 7.73025458,9.43489583 L7.73025458,5.69739583 C7.73025458,2.9695 9.94975458,0.75 12.6771712,0.75 C15.4055462,0.75 17.6250462,2.9695 17.6245671,5.69739583 L17.6245671,9.43489583 C17.6245671,9.96389583 17.1952337,10.3932292 16.6662337,10.3932292 C16.1367546,10.3932292 15.7079004,9.96389583 15.7079004,9.43489583 L15.7079004,5.69739583 C15.7079004,4.02654167 14.3480254,2.66666667 12.6771712,2.66666667 C11.0063171,2.66666667 9.64692125,4.02654167 9.64692125,5.69739583 L9.64692125,9.43489583 C9.64692125,9.96389583 9.21758791,10.3932292 8.68858791,10.3932292 Z M23.6702129,8.23985417 C23.9351921,8.23985417 24.0981087,8.4478125 24.0353379,8.705125 L20.6830879,22.3599375 C20.4799212,23.1275625 19.6730046,23.75 18.8785462,23.75 L6.42021291,23.75 C5.62671291,23.75 4.81883791,23.1275625 4.61662958,22.3599375 L1.26342125,8.705125 C1.20065041,8.44829167 1.36404625,8.23985417 1.62854625,8.23985417 L6.77240041,8.23985417 L6.77240041,9.43489583 C6.77240041,10.4919375 7.63202541,11.3515625 8.68906708,11.3515625 C9.74610875,11.3515625 10.6057337,10.4919375 10.6057337,9.43489583 L10.6057337,8.23985417 L14.7500462,8.23985417 L14.7500462,9.43489583 C14.7500462,10.4919375 15.6096712,11.3515625 16.6667129,11.3515625 C17.7237546,11.3515625 18.5833796,10.4919375 18.5833796,9.43489583 L18.5833796,8.23985417 L23.6702129,8.23985417 Z" fill="#5D6872" fill-rule="nonzero"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                Groceries
                            </button>
                            <button class="infosection__iconbtn" type="button">
                                <div class="icon">
                                    <svg width="21px" height="23px" viewBox="0 0 21 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-358.000000, -1661.000000)">
                                                <g transform="translate(356.000000, 1660.000000)">
                                                    <rect x="0" y="0" width="25" height="25"></rect>
                                                    <path d="M20.0772398,5.29540402 C20.7826791,3.61830357 20.9943533,2.00968973 19.7950429,1 L12.1585591,10.8571429 L11.2590895,12.0379464 C11.2590895,12.0379464 9.79527915,14.0920826 9.28381711,15.0498683 C8.77235507,16.007654 8.26089303,17.0691964 7.83765064,17.8221897 C7.46622736,18.4829777 7.28459555,18.603625 7.07880268,18.4150558 C7.05199239,18.3847143 7.0244403,18.3550915 6.99651733,18.3259308 C6.99455689,18.3235179 6.99264944,18.3213103 6.990689,18.318846 C6.9301274,18.2432746 6.84498087,18.1647254 6.74510457,18.0895134 C6.24911408,17.6747433 5.6320004,17.4285714 4.96290865,17.4285714 C3.32657983,17.4285714 2,18.899596 2,20.7142857 C2,22.5289754 3.32657983,24 4.96290865,24 C6.30246975,24 7.43385367,23.014029 7.80040234,21.6609308 L7.8001904,21.6631384 C7.8001904,21.6631384 8.50780208,19.5334821 9.53072616,17.9933036 C10.5536502,16.453125 12.1585591,15.7857143 12.1585591,15.7857143 L13.8516346,14.1428571 C13.8516346,14.1428571 19.3717475,6.97250446 20.0772398,5.29540402 Z M4.96290865,22.3571429 C4.14598938,22.3571429 3.48367969,21.6202701 3.48367969,20.7142857 C3.48367969,19.8083013 4.14598938,19.0714286 4.96290865,19.0714286 C5.77988091,19.0714286 6.44213762,19.8083013 6.44213762,20.7142857 C6.44213762,21.6202701 5.77988091,22.3571429 4.96290865,22.3571429 Z M12.1730769,14.1428571 C11.7049034,14.1428571 11.3253205,13.7751138 11.3253205,13.3214286 C11.3253205,12.8677946 11.7049034,12.5 12.1730769,12.5 C12.6413034,12.5 13.0208333,12.8677946 13.0208333,13.3214286 C13.0208333,13.7751138 12.6413034,14.1428571 12.1730769,14.1428571 Z M9.59165865,12.9751451 C8.00047286,10.8720312 4.78291937,6.54910937 4.2555619,5.29540402 C3.5501226,3.61830357 3.3385014,2.00968973 4.53775881,1 L11.6363941,10.1628304 L11.4805659,10.3639777 L11.4784995,10.3666473 L11.4764861,10.369317 L10.5770165,11.5501205 L10.5690688,11.5605424 L10.561492,11.571221 C10.5279526,11.6182478 10.0780589,12.2505424 9.59165865,12.9751451 Z M19.369893,17.4285714 C21.0062219,17.4285714 22.3461538,18.899596 22.3461538,20.7142857 C22.3461538,22.5289754 21.0062219,24 19.369893,24 C18.0303319,24 16.898948,23.014029 16.5324523,21.6609308 L16.5326643,21.6631384 C16.5326643,21.6631384 15.8250526,19.5334821 14.8021815,17.9933036 C14.233072,17.1365022 13.4842912,16.5501562 12.931501,16.1982254 L14.4515282,14.7232991 L14.4946049,14.6814576 L14.5310584,14.6340201 C14.5664522,14.5880714 14.6190131,14.5197388 14.6864098,14.431846 C14.8293097,14.661692 14.9552015,14.8742366 15.0489846,15.0498683 C15.5604466,16.007654 16.0719087,17.0691964 16.495151,17.8221897 C16.8665743,18.4829777 17.0482061,18.603625 17.253999,18.4150558 C17.2808093,18.3847656 17.3084144,18.3550915 17.3362844,18.3259308 C17.3382448,18.3235179 17.3400993,18.3213103 17.3420597,18.318846 C17.4026213,18.2432746 17.4877678,18.1647254 17.5876441,18.0895134 C18.0836876,17.6747433 18.7008013,17.4285714 19.369893,17.4285714 Z M19.369893,22.3571429 C20.1868123,22.3571429 20.849122,21.6202701 20.849122,20.7142857 C20.849122,19.8083013 20.1868123,19.0714286 19.369893,19.0714286 C18.5528678,19.0714286 17.8906641,19.8083013 17.8906641,20.7142857 C17.8906641,21.6202701 18.5528678,22.3571429 19.369893,22.3571429 Z" fill="#5D6872" fill-rule="nonzero"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                Beauty/Spa
                            </button>
                            <button class="infosection__iconbtn" type="button">
                                <div class="icon">
                                    <svg width="25px" height="22px" viewBox="0 0 25 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-153.000000, -1725.000000)">
                                                <g transform="translate(153.000000, 1723.000000)">
                                                    <rect fill="#D8D8D8" fill-rule="evenodd" opacity="0" x="0" y="0" width="25" height="25"></rect>
                                                    <path d="M11.3333516,13.9166484 L11.3333516,21.0625 L5.5,21.0625 L5.5,23.25 L19.5,23.25 L19.5,21.0625 L13.6666484,21.0625 L13.6666484,13.9166484 L25,2.25 L23,2.25 L2,2.25 L0,2.25 L11.3333516,13.9166484 Z M7.30770479,6.25 L5,4.25 L20,4.25 L17.6922952,6.25 L7.30770479,6.25 Z" fill="#5D6872" fill-rule="nonzero"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                Nightlife
                            </button>
                            <button class="infosection__iconbtn" type="button">
                                <div class="icon">
                                    <svg width="25px" height="16px" viewBox="0 0 25 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-356.000000, -1729.000000)">
                                                <g transform="translate(356.000000, 1725.000000)">
                                                    <rect x="0" y="0" width="25" height="25"></rect>
                                                    <path d="M0.708176644,4 C0.314595703,4 0,4.31923873 0,4.7128312 L0,14.6876559 C0,15.0788615 0.314595703,15.3958056 0.708176644,15.3958056 C1.10175758,15.3958056 1.421004,15.0788615 1.421004,14.6876559 L1.421004,5.4209771 L19.6840821,5.4209771 C20.07528,5.4209771 20.3969095,5.10639292 20.3969095,4.7128312 C20.3969095,4.31923873 20.0777399,4 19.6840821,4 L0.708176644,4 L0.708176644,4 Z M3.04698526,6.33880477 C2.65336589,6.33880477 2.33884705,6.65574505 2.33884705,7.04695451 L2.33884705,17.0264337 C2.33884705,17.4200185 2.65336589,17.7346065 3.04698526,17.7346065 C3.44060464,17.7346065 3.75981262,17.4200185 3.75981262,17.0264337 L3.75981262,7.75978187 L22.0229292,7.75978187 C22.4165101,7.75978187 22.7357565,7.4405393 22.7357565,7.04695451 C22.7357565,6.65574505 22.4165101,6.33880477 22.0229292,6.33880477 L3.04698526,6.33880477 Z M5.31130561,8.60303288 C4.9176478,8.60303288 4.59840138,8.92227161 4.59840138,9.31586024 L4.59840138,19.2906887 C4.59840138,19.6818905 4.9176478,19.9988615 5.31130561,19.9988615 L24.2872111,19.9988615 C24.6807536,19.9988615 25,19.6818905 25,19.2906887 L25,9.31586024 C25,8.92227161 24.6807536,8.60303288 24.2872111,8.60303288 L5.31130561,8.60303288 Z M8.74026425,10.0193631 L20.858214,10.0193631 C21.1396398,11.3814145 22.2169523,12.4563402 23.578996,12.7402028 L23.578996,15.8477165 C22.2145693,16.1315752 21.1396398,17.2086763 20.858214,18.5778844 L8.74026425,18.5778844 C8.4587232,17.2086763 7.38848284,16.1315752 6.02409453,15.8477165 L6.02409453,12.7402028 C7.38609983,12.458727 8.4587232,11.3838014 8.74026425,10.0193631 Z M14.8015645,10.6949233 C12.8097144,10.6949233 11.1955329,12.3115493 11.1955329,14.3009626 C11.1955329,16.2927589 12.8097144,17.906975 14.8015645,17.906975 C16.7909547,17.906975 18.4028685,16.2927589 18.4028685,14.3009626 C18.4028685,12.3115493 16.7909547,10.6949233 14.8015645,10.6949233 L14.8015645,10.6949233 Z M14.4101744,11.7757911 L15.0298722,11.7757911 L15.0298722,12.3348759 C15.4496662,12.3468025 15.7351277,12.4396668 15.9569782,12.5398531 L15.7659147,13.2573581 C15.6085207,13.1810211 15.3107983,13.0383788 14.8528376,13.0383788 C14.4401157,13.0383788 14.3030158,13.2205983 14.3030158,13.3971139 C14.3030158,13.5998696 14.5278643,13.741947 15.0718055,13.9375459 C15.8255668,14.2047082 16.1200222,14.5529774 16.1200222,15.1302384 C16.1271328,15.6955767 15.7340515,16.175707 15.0065033,16.2949766 L15.0065033,16.9472332 L14.377581,16.9472332 L14.377581,16.3462382 C13.9529825,16.3247681 13.5422977,16.2049334 13.3013446,16.0713465 L13.4924082,15.330588 C13.7571913,15.4784845 14.1279799,15.6101073 14.5406249,15.6101073 C14.9079543,15.6101073 15.1602843,15.4644555 15.1602843,15.2187634 C15.1602843,14.9778411 14.9547689,14.8217885 14.4800888,14.6643562 C13.8002392,14.4353528 13.3386272,14.1173094 13.3386272,13.5042687 C13.3386272,12.9413172 13.7327078,12.5032355 14.4101744,12.376813 L14.4101744,11.7757911 L14.4101744,11.7757911 Z" fill="#5D6872" fill-rule="nonzero"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                Banks
                            </button>
                            <button class="infosection__iconbtn" type="button">
                                <div class="icon">
                                    <svg width="25px" height="23px" viewBox="0 0 25 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-369.000000, -836.000000)">
                                                <g transform="translate(135.000000, 140.000000)">
                                                    <g transform="translate(234.000000, 695.000000)">
                                                        <rect fill="#D8D8D8" fill-rule="evenodd" opacity="0" x="0" y="0" width="25" height="25"></rect>
                                                        <path d="M23.2911111,17.0436111 L13.5311111,17.0436111 L13.5311111,16.1886111 L23.2913889,16.1886111 L23.2913889,17.0436111 L23.2911111,17.0436111 Z M24.1455556,17.8086111 L25,17.8086111 L25,21.7805556 L25,22.6883333 L25,23.2502778 L0,23.2502778 L0,21.7805556 L8.10305556,21.7805556 C8.26,21.3797222 8.34611111,20.8925 8.34611111,20.4541667 C8.34611111,20.1194444 8.36805556,19.215 8.39638889,18.1788889 L5.95916667,15.4061111 C5.91416667,15.4072222 5.87027778,15.4125 5.82416667,15.4125 C3.18027778,15.4125 1.03666667,13.3958333 1.03666667,10.9083333 C1.03666667,10.4344444 1.11583333,9.97861111 1.26027778,9.54944444 C0.683888889,8.89722222 0.336388889,8.05944444 0.336388889,7.14527778 C0.336388889,5.06694444 2.12805556,3.38194444 4.3375,3.38194444 C4.67222222,3.38194444 4.99555556,3.42472222 5.30583333,3.4975 C5.65833333,2.06777778 7.01777778,1 8.645,1 C10.2288889,1 11.5580556,2.01055556 11.9522222,3.38277778 C11.9577778,3.38277778 11.9638889,3.38194444 11.9697222,3.38194444 C13.8058333,3.38194444 15.2941667,4.78222222 15.2941667,6.50888889 C15.2941667,7.23361111 15.0305556,7.89944444 14.59,8.42916667 C14.7652778,8.89638889 14.8644444,9.39694444 14.8644444,9.92083333 C14.8644444,12.4080556 12.7208333,14.4244444 10.0772222,14.4244444 C10.0461111,14.4244444 10.0158333,14.4205556 9.98444444,14.4194444 C10.0283333,16.0605556 10.1188889,19.5891667 10.1188889,20.4541667 C10.1188889,20.9425 10.1975,21.4075 10.3630556,21.7805556 L11.9108333,21.7805556 L11.9108333,17.8086111 L12.7652778,17.8086111 L12.7652778,19.4275 L24.1455556,19.4275 L24.1455556,17.8086111 Z M8.43861111,16.7161111 C8.46194444,15.9244444 8.48583333,15.1747222 8.50222222,14.6425 C8.04916667,14.9305556 7.53916667,15.1416667 6.99416667,15.2713889 L8.43861111,16.7161111 Z M14.385,20.2819444 L14.385,21.7805556 L22.4372222,21.7805556 L22.4372222,20.2819444 L14.385,20.2819444 Z M12.7661111,21.7805556 L13.5311111,21.7805556 L13.5311111,20.2819444 L12.7661111,20.2819444 L12.7661111,21.7805556 Z M24.1455556,21.7805556 L24.1455556,20.2819444 L23.2911111,20.2819444 L23.2911111,21.7805556 L24.1455556,21.7805556 Z M13.5311111,18.6625 L23.2913889,18.6625 L23.2913889,17.8086111 L13.5311111,17.8086111 L13.5311111,18.6625 Z M21.8641667,6.54833333 C23.0505556,6.54833333 24.0130556,5.58583333 24.0130556,4.39944444 C24.0130556,3.21222222 23.0508333,2.25027778 21.8641667,2.25027778 C20.6766667,2.25027778 19.7152778,3.21222222 19.7152778,4.39916667 C19.7152778,5.58583333 20.6766667,6.54833333 21.8641667,6.54833333 Z" fill="#5D6872" fill-rule="nonzero"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                Parks
                            </button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="infosection__map"></div>
                    </div>
                </div>
            </div>
            <div class="infosection__inner js-tab__content" id="target6">
                <div class="infosection__mapf"></div>
            </div>
            <div class="infosection__inner js-tab__content" id="target7">
                <div class="infosection__mapf"></div>
            </div>
        </div>

        <div class="full-width-cols">
            <div class="col">
                <div class="page__title page__title--center">Building Street View</div>
                <div class="street-view" style="background: #ccc;"></div>
            </div>
            <div class="col">
                <div class="page__title page__title--center">More About the Area</div>
                <div class="about-area" style="background: #000;">
                    <div class="about-area__title">Barrio Gotico</div>
                    <div class="about-area__top">
                        Often desribed as: <br>
                        Old • Touristic • Mysterious • Medievil
                    </div>
                    <div class="about-area__desc">
                        How Loquare team would describe Barrio Gotico: <br>
                        Slowly but steadily growing prices on real estate in this area makes it one of the most attractive neighborhoods in Barcelona. 
                    </div>
                    <div class="about-area__btns">
                        <a href="#" class="about-area__more">learn more</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="page__title page__title--center">Flats Nearby</div>
        <div class="nearby">
            <div class="nearby__slider">
                <div class="nearby__item">
                    <div class="card card--nearby">
                        <a href="#" class="card__link"></a>
                        <div class="card__top lazyload" data-sizes="auto" data-bgset="assets/images/placeholder-260x260.png 1x, assets/images/placeholder-520x520.png 2x"></div>
                        <div class="card__bottom">
                            <div class="card__title">1-Bedroom in Ciutadela</div>
                            <div class="card__footer">
                                <div class="card__desc">1 bed, 2 baths 22 m</div>
                                <div class="card__price">€1,150/mo</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nearby__item">
                    <div class="card card--nearby">
                        <a href="#" class="card__link"></a>
                        <div class="card__top lazyload" data-sizes="auto" data-bgset="assets/images/placeholder-260x260.png 1x, assets/images/placeholder-520x520.png 2x"></div>
                        <div class="card__bottom">
                            <div class="card__title">1-Bedroom in Ciutadela</div>
                            <div class="card__footer">
                                <div class="card__desc">1 bed, 2 baths 22 m</div>
                                <div class="card__price">€1,150/mo</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nearby__item">
                    <div class="card card--nearby">
                        <a href="#" class="card__link"></a>
                        <div class="card__top lazyload" data-sizes="auto" data-bgset="assets/images/placeholder-260x260.png 1x, assets/images/placeholder-520x520.png 2x"></div>
                        <div class="card__bottom">
                            <div class="card__title">1-Bedroom in Ciutadela</div>
                            <div class="card__footer">
                                <div class="card__desc">1 bed, 2 baths 22 m</div>
                                <div class="card__price">€1,150/mo</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nearby__item">
                    <div class="card card--nearby">
                        <a href="#" class="card__link"></a>
                        <div class="card__top lazyload" data-sizes="auto" data-bgset="assets/images/placeholder-260x260.png 1x, assets/images/placeholder-520x520.png 2x"></div>
                        <div class="card__bottom">
                            <div class="card__title">1-Bedroom in Ciutadela</div>
                            <div class="card__footer">
                                <div class="card__desc">1 bed, 2 baths 22 m</div>
                                <div class="card__price">€1,150/mo</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nearby__item">
                    <div class="card card--nearby">
                        <a href="#" class="card__link"></a>
                        <div class="card__top lazyload" data-sizes="auto" data-bgset="assets/images/placeholder-260x260.png 1x, assets/images/placeholder-520x520.png 2x"></div>
                        <div class="card__bottom">
                            <div class="card__title">1-Bedroom in Ciutadela</div>
                            <div class="card__footer">
                                <div class="card__desc">1 bed, 2 baths 22 m</div>
                                <div class="card__price">€1,150/mo</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page__title page__title--center">Agent representing this property</div>
        <div class="representing">
            <div class="representing__left">
                <div class="representing__img lazyload" data-sizes="auto" data-bgset="assets/images/represental.jpg 1x, assets/images/represental@2x.jpg 2x"></div>
            </div>
            <div class="representing__right">
                <div class="representing__top">
                    <div class="representing__title">Sabrina Ramirez</div>
                    <div class="representing__contacts">
                        <a href="#" class="representing__contacts-item">+34 (390) 123-9303</a>
                        |   
                        <a href="#" class="representing__contacts-item">sabrina@loquare.com</a>
                    </div>
                </div>
                <div class="representing__desc">
                    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.
                </div>
                <a href="#" class="representing__link">show more</a>
            </div>
        </div>
    
        <div class="contact-us contact-us--small">
    <div class="container">
        <form action="#" id="contact-us-form">
            <div class="form">
                <div class="form__inner">
                    <div class="contact-us__title">Got questions? Contact us today</div>
                    <div class="form__row form__row--three">
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
                        <div class="form__field">
                            <button type="submit" class="form__submit form__submit--large">send contact request</button>
                        </div>
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