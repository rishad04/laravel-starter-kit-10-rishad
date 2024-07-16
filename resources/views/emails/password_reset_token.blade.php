<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ___('Password Reset Token') }}</title>
    <style>
        body {
            background-color: aliceblue;
            color: #8094ae;
        }

        a {
            color: #593BDB;
        }

        ul {
            display: inline-block;
            text-align: center;
            overflow: hidden;
            padding-left: 0px;
            margin-bottom: 0px !important;
        }

        ul li {
            float: left;
            list-style: none;
            padding: 5px;
        }

        ul li a {
            cursor: pointer;
            display: block;
        }

    </style>
</head>
<body style="margin: 10;">

    <table style="width:100%;height:50px;max-width:650px;margin: auto;">
        <tr>
            <td style="text-align: center;padding:30px 10px">
                <a href="{{ url('/') }}"><img src="{{ getImage(globalSettings('logo')) }}" style="height: 50px;" /></a>
            </td>
        </tr>
    </table>
    <table style="width:100%;height:50px;max-width:650px;margin: auto;background-color: white;">
        <tr>
            <td style="padding:30px;line-height: 1.5;" colspan="2">
                <p>Hi <b style="font-style: italic;">{{ @$user->name }}</b>,</p>
                {{-- <p>Thank you for joning with {{ @globalSettings('brand_name') }}.</p> --}}
                <p>Your Password Reset Token is <b style="font-style: italic;">{{ @$user->token }}</b></p>
                <p>Hope you'll enjoy the experience, we're here if you have any questions, drop us a line at <a href="mailto:{{ @globalSettings('info_email') }}">{{ @globalSettings('brand_name') }}</a> or {{ @globalSettings('brand_phone') }} anytime.</p>
            </td>
        </tr>

    </table>
    <table style="width:100%;height:50px;max-width:650px;margin: auto; ">
        <tr>
            <td style="text-align: center;">
                <ul>
                    <li> <a> <img src="{{ static_asset('backend/images/social-media') }}/brand-b.png" style="width: 30px;" /> </a> </li>
                    <li> <a> <img src="{{ static_asset('backend/images/social-media') }}/brand-c.png" style="width: 30px;" /> </a> </li>
                    <li> <a> <img src="{{ static_asset('backend/images/social-media') }}/brand-d.png" style="width: 30px;" /> </a> </li>
                    <li> <a> <img src="{{ static_asset('backend/images/social-media') }}/brand-e.png" style="width: 30px;" /> </a> </li>
                </ul>
            </td>
        </tr>
        <tr>
            <td style="padding:0px 30px;text-align: center;">
                <p style="font-size: 13px;"> {{ @globalSettings('copyright') }} </p>
            </td>
        </tr>
    </table>
</body>
</html>
