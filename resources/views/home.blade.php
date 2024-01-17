<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $data->app_name }}</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('landing/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{ asset('landing/css/bootstrap-icons.css')}}" rel="stylesheet">

    <link href="{{ asset('landing/css/templatemo-ebook-landing.css')}}" rel="stylesheet">
    <!--

    TemplateMo 588 ebook landing

    https://templatemo.com/tm-588-ebook-landing

    -->
</head>

<body>

<main>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="navbar-brand-icon bi-book me-2"></i>
                <span>{{ $data->app_name }}</span>
            </a>

            <div class="d-lg-none ms-auto me-3">
                <a href="#" class="btn custom-btn custom-border-btn btn-naira btn-inverted">
                    <i class="btn-icon bi-cloud-download"></i>
                    <span>Download</span><!-- duplicated another one below for mobile -->
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-lg-auto me-lg-4">
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_1">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_2">The Book</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_3">Author</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_4">Reviews</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_5">Contact</a>
                    </li>
                </ul>
                @if (Route::has('login'))
                    @auth
                        <div class="d-none d-lg-block mx-2">
                            <a href="{{ route('dashboard') }}" class="btn custom-btn custom-border-btn btn-naira btn-inverted">
                                <p class="btn-icon">Dashboard</p>
                                <span>Dashboard</span><!-- duplicated above one for mobile -->
                            </a>
                        </div>
                    @else
                    <div class="d-none d-lg-block mx-2">
                        <a href="{{ route('login') }}" class="btn custom-btn custom-border-btn btn-naira btn-inverted">
                            <p class="btn-icon">Login</p>
                            <span>Login</span><!-- duplicated above one for mobile -->
                        </a>
                    </div>
                    <div class="d-none d-lg-block">
                        <a href="{{ route('register') }}"
                           class="btn custom-btn custom-border-btn btn-naira btn-inverted">
                            <p class="btn-icon">Register</p>
                            <span>Register</span><!-- duplicated above one for mobile -->
                        </a>
                    </div>
                    @endauth
                @endif
            </div>
        </div>
    </nav>


    <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mb-5 pb-5 pb-lg-0 mb-lg-0">

                    <h6>Introducing ebook</h6>

                    <h1 class="text-white mb-4">ebook landing page for professionals</h1>

                    <a href="#section_2" class="btn custom-btn smoothscroll me-3">Discover More</a>

                    <a href="#section_3" class="link link--kale smoothscroll">Meet the Author</a>
                </div>

                <div class="hero-image-wrap col-lg-6 col-12 mt-3 mt-lg-0">
                    <img src="{{ asset('landing/images/education-online-books.png')}}" class="hero-image img-fluid"
                         alt="education online books">
                </div>

            </div>
        </div>
    </section>


    <section class="featured-section">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12">
                    <div class="avatar-group d-flex flex-wrap align-items-center">
                        <img
                            src="{{ asset('landing/images/avatar/portrait-beautiful-young-woman-standing-grey-wall.jpg')}}"
                            class="img-fluid avatar-image" alt="">

                        <img src="{{ asset('landing/images/avatar/portrait-young-redhead-bearded-male.jpg')}}"
                             class="img-fluid avatar-image avatar-image-left" alt="">

                        <img src="{{ asset('landing/images/avatar/pretty-blonde-woman.jpg')}}"
                             class="img-fluid avatar-image avatar-image-left" alt="">

                        <img
                            src="{{ asset('landing/images/avatar/studio-portrait-emotional-happy-funny-smiling-boyfriend.jpg')}}"
                            class="img-fluid avatar-image avatar-image-left" alt="">

                        <div class="reviews-group mt-3 mt-lg-0">
                            <strong>4.5</strong>

                            <i class="bi-star-fill"></i>
                            <i class="bi-star-fill"></i>
                            <i class="bi-star-fill"></i>
                            <i class="bi-star-fill"></i>
                            <i class="bi-star"></i>

                            <small class="ms-3">2,564 reviews</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-lg-5"></section>


    <section class="book-section section-padding" id="section_2">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <img src="{{ asset('landing/images/tablet-screen-contents.jpg')}}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-6 col-12">
                    <div class="book-section-info">
                        <h6>Modern &amp; Creative</h6>


                        <h2 class="mb-4">About The Book</h2>

                        <p>Credit goes to <a rel="nofollow" href="https://freepik.com" target="_blank">FreePik</a> for
                            images used in this ebook landing page template. You may browse FreePik to download more
                            free images for your website.</p>

                        <p>TemplateMo is one of the best websites to download free CSS templates for any purpose. This
                            is an ebook landing page template using Bootstrap 5 CSS layout.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center">
                    <h6>What's inside?</h6>

                    <h2 class="mb-5">Preview at glance</h2>
                </div>

                <div class="col-lg-4 col-12">
                    <nav id="navbar-example3" class="h-100 flex-column align-items-stretch">
                        <nav class="nav nav-pills flex-column">
                            <a class="nav-link smoothscroll" href="#item-1">Introduction</a>

                            <a class="nav-link smoothscroll" href="#item-2">Chapter 1: <strong>Win back your
                                    time</strong></a>

                            <a class="nav-link smoothscroll" href="#item-3">Chapter 2: <strong>Work less, do
                                    more</strong></a>

                            <a class="nav-link smoothscroll" href="#item-4">Chapter 3: <strong>Delegate</strong></a>

                            <a class="nav-link smoothscroll" href="#item-5">Chapter 4: <strong>Habits</strong></a>
                        </nav>
                    </nav>
                </div>

                <div class="col-lg-8 col-12">
                    <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true"
                         class="scrollspy-example-2" tabindex="0">
                        <div class="scrollspy-example-item" id="item-1">
                            <h5>Introducing ebook</h5>

                            <p>This ebook landing page is good to use for any purpose. This layout is based on Bootstrap
                                5 CSS framework.</p>

                            <p><strong>What is Content Marketing?</strong> If you are wondering what content marketing
                                is all about, this is the place to start.</p>

                            <blockquote class="blockquote">Lorem Ipsum dolor sit amet, consectetur adipsicing kengan
                                omeg kohm tokito
                            </blockquote>

                            <p>When you need free HTML CSS templates, please visit Templatemo website which provides a
                                variety of templates.</p>
                        </div>

                        <div class="scrollspy-example-item" id="item-2">
                            <h5>Win back your time</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>

                            <p>Sed leo nisl, posuere at molestie ac, suscipit auctor mauris. Etiam quis metus elementum,
                                tempor risus vel, condimentum orci.</p>

                            <p>You are not allowed to redistribute this template ZIP file on any other template
                                collection website. Please contact TemplateMo for more information.</p>

                            <div class="row">
                                <div class="col-lg-6 col-12 mb-3">
                                    <img
                                        src="{{ asset('landing/images/portrait-mature-smiling-authoress-sitting-desk.jpg')}}"
                                        class="scrollspy-example-item-image img-fluid" alt="">
                                </div>

                                <div class="col-lg-6 col-12 mb-3">
                                    <img src="{{ asset('landing/images/businessman-sitting-by-table-cafe.jpg')}}"
                                         class="scrollspy-example-item-image img-fluid" alt="">
                                </div>
                            </div>

                            <p>If you need some specific CSS templates, you can Google with keywords such as templatemo
                                gallery, templatemo digital marketing, etc.</p>
                        </div>

                        <div class="scrollspy-example-item" id="item-3">
                            <h5>Work less, do more</h5>

                            <p>Credit goes to <a rel="nofollow" href="https://freepik.com" target="_blank">FreePik</a>
                                for images used in this ebook landing page template. You may browse FreePik to download
                                more free images for your website.</p>
                            <p>This is a second paragraph. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                do eiusmod tempor incididunt.</p>

                            <p>Lorem ipsum dolor sit amet, consive adipisicing elit, sed do eiusmod. tempor incididunt
                                ut labore.</p>

                            <div class="row align-items-center">
                                <div class="col-lg-6 col-12">
                                    <img src="{{ asset('landing/images/tablet-screen-contents.jpg')}}" class="img-fluid"
                                         alt="">
                                </div>

                                <div class="col-lg-6 col-12">
                                    <p>Modern ebook ever</p>

                                    <p><strong>Lorem ipsum dolor sit amet, consive adipisicing elit, sed do eiusmod.
                                            tempor incididunt.</strong></p>
                                </div>
                            </div>
                        </div>

                        <div class="scrollspy-example-item" id="item-4">
                            <h5>Delegate</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>

                            <p>Lorem ipsum dolor sit amet, consive adipisicing elit, sed do eiusmod. tempor incididunt
                                ut labore.</p>

                            <p>You are not allowed to redistribute this template ZIP file on any other template
                                collection website. Please contact TemplateMo for more information.</p>

                            <img src="{{ asset('landing/images/portrait-mature-smiling-authoress-sitting-desk.jpg')}}"
                                 class="scrollspy-example-item-image img-fluid mb-3" alt="">

                            <p>You may want to contact us for more information about this template.</p>
                        </div>

                        <div class="scrollspy-example-item" id="item-5">
                            <h5>Habits</h5>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>

                            <p>You are not allowed to redistribute this template ZIP file on any other template
                                collection website. Please contact TemplateMo for more information.</p>

                            <p><strong>What is Free CSS Templates?</strong> Free CSS Templates are a variety of
                                ready-made web pages designed for different kinds of websites.</p>

                            <blockquote class="blockquote">Lorem Ipsum dolor sit amet, consectetur adipsicing kengan
                                omeg kohm tokito
                            </blockquote>

                            <p>You may browse TemplateMo website for more CSS templates. Thank you for visiting our
                                website.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="author-section section-padding" id="section_3">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <img src="{{ asset('landing/images/portrait-mature-smiling-authoress-sitting-desk.jpg')}}"
                         class="author-image img-fluid" alt="">
                </div>

                <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                    <h6>Meet Author</h6>

                    <h2 class="mb-4">Prof. Sophia</h2>

                    <p>This is an ebook landing page template with Bootstrap 5 CSS framework. It is easy to customize
                        with the use of Bootstrap CSS classes.</p>

                    <p>Lorem ipsum dolor sit amet, consive adipisicing elit, sed do eiusmod. tempor incididunt ut
                        labore.</p>
                </div>

            </div>
        </div>
    </section>


    <section class="contact-section section-padding" id="section_5">
        <div class="container">
            <div class="row">

                <div class="col-lg-5 col-12 mx-auto">
                    <form class="custom-form ebook-download-form bg-white shadow" action="#" method="post" role="form">
                        <div class="text-center mb-5">
                            <h2 class="mb-1">Mau informasi detail tentang kami?</h2>
                        </div>

                        <div class="ebook-download-form-body">
                            <div class="input-group mb-4">
                                <input type="text" name="ebook-form-name" id="ebook-form-name" class="form-control"
                                       aria-label="ebook-form-name" aria-describedby="basic-addon1"
                                       placeholder="Nama" required>

                                <span class="input-group-text" id="basic-addon1">
                                            <i class="custom-form-icon bi-person"></i>
                                        </span>
                            </div>

                            <div class="input-group mb-4">
                                <input type="email" name="ebook-email" id="ebook-email" pattern="[^ @]*@[^ @]*"
                                       class="form-control" placeholder="example@gmail.com" aria-label="ebook-form-email"
                                       aria-describedby="basic-addon2" required="">

                                <span class="input-group-text" id="basic-addon2">
                                            <i class="custom-form-icon bi-envelope"></i>
                                        </span>
                            </div>

                            <div class="col-lg-8 col-md-10 col-8 mx-auto">
                                <button type="submit" class="form-control">Hubungi Kami</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-6 col-12">
                    <h6 class="mt-5">Say hi and talk to us</h6>

                    <h2 class="mb-4">Contact</h2>

                    <p class="mb-3">
                        <i class="bi-geo-alt me-2"></i>
                        {{ $data->address }}
                    </p>

                    <p class="mb-2">
                        <a href="tel: {{ $data->phone }}" class="contact-link">
                            {{ $data->phone }}
                        </a>
                    </p>

                    <p>
                        <a href="mailto:{{ $data->email }}" class="contact-link">
                            {{ $data->email }}
                        </a>
                    </p>

                </div>

            </div>
        </div>
    </section>
</main>

<!-- JAVASCRIPT FILES -->
<script src="{{ asset('landing/js/jquery.min.js')}}"></script>
<script src="{{ asset('landing/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('landing/js/jquery.sticky.js')}}"></script>
<script src="{{ asset('landing/js/click-scroll.js')}}"></script>
<script src="{{ asset('landing/js/custom.js')}}"></script>

</body>
</html>