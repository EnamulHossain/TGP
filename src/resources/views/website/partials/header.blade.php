<style>
    /* .parent:focus > .child{
        display: block;
    } */

    :root {
        --color-brand-primary: rgb(45, 67, 82);
    }

    .mainmenu {
        min-height: 90vh;
    }

    .child {
        position: static;
    }

    /* menu anchor activated blue color removed  */
    a[tabindex]:focus {
        color: black;
        outline: none;
    }

    a:active {
        color: black;
        background: white;
    }

    .parent:hover>.child {
        display: none;
    }

    .subtitle {
        font-size: 1.7rem;
    }

    .text-primary {
        color: rgb(43, 64, 79);
    }


    .blurry-text {
        user-select: none;
        color: transparent;
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
    }

    .large-font {
        font-size: 2rem;
    }

    ion-icon.active {
        animation: like 0.5s 1;
        fill: red;
        stroke: none;
    }

    ion-icon {
        fill: transparent;
        stroke: rgba(45, 67, 82, 1);
        stroke-width: 30;
        transition: all 0.5s;
    }

    @-webkit-keyframes like {
        0% {
            transform: scale(1);
        }

        90% {
            transform: scale(1.2);
        }

        100% {
            transform: scale(1.1);
        }
    }

    .ion-icon-heart {
        color: red;
        display: block;
        margin: auto;
        text-align: center;
        vertical-align: middle;
        line-height: inherit;
    }

    .no-shrink {
        flex: none;
    }

    .grant-mr {
        margin-left: 0px;
    }

    .GrantDataRight {
        border-top: 2px solid var(--color-brand-primary);
        padding-top: 10px;
    }

    .GrantDataLeft {
        border-bottom: 2px solid;
        border-image: linear-gradient(to right, white 20%, var(--color-brand-primary) 10%, var(--color-brand-primary) 80%, white 47%) 3;
    }

    .grant-mr {
        margin-left: 0px;
        margin: 50px 0;
    }

    .container-mx {
        margin-left: 3.8rem;
        margin-right: 3.8rem;
        box-sizing: border-box;
        clear: both;
    }



    @media (max-width: 1023px) {
        .mainmenu {
            display: flex;
        }
    }

    @media (min-width: 1024px) {
        .container-mx {
            margin-left: 8.7rem;
            margin-right: 8.7rem;
            box-sizing: border-box;
            clear: both;
        }

        .mainmenu {
            display: none;
        }

        .grant-mr {
            margin-left: 0px;
            margin: 0px;
            margin-right: 10px;
        }

        .GrantDataLeft {
            border-bottom: none;
            border-right: 2px solid;
            padding-top: 1rem;
            padding-right: 2rem;
            border-image: linear-gradient(to bottom, white 20%, var(--color-brand-primary) 10%, var(--color-brand-primary) 80%, white 47%) 3;
        }

        .GrantDataRight {
            border-top: none;
            padding-left: 2rem;
            border-left: 2px solid var(--color-brand-primary);

        }

    }
