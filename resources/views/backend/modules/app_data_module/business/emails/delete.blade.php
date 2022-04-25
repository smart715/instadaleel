<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
     <meta charset="UTF-8">
     <meta content="width=device-width, initial-scale=1" name="viewport">
     <meta name="x-apple-disable-message-reformatting">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta content="telephone=no" name="format-detection">
     <title></title>
     <!--[if (mso 16)]>
    <style type="text/css">
    a {text-decoration: none;}
    </style>
    <![endif]-->
     <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
     <!--[if gte mso 9]>
<xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG></o:AllowPNG>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
</xml>
<![endif]-->
</head>

<body>
     <div class="es-wrapper-color">
          <!--[if gte mso 9]>
			<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
				<v:fill type="tile" color="#f6f6f6"></v:fill>
			</v:background>
		<![endif]-->
          <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="background: #ededed;padding: 15px;">
               <tbody>
                    <tr>
                         <td class="esd-email-paddings" valign="top">
                              
                              
                              <table class="es-content" cellspacing="0" cellpadding="0" align="center" >
                                   <tbody>
                                        <tr>
                                             <td class="esd-stripe" align="center">
                                                  <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                                       <tbody>
                                                            <tr>
                                                                 <td class="esd-structure es-p20t es-p20r es-p20l" align="left" bgcolor="#ffffff" style="background-color: #ffffff;">
                                                                      <table cellpadding="0" cellspacing="0" width="100%">
                                                                           <tbody>
                                                                                <tr>
                                                                                     <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                                          <table cellpadding="0" cellspacing="0" width="100%">
                                                                                               <tbody>
                                                                                                    <tr>
                                                                                                         <td style="padding: 15px;">
                                                                                                              @if($app_info)
                                                                                                              <img src="{{ asset('images/info/'.$app_info->logo) }}" style="
                                                                                                                   display: block;
                                                                                                                   margin: 0 auto;
                                                                                                                   width: 100px
                                                                                                              " alt="Logo">
                                                                                                              @endif
                                                                                                         </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                         <td style="padding: 15px;">
                                                                                                              <p style="text-align: center;;">Your business deleted by admin</p>
                                                                                                         </td>
                                                                                                    </tr>
                                                                                               </tbody>
                                                                                          </table>
                                                                                     </td>
                                                                                </tr>
                                                                           </tbody>
                                                                      </table>
                                                                 </td>
                                                            </tr>
                                                       </tbody>
                                                  </table>
                                             </td>
                                        </tr>
                                   </tbody>
                              </table>

                              <table class="es-content" cellspacing="0" cellpadding="0" align="center" >
                                   <tbody>
                                        <tr>
                                             <td class="esd-stripe" align="center">
                                                  <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="padding: 15px;">
                                                       <tbody>
                                                            <tr>
                                                                 <td class="esd-structure es-p20t es-p20r es-p20l" align="left" bgcolor="#ffffff" style="background-color: #ffffff;">
                                                                      <table cellpadding="0" cellspacing="0" width="100%">
                                                                           <tbody>
                                                                                <tr>
                                                                                     <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                                          <table cellpadding="0" cellspacing="0" width="100%">
                                                                                               <tbody>
                                                                                                    <tr style="border: 1px solid black;">
                                                                                                         <td style="padding: 15px; text-align: center; border: 1px solid black">Business Name</td>
                                                                                                         <td style="padding: 15px; text-align: center; border: 1px solid black">
                                                                                                              {{ $business->name }}
                                                                                                         </td>
                                                                                                    </tr>
                                                                                                    <tr style="border: 1px solid black;">
                                                                                                         <td style="padding: 15px; text-align: center; border: 1px solid black">Business Code</td>
                                                                                                         <td style="padding: 15px; text-align: center; border: 1px solid black">
                                                                                                              {{ $business->code }}
                                                                                                         </td>
                                                                                                    </tr>
                                                                                                    <tr style="border: 1px solid black;">
                                                                                                         <td style="padding: 15px; text-align: center; border: 1px solid black">Active Status</td>
                                                                                                         <td style="padding: 15px; text-align: center; border: 1px solid black">
                                                                                                              {{ $business->is_active ? 'Active' : 'Inactive' }}
                                                                                                         </td>
                                                                                                    </tr>
                                                                                                    <tr style="border: 1px solid black;">
                                                                                                         <td style="padding: 15px; text-align: center; border: 1px solid black">Approval Status</td>
                                                                                                         <td style="padding: 15px; text-align: center; border: 1px solid black">
                                                                                                              {{ $business->is_pinned ? 'Pinned' : 'Not Pinned' }}
                                                                                                         </td>
                                                                                                    </tr>
                                                                                                    <tr style="border: 1px solid black;">
                                                                                                         <td style="padding: 15px; text-align: center; border: 1px solid black">Status</td>
                                                                                                         <td style="padding: 15px; text-align: center; border: 1px solid black">
                                                                                                              {{ $business->status }}
                                                                                                         </td>
                                                                                                    </tr>
                                                                                               </tbody>
                                                                                          </table>
                                                                                     </td>
                                                                                </tr>
                                                                           </tbody>
                                                                      </table>
                                                                 </td>
                                                            </tr>
                                                       </tbody>
                                                  </table>
                                             </td>
                                        </tr>
                                   </tbody>
                              </table>
                              <table cellpadding="0" cellspacing="0" class="es-footer esd-footer-popover" align="center" >
                                   <tbody>
                                        <tr>
                                             <td class="esd-stripe" align="center" esd-custom-block-id="88839">
                                                  <table bgcolor="#ffffff" class="es-footer-body" align="center" cellpadding="0" cellspacing="0" width="600">
                                                       <tbody>
                                                            <tr>
                                                                 <td class="esd-structure" align="left">
                                                                      <table cellpadding="0" cellspacing="0" width="100%">
                                                                           <tbody>
                                                                                <tr>
                                                                                     <td width="600" class="esd-container-frame" align="center" valign="top">
                                                                                          <table cellpadding="0" cellspacing="0" width="100%">
                                                                                               <tbody>
                                                                                                    <tr>
                                                                                                         <td align="center" class="esd-block-spacer es-p5t es-p5b" style="font-size:0">
                                                                                                              <table border="0" width="95%" height="100%" cellpadding="0" cellspacing="0">
                                                                                                                   <tbody>
                                                                                                                        <tr>
                                                                                                                             <td style="border-bottom: 1px solid #cccccc; background:none; height:1px; width:100%; margin:0px 0px 0px 0px;"></td>
                                                                                                                        </tr>
                                                                                                                   </tbody>
                                                                                                              </table>
                                                                                                         </td>
                                                                                                    </tr>
                                                                                               </tbody>
                                                                                          </table>
                                                                                     </td>
                                                                                </tr>
                                                                           </tbody>
                                                                      </table>
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                                 <td class="esd-structure" align="left">
                                                                      <table cellpadding="0" cellspacing="0" width="100%">
                                                                           <tbody>
                                                                                <tr>
                                                                                     <td width="600" class="esd-container-frame" align="center" valign="top">
                                                                                          <table cellpadding="0" cellspacing="0" width="100%">
                                                                                               <tbody>
                                                                                                    <tr>
                                                                                                         <td align="center" class="esd-block-spacer es-p5t es-p5b" style="font-size:0">
                                                                                                              <table border="0" width="95%" height="100%" cellpadding="0" cellspacing="0">
                                                                                                                   <tbody>
                                                                                                                        <tr>
                                                                                                                             <td style="border-bottom: 1px solid #cccccc; background:none; height:1px; width:100%; margin:0px 0px 0px 0px;"></td>
                                                                                                                        </tr>
                                                                                                                   </tbody>
                                                                                                              </table>
                                                                                                         </td>
                                                                                                    </tr>
                                                                                               </tbody>
                                                                                          </table>
                                                                                     </td>
                                                                                </tr>
                                                                           </tbody>
                                                                      </table>
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                                 <td class="esd-structure es-p15b es-p20r es-p20l" align="left">
                                                                      <table cellpadding="0" cellspacing="0" width="100%">
                                                                           <tbody>
                                                                                <tr>
                                                                                     <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                                          <table cellpadding="0" cellspacing="0" width="100%">
                                                                                               <tbody>
                                                                                                    <tr>
                                                                                                         <td align="center" class="esd-block-social es-p15t es-p20b" style="font-size:0">
                                                                                                              <table cellpadding="0" cellspacing="0" class="es-table-not-adapt es-social">
                                                                                                                   <tbody>
                                                                                                                        <tr>
                                                                                                                             <td style="padding: 15px;" align="center" valign="top" class="es-p10r"><a target="_blank" href="#"><img src="https://tlr.stripocdn.email/content/assets/img/social-icons/logo-black/facebook-logo-black.png" alt="Fb" title="Facebook" width="32"></a></td>
                                                                                                                             <td style="padding: 15px;" align="center" valign="top" class="es-p10r"><a target="_blank" href="#"><img src="https://tlr.stripocdn.email/content/assets/img/social-icons/logo-black/twitter-logo-black.png" alt="Ig" title="Instagram" width="32"></a></td>
                                                                                                                             <td style="padding: 15px;" align="center" valign="top"><a target="_blank" href="#"><img src="https://tlr.stripocdn.email/content/assets/img/social-icons/logo-black/linkedin-logo-black.png" alt="P" title="Pinterest" width="32"></a></td>
                                                                                                                        </tr>
                                                                                                                   </tbody>
                                                                                                              </table>
                                                                                                         </td>
                                                                                                    </tr>
                                                                                               </tbody>
                                                                                          </table>
                                                                                     </td>
                                                                                </tr>
                                                                           </tbody>
                                                                      </table>
                                                                 </td>
                                                            </tr>
                                                       </tbody>
                                                  </table>
                                             </td>
                                        </tr>
                                   </tbody>
                              </table>
                         </td>
                    </tr>
               </tbody>
          </table>
     </div>
</body>

</html>