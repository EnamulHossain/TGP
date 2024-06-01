@extends('website.website')
@include('website.copypastescript')
@section('content')
<section class="my-10 mx-10 md:mx-32 py-10">
    <div class="mx-12">
        <hr class="border-b border-[#2d4352] mx-8 mt-8">
        <hr class="border-b border-[#2d4352] mt-5 ml-8 mr-20">
    </div>
    <div class="">
        <div id="centerZone">
            <div class="TitanStripe StripeNarrow">
                <div class="siteBounds">
                    <div class="Freeform New100 CenterZone TitanBlock">
                        @if (session('message'))
                        <div class="alert alert-success mt-8">
                            {{ session('message') }}
                        </div>
                        @endif
                        <div class="flex">
                            <div>
                                <h1 class="text-4xl font-bold pt-20 pb-8">Thank you for being a {{$subscriptionType}} subscriber,
                                    @if ($profile)
                                    {{$profile->first_name}}
                                    @endif
                                </h1>
                            </div>
                        </div>
                        <div class="mx-2">
                            <div class="flex">
                                <div>
                                    <p><strong>Subscription Level : </strong></p>
                                </div>
                                <div class="ml-3">
                                    <span>TGP <strong>{{ $subscriptionType }}</strong> Grant Subscriptions</span>
                                </div>
                            </div>
                            <br>
                            <div class="flex">
                                <div>
                                    <p><strong>Renewal Date : </strong></p>
                                </div>
                                <div class="" style="margin-left: 40px">
                                    @if ($isPaidSubscriber && $expiredAt)
                                        @if($subscription && $subscription->status == 5)
                                        <span>Subscription is canceled</span>
                                        @else
                                        <span>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $expiredAt)->format('D, F j, Y') }}</span>
                                        @endif
                                    @else
                                    <span>Open</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="flex mt-5">
                            @if (!$isPaidSubscriber)
                            <div class="mt-0 md:mt-6">
                                <a href="{{route('pricing.plans')}}" style="border-width: 3px; width: 110px; background-color: rgb(224, 174, 103); border-color: rgb(224, 174, 103); color: black; text-transform: capitalize; font-weight: 400; height: 50px; font-size: 16px; border-radius: 1rem;" class="btn btn-outline mx-1 text-base" onmouseover="this.style.backgroundColor='white'; this.style.color='black';" onmouseout="this.style.backgroundColor='#e0ae67'; this.style.color='black';">Upgrade</a>
                            </div>
                            @endif
                            <div class="mt-0 md:mt-6 ml-2">
                                <a href="{{ route('change.password.get') }}" style="border-width: 3px; width: 200px; background-color: rgb(224, 174, 103); border-color: rgb(224, 174, 103); color: black; text-transform: capitalize; font-weight: 400; height: 50px; font-size: 16px; border-radius: 1rem;" class="btn btn-outline mx-1 text-base">Change Password</a>
                            </div>
                        </div>
                        <div class="flex mt-5">
                            <div class="mt-0 md:mt-6">
                                <button>
                                    <a style="border-width: 1px; width: 330px; background-color: #000000; border-color: #000000; color: white; text-transform:capitalize" class="btn btn-outline mx-1 text-xl capitalize" onmouseover="this.style.backgroundColor='white'; this.style.color='black';" onmouseout="this.style.backgroundColor='#000000'; this.style.color='white';" href="{{$storeURL}}" target="_blank">Manage My Account</a>
                                </button>
                            </div>

                            <div class="mt-0 md:mt-6">
                                <form style="display: inline-block;" class="delete-form" action="{{route('profile.destroy', ['id' => auth()->id()])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border-width: 1px; width: 330px; background-color: #e00000; border-color: #e00000; color: white; text-transform:capitalize" class="btn btn-outline mx-1 text-xl capitalize" onmouseover="this.style.backgroundColor='white'; this.style.color='black';" onmouseout="this.style.backgroundColor='#e00000'; this.style.color='white';" title="Delete" onclick="confirmDelete(event)">
                                        Delete My Account
                                    </button>
                                </form>
                            </div>
                            @if (!$isPaidSubscriber)
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script>
                                function confirmDelete(event) {
                                    event.preventDefault(); // Prevent form submission

                                    Swal.fire({
                                        title: 'Please re-confirm',
                                        text: 'Please re-confirm that you want to delete your account. Deletion cannot be reversed',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#d33',
                                        cancelButtonColor: '#3085d6',
                                        confirmButtonText: 'Yes, delete',
                                        cancelButtonText: 'Cancel'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // Proceed with form submission
                                            event.target.closest('.delete-form').submit();
                                        }
                                    });
                                }
                            </script>
                            @else
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script>
                                function confirmDelete(event) {
                                    event.preventDefault(); // Prevent form submission

                                    Swal.fire({
                                        title: 'To delete, first cancel your subscription',
                                        text: 'You currently have a paid recurring subscription. In order to delete your account, you must first cancel your paid subscription.',
                                        icon: 'warning',
                                        cancelButtonColor: '#3085d6',
                                        cancelButtonText: 'Close'
                                    })
                                }
                            </script>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection