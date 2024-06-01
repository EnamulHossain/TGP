@extends('website.website')
@section('title', 'Log in')
@section('content')
<section class="lg:mt-20 lg:mx-36 pt-10">
    <hr class="border-b border-[#2d4352] mx-4">
    <hr class="border-b border-[#2d4352] mt-5 ml-4 mr-16">
    <div class="flex justify-center flex-row">

        <div class="basis-1/2 "><br>

            <form action="{{ route('website.login') }}" method="post" class="mt-10">
                @csrf
                <div class="form-control w-full max-w-md">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session('email_not_verified'))
                    <div class="alert alert-danger" style="color:red;">
                        {{ session('email_not_verified') }}
                    </div>
                    @endif
                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    <label class="label">
                        <span class="label-text text-xl">Enter Your Email Address:</span>
                    </label>
                    <input type="email" placeholder="Type here" class="input input-bordered w-full max-w-md mt-4" name="email" />
                    @if ($errors->has('email'))
                    <div class="" style="color: red">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="form-control w-full max-w-md mt-5">
                    <label class="label">
                        <span class="label-text text-xl">Enter Your Password:</span>
                    </label>
                    <div class="relative">
                        <input type="password" placeholder="Type here" class="input input-bordered w-full max-w-md" name="password" id="password-field" />
                        <span id="toggle-password" class="absolute right-4 top-3 cursor-pointer mt-3">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        </span>
                    </div>
                    @if ($errors->has('password'))
                    <div class="" style="color: red">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <a href="{{ route('forget.password.get') }}" class="ml-80">Forgot Password?</a>

                <button class="rounded w-full max-w-md px-3 py-2 mt-5 bg-[#2d4352] text-[#fff] border-[#2d4352] border-2 hover:bg-white hover:text-[#2d4352]">Login</button>
            </form>

            <script>
                const togglePassword = document.getElementById('toggle-password');
                const passwordField = document.getElementById('password-field');

                togglePassword.addEventListener('click', function() {
                    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordField.setAttribute('type', type);

                    if (type === 'password') {
                        togglePassword.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
                    } else {
                        togglePassword.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>';
                    }
                });
            </script>


            <div class="mt-10 flex flex-col">
                Not A Member?
                <a href="{{route('website.signup')}}"><button class="rounded w-full max-w-md px-3 py-2 mt-5 bg-[#d7e1e8] text-[#2d4352] hover:border-[#2d4352] border-2 hover:bg-white hover:text-[#2d4352]">Signup</button></a>
                <a href="{{url('/')}}" class="text-md pt-4 underline underline-offset-8">
                    Search Grants
                </a>
            </div>
        </div>
        <div class="basis-1/2 md:block hidden">
            <img src="{{asset('images/PG YOUNG WHITE BUSINESS WOMAN.png')}}" alt="women working" class="mt-5 ml-40 w-auto" style="height: 80%;">
        </div>
    </div>
</section>

@include('website.copypastescript')
@endsection