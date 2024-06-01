<footer class="footer felx flex-row justify-between text-primary py-16 px-10 md:px-36 border-t-[3px] border-solid border-[#2D4352] bg-white">  
    <div>
        <img src=" {{asset('images/TGP-favicon.png')}}" alt="The Grant Portal Logo" width="100" height="71">
        <p class="text-xl text-black">1100 Park Central Blvd S<br/> Promero Beach, FL 33064 <br> 
        <i class="fa fa-phone-square" aria-hidden="true"></i>
        (954)-935-8800</p>
    </div> 

    <div class="mt-0 md:mt-32">
        <div style="font-size:1.6rem;" class="grid grid-flow-col gap-8 underline underline-offset-1">
        <a href="{{route('faqs')}}" class="link link-hover">FAQs</a> 
        <a href="{{route('privacy_policy')}}" class="link link-hover">Privacy Policy</a> 
        <a href="{{route('cookie_policy')}}" class="link link-hover">Cookies Policy</a> 
        <a href="{{route('terms_service')}}" class="link link-hover">Terms & Condition</a> 
        </div> 
    </div> 

    <div style="font-size:1.6rem;" class="mt-0 md:mt-32 text-black">
        &copy;2023 Promero, Inc.  All Rights Reserved
    </div> 

    <div class="mt-0 md:mt-20">
        <button>
            <a style="border-width: 1px; height: 44px; width: 130px; background-color: #000000; border-color: #000000; color: white; text-transform:capitalize; border-radius: 0.75rem; text-decoration-line: none;"
            class="btn btn-outline mx-1 text-2xl capitalize"
            onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
            onmouseout="this.style.backgroundColor='#000000'; this.style.color='white';"
            href="{{ route('contact_us') }}">Contact Us</a>
        </button>
    </div>
</footer>