</style>
<header class="relative">
    <nav class="navbar z-50 fixed top-0 pt-3 pb-1 px-10 md:px-20 bg-white">
        <div class="navbar-start">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="The Grant Portal Logo" height="100" width="110">
            </a>
        </div>
        <div class="navbar-end">
            <div class="dropdown dropdown-end">

                <label tabindex="0" class="btn btn-ghost focus:bg-white lg:hidden">
                    menu
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </label>

                <ul tabindex="0" class="menu mainmenu dropdown-content mt-3 p-1 text-sm font-normal shadow bg-slate-100 rounded-box w-80 border-[1px] border-solid border-[#2D4352]">
                    <li>
                        <input type="text" placeholder="Type here" class="input input-bordered input-sm w-full max-w-xs" />
                    </li>
                    <li><a href="{{ route('pricing.plans') }}">Pricing & Plans</a></li>

                    <li tabindex="0" class="parent">
                        <a class="justify-between nested-opener">
                            Contact Us
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                            </svg>
                        </a>

                        <ul class="menu child menu-compact mt-3 p-2 shadow rounded-box  bg-white">
                            <li><a href="{{ route('contact_us') }}">Contact Us</a></li>
                            <li><a href="{{ route('i-am-a-grant-provider') }}">I am a Grant Provider</a></li>
                            <li><a href="{{ route('hire-a-grant-writer') }}">Hire a Grant Writer</a></li>
                        </ul>

                    </li>
                    <li><a href="{{ route('about-us') }}">About us</a></li>
                    @auth()
                    <a class="btn btn-ghost mx-1 hover:underline hover:underline-offset-8 hover:bg-white" href="{{ route('auth.logout') }}">Log Out</a>
                    @endauth
                    @guest
                    <a class="btn btn-ghost mx-1 hover:underline hover:underline-offset-8 hover:bg-white" href="{{ route('website.login') }}">Login</a>
                    <a class="btn btn-outline btn-warning mx-1" href="{{ route('website.signup') }}">Signup</a>
                    @endguest
                </ul>
            </div>
        </div>


        <div class="navbarclass">
            <ul class="menu menu-horizontal px-1 text-lg">
                <li><a href="{{ route('pricing.plans') }}" class="hover:underline hover:underline-offset-8 hover:bg-white">Pricing & Plans</a></li>
                <li><a class="hover:underline hover:underline-offset-8 hover:bg-white" href="https://www.biz2credit.com/thegrantportal/quick-apply" target="_blank" title="Opens in a new window">
                        <span>
                            SBA/Business Loans
                        </span>
                    </a></li>
                <li tabindex="0">
                    <a href="{{ route('contact_us') }}" class="hover:underline hover:underline-offset-8 hover:bg-white">
                        Contact Us
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                        </svg>
                    </a>
                    <ul class="menu py-2 bg-base-100 border-[1px] border-solid border-[#2D4352] bg-white">
                        <li><a href="{{ route('contact_us') }}" class="hover:underline hover:underline-offset-8 hover:bg-white">Contact Us</a></li>
                        <li><a href="{{ route('hire-a-grant-writer') }}" class="hover:underline hover:underline-offset-8
                                hover:bg-white">Hire
                                a Grant Writer</a></li>
                        <li><a href="{{ route('i-am-a-grant-provider') }}" class="hover:underline hover:underline-offset-8 hover:bg-white">I am a Grant
                                Provider</a></li>
                        <li><a href="{{ route('i-am-a-grant-writer') }}" class="hover:underline hover:underline-offset-8 hover:bg-white">I am a Grant Writer</a>
                        </li>
                        @php
                        $isGrantor = false;
                        $userId = auth()->id();
                        $roleIds = \DB::table('role_user')
                        ->where('user_id', $userId)
                        ->pluck('role_id')
                        ->all();                     

                        if (in_array(2, $roleIds) || in_array(11, $roleIds)) {
                            $isGrantor = true;
                        }
                        @endphp

                        @auth()
                        @if($isGrantor)
                        <li><a href="{{ route('website.add.grant') }}" class="hover:underline hover:underline-offset-8 hover:bg-white">Add Grants</a></li>
                        @endif
                        @endauth

                    </ul>
                </li>
                <li><a href="{{ route('about-us') }}" class="hover:underline hover:underline-offset-8 hover:bg-white">About Us</a></li>
                @auth()
                <a style="font-weight: 500;" class="hover:underline hover:underline-offset-8 hover:bg-white mt-3 mx-4" href="{{ route('auth.logout') }}">Log Out</a>
                <a style="font-weight: 500; border-width: 3px; width: 110px; background-color: #e0ae67; border-color: #e0ae67; color: black;  text-transform:capitalize" class="btn btn-outline mx-1 text-base" onmouseover="this.style.backgroundColor='white'; this.style.color='black';" onmouseout="this.style.backgroundColor='#e0ae67'; this.style.color='black';" href="{{ route('my-profile') }}">Profile</a>
                @endauth
                @guest
                <a style="font-weight: 500;" class="hover:underline hover:underline-offset-8 hover:bg-white mt-3 mx-4" href="{{ route('website.login') }}">Log In</a>
                <a style="border-width: 3px; width: 110px; background-color: #e0ae67; border-color: #e0ae67; color: black; text-transform:capitalize; font-weight:500;" class="btn btn-outline mx-1 text-base" onmouseover="this.style.backgroundColor='white'; this.style.color='black';" onmouseout="this.style.backgroundColor='#e0ae67'; this.style.color='black';" href="{{ route('website.signup') }}">Sign Up</a>
                @endguest
            </ul>
        </div>
    </nav>
</header>

<script>
    $(document).ready(function() {
        $(".parent").click(function() {
            $(".child").slideToggle();
        });
    });
</script>