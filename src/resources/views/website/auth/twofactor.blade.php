@extends('website.website')
@section('title', 'Log in')
@section('content')
    <section class="lg:my-10 lg:mx-20 py-10">
        <hr class="border-b-2 border-[#2d4352]">
        <div class="flex flex-row border-t-2 border-[#2d4352] mt-3">
            <div class="basis-1/2 "><br>
                <!-- Add this block to display error messages -->

                <!-- End of error messages block -->
                <form action="{{ route('twofactor.compare') }}" method="post" class="mt-10 ml-32 ">
                    @csrf
                    <div class="form-control w-full max-w-md">
                        <label class="label">
                            <span class="label-text text-xl">Enter Your Code</span>
                        </label>
                        <input type="number" placeholder="Type here" class="input input-bordered w-full max-w-md mt-4"
                            name="code" />
                        @if ($errors->any())
                            <div class="">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="color: red;">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <button type="submit"
                        class="rounded w-full max-w-md px-3 py-2 mt-5 bg-[#2d4352] text-[#fff] border-[#2d4352] border-2 hover:bg-white hover:text-[#2d4352]">Login</button>

                </form>
            </div>
            {{-- <div class="basis-1/2 md:block hidden">
            <img 
            src="{{asset('images/PG YOUNG WHITE BUSINESS WOMAN.png')}}"
        alt="women working" class="mt-5 ml-20" width="70%" height="70%">
    </div> --}}
            <div class=" md:block hidden">
                <img src="{{ asset('images/PG YOUNG WHITE BUSINESS WOMAN.png') }}" alt="LG higher education"
                    class="mt-12 ml-40 w-auto" style="height: 80%;">
            </div>
        </div>
    </section>
@endsection
