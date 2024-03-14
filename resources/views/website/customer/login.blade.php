@extends('layouts.website')
@section('website-content')

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center text-success text-uppercase"> Customer Login</h3>
                        </div>

                        <div class="card-body p-3">
                            <form action="{{ route('customer.auth') }}" method="post">
                                @csrf
                                <div class="form-group pt-3">
                                    <label class="form-label" for="userphone">Phone</label>
                                    <input type="text" name="userphone" id="userphone" class="form-control px-3" placeholder="Phone Number">
                                </div>
                                <div class="form-group py-3 position-relative">
                                    <label class="form-label" for="id_password">Password</label>
                                    <input type="password" name="password" id="id_password" class="form-control px-3 "
                                        placeholder="Password"><i class="far fa-eye show-icon position-absolute"
                                        id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                                </div>
                                <div class="form-group py-3">
                                    {{-- <div class="">
                                        <span>
                                            <a href="{{ route('customer.signup') }}" class="btn btn-success ms-auto"> Sign Up</a>
                                        </span>

                                    </div> --}}
                                    <div class="ms-auto">
                                        <span class="">
                                            <button type="submit" class="btn btn-success ms-0 w-100">Login</button>
                                        </span>


                                        <div class="forget-password mt-2">
                                            <a href="{{ route('forget.password') }}" class="text-danger">Forget
                                                Password</a>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a class="fs-9 fw-bold" href="{{ route('customer.signup') }}">Create an account</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php
    Session::forget('phone');
    ?>
@endsection
@push('website-js')
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#id_password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>

@endpush
