@extends('website.website')
@section('title', 'Log in')
@section('content')
    <section class="lg:mt-20 lg:mx-36 pt-10">
        <hr class="border-b border-[#2d4352] mx-4">
        <hr class="border-b border-[#2d4352] mt-5 ml-4 mr-16">
        <div class="flex flex-row">
        <div class="basis-1/2 "><br>
            <form action="{{ route('forget.password.post') }}" method="POST" class="mt-10">
                <div class="form-control w-full max-w-md">
                @if (Session::get('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                @csrf
                    <label for="email_address" class="label"><span class="label-text text-xl">Enter Your Email Address</span></label>
                    <div class="col-md-6">
                        <input type="" id="email_address" class="input input-bordered w-full max-w-md mt-4" name="email" autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger" style="color: red">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 offset-md-4">
                <button type="submit" class="rounded w-full max-w-md px-3 py-2 mt-5 bg-[#2d4352] text-[#fff] border-[#2d4352] border-2 hover:bg-white hover:text-[#2d4352]"> Send Password Reset Link</button>            

                </div>
            </form>
                    
            <div class="mt-10 flex flex-col">
            Not A Member?
            <a href="{{route('website.signup')}}"><button class="rounded w-full max-w-md px-3 py-2 mt-5 bg-[#d7e1e8] text-[#2d4352] hover:border-[#2d4352] border-2 hover:bg-white hover:text-[#2d4352]">Signup</button></a>
            <a href="{{url('/')}}" class="text-md pt-4 underline underline-offset-8">
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