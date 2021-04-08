<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Car Rental Management System- By Rasel - Copy</title>
    <link rel="stylesheet" href="{{asset('userFiles/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700">
    <link rel="stylesheet" href="{{asset('userFiles/assets/fonts/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('userFiles/assets/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('userFiles/assets/fonts/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('userFiles/assets/fonts/fontawesome5-overrides.min.css')}}">
    <link rel="stylesheet" href="{{asset('userFiles/assets/css/Bootstrap-4---Payment-Form.css')}}">
    <link rel="stylesheet" href="{{asset('userFiles/assets/css/Bootstrap-Payment-Form.css')}}">
    <link rel="stylesheet" href="{{asset('userFiles/assets/css/colors.css')}}">
    <link rel="stylesheet" href="{{asset('userFiles/assets/css/Community-ChatComments.css')}}">
    <link rel="stylesheet" href="{{asset('userFiles/assets/css/Contact-form-simple.css')}}">
    <link rel="stylesheet" href="{{asset('userFiles/assets/css/Countdown-TImer.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="{{asset('userFiles/assets/css/modals.css')}}">
    <link rel="stylesheet" href="{{asset('userFiles/assets/css/Navigation-with-Button.css')}}">
    <link rel="stylesheet" href="{{asset('userFiles/assets/css/quiz.css')}}">
    <link rel="stylesheet" href="{{asset('userFiles/assets/css/Simple-Slider.css')}}">
    <link rel="stylesheet" href="{{asset('userFiles/assets/css/styles.css')}}">
        @livewireStyles
</head>

<body style="font-family: Montserrat, sans-serif;font-style: normal;font-weight: normal;font-size: 14px;">

