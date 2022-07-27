<nav class="navbar navbar-expand-xxl navbar-light fixed-top bg-light navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{asset('assets/img/logo.png')}}" alt="..." height="20" class="custom-logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse custom-menu" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('product')}}">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('about')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('contact')}}">Contact Us</a>
                </li>
            </ul>
            <div class="d-flex">
                <nav class="nav">
                    @if(session()->get('customers_id'))
                        <div class="dropdown">
                            <a class="nav-link text-dark dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </div>
                    @else
                        <a class="nav-link text-dark" aria-current="page" href="javascript:;" data-bs-toggle="modal" data-bs-target="#ModalLogin"><i class="bi bi-person"></i></a>
                    @endif
                    <a class="nav-link text-dark" href="{{url('cart')}}"><i class="bi bi-handbag"></i></a>
                    <a class="nav-link text-dark" href="javascript:;"><i class="bi bi-list"></i></a>
                </nav>
            </div>
        </div>
    </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="ModalLogin" tabindex="-1" aria-labelledby="ModalLoginLabel" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-custom">
            <div class="modal-header bg-primary border-radius-0">
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-5">
                <div class="my-3">
                    <img src="{{asset('assets/img/logo.png')}}" class="rounded mx-auto d-block">
                </div>

                <form action="{{route('loginFrontend')}}" class="mt-5" method="post">
                    @csrf
                    <input type="hidden" name="type" value="login">
                    <div class="form-floating mb-3">
                        <input type="email" name="email" value="{{old('email')}}" class="form-control form-outline-none form-control-sm" id="floatingEmailLogin" placeholder="name@example.com">
                        <label for="floatingEmailLogin">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control form-outline-none form-control-sm" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <p class="text-end">
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#ModalForgot" data-bs-dismiss="modal" class="text-decoration-none text-dark fw-light small">Forgot Password ?</a>
                    </p>
                    <div class="my-3">
                        <button type="submit" class="btn btn-sm w-100 btn-outline-primary mb-3 py-2">Login</button>
                        <button type="button" class="btn btn-sm w-100 btn-outline-secondary py-2" data-bs-toggle="modal" data-bs-target="#ModalRegister" data-bs-dismiss="modal">Register</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-primary border-radius-0"></div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalRegister" tabindex="-1" aria-labelledby="ModalRegisterLabel" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-custom">
            <div class="modal-header bg-primary border-radius-0">
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-5">
                <div class="my-3">
                    <img src="{{asset('assets/img/logo.png')}}" class="rounded mx-auto d-block">
                </div>
                <form action="{{url('register')}}" class="mt-5" method="post">
                    @csrf
                    <input type="hidden" name="type" value="register">
                    <h3 class="fw-bold">Create Your Account</h3>
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control form-outline-none form-control-sm" id="floatingName" placeholder="Adam Projo S.B" value="{{old('name')}}">
                        <label for="floatingName">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" name="phone" class="form-control form-outline-none form-control-sm" id="floatingNumber" placeholder="081390095352" value="{{old('phone')}}">
                        <label for="floatingNumber">Phone Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control form-outline-none form-control-sm" id="floatingEmailRegister" placeholder="name@example.com" value="{{old('email')}}">
                        <label for="floatingEmailRegister">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control form-outline-none form-control-sm" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <p class="text-end">
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#ModalLogin" data-bs-dismiss="modal" class="text-decoration-none text-dark fw-light small">Have an account ? Login Now</a>
                    </p>
                    <div class="my-3">
                        <button type="submit" class="btn btn-sm w-100 btn-outline-primary mb-3 py-2">Register</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-primary border-radius-0"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalForgot" tabindex="-1" aria-labelledby="ModalForgotLabel" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-custom">
            <div class="modal-header bg-primary border-radius-0">
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-5">
                <div class="my-3">
                    <img src="{{asset('assets/img/logo.png')}}" class="rounded mx-auto d-block">
                </div>

                <form action="" class="mt-5">
                    <input type="hidden" name="type" value="forgot">
                    <h3 class="fw-bold">Reset Your Password</h3>
                    <p>Lost your password? Please enter your email address. You will receive a new password in your email.</p>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control form-outline-none form-control-sm" id="floatingEmailForgot" placeholder="name@example.com">
                        <label for="floatingEmailForgot">Email address</label>
                    </div>
                    <p class="text-end">
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#ModalLogin" data-bs-dismiss="modal" class="text-decoration-none text-dark fw-light small">Have an account ? Login Now</a>
                    </p>
                    <div class="my-3">
                        <button type="submit" class="btn btn-sm w-100 btn-outline-primary mb-3 py-2">Reset Password</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-primary border-radius-0"></div>
        </div>
    </div>
</div>
@push('bottom')
@if(session('message'))
    @if(request()->old())
        @if(request()->old('type') == 'login')
            <script>
                $( document ).ready(function() {
                    $('#ModalLogin').modal('show');
                });
            </script>
        @elseif(request()->old('type') == 'register')
            <script>
                $( document ).ready(function() {
                    $('#ModalRegister').modal('show');
                });
            </script>
        @elseif(request()->old('type') == 'forgot')
            <script>
                $( document ).ready(function() {
                    $('#ModalForgot').modal('show');
                });
            </script>
        @endif
    @endif
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire('<small>{{session('message')}}</small>')
    </script>
@endif
@endpush
