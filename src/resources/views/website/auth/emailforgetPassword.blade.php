{{-- your reset password Link is::::
<a href="{{route('reset.password.get', ['token' => $token])}}">Reset Password</a> --}}




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light dark" />
    <meta name="supported-color-schemes" content="light dark" />
    <title></title>
  </head>
  <body>
    {{-- <span class="preheader">Use this link to reset your password. The link is only valid for 24 hours.</span> --}}
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
      <tr>
        <td align="center">
          <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
              <td class="email-masthead">
                <a href="#" class="f-fallback email-masthead_name">
              </a>
              </td>
            </tr>
            <!-- Email Body -->
            <tr>
              <td class="email-body" width="570" cellpadding="0" cellspacing="0">
                <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                  <!-- Body content -->
                  <tr>
                    <td class="content-cell">
                      <div class="f-fallback">
                        <div class="" style="">
                          <img src="{{asset('images/TGP-favicon.png')}}" width="100" height="71">
                        </div>
                        <h5>Hello {{$firstname}}</h5>
                        <p>We received your request to reset your password for your account <br>
                          <a href="yourname@domain.com">{{$email}}</a> on <a href="www.thegrantportal.com ">www.thegrantportal.com</a>.  <br> <br>
                          Use the button below to reset it. <strong>  The password reset is only valid for the next 24 hours. </strong> 
                          <br>
                          <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                            <tr>
                              <td align="center">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
                                  <tr>
                                    <td align="center">
                                      <a href="{{route('reset.password.get', ['token' => $token])}}" class="" target="_blank">Reset your password</a>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                          <br> 
                          If you did not request a password reset, please ignore this email or <a href="{{route('contact_us')}}">contact support</a> if you have questions. <br> <br>
<br>
                          Thank you,<br>

                          The Grant Portal Team
                          

                        </p>
                        <!-- Action -->
                        
                        <table class="body-sub" role="presentation">
                          <tr>
                            <td>
                              {{-- <p class="f-fallback sub">If you’re having trouble with the button above, copy and paste the URL below into your web browser.</p> --}}
                              <p class="f-fallback sub"></p>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td>
                <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                  <tr>
                    <td class="content-cell" align="center">
                      <p class="f-fallback sub align-center">
                        [The Grant Portal]
                        <br>1100 Park Central Blvd South
                        <br>Pompano Beach, FL  33064
                      </p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>