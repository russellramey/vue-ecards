<?php
$message = '<html xmlns="http://www.w3.org/1999/xhtml" style="height: 100%;">
            <head>
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>eCard Template</title>
            </head>
            <body marginheight="0" marginwidth="0" topmargin="0" bottommargin="0" yahoo="fix" width="100%" height="100%" style="min-width:100%; width:100%; height:100%; margin-top:0; margin-bottom:0; margin-left:0; margin-right:0; padding-top:0; padding-left:0; padding-bottom:0; padding-right:0; border:0;">
            <custom name="opencounter" type="tracking">
            <table id="wrapper" border="0" cellpadding="0" cellspacing="0" width="100%" height="100%" bgcolor="#e4e4e4" style="background:' . $postData['ecard_color']['background'] . '; background-color:' . $postData['ecard_color']['background'] . '; padding-top:100px; padding-bottom:100px; padding-left:40px; padding-right: 40px;">
                <tr>
                    <td align="center">
                        <!--[if mso]>
                            <center><table><tr><td width="600">
                        <![endif]-->
                <table>
                    <tbody>
                        <tr>
                        <td style="padding-top:4px; padding-left:4px; padding-right:4px; padding-bottom:4px; background: ' . $postData['ecard_color']['shadow'] . '; color:#333;">
                        <table id="content" class="content" border="0" cellpadding="0" cellspacing="0" width="768px" bgcolor="#ffffff" style="width:768px; max-width:768px; background:#ffffff; background-color:#ffffff; border-collapse:collapse; border-spacing:0; margin:0; padding:0; ">
                            <tbody>
                                <tr>
                                    <td colspan="3" align="center">
                                        <img src="' . $baseURL . $postData['ecard_design']['image'] .'" style="display: block;">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="center" style="padding-top: 20px;">
                                        <p style="font-family: sans-serif; font-size: 36px; font-weight: lighter; margin: 0; color:' . $postData['ecard_color']['background'] . ';">' . $postData['ecard_message']['greeting'] .'<p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="left" style="padding-right: 50px; padding-left: 50px; padding-top: 20px; padding-bottom:20px;">
                                        <p style="font-family: sans-serif; font-size: 17px; line-height:21px; font-weight: lighter; margin: 0; margin-bottom:15px;">' . $recipient['name'] . ', </p>
                                        <p style="font-family: sans-serif; font-size: 17px; line-height:21px; font-weight: lighter; margin: 0;">' . $postData['ecard_message']['comments'] . '</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-right: 50px; padding-left: 50px; padding-top: 20px; padding-bottom:20px;">
                                        <p style="font-family: sans-serif; font-size: 14px; line-height:21px; font-weight: lighter; margin: 0;">Sent by: ' . $postData['ecard_message']['from'][0]['name'] . ' <br /><span>' . $postData['date'] .'</span></p>
                                    </td>
                                    <td></td>
                                    <td align="right" style="padding-right: 50px; padding-left: 50px; padding-top: 20px; padding-bottom:20px;">
                                        <img src="' . $baseURL . 'logo_placeholder.jpg" width="140" height="50" style="display: block;">
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20" colspan="3"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    </tr>
                    </tbody>
                </table>
                        <!--[if mso]>
                            </td></tr></table></center>
                        <![endif]-->
                    </td>
                </tr>
            </table>
            </body>
            </html>';
?>
