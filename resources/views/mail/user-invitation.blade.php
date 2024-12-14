<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            /*background-color: #ffffff;*/
            /*color: rgb(55 65 81);*/
            /*height: 100%;*/
            /*line-height: 1.4;*/
            /*margin: 0;*/
            /*padding: 2.5rem; !* 40px *!*/
            /*width: 100% !important;*/
        }

        .h-screen {
            height: 100vh;
        }

        .mx-auto {
            margin: auto;
        }

        .flex {
            display: flex;
        }

        .ml-1 {
            margin-left: 0.25rem; /* 4px */
        }

        .mt-4 {
            margin-top: 1rem; /* 16px */
        }

        .mt-8 {
            margin-top: 2rem; /* 32px */
        }

        .p-4 {
            padding: 1rem; /* 16px */
        }

        .p-10 {
            padding-top: 2.5rem; /* 40px */
        }

        .pt-5 {
            padding-top: 1.25rem; /* 20px */
        }

        .bg-white {
            background-color: rgb(255 255 255);
        }

        .bg-gray-100 {
            background-color: rgb(243 244 246);
        }

        .text-orange-500 {
            color: rgb(249 115 22);
        }

        .text-black {
            color: rgb(0 0 0);
        }

        .max-w-xl {
            max-width: 32rem; /* 512px */
        }

        .rounded-lg {
            border-radius: 0.5rem; /* 8px */
        }

        .text-center {
            text-align: center;
        }

        .font-semibold {
            font-weight: 600;
        }

        .font-extrabold {
            font-weight: 800;
        }

        .text-xs {
            font-size: 0.75rem; /* 12px */
            line-height: 1rem; /* 16px */
        }

        .text-sm {
            font-size: 0.875rem; /* 14px */
            line-height: 1.25rem; /* 20px */
        }

        .text-3xl {
            font-size: 1.875rem; /* 30px */
            line-height: 2.25rem; /* 36px */
        }

        .underline {
            text-decoration: underline;
        }

        .italic {
            font-style: italic;
        }

    </style>
</head>

<body style="-webkit-text-size-adjust: none; ">
<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation"
       style="-premailer-width: 100%; padding-bottom: 50px;">
    <tr>
        <td align="center">
            <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation"
                   style="-premailer-width: 100%;">
                <tr>
                    <td class="header" style="padding: 25px 0; text-align: center;">
                        <a href="http://tripleB.test">TripleB</a>
                    </td>
                </tr>

                <!-- Email Body -->
                <tr>
                    <td class="body" width="100%" cellpadding="0" cellspacing="0" style="-premailer-width: 100%;">
                        <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0"
                               role="presentation" style="-premailer-width: 570px;">
                            <!-- Body content -->
                            <tr>
                                <td class="content-cell" style="max-width: 100vw; padding: 32px;">
                                    <h1>Hello! {{ $mailData['title'] }}</h1>
                                    <p>You are invited by <span
                                            class="user">{{ ucfirst( $mailData['invited_by'] ) }}</span> to Join our
                                        website</p>
                                    <p>Please click the button below to verify your email address.</p>
                                    <table class="action" align="center" width="100%" cellpadding="0" cellspacing="0"
                                           role="presentation" style="-premailer-width: 100%;">
                                        <tr>
                                            <td align="center">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                       role="presentation">
                                                    <tr>
                                                        <td align="center"
                                                            style="box-sizing: border-box;  position: relative;">
                                                            <table border="0" cellpadding="0" cellspacing="0"
                                                                   role="presentation">
                                                                <tr>
                                                                    <td>
                                                                        <a href="{{ $mailData['link'] }}" class="button"
                                                                           target="_blank" rel="noopener"
                                                                           style="-webkit-text-size-adjust: none;">Activate
                                                                            Account</a>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <p>Regards,<br><span
                                            class="user">TripleB, {{ ucfirst( $mailData['invited_by'] ) }}</span></p>
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
