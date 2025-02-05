<?php
// Create array of successfull emails to build table
$successTable = '';
foreach ($recipientSent as $recipient) {
    $successTable .= '<tr>
                        <td width="40%">
                            <p style="font-family:arial, sans-serif; font-size:15px; color:#555555; mso-line-height-rule:exactly; line-height:23px; margin-top: 10px; margin-bottom:0px;">' . $recipient['name'] . '</p></td>
                        <td width="60%">
                            <p style="font-family:arial, sans-serif; font-size:15px; color:#555555; mso-line-height-rule:exactly; line-height:23px; margin-top: 10px; margin-bottom:0px;">' . $recipient['email'] . '</p></td>
                        </td>
                    </tr>';
};
// Sucess message html
$successMessage = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html xmlns="http://www.w3.org/1999/xhtml">
                    <head>
                    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                    <title>eCard Send Confirmation</title>
                    <style type="text/css">
                    @media only screen and (max-width: 640px) {
                    table.content {
                        width: 400px !important;
                    }
                    td.header{
                        display: block !important;
                        text-align: center;
                    }
                    }
                    @media only screen and (max-width: 400px) {
                    table#wrapper {
                        padding-top:0px !important;
                    }
                    }
                    </style>
                    </head>
                    <body marginheight="0" marginwidth="0" topmargin="0" bottommargin="0" yahoo="fix" width="100%" style="min-width:100%; width:100%; margin-top:0; margin-bottom:0; margin-left:0; margin-right:0; padding-top:0; padding-left:0; padding-bottom:0; padding-right:0; border:0;">
                    <custom name="opencounter" type="tracking">
                    <table id="wrapper" border="0" cellpadding="0" cellspacing="0" width="100%" height="100%" bgcolor="#e4e4e4" style="background:#e4e4e4; background-color:#e4e4e4; padding-top:30px;">
                        <tr>
                            <td align="center">
                                <!--[if mso]>
                                    <center><table><tr><td width="600">
                                <![endif]-->
                                <table id="content" class="content" border="0" cellpadding="0" cellspacing="0" width="600" bgcolor="#ffffff" style="width:600px; max-width:600px; background:#ffffff; background-color:#ffffff; border-collapse:collapse; border-spacing:0; margin:0; padding:0;">
                                    <tbody>
                                    <!-- LOGO -->
                                    <tr>
                                        <td class="logo" align="left">
                                            <img src="<?php echo $baseURL; ?>images/logo_placeholder.jpg" width="300" height="100" />
                                        </td>
                                    </tr>
                                    <!-- MAIN HEADLINE -->
                                    <tr>
                                        <td class="main" align="left" style="padding-bottom:0px; padding-left:30px; padding-right:30px; padding-top:30px;">
                                            <p style="font-family:arial, sans-serif; font-size:34px; color:#333; mso-line-height-rule:exactly; line-height:30px; margin-top:10px; margin-bottom:0px; margin-left:0; margin-right:0;">eCard(s) sent successfully</p>
                                            <p style="font-family:arial, sans-serif; font-size:13px; color:#999; mso-line-height-rule:exactly; line-height:12px; margin-top:10px; margin-bottom:0px; margin-left:0; margin-right:0; text-transform:uppercase;">' . count($recipientSent) . ' people received your eCard</p>
                                        </td>
                                    </tr>
                                    <!-- RECIPIENTS -->
                                    <tr>
                                        <td class="main" align="left" style="padding-top:0px; padding-left:30px; padding-right:30px; padding-bottom:30px;">
                                        	<p style="font-family:arial, sans-serif; font-size:24px; color:#333; mso-line-height-rule:exactly; line-height:30px; margin-top:10px; margin-bottom:0px; margin-left:0; margin-right:0;">Recipients</p>
                                        	<table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
                                        		<tbody>
                                        			<tr>
                                        				<td width="40%">
                                        					<p style="font-family:arial, sans-serif; font-size:15px; color:#555555; mso-line-height-rule:exactly; line-height:23px; margin-top: 10px; margin-bottom:0px;"><b>Name</b></p></td>
                                        				<td width="60%">
                    										<p style="font-family:arial, sans-serif; font-size:15px; color:#555555; mso-line-height-rule:exactly; line-height:23px; margin-top: 10px; margin-bottom:0px;"><b>Email</b></p></td>
                                        				</td>
                                        			</tr>'
                                        			. $successTable .
                                        		'</tbody>
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


    // Subject
    $successSubject = 'You sent ' . $recipientCount . ' eCard(s)';

    // Send email to Sender
    mail($postData['ecard_message']['from'][0]['email'], $successSubject, $successMessage, $headers);
?>
