@extends('website.website')
@section('title', 'Sign up')
@section('content')

<section class="my-20 mx-32 py-10">
    <hr class="border-b-2 border-[#2d4352]">
    <div class="flex flex-row border-t-2 border-[#2d4352] mt-3">
        <div class="basis-1/2 "><br>
            <h1 class="text-4xl font-bold">
            Sign Up for Free New Grant Alerts 
            </h1>
            <h1 class="text-4xl font-bold mt-2">
                View Grant Details*
            </h1>
            <p class="mt-1">*Requires Paid Subsription</p>
            <form action="{{route('grant.signup')}}" method="post" class="mt-4">
                @csrf
                <div class="form-control w-full max-w-md">
                    <label class="label">
                        <span class="label-text text-xl">Email:</span>
                    </label>
                    <input type="email" name="email" placeholder="Type here" class="input input-bordered w-full max-w-md mt-3" />
                    @error('email')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-control w-full max-w-md mt-2">
                    <label class="label">
                        <span class="label-text text-xl">Password:</span>
                    </label>
                    <div class="relative">
                        <input type="password" name="password" id="password" class="password input input-bordered w-full max-w-md mt-3 focus:outline-none"/>
                        @error('password')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                        <span id="passEyeChange" class="absolute top-6 right-4 z-10 opacity-30 toggle-password cursor-pointer">
                            <span id="eyeShow" class="">
                                <svg viewBox="0 0 24 24" class="h-7 w-7" fill="#000" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 11c-2.206 0-4-1.794-4-4s1.794-4 4-4 4 1.794 4 4-1.794 4-4 4z" />
                                    <path d="M12 10c-1.084 0-2 .916-2 2s.916 2 2 2 2-.916 2-2-.916-2-2-2z" />
                                </svg>
                            </span>
                            <span id="eyeClose" class="hidden">
                                <svg viewBox="0 0 24 24" class="h-7 w-7" fill="#000" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.073 12.194 4.212 8.333c-1.52 1.657-2.096 3.317-2.106 3.351L2 12l.105.316C2.127 12.383 4.421 19 12.054 19c.929 0 1.775-.102 2.552-.273l-2.746-2.746a3.987 3.987 0 0 1-3.787-3.787zM12.054 5c-1.855 0-3.375.404-4.642.998L3.707 2.293 2.293 3.707l18 18 1.414-1.414-3.298-3.298c2.638-1.953 3.579-4.637 3.593-4.679l.105-.316-.105-.316C21.98 11.617 19.687 5 12.054 5zm1.906 7.546c.187-.677.028-1.439-.492-1.96s-1.283-.679-1.96-.492L10 8.586A3.955 3.955 0 0 1 12.054 8c2.206 0 4 1.794 4 4a3.94 3.94 0 0 1-.587 2.053l-1.507-1.507z" />
                                </svg>
                            </span>
                        </span>
                    </div>
                </div>
                <div class="form-control w-full max-w-md mt-2">
                    <label class="label">
                        <span class="label-text text-xl">Confirm Password:</span>
                    </label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" placeholder="Type here" class="password input input-bordered w-full max-w-md mt-3 focus:outline-none" />
                        @error('password_confirmation')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                        <span id="confirmPassEyeChange" class="absolute top-6 right-4 z-10 opacity-30 toggle-password cursor-pointer">
                            <span id="confirmEyeShow">
                                <svg viewBox="0 0 24 24" class="h-7 w-7" fill="#000" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 11c-2.206 0-4-1.794-4-4s1.794-4 4-4 4 1.794 4 4-1.794 4-4 4z" />
                                    <path d="M12 10c-1.084 0-2 .916-2 2s.916 2 2 2 2-.916 2-2-.916-2-2-2z" />
                                </svg>
                            </span>
                            <span id="confirmEyeClose" class="hidden">
                                <svg viewBox="0 0 24 24" class="h-7 w-7" fill="#000" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.073 12.194 4.212 8.333c-1.52 1.657-2.096 3.317-2.106 3.351L2 12l.105.316C2.127 12.383 4.421 19 12.054 19c.929 0 1.775-.102 2.552-.273l-2.746-2.746a3.987 3.987 0 0 1-3.787-3.787zM12.054 5c-1.855 0-3.375.404-4.642.998L3.707 2.293 2.293 3.707l18 18 1.414-1.414-3.298-3.298c2.638-1.953 3.579-4.637 3.593-4.679l.105-.316-.105-.316C21.98 11.617 19.687 5 12.054 5zm1.906 7.546c.187-.677.028-1.439-.492-1.96s-1.283-.679-1.96-.492L10 8.586A3.955 3.955 0 0 1 12.054 8c2.206 0 4 1.794 4 4a3.94 3.94 0 0 1-.587 2.053l-1.507-1.507z" />
                                </svg>
                            </span>
                        </span>
                    </div>
                </div>
                <div class="form-control w-full max-w-md flex flex-row mt-4">
                    <input type="checkbox" checked="checked" class="checkbox checkbox-sm" id="conditionCheckbox"/>
                    <span class="label-text ml-3">I have read the <a href="{{route('terms_service')}}" class="underline">Terms and Conditions</a> </span> <br>
                </div>
                <button type="submit" id="signUpbtn" class="rounded w-full max-w-md px-3 py-2 mt-4 bg-[#2d4352] text-[#fff] border-[#2d4352] border-2 hover:bg-white hover:text-[#2d4352]">Submit</button>

            </form>

            <div class="mt-6 flex flex-col">
                <p>Already A Member?</p>
                <a href="{{route('website.login')}}"><button class="rounded w-full max-w-md px-3 py-2 mt-5 bg-[#d7e1e8] text-[#2d4352] border-[#2d4352] border-2 hover:bg-white hover:text-[#2d4352]">Login</button></a>
            </div>
        </div>
        <div class="basis-1/2 md:block hidden">
            <img src="{{asset('images/auth/LGhigherEducation.png')}}" alt="LG higher education" class="mt-48" style="height: 450px; width: auto">
        </div>
    </div>
</section>
<script>
    // Toggle show password
    document.addEventListener("DOMContentLoaded", function() {
        var togglePasswordBtn = document.getElementsByClassName("toggle-password");
        var passwordInput = document.getElementsByClassName('password');
        for (let i = 0; i < togglePasswordBtn.length; i++) {
            let togglePassword = togglePasswordBtn[i]
            let password = passwordInput[i]
            togglePassword.addEventListener("click", function() {
                password.type = (password.type === "password") ? "text" : "password";

            });
        }
    });
    let passEyeChange = document.getElementById('passEyeChange')
    let eyeShow = document.getElementById('eyeShow')
    let eyeClose = document.getElementById('eyeClose')
    passEyeChange.addEventListener('click', () => {
        eyeShow.classList.toggle('hidden')
        eyeClose.classList.toggle('hidden')
    })


    var checkbox = document.getElementById('conditionCheckbox');
    var button = document.getElementById('signUpbtn');

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            button.disabled = false;
        } else {
            button.disabled = true;
        }
    });
</script>
@include('website.copypastescript')
@endsection