<div>
    <nav class="navbar navbar-light navbar-expand-md navbar navbar-expand-md navbar-light fixed-top mb-4 topbar static-top" style="box-shadow: 4px -4px 9px var(--gray);font-family: Roboto, sans-serif;">
        <div class="container-fluid"><a class="navbar-brand" href="#" style="font-family: Anton, sans-serif;font-size: 26px;color: var(--black);">Rental Solution</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-3"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse navbar-collapse-mobile" id="navcol-3">
                <ul class="navbar-nav ml-auto mobile-nav-styles-ul">
                    <li class="nav-item btn menu-btn btn-small mobile-nav-styles-li"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item btn menu-btn btn-small mobile-nav-styles-li"><a class="nav-link active" href="#">Cars</a></li>
                    <li class="nav-item menu-btn btn-small btn mobile-nav-styles-li"><a class="nav-link" href="#">Rent</a></li>
                    <li class="nav-item menu-btn btn-small btn mobile-nav-styles-li"><a class="nav-link" href="#">Services</a></li>
                    <li class="nav-item menu-btn btn-small btn mobile-nav-styles-li"><a class="nav-link" href="#">Contact</a></li>
                    @guest
                    <li class="nav-item btn mobile-nav-styles-li mobile-nav-login ml-4" data-toggle="modal" data-target="#login-modal">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item login-topbar btn mobile-nav-styles-li mobile-nav-login" data-toggle="modal" data-target="#signup-modal">
                        <a class="nav-link" href="#">Signup</a>
                    </li>
                    @else
                    <li class="nav-item login-topbar btn mobile-nav-styles-li mobile-logout"><a class="nav-link" href="#">logout</a></li>
                    <li class="nav-item dropdown no-arrow btn mobile-nav-styles-li d-mobile-none">
                        <!--Users Profile-->
                        <div class="nav-item dropdown no-arrow" style="margin-left: 0px;margin-right: 10px;">
                            <a class="dropdown-toggle active text-right nav-link" aria-expanded="false" data-toggle="dropdown" href="#" style="margin-right: 15px;">
                                <img class="border rounded-circle img-profile" src="{{asset('Userfiles/assets/img/boy%20with%20mask.png')}}" width="32" height="32"></a>
                            <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in">
                                <a class="dropdown-item" href="{{route('user.profile')}}"><i class="fas fa-user-tie fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-car-side fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Reservations</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                <div class="dropdown-divider"></div>
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                </form>
                            </div>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
   @guest
    <div class="modal fade" role="dialog" tabindex="-1" id="login-modal" data-toggle="modal" data-dismiss="modal">
        <div class="modal-dialog modal-login" role="document">
            <div class="modal-content">
                <form method="post" action="{{route('login')}}">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title text-base">Login</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group"><label class="text-base">{{ __('Email') }}</label>
                            <input class="form-control" type="email" name="email" :value="old('email')" required autofocus>
                        </div>
                        <div class="form-group">
                            <div class="clearfix">
                                <label class="text-base">{{__('Password')}}</label>
                                <a class="float-right text-muted" href="" data-toggle="modal" data-target="#forgot-modal">Forgot ?</a>
                            </div><input class="form-control" type="password" name="password" required autocomplete="current-password">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between"><label class="pl-2">
                            <input type="checkbox" class="mr-2">&nbsp;Remember Me</label>
                        <button class="btn btn-primary bg-base" type="submit">Login</button></div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" role="dialog" tabindex="-1" id="signup-modal" data-toggle="modal" data-dismiss="modal">
        <div class="modal-dialog modal-login" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title text-base">Sign up</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group"><label class="text-base">{{ __('Name') }}</label>
                            <input class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Your Full  Name"></div>
                        <div class="form-group"><label class="text-base">{{ __('Username') }}</label>
                            <input class="form-control" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" placeholder="Username"></div>
                        <div class="form-group"><label class="text-base">{{ __('Phone Number') }}</label>
                            <input class="form-control" type="text" name="phone_number" :value="old('phone_number')" required placeholder="Your Phone Number"></div>
                        <div class="form-group"><label class="text-base">{{ __('Email') }}</label>
                            <input class="form-control" type="text" name="email" :value="old('address')" required placeholder="Your Email"></div>
                        <div class="form-group"><label class="text-base">{{ __('Address') }}</label>
                            <input class="form-control" type="text" name="address" :value="old('address')" required placeholder="Your Address"></div>
                        <div class="form-group">
                            <div class="clearfix"><label class="text-base">{{ __('Password') }}</label></div>
                            <input class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="Enter a New Password">
                        </div>
                        <div class="form-group">
                            <div class="clearfix"><label class="text-base">{{ __('Confirm Password') }}</label></div>
                            <input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between"><label id="login-modal" class="pl-2">{{ __('Already Have an Account ?') }}</label>
                        <button class="btn btn-primary bg-base" type="submit">Signup</button></div>
                </form>
            </div>
        </div>
    </div>
    @else

    @endguest
</div>

@yield('content')

