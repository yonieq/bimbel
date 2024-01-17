<header>
    <nav class="navbar navbar-expand navbar-light navbar-top">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-lg-0">
                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600">{{ auth()->user()->name }}</h6>
                                <p class="mb-0 text-sm text-gray-600">{{ auth()->user()->email }}</p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md">
                                    @if(empty(auth()->user()->photo))
                                        <img src="{{ asset('assets/compiled/png/profile.png') }}">
                                    @else
                                        <img src="{{ asset('storage/user/'.auth()->user()->photo) }}">
                                    @endif
{{--                                    @if(auth()->user() && auth()->user()->photo)--}}
{{--                                        @if(file_exists(public_path(auth()->user()->photo)))--}}
{{--                                            <img src="{{ asset(auth()->user()->photo) }}">--}}
{{--                                        @else--}}
{{--                                            <!-- Use the default asset if the user's image does not exist -->--}}
{{--                                            <img src="{{ asset('assets/compiled/png/profile.png') }}">--}}
{{--                                        @endif--}}
{{--                                    @else--}}
{{--                                        <!-- Use the default asset if there's no authenticated user or no user image -->--}}
{{--                                        <img src="{{ asset('assets/compiled/png/profile.png') }}">--}}
{{--                                    @endif--}}
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                        style="min-width: 11rem;">
                        <li>
                            <h6 class="dropdown-header">{{ auth()->user()->name }}</h6>
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icon-mid bi bi-box-arrow-left me-2"></i>Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
