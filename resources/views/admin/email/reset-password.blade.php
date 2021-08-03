<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">


<head>
    <title>{{env('APP_NAME')}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  General CSS  -->
    <style>
    /* latin-ext */
    

    @font-face {
        font-family: 'Oxygen';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/oxygen/v10/2sDfZG1Wl4LcnbuKgE0mV0Q.woff2) format('woff2');
        unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }

    /* latin */
    @font-face {
        font-family: 'Oxygen';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/oxygen/v10/2sDfZG1Wl4LcnbuKjk0m.woff2) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }

    /* latin-ext */
    @font-face {
        font-family: 'Oxygen';
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/oxygen/v10/2sDcZG1Wl4LcnbuCNWgzZmW5O7w.woff2) format('woff2');
        unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }

    /* latin */
    @font-face {
        font-family: 'Oxygen';
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/oxygen/v10/2sDcZG1Wl4LcnbuCNWgzaGW5.woff2) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }

    .ff-secondary {
        font-family: 'Oxygen', sans-serif;
    }

    .btn-primary {
            color: #fff;
            background: #2196f3 !important;
            border-color: #2196f3 !important;
        }

        [type="button"]:not(:disabled), [type="reset"]:not(:disabled), [type="submit"]:not(:disabled), button:not(:disabled) {
            cursor: pointer;
        }
        .btn {
        position: relative;
        display: inline-block;
        font-weight: 500;
        background: transparent;
        border: 1px solid transparent;
        text-align: center;
        vertical-align: middle;
        user-select: none;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.35rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        a.btn {
            text-decoration: none !important;
            color: #fff !important;
        }
    </style>

</head>


<body
    style="font-family: 'Oxygen', sans-serif; margin: 0;  width: 100%; -webkit-text-size-adjust: none; -webkit-font-smoothing: antialiased;">
    <style type="text/css">
    p {
        font-family: 'Oxygen', sans-serif;
        font-weight: 300;
        font-size: 15px;
        line-height: 26px;
        color: #000;

    }
    </style>
    <table width="100%" bgcolor="#fff" border="0" cellspacing="0" cellpadding="0"
        style="height: 100% !important; margin: 0; padding-top: 30px;padding-bottom: 30px; width: 100% !important;">
        <tr>
            <td align="center" valign="top">
                <!-- banner-sec -->
                <table border="0" bgcolor="#EDFAFD" width="600" cellspacing="0"
                    style="padding: 0px 30px 0px;max-width: 600px;border: 1px solid #ececec;border-bottom: none;">
                    <tr>
                        <td valign="top">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td valign="center" style="padding: 1.5rem 0.5rem;">
                                        <div class="content" style="width: 100%;">
                                            <img src="{{ asset('assets/images/logo.png') }}"
                                                style="width: 113px;" alt="">

                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                <!-- banner-sec -->


                <table style="width:100%;max-width: 600px; min-width: 600px;border-collapse: collapse;margin: 0px;box-sizing: border-box;padding: 0px;color:#000;">
                    <tbody>
                        <tr>
                            <td height="20">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <!-- <td bgcolor="#FFFFFF" height="32">&nbsp;</td> -->
                            <td colspan="3" bgcolor="#FFFFFF">
                                <div>
                                    <h2 style="color: #000; font-weight: normal; font-size: 16px;padding-bottom:5px;line-height:1.6;">
                                        Hi <strong>{{ $name }} </strong>,
                                    </h2>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <!-- <td bgcolor="#FFFFFF" height="32">&nbsp;</td> -->
                            <td colspan="3" bgcolor="#FFFFFF">
                                <div style="color: #333; font-size: 15px;padding-bottom:15px;line-height:1.6;">
                                    <p>If you have lost your password or wish to reset it,
                                     use the link below to get started. </p>
                                    
                                   
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" bgcolor="#FFFFFF" style="text-align: center;">
                                <div style="color: #333; font-size: 15px;padding-bottom:15px;line-height:1.6;">
                                <a href="{{$url}}" class="btn btn-primary" > Reset My Password</a>
                                </div>
                            </td>
                        </tr>
                       <tr>
                           <td>
                                Regards
                           </td>
                       </tr>
                        <tr>
                            <td>{{env('APP_NAME')}} Team</td>
                        </tr>
                        
                    </tbody>
                </table>

                <!-- // END #footer_container -->
            </td>
        </tr>
    </table>
    <!-- // END #background -->
</body>

</body>

</html>