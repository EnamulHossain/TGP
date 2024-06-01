<link href="https://www.thegrantportal.com/Files/Logos/TGP-favicon.png?Thumbnail" rel="icon" type="image/png">
@extends('website.website')
@section('title', 'Contact Us')
@section('content')
    <section class="my-20 mx-10 md:mx-32 py-10">
        <div class="mx-12">
            <hr class="border-b border-[#2d4352] mx-8">
            <hr class="border-b border-[#2d4352] mt-5 ml-8 mr-20">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="order-2 md:order-1 mt-16"><br>
                
                <h1 class="text-5xl font-bold">Contact Us</h1>
                <form action="{{ route('contact_us.store') }}" method="post" class="mt-10">
                    @csrf
                    <div class="form-control w-full max-w-md">
                        @if (Session::get('success'))
                            <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
                        @endif
                        <label class="label">
                            <span class="label-text text-xl">First Name <span class="text-red-600">*</span></span>
                        </label>
                        <input name="firstname" type="text" placeholder="First Name"
                            class="input input-bordered w-full max-w-md mt-3" />
                        @error('firstname')
                            <div class="" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control w-full max-w-md mt-4">
                        <label class="label">
                            <span class="label-text text-xl">Last Name <span class="text-red-600">*</span></span>
                        </label>
                        <input name="lastname" type="text" placeholder="Last Name"
                            class="input input-bordered w-full max-w-md mt-3" />
                        @error('lastname')
                            <div class="" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-control w-full max-w-md mt-4">
                        <label class="label">
                            <span class="label-text text-xl">Phone Number <span class="text-red-600">*</span></span>
                        </label>
                        <input name="phone" type="number" placeholder="Phone Number"
                            class="input input-bordered w-full max-w-md mt-3" />
                        @error('phone')
                            <div class="" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-control w-full max-w-md mt-4">
                        <label class="label">
                            <span class="label-text text-xl">Email:</span>
                        </label>
                        <input name="email" type="email" placeholder="Email"
                            class="input input-bordered w-full max-w-md mt-3" />
                        @error('email')
                            <div class="" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-control w-full max-w-md flex flex-row mt-3">
                        <input id="grant-checkbox" name="is_interested" type="checkbox" checked="checked" class="checkbox checkbox-sm" />
                        <span class="label-text ml-3">I am Interested in Adding a Grant</span>
                    </div>
                    
                    <script>
                        var checkbox = document.getElementById("grant-checkbox");
                        var valueInput = document.createElement("input");
                        valueInput.setAttribute("type", "hidden");
                        valueInput.setAttribute("name", "is_interested");
                        valueInput.setAttribute("value", checkbox.checked ? "1" : "0");
                    
                        checkbox.addEventListener("change", function() {
                            valueInput.value = this.checked ? "1" : "0";
                        });
                    
                        checkbox.parentNode.appendChild(valueInput);
                    </script>
                    

                    <div class="form-control w-full max-w-md">
                        <label class="label">
                            <span class="label-text text-xl text-[#2d4352]">How Can We Help You <span
                                    class="text-red-600">*</span></span>
                        </label>
                        <textarea class="textarea textarea-bordered h-24 border-1 border-[#2d4352]" placeholder="Enter Your Message"
                            name="content"></textarea>
                        @error('content')
                            <div class="" style="color: red;">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit"
                        class="rounded w-full max-w-md px-3 py-2 mt-4 bg-[#2d4352] text-[#fff] border-[#2d4352] border-2 hover:bg-white hover:text-[#2d4352]">Submit</button>

                </form>
            </div>
            <div class="order-1 md:order-2 my-32 hidden md:flex flex-col items-center justify-center">
                <img src="{{ asset('images/PG BLACK BUSINESS WOMAN.png') }}" alt="ManOnComputer" class="h-[600px] w-auto">
                <div class=" mt-10">
                    <img src="{{ asset('images/TGP-favicon.png') }}" alt="The Grant Portal Logo" width="50"
                        height="50" class="">
                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                    (954)-935-8800
                </div>
            </div>
        </div>
    </section>
    @include('website.copypastescript')
@endsection
