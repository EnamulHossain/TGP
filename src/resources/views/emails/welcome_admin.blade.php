<p>Hello Admin,</p>

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
                            <table class="email-body_inner" align="center" width="570" cellpadding="0"
                                cellspacing="0" role="presentation">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell">
                                        <div class="f-fallback">
                                            <div class="content-center" style="margin-left: 190px">
                                                <img src="{{ asset('images/TGP-favicon.png') }}" width="100"
                                                    height="71">
                                            </div>
                                            <p class="text-justify">
                                            <p>Hello Admin,</p>

                                            <p>New user just signed up on grant portal</p>
                                            <p>Email: {{ $user->email }}</p>
                                            Best regards,<br>
                                            The TGP Team</p>
                                            <p>Thanks,
                                                <br>
                                            </p>
                                            <!-- Sub copy -->
                                            <table class="body-sub" role="presentation">
                                                <tr>
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
                            <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0"
                                role="presentation">
                                <tr>
                                    <td class="content-cell" align="center">
                                        <p class="f-fallback sub align-center">
                                            [The Grant Portal]
                                            <br>1100 Park Central Blvd S
                                            <br>Promero Beach, FL 33064
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