<footer class="mt-5 mb-2">
    <div>
        <div class="container">
            <div class="row">
                <div class="col col-4 col-md-3 mt-3 mt-md-0">
                    <h5 class="footer-heading font-weight-bold">Our Products</h5>
                    <p class="footer-link-paragraph m-0 p-0"><a class="footer-link" href="#">Career</a></p>
                    <p class="footer-link-paragraph m-0 p-0"><a class="footer-link" href="#">Hotels</a></p>
                    <p class="footer-link-paragraph m-0 p-0"><a class="footer-link" href="#">Cars</a></p>
                    <p class="footer-link-paragraph m-0 p-0"><a class="footer-link" href="#">Packages</a></p>
                    <p class="footer-link-paragraph m-0 p-0"><a class="footer-link" href="#">Features</a></p>
                </div>
                <div class="col col-4 col-md-3 mt-3 mt-md-0">
                    <h5 class="footer-heading font-weight-bold">About Rental Solution</h5>
                    <p class="footer-link-paragraph m-0 p-0"><a class="footer-link" href="#">Career</a></p>
                    <p class="footer-link-paragraph m-0 p-0"><a class="footer-link" href="#">Hotels</a></p>
                    <p class="footer-link-paragraph m-0 p-0"><a class="footer-link" href="#">Cars</a></p>
                    <p class="footer-link-paragraph m-0 p-0"><a class="footer-link" href="#">Packages</a></p>
                    <p class="footer-link-paragraph m-0 p-0"><a class="footer-link" href="#">Features</a></p>
                </div>
                <div class="col col-4 col-md-3 mt-3 mt-md-0">
                    <h5 class="footer-heading font-weight-bold">Resources</h5>
                    <p class="footer-link-paragraph m-0 p-0"><a class="footer-link" href="#">Career</a></p>
                    <p class="footer-link-paragraph m-0 p-0"><a class="footer-link" href="#">Hotels</a></p>
                    <p class="footer-link-paragraph m-0 p-0"><a class="footer-link" href="#">Cars</a></p>
                    <p class="footer-link-paragraph m-0 p-0"><a class="footer-link" href="#">Packages</a></p>
                    <p class="footer-link-paragraph m-0 p-0"><a class="footer-link" href="#">Features</a></p>
                </div>
                <div class="col mt-3 mt-md-0 col-12 col-md-3 text-center text-md-left p-sm-0">
                    <h5 class="footer-heading font-weight-bolder">Subscribe to Our Newsletter</h5>
                    <form>
                        <div class="input-group">
                            <div class="input-group-prepend"></div><input class="form-control text-input-subscribe" type="text" style="margin-right: -11px;">
                            <div class="input-group-append"><button class="btn btn-primary subscribe-button" type="submit"><i class="fa fa-arrow-right"></i></button></div>
                        </div>
                    </form>
                    <div class="rasel-copywright">
                        <p class="rasel-copywright-p font-weight-bold text-center">Made with&nbsp;<i class="fa fa-heartbeat rasel-copywright-p-icon"></i>&nbsp; By&nbsp;&nbsp;<a class="rasel-copywright-p-name" target="_blank" href="https://www.facebook.com/azharasel1">Md Rasel</a></p>
                        <hr class="d-md-none">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="mb-3 pb-3 pb-md-0">
    <div class="container">
        <div class="row">
            <div class="col col-3 d-none d-md-inline">
                <div>
                    <h4 class="footer-heading"><a href="#">Rental Solution</a></h4>
                </div>
            </div>
            <div class="col col-md-6 col-12 text-center">
                <div><a class="bottom-nav-link" href="#">Reviews</a><a class="bottom-nav-link" href="#">Services</a><a class="bottom-nav-link" href="#">Partners</a><a class="bottom-nav-link" href="#">Feedbacks</a><a class="bottom-nav-link" href="#">Booking</a></div>
            </div>
            <div class="col col-md-3 col-12 mt-3 mt-md-0">
                <div class="footer-social-icon-div text-center" style="font-size: 18px;text-align: center;"><span class="footer-social-icon-span"><a class="footer-social-link" href="#"><i class="fa fa-facebook footer-social-icon"></i></a></span><span class="footer-social-icon-span"><a class="footer-social-link twitter-icon" href="#"><i class="fa fa-twitter footer-social-icon"></i></a></span><span class="footer-social-icon-span"><a class="footer-social-link google-plus-icon" href="#"><i class="fa fa-google-plus footer-social-icon google-plus-icon-i"></i></a></span><span class="footer-social-icon-span"><a class="footer-social-link youtube-icon" href="#"><i class="fa fa-youtube-play footer-social-icon"></i></a></span></div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('userFiles/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('userFiles/assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
<script src="{{asset('userFiles/assets/js/modals.js')}}"></script>
<script src="{{asset('userFiles/assets/js/Simple-Slider.js')}}"></script>
@livewireScripts
</body>

</html>



