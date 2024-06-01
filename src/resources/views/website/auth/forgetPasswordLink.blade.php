@extends('website.website')
@section('title', 'Log in')
@section('content')
    <section class="lg:mt-20 lg:mx-36 pt-10">
        <hr class="border-b border-[#2d4352] mx-4">
        <hr class="border-b border-[#2d4352] mt-5 ml-4 mr-16">
        <div class="flex flex-row">
        <div class="basis-1/2 "><br>
            <style>
                .input-wrapper {
                    position: relative;
                }
            
                .eye-icon {
                    position: absolute;
                    top: 50%;
                    right: 0.75rem;
                    transform: translateY(-50%);
                    cursor: pointer;
                    margin-top: 0.5rem; 
                }
            </style>
            <form action="{{ route('reset.password.post') }}" method="POST" class="mt-10">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-control w-full max-w-md">
                    <label for="email_address" class="label"><span class="label-text text-xl">Enter Your Email Address</span></label>
                    <div class="col-md-6">
                        <input type="text" id="email_address" class="input input-bordered w-full max-w-md mt-4" name="email" autofocus>
                        @error('email')
                            <span class="text-danger" style="color: red">{{ $message }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-control w-full max-w-md">
                    <label for="password" class="label">New Password</label>
                    <div class="col-md-6">
                        <div class="input-wrapper">
                            <input type="password" id="password" class="input input-bordered w-full max-w-md mt-4" name="password" autofocus>
                            <span class="eye-icon" onclick="togglePasswordVisibility('password')"><i class="fas fa-eye-slash"></i></span>
                        </div>
                        @error('password')
                            <span class="text-danger" style="color: red">{{ $message }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-control w-full max-w-md">
                    <label for="password_confirmation" class="label">Confirm Password</label>
                    <div class="col-md-6">
                        <div class="input-wrapper">
                            <input type="password" id="password_confirmation" class="input input-bordered w-full max-w-md mt-4" name="password_confirmation" autofocus>
                            <span class="eye-icon" onclick="togglePasswordVisibility('password_confirmation')"><i class="fas fa-eye-slash"></i></span>
                        </div>
                        @error('password_confirmation')
                            <span class="text-danger" style="color: red">{{ $message }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6 offset-md-4">
                        
                <button type="submit" class="rounded w-full max-w-md px-3 py-2 mt-5 bg-[#2d4352] text-[#fff] border-[#2d4352] border-2 hover:bg-white hover:text-[#2d4352]">Reset Password</button>            

                </div>
            </form>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

            <script>
                function togglePasswordVisibility(inputId) {
                    const input = document.getElementById(inputId);
                    const icon = input.nextElementSibling.firstElementChild;
                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    } else {
                        input.type = 'password';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    }
                }
            </script>
                    
            <div class="mt-10 flex flex-col">
            Not A Member?
            <button class="rounded w-full max-w-md px-3 py-2 mt-5 bg-[#d7e1e8] text-[#2d4352] hover:border-[#2d4352] border-2 hover:bg-white hover:text-[#2d4352]">Signup</button>
            <a href="#" class="text-md pt-4 underline underline-offset-8">
            Search Grants
            </a>
            </div>
        </div>
        <div class="basis-1/2 md:block hidden">
            <img 
            src="{{asset('images/PG YOUNG WHITE BUSINESS WOMAN.png')}}"
            alt="women working" class="mt-5 ml-40 w-auto" style="height: 80%;">
        </div>
        </div>
    </section>
@endsection