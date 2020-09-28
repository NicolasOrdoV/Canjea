<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


class UserController
{
    static public function registerUser($data)
    {
        if (filter_var($data['Correo'], FILTER_VALIDATE_EMAIL ) && 
        preg_match ('/^[0-9]+$/',$data['Celular']) &&
        preg_match ('/^[a-zA-ZáéíóúÁÉÍÓÚÑñ ]+$/',$data['Nombre']) &&
        preg_match ('/^[a-zA-ZáéíóúÁÉÍÓÚÑñ ]+$/',$data['Apellido'])) {
                
            $table = 'usuario';
            $data['Contrasena'] = hash('sha256',$data['Contrasena']);
            $dates = [
                'Nombre' => $data['Nombre'],
                'Apellido' => $data['Apellido'],
                'Correo' => $data['Correo'],
                'Contrasena' => $data['Contrasena'],
                'Direccion' => $data['Direccion'],
                'FechaNacimiento' => $data['FechaNacimiento'],
                'Genero' => $data['Genero'],
                'Celular' => $data['Celular'],
                'Estado' => 'Activo',
                'IdRol' => 2,
                'Id_barrio' => $data['Id_barrio']
            ];
            $answer = User::save($table,$dates);
            return $answer;
        }else {
            $answer = "error";
            return $answer;
        }
    }
     
    //Metodo para Enviar Correo
    static public function sendEmail($data){
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0 ;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'canjea.co@gmail.com';                     // SMTP username
            $mail->Password   = 'Int3rc@mb1ar';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients
            $mail->setFrom('canjea.co@gmail.com');
            $mail->addAddress($data['Correo']);     // Add a recipient
        
    
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Usuario Registrado';
            $mail->Body    = '<!DOCTYPE html>
            <html lang="en" >
            <head>
              <meta charset="UTF-8">
              <title>CodePen - Welcome Mail Kısa</title>
              
            
            </head>
            <body>
            <!-- partial:index.partial.html -->
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=US-ASCII">
                <meta name="viewport" content="width=device-width">
            
                
              </head>
            
              <body style="-moz-box-sizing: border-box; -ms-text-size-adjust: 100%; -webkit-box-sizing: border-box; -webkit-text-size-adjust: 100%; box-sizing: border-box; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 22px; margin: 0; min-width: 100%; padding: 0; text-align: left; width: 100% !important"><style type="text/css">
            body {
            width: 100% !important; min-width: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; margin: 0; padding: 0; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
            }
            .ExternalClass {
            width: 100%;
            }
            .ExternalClass {
            line-height: 100%;
            }
            #backgroundTable {
            margin: 0; padding: 0; width: 100% !important; line-height: 100% !important;
            }
            img {
            outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; clear: both; display: block;
            }
            body {
            color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-weight: normal; padding: 0; margin: 0; text-align: left; line-height: 1.3;
            }
            body {
            font-size: 16px; line-height: 1.3;
            }
            a:hover {
            color: #1f54ed;
            }
            a:active {
            color: #1f54ed;
            }
            a:visited {
            color:  #EF7F1A;
            }
            h1 a:visited {
            color:  #EF7F1A;
            }
            h2 a:visited {
            color:  #EF7F1A;
            }
            h3 a:visited {
            color:  #EF7F1A;
            }
            h4 a:visited {
            color:  #EF7F1A;
            }
            h5 a:visited {
            color:  #EF7F1A;
            }
            h6 a:visited {
            color:  #EF7F1A;
            }
            table.button:hover table tr td a {
            color: #FFFFFF;
            }
            table.button:active table tr td a {
            color: #FFFFFF;
            }
            table.button table tr td a:visited {
            color: #FFFFFF;
            }
            table.button.tiny:hover table tr td a {
            color: #FFFFFF;
            }
            table.button.tiny:active table tr td a {
            color: #FFFFFF;
            }
            table.button.tiny table tr td a:visited {
            color: #FFFFFF;
            }
            table.button.small:hover table tr td a {
            color: #FFFFFF;
            }
            table.button.small:active table tr td a {
            color: #FFFFFF;
            }
            table.button.small table tr td a:visited {
            color: #FFFFFF;
            }
            table.button.large:hover table tr td a {
            color: #FFFFFF;
            }
            table.button.large:active table tr td a {
            color: #FFFFFF;
            }
            table.button.large table tr td a:visited {
            color: #FFFFFF;
            }
            table.button:hover table td {
            background: #1f54ed; color: #FFFFFF;
            }
            table.button:visited table td {
            background: #1f54ed; color: #FFFFFF;
            }
            table.button:active table td {
            background: #1f54ed; color: #FFFFFF;
            }
            table.button:hover table a {
            border: 0 solid #1f54ed;
            }
            table.button:visited table a {
            border: 0 solid #1f54ed;
            }
            table.button:active table a {
            border: 0 solid #1f54ed;
            }
            table.button.secondary:hover table td {
            background: #fefefe; color: #FFFFFF;
            }
            table.button.secondary:hover table a {
            border: 0 solid #fefefe;
            }
            table.button.secondary:hover table td a {
            color: #FFFFFF;
            }
            table.button.secondary:active table td a {
            color: #FFFFFF;
            }
            table.button.secondary table td a:visited {
            color: #FFFFFF;
            }
            table.button.success:hover table td {
            background: #009482;
            }
            table.button.success:hover table a {
            border: 0 solid #009482;
            }
            table.button.alert:hover table td {
            background: #ff6131;
            }
            table.button.alert:hover table a {
            border: 0 solid #ff6131;
            }
            table.button.warning:hover table td {
            background: #fcae1a;
            }
            table.button.warning:hover table a {
            border: 0px solid #fcae1a;
            }
            .thumbnail:hover {
            box-shadow: 0 0 6px 1px rgba(78,120,241,0.5);
            }
            .thumbnail:focus {
            box-shadow: 0 0 6px 1px rgba(78,120,241,0.5);
            }
            body.outlook p {
            display: inline !important;
            }
            body {
            font-weight: normal; font-size: 16px; line-height: 22px;
            }
            @media only screen and (max-width: 596px) {
              .small-float-center {
                margin: 0 auto !important; float: none !important; text-align: center !important;
              }
              .small-text-center {
                text-align: center !important;
              }
              .small-text-left {
                text-align: left !important;
              }
              .small-text-right {
                text-align: right !important;
              }
              .hide-for-large {
                display: block !important; width: auto !important; overflow: visible !important; max-height: none !important; font-size: inherit !important; line-height: inherit !important;
              }
              table.body table.container .hide-for-large {
                display: table !important; width: 100% !important;
              }
              table.body table.container .row.hide-for-large {
                display: table !important; width: 100% !important;
              }
              table.body table.container .callout-inner.hide-for-large {
                display: table-cell !important; width: 100% !important;
              }
              table.body table.container .show-for-large {
                display: none !important; width: 0; mso-hide: all; overflow: hidden;
              }
              table.body img {
                width: auto; height: auto;
              }
              table.body center {
                min-width: 0 !important;
              }
              table.body .container {
                width: 95% !important;
              }
              table.body .columns {
                height: auto !important; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; padding-left: 16px !important; padding-right: 16px !important;
              }
              table.body .column {
                height: auto !important; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; padding-left: 16px !important; padding-right: 16px !important;
              }
              table.body .columns .column {
                padding-left: 0 !important; padding-right: 0 !important;
              }
              table.body .columns .columns {
                padding-left: 0 !important; padding-right: 0 !important;
              }
              table.body .column .column {
                padding-left: 0 !important; padding-right: 0 !important;
              }
              table.body .column .columns {
                padding-left: 0 !important; padding-right: 0 !important;
              }
              table.body .collapse .columns {
                padding-left: 0 !important; padding-right: 0 !important;
              }
              table.body .collapse .column {
                padding-left: 0 !important; padding-right: 0 !important;
              }
              td.small-1 {
                display: inline-block !important; width: 8.333333% !important;
              }
              th.small-1 {
                display: inline-block !important; width: 8.333333% !important;
              }
              td.small-2 {
                display: inline-block !important; width: 16.666666% !important;
              }
              th.small-2 {
                display: inline-block !important; width: 16.666666% !important;
              }
              td.small-3 {
                display: inline-block !important; width: 25% !important;
              }
              th.small-3 {
                display: inline-block !important; width: 25% !important;
              }
              td.small-4 {
                display: inline-block !important; width: 33.333333% !important;
              }
              th.small-4 {
                display: inline-block !important; width: 33.333333% !important;
              }
              td.small-5 {
                display: inline-block !important; width: 41.666666% !important;
              }
              th.small-5 {
                display: inline-block !important; width: 41.666666% !important;
              }
              td.small-6 {
                display: inline-block !important; width: 50% !important;
              }
              th.small-6 {
                display: inline-block !important; width: 50% !important;
              }
              td.small-7 {
                display: inline-block !important; width: 58.333333% !important;
              }
              th.small-7 {
                display: inline-block !important; width: 58.333333% !important;
              }
              td.small-8 {
                display: inline-block !important; width: 66.666666% !important;
              }
              th.small-8 {
                display: inline-block !important; width: 66.666666% !important;
              }
              td.small-9 {
                display: inline-block !important; width: 75% !important;
              }
              th.small-9 {
                display: inline-block !important; width: 75% !important;
              }
              td.small-10 {
                display: inline-block !important; width: 83.333333% !important;
              }
              th.small-10 {
                display: inline-block !important; width: 83.333333% !important;
              }
              td.small-11 {
                display: inline-block !important; width: 91.666666% !important;
              }
              th.small-11 {
                display: inline-block !important; width: 91.666666% !important;
              }
              td.small-12 {
                display: inline-block !important; width: 100% !important;
              }
              th.small-12 {
                display: inline-block !important; width: 100% !important;
              }
              .columns td.small-12 {
                display: block !important; width: 100% !important;
              }
              .column td.small-12 {
                display: block !important; width: 100% !important;
              }
              .columns th.small-12 {
                display: block !important; width: 100% !important;
              }
              .column th.small-12 {
                display: block !important; width: 100% !important;
              }
              table.body td.small-offset-1 {
                margin-left: 8.333333% !important;
              }
              table.body th.small-offset-1 {
                margin-left: 8.333333% !important;
              }
              table.body td.small-offset-2 {
                margin-left: 16.666666% !important;
              }
              table.body th.small-offset-2 {
                margin-left: 16.666666% !important;
              }
              table.body td.small-offset-3 {
                margin-left: 25% !important;
              }
              table.body th.small-offset-3 {
                margin-left: 25% !important;
              }
              table.body td.small-offset-4 {
                margin-left: 33.333333% !important;
              }
              table.body th.small-offset-4 {
                margin-left: 33.333333% !important;
              }
              table.body td.small-offset-5 {
                margin-left: 41.666666% !important;
              }
              table.body th.small-offset-5 {
                margin-left: 41.666666% !important;
              }
              table.body td.small-offset-6 {
                margin-left: 50% !important;
              }
              table.body th.small-offset-6 {
                margin-left: 50% !important;
              }
              table.body td.small-offset-7 {
                margin-left: 58.333333% !important;
              }
              table.body th.small-offset-7 {
                margin-left: 58.333333% !important;
              }
              table.body td.small-offset-8 {
                margin-left: 66.666666% !important;
              }
              table.body th.small-offset-8 {
                margin-left: 66.666666% !important;
              }
              table.body td.small-offset-9 {
                margin-left: 75% !important;
              }
              table.body th.small-offset-9 {
                margin-left: 75% !important;
              }
              table.body td.small-offset-10 {
                margin-left: 83.333333% !important;
              }
              table.body th.small-offset-10 {
                margin-left: 83.333333% !important;
              }
              table.body td.small-offset-11 {
                margin-left: 91.666666% !important;
              }
              table.body th.small-offset-11 {
                margin-left: 91.666666% !important;
              }
              table.body table.columns td.expander {
                display: none !important;
              }
              table.body table.columns th.expander {
                display: none !important;
              }
              table.body .right-text-pad {
                padding-left: 10px !important;
              }
              table.body .text-pad-right {
                padding-left: 10px !important;
              }
              table.body .left-text-pad {
                padding-right: 10px !important;
              }
              table.body .text-pad-left {
                padding-right: 10px !important;
              }
              table.menu {
                width: 100% !important;
              }
              table.menu td {
                width: auto !important; display: inline-block !important;
              }
              table.menu th {
                width: auto !important; display: inline-block !important;
              }
              table.menu.vertical td {
                display: block !important;
              }
              table.menu.vertical th {
                display: block !important;
              }
              table.menu.small-vertical td {
                display: block !important;
              }
              table.menu.small-vertical th {
                display: block !important;
              }
              table.menu[align="center"] {
                width: auto !important;
              }
              table.button.small-expand {
                width: 100% !important;
              }
              table.button.small-expanded {
                width: 100% !important;
              }
              table.button.small-expand table {
                width: 100%;
              }
              table.button.small-expanded table {
                width: 100%;
              }
              table.button.small-expand table a {
                text-align: center !important; width: 100% !important; padding-left: 0 !important; padding-right: 0 !important;
              }
              table.button.small-expanded table a {
                text-align: center !important; width: 100% !important; padding-left: 0 !important; padding-right: 0 !important;
              }
              table.button.small-expand center {
                min-width: 0;
              }
              table.button.small-expanded center {
                min-width: 0;
              }
              table.body .container {
                width: 100% !important;
              }
            }
            @media only screen and (min-width: 732px) {
              table.body table.milkyway-email-card {
                width: 525px !important;
              }
              table.body table.emailer-footer {
                width: 525px !important;
              }
            }
            @media only screen and (max-width: 731px) {
              table.body table.milkyway-email-card {
                width: 320px !important;
              }
              table.body table.emailer-footer {
                width: 320px !important;
              }
            }
            @media only screen and (max-width: 320px) {
              table.body table.milkyway-email-card {
                width: 100% !important; border-radius: 0; box-sizing: none;
              }
              table.body table.emailer-footer {
                width: 100% !important; border-radius: 0; box-sizing: none;
              }
            }
            @media only screen and (max-width: 280px) {
              table.body table.milkyway-email-card .milkyway-content {
                width: 100% !important;
              }
            }
            @media (min-width: 596px) {
              .milkyway-header {
                width: 11%;
              }
            }
            @media (max-width: 596px) {
              .milkyway-header {
                width: 50%;
              }
              .emailer-footer .emailer-border-bottom {
                border-bottom: 0.5px solid #E2E5E7;
              }
              .emailer-footer .make-you-smile {
                margin-top: 24px;
              }
              .emailer-footer .make-you-smile .email-tag-line {
                width: 80%; position: relative; left: 10%;
              }
              .emailer-footer .make-you-smile .universe-address {
                margin-bottom: 10px !important;
              }
              .emailer-footer .make-you-smile .email-tag-line {
                margin-bottom: 10px !important;
              }
              .have-questions-text {
                width: 70%;
              }
              .hide-on-small {
                display: none;
              }
              .product-card-stacked-row .thumbnail-image {
                max-width: 32% !important;
              }
              .product-card-stacked-row .thumbnail-content p {
                width: 64%;
              }
              .welcome-subcontent {
                text-align: left; margin: 20px 0 10px;
              }
              .milkyway-title {
                padding: 16px;
              }
              .meta-data {
                text-align: center;
              }
              .label {
                text-align: center;
              }
              .welcome-email .wavey-background-subcontent {
                width: calc(100% - 32px);
              }
            }
            @media (min-width: 597px) {
              .emailer-footer .show-on-mobile {
                display: none;
              }
              .emailer-footer .emailer-border-bottom {
                border-bottom: none;
              }
              .have-questions-text {
                border-bottom: none;
              }
              .hide-on-large {
                display: none;
              }
              .milkyway-title {
                padding: 55px 55px 16px;
              }
            }
            @media only screen and (max-width: 290px) {
              table.container.your-tickets .tickets-container {
                width: 100%;
              }
            }
            </style>
                <table class="body" data-made-with-foundation="" style="background: #FAFAFA; border-collapse: collapse; border-spacing: 0; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; height: 100%; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 100%" bgcolor="#FAFAFA">
                  <tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                    <td class="center" align="center" valign="top" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word">
                      <center style="min-width: 580px; width: 100%">
                        <table class=" spacer  float-center" align="center" style="border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="20px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: normal; hyphens: auto; line-height: 20px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
                        <table class="header-spacer spacer  float-center" align="center" style="border-collapse: collapse; border-spacing: 0; float: none; line-height: 60px; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="16px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
            
            <table class="header-spacer-bottom spacer  float-center" align="center" style="border-collapse: collapse; border-spacing: 0; float: none; line-height: 30px; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="16px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
            
                        <table class="milkyway-email-card container float-center" align="center" style="background: #FFFFFF; border-collapse: collapse; border-radius: 6px; border-spacing: 0; box-shadow: 0 1px 8px 0 rgba(28,35,43,0.15); float: none; margin: 0 auto; overflow: hidden; padding: 0; text-align: center; vertical-align: top; width: 580px" bgcolor="#FFFFFF"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">
                          
                          <table class="milkyway-content welcome-email container" align="center" style="background: #FFFFFF; border-collapse: collapse; border-spacing: 0; hyphens: none; margin: auto; max-width: 100%; padding: 0; text-align: inherit; vertical-align: top; width: 280px !important" bgcolor="#FFFFFF"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">
            <table class=" spacer " style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="50px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 50px; font-weight: normal; hyphens: auto; line-height: 50px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
            <table class=" row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
            <th class=" small-12 large-12 columns first last" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
            <center style="min-width: 0; width: 100%">
            
            <img width="250" src="http://imgfz.com/i/V46MxEh.png" align="center" class=" float-center float-center float-center" style="-ms-interpolation-mode: bicubic; clear: both; display: block; float: none; margin: 0 auto; max-width: 100%; outline: none; text-align: center; text-decoration: none; width: auto">
              
            </center>
             
            </th>
            <th class="expander" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0" align="left"></th>
            </tr></tbody></table></th>
            </tr></tbody></table>
            
            <table class="milkyway-content row" style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 280px !important"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
              <th class=" small-12 large-12 columns first last" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
                <h1 class="welcome-header" style="color: inherit; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 600; hyphens: none; line-height: 30px; margin: 0 0 24px; padding: 0; text-align: left; width: 100%; word-wrap: normal" align="left">¡Cuenta Registrada! </h1>
                <h2 class="welcome-subcontent" style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 300; line-height: 22px; margin: 0; padding: 0; text-align: center; width: 100%; word-wrap: normal" align="left"><p>Recuerda tu Usuario : '.$data['Correo'].'</p><p>Recuerda tu contraseña:'.$data['Contrasena'].'</h2>
              </th>
            <th class="expander" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0" align="left"></th>
            </tr></tbody></table></th>
            </tr></tbody></table>
            
            <table class=" spacer " style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="30px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 30px; font-weight: normal; hyphens: auto; line-height: 30px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
            <table class="milkyway-content wrapper" align="center" style="border-collapse: collapse; border-spacing: 0; hyphens: none; margin: auto; max-width: 100%; padding: 0; text-align: left; vertical-align: top; width: 280px !important"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td class="wrapper-inner" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top"></td></tr></tbody></table>
            <table class="milkyway-content row" style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 280px !important"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
            <th class="milkyway-padding small-12 large-12 columns first last" valign="middle" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
            <table class="cta-text primary radius expanded button" style="border-collapse: collapse; border-spacing: 0; font-size: 14px; font-weight: 400; line-height: 0; margin: 0 0 16px; padding: 0; text-align: left; vertical-align: top; width: 100% !important"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; background: #ef7f1a; border: 2px none  #ef7f1a; border-collapse: collapse !important; border-radius: 6px; color: #FFFFFF; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" bgcolor=" #EF7F1A" valign="top"><a href="http://localhost/Canjea/index.php?pagesUser=loginUser" style="border: 0 solid #ef7f1a; border-radius: 6px; color: #FFFFFF; display: inline-block; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: bold; line-height: 1.3; margin: 0; padding: 13px 0; text-align: center; text-decoration: none; width: 100%" target="_blank">
            <p class="text-center" style="color: white; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 300; letter-spacing: 1px; line-height: 1.3; margin: 0; padding: 0; text-align: center" align="center">
            Ingresar a canjea
            </p>
            </a></td></tr></tbody></table></td></tr></tbody></table>
            </th>
            <th class="expander" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0" align="left"></th>
            </tr></tbody></table></th>
            </tr></tbody></table>
            
            
            <table class=" spacer " style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="30px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 30px; font-weight: normal; hyphens: auto; line-height: 30px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
            </td></tr></tbody></table>
            <table class="have-questions-wrapper  container" align="center" style="background-color: #F5F5F5 !important; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 100% !important" bgcolor="#F5F5F5"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">
              <table class=" spacer " style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="24px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: normal; hyphens: auto; line-height: 24px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
            
              <table class="milkyway-content row" style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 280px !important"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                <th class=" small-12 large-12 columns first last" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
                <img width="10" src="http://imgfz.com/i/6uSb85M.png" style="-ms-interpolation-mode: bicubic; clear: both; display: block; float: none; margin: 0 auto; max-width: 50%; outline: none; text-align: center; text-decoration: none; width: auto">
                  <h3 style="color: inherit; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: 600; line-height: 26px; margin: 10 10 10px; padding: 0; text-align: center; word-wrap: normal" align="left">"Gracias por ingresar a la pagina"</h3>
                </th>
            <th class="expander" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0" align="left"></th>
            </tr></tbody></table></th>
              </tr></tbody></table>
            
              <table class=" spacer " style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="24px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: normal; hyphens: auto; line-height: 24px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
            </td></tr></tbody></table>
            
            
                        </td></tr></tbody></table>
                        <table class=" spacer  float-center" align="center" style="border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="20px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: normal; hyphens: auto; line-height: 20px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
                        <table class="emailer-footer container float-center" align="center" style="background-color: transparent !important; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 580px" bgcolor="transparent"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">
            <table class=" row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
            <th class=" small-12 large-4 columns first" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 8px 16px 16px; text-align: left; width: 177.3333333333px" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
            </th>
            <th class="emailer-border-bottom small-12 large-11 columns first" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 91.666666%" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
            
            </th></tr></tbody></table></th>
            <th class="show-for-large small-12 large-1 columns last" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 8.333333%" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody>
            
            </th></tr></tbody></table></th>
            </tr></tbody></table></th>
            <th class=" small-12 large-4 columns" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 8px 16px; text-align: left; width: 177.3333333333px" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
            </th>
            <th class="emailer-border-bottom small-12 large-11 columns first" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 91.666666%" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
            
            </p>
            </th></tr></tbody></table></th>
            <th class="show-for-large small-12 large-1 columns last" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 8.333333%" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
            
            </th></tr></tbody></table></th>
            </tr></tbody></table></th>
            
            
            
           
            <p class="universe-address" style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.5; margin: 0; padding: 0; text-align: center !important" align="center">
            Bogota D.C, Colombia
            </p>
            <p class="help-email-address text-center" style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.5; margin: 0; padding: 0; text-align: center" align="center">
            <span class="text-divider" style="margin-left: 10px; margin-right: 10px">
            ©
            2020
            <a href="http://localhost/Canjea/index.php" style="color: #EF7F1A; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none" target="_blank">
            Canjea
            </p>
            </th>
            <th class="expander" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0" align="left"></th>
            </tr></tbody></table></th>
            </tr></tbody></table>
            </td></tr></tbody></table>
            
                      </center>
                    </td>
                  </tr>
                </tbody></table>
              
            
            </body>
            <!-- partial -->
              
            </body>
            </html>
            ';
            $mail->CharSet = 'UTF-8';
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }

     public function login($data){

            if(isset($data['Correo'])){
                $table = 'usuario';
                $item = 'Correo';
                $value = $data['Correo'];
                $answer = User::showUser($table,$item,$value);
                $data['Contrasena'] = hash('sha256',$data['Contrasena']);
                if ($answer['Correo']==$data['Correo'] && $answer['Contrasena']==$data['Contrasena'] &&  $answer['Estado'] == 'Activo' && $answer['IdRol']== 2) {
                    $_SESSION['user']=$answer;
                    $_SESSION['validation'] = "ok" ; 
                    echo '<script>
                    if(window.history.replaceState){

                        window.history.replaceState(null,null,window.location.href);
                    }
                    window.location="index.php"
                    </script>';
                }elseif ($answer['Correo']==$data['Correo'] && $answer['Contrasena']==$data['Contrasena'] &&  $answer['Estado'] == 'Activo'  && $answer['IdRol']== 1) {
                    $_SESSION['user']=$answer; 
                    echo '<script>
                    if(window.history.replaceState){

                        window.history.replaceState(null,null,window.location.href);
                    }
                    window.location="views/pagesAdmin/template.php"
                    </script>';              
                  } else{
                    echo "<div class='alert alert-danger'> Usuario o Contraseña incorrectos /Cuenta inhabilitada </div>";
                }
            }
     }

    public function sendPassword($data){
        if(isset($data['Correo'])){
            $table = 'usuario';
            $item = 'Correo';
            $value = $data['Correo'];
            $answer = User::showUser($table,$item,$value);
            if($answer['Correo']== $data['Correo']){
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0 ;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'canjea.co@gmail.com';                     // SMTP username
                    $mail->Password   = 'Int3rc@mb1ar';                                     // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                
                    //Recipients
                    $mail->setFrom('canjea.co@gmail.com');
                    $mail->addAddress($data['Correo']);     // Add a recipient
                
            
                
                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Recupera tu contraseña';
                    $mail->Body    = '<!DOCTYPE html>
            <html lang="en" >
            <head>
              <meta charset="UTF-8">
              <title>CodePen - Welcome Mail Kısa</title>
              
            
            </head>
            <body>
            <!-- partial:index.partial.html -->
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=US-ASCII">
                <meta name="viewport" content="width=device-width">
            
                
              </head>
            
              <body style="-moz-box-sizing: border-box; -ms-text-size-adjust: 100%; -webkit-box-sizing: border-box; -webkit-text-size-adjust: 100%; box-sizing: border-box; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 22px; margin: 0; min-width: 100%; padding: 0; text-align: left; width: 100% !important"><style type="text/css">
            body {
            width: 100% !important; min-width: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; margin: 0; padding: 0; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
            }
            .ExternalClass {
            width: 100%;
            }
            .ExternalClass {
            line-height: 100%;
            }
            #backgroundTable {
            margin: 0; padding: 0; width: 100% !important; line-height: 100% !important;
            }
            img {
            outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; clear: both; display: block;
            }
            body {
            color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-weight: normal; padding: 0; margin: 0; text-align: left; line-height: 1.3;
            }
            body {
            font-size: 16px; line-height: 1.3;
            }
            a:hover {
            color: #1f54ed;
            }
            a:active {
            color: #1f54ed;
            }
            a:visited {
            color:  #EF7F1A;
            }
            h1 a:visited {
            color:  #EF7F1A;
            }
            h2 a:visited {
            color:  #EF7F1A;
            }
            h3 a:visited {
            color:  #EF7F1A;
            }
            h4 a:visited {
            color:  #EF7F1A;
            }
            h5 a:visited {
            color:  #EF7F1A;
            }
            h6 a:visited {
            color:  #EF7F1A;
            }
            table.button:hover table tr td a {
            color: #FFFFFF;
            }
            table.button:active table tr td a {
            color: #FFFFFF;
            }
            table.button table tr td a:visited {
            color: #FFFFFF;
            }
            table.button.tiny:hover table tr td a {
            color: #FFFFFF;
            }
            table.button.tiny:active table tr td a {
            color: #FFFFFF;
            }
            table.button.tiny table tr td a:visited {
            color: #FFFFFF;
            }
            table.button.small:hover table tr td a {
            color: #FFFFFF;
            }
            table.button.small:active table tr td a {
            color: #FFFFFF;
            }
            table.button.small table tr td a:visited {
            color: #FFFFFF;
            }
            table.button.large:hover table tr td a {
            color: #FFFFFF;
            }
            table.button.large:active table tr td a {
            color: #FFFFFF;
            }
            table.button.large table tr td a:visited {
            color: #FFFFFF;
            }
            table.button:hover table td {
            background: #1f54ed; color: #FFFFFF;
            }
            table.button:visited table td {
            background: #1f54ed; color: #FFFFFF;
            }
            table.button:active table td {
            background: #1f54ed; color: #FFFFFF;
            }
            table.button:hover table a {
            border: 0 solid #1f54ed;
            }
            table.button:visited table a {
            border: 0 solid #1f54ed;
            }
            table.button:active table a {
            border: 0 solid #1f54ed;
            }
            table.button.secondary:hover table td {
            background: #fefefe; color: #FFFFFF;
            }
            table.button.secondary:hover table a {
            border: 0 solid #fefefe;
            }
            table.button.secondary:hover table td a {
            color: #FFFFFF;
            }
            table.button.secondary:active table td a {
            color: #FFFFFF;
            }
            table.button.secondary table td a:visited {
            color: #FFFFFF;
            }
            table.button.success:hover table td {
            background: #009482;
            }
            table.button.success:hover table a {
            border: 0 solid #009482;
            }
            table.button.alert:hover table td {
            background: #ff6131;
            }
            table.button.alert:hover table a {
            border: 0 solid #ff6131;
            }
            table.button.warning:hover table td {
            background: #fcae1a;
            }
            table.button.warning:hover table a {
            border: 0px solid #fcae1a;
            }
            .thumbnail:hover {
            box-shadow: 0 0 6px 1px rgba(78,120,241,0.5);
            }
            .thumbnail:focus {
            box-shadow: 0 0 6px 1px rgba(78,120,241,0.5);
            }
            body.outlook p {
            display: inline !important;
            }
            body {
            font-weight: normal; font-size: 16px; line-height: 22px;
            }
            @media only screen and (max-width: 596px) {
              .small-float-center {
                margin: 0 auto !important; float: none !important; text-align: center !important;
              }
              .small-text-center {
                text-align: center !important;
              }
              .small-text-left {
                text-align: left !important;
              }
              .small-text-right {
                text-align: right !important;
              }
              .hide-for-large {
                display: block !important; width: auto !important; overflow: visible !important; max-height: none !important; font-size: inherit !important; line-height: inherit !important;
              }
              table.body table.container .hide-for-large {
                display: table !important; width: 100% !important;
              }
              table.body table.container .row.hide-for-large {
                display: table !important; width: 100% !important;
              }
              table.body table.container .callout-inner.hide-for-large {
                display: table-cell !important; width: 100% !important;
              }
              table.body table.container .show-for-large {
                display: none !important; width: 0; mso-hide: all; overflow: hidden;
              }
              table.body img {
                width: auto; height: auto;
              }
              table.body center {
                min-width: 0 !important;
              }
              table.body .container {
                width: 95% !important;
              }
              table.body .columns {
                height: auto !important; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; padding-left: 16px !important; padding-right: 16px !important;
              }
              table.body .column {
                height: auto !important; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; padding-left: 16px !important; padding-right: 16px !important;
              }
              table.body .columns .column {
                padding-left: 0 !important; padding-right: 0 !important;
              }
              table.body .columns .columns {
                padding-left: 0 !important; padding-right: 0 !important;
              }
              table.body .column .column {
                padding-left: 0 !important; padding-right: 0 !important;
              }
              table.body .column .columns {
                padding-left: 0 !important; padding-right: 0 !important;
              }
              table.body .collapse .columns {
                padding-left: 0 !important; padding-right: 0 !important;
              }
              table.body .collapse .column {
                padding-left: 0 !important; padding-right: 0 !important;
              }
              td.small-1 {
                display: inline-block !important; width: 8.333333% !important;
              }
              th.small-1 {
                display: inline-block !important; width: 8.333333% !important;
              }
              td.small-2 {
                display: inline-block !important; width: 16.666666% !important;
              }
              th.small-2 {
                display: inline-block !important; width: 16.666666% !important;
              }
              td.small-3 {
                display: inline-block !important; width: 25% !important;
              }
              th.small-3 {
                display: inline-block !important; width: 25% !important;
              }
              td.small-4 {
                display: inline-block !important; width: 33.333333% !important;
              }
              th.small-4 {
                display: inline-block !important; width: 33.333333% !important;
              }
              td.small-5 {
                display: inline-block !important; width: 41.666666% !important;
              }
              th.small-5 {
                display: inline-block !important; width: 41.666666% !important;
              }
              td.small-6 {
                display: inline-block !important; width: 50% !important;
              }
              th.small-6 {
                display: inline-block !important; width: 50% !important;
              }
              td.small-7 {
                display: inline-block !important; width: 58.333333% !important;
              }
              th.small-7 {
                display: inline-block !important; width: 58.333333% !important;
              }
              td.small-8 {
                display: inline-block !important; width: 66.666666% !important;
              }
              th.small-8 {
                display: inline-block !important; width: 66.666666% !important;
              }
              td.small-9 {
                display: inline-block !important; width: 75% !important;
              }
              th.small-9 {
                display: inline-block !important; width: 75% !important;
              }
              td.small-10 {
                display: inline-block !important; width: 83.333333% !important;
              }
              th.small-10 {
                display: inline-block !important; width: 83.333333% !important;
              }
              td.small-11 {
                display: inline-block !important; width: 91.666666% !important;
              }
              th.small-11 {
                display: inline-block !important; width: 91.666666% !important;
              }
              td.small-12 {
                display: inline-block !important; width: 100% !important;
              }
              th.small-12 {
                display: inline-block !important; width: 100% !important;
              }
              .columns td.small-12 {
                display: block !important; width: 100% !important;
              }
              .column td.small-12 {
                display: block !important; width: 100% !important;
              }
              .columns th.small-12 {
                display: block !important; width: 100% !important;
              }
              .column th.small-12 {
                display: block !important; width: 100% !important;
              }
              table.body td.small-offset-1 {
                margin-left: 8.333333% !important;
              }
              table.body th.small-offset-1 {
                margin-left: 8.333333% !important;
              }
              table.body td.small-offset-2 {
                margin-left: 16.666666% !important;
              }
              table.body th.small-offset-2 {
                margin-left: 16.666666% !important;
              }
              table.body td.small-offset-3 {
                margin-left: 25% !important;
              }
              table.body th.small-offset-3 {
                margin-left: 25% !important;
              }
              table.body td.small-offset-4 {
                margin-left: 33.333333% !important;
              }
              table.body th.small-offset-4 {
                margin-left: 33.333333% !important;
              }
              table.body td.small-offset-5 {
                margin-left: 41.666666% !important;
              }
              table.body th.small-offset-5 {
                margin-left: 41.666666% !important;
              }
              table.body td.small-offset-6 {
                margin-left: 50% !important;
              }
              table.body th.small-offset-6 {
                margin-left: 50% !important;
              }
              table.body td.small-offset-7 {
                margin-left: 58.333333% !important;
              }
              table.body th.small-offset-7 {
                margin-left: 58.333333% !important;
              }
              table.body td.small-offset-8 {
                margin-left: 66.666666% !important;
              }
              table.body th.small-offset-8 {
                margin-left: 66.666666% !important;
              }
              table.body td.small-offset-9 {
                margin-left: 75% !important;
              }
              table.body th.small-offset-9 {
                margin-left: 75% !important;
              }
              table.body td.small-offset-10 {
                margin-left: 83.333333% !important;
              }
              table.body th.small-offset-10 {
                margin-left: 83.333333% !important;
              }
              table.body td.small-offset-11 {
                margin-left: 91.666666% !important;
              }
              table.body th.small-offset-11 {
                margin-left: 91.666666% !important;
              }
              table.body table.columns td.expander {
                display: none !important;
              }
              table.body table.columns th.expander {
                display: none !important;
              }
              table.body .right-text-pad {
                padding-left: 10px !important;
              }
              table.body .text-pad-right {
                padding-left: 10px !important;
              }
              table.body .left-text-pad {
                padding-right: 10px !important;
              }
              table.body .text-pad-left {
                padding-right: 10px !important;
              }
              table.menu {
                width: 100% !important;
              }
              table.menu td {
                width: auto !important; display: inline-block !important;
              }
              table.menu th {
                width: auto !important; display: inline-block !important;
              }
              table.menu.vertical td {
                display: block !important;
              }
              table.menu.vertical th {
                display: block !important;
              }
              table.menu.small-vertical td {
                display: block !important;
              }
              table.menu.small-vertical th {
                display: block !important;
              }
              table.menu[align="center"] {
                width: auto !important;
              }
              table.button.small-expand {
                width: 100% !important;
              }
              table.button.small-expanded {
                width: 100% !important;
              }
              table.button.small-expand table {
                width: 100%;
              }
              table.button.small-expanded table {
                width: 100%;
              }
              table.button.small-expand table a {
                text-align: center !important; width: 100% !important; padding-left: 0 !important; padding-right: 0 !important;
              }
              table.button.small-expanded table a {
                text-align: center !important; width: 100% !important; padding-left: 0 !important; padding-right: 0 !important;
              }
              table.button.small-expand center {
                min-width: 0;
              }
              table.button.small-expanded center {
                min-width: 0;
              }
              table.body .container {
                width: 100% !important;
              }
            }
            @media only screen and (min-width: 732px) {
              table.body table.milkyway-email-card {
                width: 525px !important;
              }
              table.body table.emailer-footer {
                width: 525px !important;
              }
            }
            @media only screen and (max-width: 731px) {
              table.body table.milkyway-email-card {
                width: 320px !important;
              }
              table.body table.emailer-footer {
                width: 320px !important;
              }
            }
            @media only screen and (max-width: 320px) {
              table.body table.milkyway-email-card {
                width: 100% !important; border-radius: 0; box-sizing: none;
              }
              table.body table.emailer-footer {
                width: 100% !important; border-radius: 0; box-sizing: none;
              }
            }
            @media only screen and (max-width: 280px) {
              table.body table.milkyway-email-card .milkyway-content {
                width: 100% !important;
              }
            }
            @media (min-width: 596px) {
              .milkyway-header {
                width: 11%;
              }
            }
            @media (max-width: 596px) {
              .milkyway-header {
                width: 50%;
              }
              .emailer-footer .emailer-border-bottom {
                border-bottom: 0.5px solid #E2E5E7;
              }
              .emailer-footer .make-you-smile {
                margin-top: 24px;
              }
              .emailer-footer .make-you-smile .email-tag-line {
                width: 80%; position: relative; left: 10%;
              }
              .emailer-footer .make-you-smile .universe-address {
                margin-bottom: 10px !important;
              }
              .emailer-footer .make-you-smile .email-tag-line {
                margin-bottom: 10px !important;
              }
              .have-questions-text {
                width: 70%;
              }
              .hide-on-small {
                display: none;
              }
              .product-card-stacked-row .thumbnail-image {
                max-width: 32% !important;
              }
              .product-card-stacked-row .thumbnail-content p {
                width: 64%;
              }
              .welcome-subcontent {
                text-align: left; margin: 20px 0 10px;
              }
              .milkyway-title {
                padding: 16px;
              }
              .meta-data {
                text-align: center;
              }
              .label {
                text-align: center;
              }
              .welcome-email .wavey-background-subcontent {
                width: calc(100% - 32px);
              }
            }
            @media (min-width: 597px) {
              .emailer-footer .show-on-mobile {
                display: none;
              }
              .emailer-footer .emailer-border-bottom {
                border-bottom: none;
              }
              .have-questions-text {
                border-bottom: none;
              }
              .hide-on-large {
                display: none;
              }
              .milkyway-title {
                padding: 55px 55px 16px;
              }
            }
            @media only screen and (max-width: 290px) {
              table.container.your-tickets .tickets-container {
                width: 100%;
              }
            }
            </style>
                <table class="body" data-made-with-foundation="" style="background: #FAFAFA; border-collapse: collapse; border-spacing: 0; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; height: 100%; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 100%" bgcolor="#FAFAFA">
                  <tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                    <td class="center" align="center" valign="top" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word">
                      <center style="min-width: 580px; width: 100%">
                        <table class=" spacer  float-center" align="center" style="border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="20px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: normal; hyphens: auto; line-height: 20px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
                        <table class="header-spacer spacer  float-center" align="center" style="border-collapse: collapse; border-spacing: 0; float: none; line-height: 60px; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="16px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
            
            <table class="header-spacer-bottom spacer  float-center" align="center" style="border-collapse: collapse; border-spacing: 0; float: none; line-height: 30px; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="16px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
            
                        <table class="milkyway-email-card container float-center" align="center" style="background: #FFFFFF; border-collapse: collapse; border-radius: 6px; border-spacing: 0; box-shadow: 0 1px 8px 0 rgba(28,35,43,0.15); float: none; margin: 0 auto; overflow: hidden; padding: 0; text-align: center; vertical-align: top; width: 580px" bgcolor="#FFFFFF"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">
                          
                          <table class="milkyway-content welcome-email container" align="center" style="background: #FFFFFF; border-collapse: collapse; border-spacing: 0; hyphens: none; margin: auto; max-width: 100%; padding: 0; text-align: inherit; vertical-align: top; width: 280px !important" bgcolor="#FFFFFF"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">
            <table class=" spacer " style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="50px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 50px; font-weight: normal; hyphens: auto; line-height: 50px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
            <table class=" row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
            <th class=" small-12 large-12 columns first last" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
            <center style="min-width: 0; width: 100%">
            
            <img width="250" src="http://imgfz.com/i/V46MxEh.png" align="center" class=" float-center float-center float-center" style="-ms-interpolation-mode: bicubic; clear: both; display: block; float: none; margin: 0 auto; max-width: 100%; outline: none; text-align: center; text-decoration: none; width: auto">
              
            </center>
             
            </th>
            <th class="expander" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0" align="left"></th>
            </tr></tbody></table></th>
            </tr></tbody></table>
            
            <table class="milkyway-content row" style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 280px !important"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
              <th class=" small-12 large-12 columns first last" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
                <h1 class="welcome-header" style="color: inherit; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 600; hyphens: none; line-height: 30px; margin: 0 0 24px; padding: 0; text-align: left; width: 100%; word-wrap: normal" align="left">¡Enlace para cambiar tu contraseña! </h1>
                <h2 class="welcome-subcontent" style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 300; line-height: 22px; margin: 0; padding: 0; text-align: center; width: 100%; word-wrap: normal" align="left"><p>Darle click en el boton para cambiar</h2>
              </th>
            <th class="expander" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0" align="left"></th>
            </tr></tbody></table></th>
            </tr></tbody></table>
            
            <table class=" spacer " style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="30px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 30px; font-weight: normal; hyphens: auto; line-height: 30px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
            <table class="milkyway-content wrapper" align="center" style="border-collapse: collapse; border-spacing: 0; hyphens: none; margin: auto; max-width: 100%; padding: 0; text-align: left; vertical-align: top; width: 280px !important"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td class="wrapper-inner" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top"></td></tr></tbody></table>
            <table class="milkyway-content row" style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 280px !important"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
            <th class="milkyway-padding small-12 large-12 columns first last" valign="middle" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
            <table class="cta-text primary radius expanded button" style="border-collapse: collapse; border-spacing: 0; font-size: 14px; font-weight: 400; line-height: 0; margin: 0 0 16px; padding: 0; text-align: left; vertical-align: top; width: 100% !important"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; background: #ef7f1a; border: 2px none  #ef7f1a; border-collapse: collapse !important; border-radius: 6px; color: #FFFFFF; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" bgcolor=" #EF7F1A" valign="top"><a href="http://localhost/Canjea/index.php?pagesUser=editPassword&id='.$answer["Id_Usuario"].'" style="border: 0 solid #ef7f1a; border-radius: 6px; color: #FFFFFF; display: inline-block; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: bold; line-height: 1.3; margin: 0; padding: 13px 0; text-align: center; text-decoration: none; width: 100%" target="_blank">
            <p class="text-center" style="color: white; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 300; letter-spacing: 1px; line-height: 1.3; margin: 0; padding: 0; text-align: center" align="center">
           Recuperar Contraseña
            </p>
            </a></td></tr></tbody></table></td></tr></tbody></table>
            </th>
            <th class="expander" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0" align="left"></th>
            </tr></tbody></table></th>
            </tr></tbody></table>
            
            
            <table class=" spacer " style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="30px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 30px; font-weight: normal; hyphens: auto; line-height: 30px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
            </td></tr></tbody></table>
            <table class="have-questions-wrapper  container" align="center" style="background-color: #F5F5F5 !important; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 100% !important" bgcolor="#F5F5F5"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">
              <table class=" spacer " style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="24px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: normal; hyphens: auto; line-height: 24px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
            
              <table class="milkyway-content row" style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 280px !important"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
                <th class=" small-12 large-12 columns first last" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
                <img width="10" src="http://imgfz.com/i/6uSb85M.png" style="-ms-interpolation-mode: bicubic; clear: both; display: block; float: none; margin: 0 auto; max-width: 50%; outline: none; text-align: center; text-decoration: none; width: auto">
                  <h3 style="color: inherit; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: 600; line-height: 26px; margin: 10 10 10px; padding: 0; text-align: center; word-wrap: normal" align="left">"Gracias por ingresar a la pagina"</h3>
                </th>
            <th class="expander" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0" align="left"></th>
            </tr></tbody></table></th>
              </tr></tbody></table>
            
              <table class=" spacer " style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="24px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: normal; hyphens: auto; line-height: 24px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
            </td></tr></tbody></table>
            
            
                        </td></tr></tbody></table>
                        <table class=" spacer  float-center" align="center" style="border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="20px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: normal; hyphens: auto; line-height: 20px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
                        <table class="emailer-footer container float-center" align="center" style="background-color: transparent !important; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 580px" bgcolor="transparent"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">
            <table class=" row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
            <th class=" small-12 large-4 columns first" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 8px 16px 16px; text-align: left; width: 177.3333333333px" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
            </th>
            <th class="emailer-border-bottom small-12 large-11 columns first" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 91.666666%" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
            
            </th></tr></tbody></table></th>
            <th class="show-for-large small-12 large-1 columns last" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 8.333333%" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody>
            
            </th></tr></tbody></table></th>
            </tr></tbody></table></th>
            <th class=" small-12 large-4 columns" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 8px 16px; text-align: left; width: 177.3333333333px" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
            <th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
            </th>
            <th class="emailer-border-bottom small-12 large-11 columns first" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 91.666666%" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">
            
            </p>
            </th></tr></tbody></table></th>
            <th class="show-for-large small-12 large-1 columns last" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 8.333333%" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
            
            </th></tr></tbody></table></th>
            </tr></tbody></table></th>
            
            
            
           
            <p class="universe-address" style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.5; margin: 0; padding: 0; text-align: center !important" align="center">
            Bogota D.C, Colombia
            </p>
            <p class="help-email-address text-center" style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.5; margin: 0; padding: 0; text-align: center" align="center">
            <span class="text-divider" style="margin-left: 10px; margin-right: 10px">
            ©
            2020
            <a href="http://localhost/Canjea/index.php" style="color: #EF7F1A; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none" target="_blank">
            Canjea
            </p>
            </th>
            <th class="expander" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0" align="left"></th>
            </tr></tbody></table></th>
            </tr></tbody></table>
            </td></tr></tbody></table>
            
                      </center>
                    </td>
                  </tr>
                </tbody></table>
              
            
            </body>
            <!-- partial -->
              
            </body>
            </html>
            ';
                    $mail->CharSet = 'UTF-8';
                    $mail->send();
                    echo '<div class="alert alert-warning">
                    <h4 class="font-text-bold>¡Exitoso!</h4>
                    <p>Se ha enviado a tu correo '.$data['Correo'].'para recuperar contraseña.</p>
                    </div>';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }else {
                echo "<div class='alert alert-danger'> Correo no existe en la pagina </div>";
            }

        }
        
    }

    static public function findUser($item,$value){
        $table = 'usuario';
        $answer = User::showUser($table,$item,$value);
        return $answer;
    }

    static public function updatePassword(){
        if(isset($_POST['Contrasena'])){
            $_POST['Contrasena']=  hash('sha256',$_POST['Contrasena']);
            $table = 'usuario';
            $data = ['Id_Usuario'=>$_POST['Id_Usuario'],
                    'Contrasena'=>$_POST['Contrasena']
            ];
            $answer = User::editPassword($table,$data);
            return $answer;
        }

    }  

    static public function editUser(){
        if(isset($_POST['Id_Usuario'])){
             $table = 'usuario';
             $dates = [
                'Nombre' => $_POST['Nombre'],
                'Apellido' => $_POST['Apellido'],
                'Correo' => $_POST['Correo'],
                'Direccion' => $_POST['Direccion'],
                'FechaNacimiento' => $_POST['FechaNacimiento'],
                'Celular' => $_POST['Celular'],
                'Id_barrio' => $_POST['Id_barrio'],
                'Id_Usuario' => $_POST['Id_Usuario']
            ];
            $answer = User::update($table,$dates);
            return $answer;

        }
    }

    public function updateStatusActive(){
        if (isset($_POST['Id_Usuario'])) {
             $table = 'usuario';
             $value = $_POST['Id_Usuario'];
             $answer = User::statusActive($table,$value);
            if ($answer == "ok") {
                echo '<script> setTimeout(function(){
                    window.location = "index.php?pagesAdmin=listUser";
                }, 1000 ) </script>';
            }
        }

    }

    public function updateStatusInactive(){
        if (isset($_POST['Id_Usuario1'])) {
             $table = 'usuario';
             $value = $_POST['Id_Usuario1'];
             $answer = User::statusInactive($table,$value);
            if ($answer == "ok") {
                echo '<script> setTimeout(function(){
                    window.location = "index.php?pagesAdmin=listUser";
                }, 1000 ) </script>';
            }
        }

    }

   static public function sendEmailContact($data){
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0 ;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'canjea.co@gmail.com';                     // SMTP username
        $mail->Password   = 'Int3rc@mb1ar';                                    // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom($data['Correo']);
        $mail->addAddress('canjea.co@gmail.com');     // Add a recipient
    

    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Sugerencia o Queja';
        $mail->Body    = '<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Welcome Mail Kısa</title>
  

</head>
<body>
<!-- partial:index.partial.html -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=US-ASCII">
    <meta name="viewport" content="width=device-width">

    
  </head>

  <body style="-moz-box-sizing: border-box; -ms-text-size-adjust: 100%; -webkit-box-sizing: border-box; -webkit-text-size-adjust: 100%; box-sizing: border-box; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 22px; margin: 0; min-width: 100%; padding: 0; text-align: left; width: 100% !important"><style type="text/css">
body {
width: 100% !important; min-width: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; margin: 0; padding: 0; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
}
.ExternalClass {
width: 100%;
}
.ExternalClass {
line-height: 100%;
}
#backgroundTable {
margin: 0; padding: 0; width: 100% !important; line-height: 100% !important;
}
img {
outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; clear: both; display: block;
}
body {
color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-weight: normal; padding: 0; margin: 0; text-align: left; line-height: 1.3;
}
body {
font-size: 16px; line-height: 1.3;
}
a:hover {
color: #1f54ed;
}
a:active {
color: #1f54ed;
}
a:visited {
color:  #EF7F1A;
}
h1 a:visited {
color:  #EF7F1A;
}
h2 a:visited {
color:  #EF7F1A;
}
h3 a:visited {
color:  #EF7F1A;
}
h4 a:visited {
color:  #EF7F1A;
}
h5 a:visited {
color:  #EF7F1A;
}
h6 a:visited {
color:  #EF7F1A;
}
table.button:hover table tr td a {
color: #FFFFFF;
}
table.button:active table tr td a {
color: #FFFFFF;
}
table.button table tr td a:visited {
color: #FFFFFF;
}
table.button.tiny:hover table tr td a {
color: #FFFFFF;
}
table.button.tiny:active table tr td a {
color: #FFFFFF;
}
table.button.tiny table tr td a:visited {
color: #FFFFFF;
}
table.button.small:hover table tr td a {
color: #FFFFFF;
}
table.button.small:active table tr td a {
color: #FFFFFF;
}
table.button.small table tr td a:visited {
color: #FFFFFF;
}
table.button.large:hover table tr td a {
color: #FFFFFF;
}
table.button.large:active table tr td a {
color: #FFFFFF;
}
table.button.large table tr td a:visited {
color: #FFFFFF;
}
table.button:hover table td {
background: #1f54ed; color: #FFFFFF;
}
table.button:visited table td {
background: #1f54ed; color: #FFFFFF;
}
table.button:active table td {
background: #1f54ed; color: #FFFFFF;
}
table.button:hover table a {
border: 0 solid #1f54ed;
}
table.button:visited table a {
border: 0 solid #1f54ed;
}
table.button:active table a {
border: 0 solid #1f54ed;
}
table.button.secondary:hover table td {
background: #fefefe; color: #FFFFFF;
}
table.button.secondary:hover table a {
border: 0 solid #fefefe;
}
table.button.secondary:hover table td a {
color: #FFFFFF;
}
table.button.secondary:active table td a {
color: #FFFFFF;
}
table.button.secondary table td a:visited {
color: #FFFFFF;
}
table.button.success:hover table td {
background: #009482;
}
table.button.success:hover table a {
border: 0 solid #009482;
}
table.button.alert:hover table td {
background: #ff6131;
}
table.button.alert:hover table a {
border: 0 solid #ff6131;
}
table.button.warning:hover table td {
background: #fcae1a;
}
table.button.warning:hover table a {
border: 0px solid #fcae1a;
}
.thumbnail:hover {
box-shadow: 0 0 6px 1px rgba(78,120,241,0.5);
}
.thumbnail:focus {
box-shadow: 0 0 6px 1px rgba(78,120,241,0.5);
}
body.outlook p {
display: inline !important;
}
body {
font-weight: normal; font-size: 16px; line-height: 22px;
}
@media only screen and (max-width: 596px) {
  .small-float-center {
    margin: 0 auto !important; float: none !important; text-align: center !important;
  }
  .small-text-center {
    text-align: center !important;
  }
  .small-text-left {
    text-align: left !important;
  }
  .small-text-right {
    text-align: right !important;
  }
  .hide-for-large {
    display: block !important; width: auto !important; overflow: visible !important; max-height: none !important; font-size: inherit !important; line-height: inherit !important;
  }
  table.body table.container .hide-for-large {
    display: table !important; width: 100% !important;
  }
  table.body table.container .row.hide-for-large {
    display: table !important; width: 100% !important;
  }
  table.body table.container .callout-inner.hide-for-large {
    display: table-cell !important; width: 100% !important;
  }
  table.body table.container .show-for-large {
    display: none !important; width: 0; mso-hide: all; overflow: hidden;
  }
  table.body img {
    width: auto; height: auto;
  }
  table.body center {
    min-width: 0 !important;
  }
  table.body .container {
    width: 95% !important;
  }
  table.body .columns {
    height: auto !important; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; padding-left: 16px !important; padding-right: 16px !important;
  }
  table.body .column {
    height: auto !important; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; padding-left: 16px !important; padding-right: 16px !important;
  }
  table.body .columns .column {
    padding-left: 0 !important; padding-right: 0 !important;
  }
  table.body .columns .columns {
    padding-left: 0 !important; padding-right: 0 !important;
  }
  table.body .column .column {
    padding-left: 0 !important; padding-right: 0 !important;
  }
  table.body .column .columns {
    padding-left: 0 !important; padding-right: 0 !important;
  }
  table.body .collapse .columns {
    padding-left: 0 !important; padding-right: 0 !important;
  }
  table.body .collapse .column {
    padding-left: 0 !important; padding-right: 0 !important;
  }
  td.small-1 {
    display: inline-block !important; width: 8.333333% !important;
  }
  th.small-1 {
    display: inline-block !important; width: 8.333333% !important;
  }
  td.small-2 {
    display: inline-block !important; width: 16.666666% !important;
  }
  th.small-2 {
    display: inline-block !important; width: 16.666666% !important;
  }
  td.small-3 {
    display: inline-block !important; width: 25% !important;
  }
  th.small-3 {
    display: inline-block !important; width: 25% !important;
  }
  td.small-4 {
    display: inline-block !important; width: 33.333333% !important;
  }
  th.small-4 {
    display: inline-block !important; width: 33.333333% !important;
  }
  td.small-5 {
    display: inline-block !important; width: 41.666666% !important;
  }
  th.small-5 {
    display: inline-block !important; width: 41.666666% !important;
  }
  td.small-6 {
    display: inline-block !important; width: 50% !important;
  }
  th.small-6 {
    display: inline-block !important; width: 50% !important;
  }
  td.small-7 {
    display: inline-block !important; width: 58.333333% !important;
  }
  th.small-7 {
    display: inline-block !important; width: 58.333333% !important;
  }
  td.small-8 {
    display: inline-block !important; width: 66.666666% !important;
  }
  th.small-8 {
    display: inline-block !important; width: 66.666666% !important;
  }
  td.small-9 {
    display: inline-block !important; width: 75% !important;
  }
  th.small-9 {
    display: inline-block !important; width: 75% !important;
  }
  td.small-10 {
    display: inline-block !important; width: 83.333333% !important;
  }
  th.small-10 {
    display: inline-block !important; width: 83.333333% !important;
  }
  td.small-11 {
    display: inline-block !important; width: 91.666666% !important;
  }
  th.small-11 {
    display: inline-block !important; width: 91.666666% !important;
  }
  td.small-12 {
    display: inline-block !important; width: 100% !important;
  }
  th.small-12 {
    display: inline-block !important; width: 100% !important;
  }
  .columns td.small-12 {
    display: block !important; width: 100% !important;
  }
  .column td.small-12 {
    display: block !important; width: 100% !important;
  }
  .columns th.small-12 {
    display: block !important; width: 100% !important;
  }
  .column th.small-12 {
    display: block !important; width: 100% !important;
  }
  table.body td.small-offset-1 {
    margin-left: 8.333333% !important;
  }
  table.body th.small-offset-1 {
    margin-left: 8.333333% !important;
  }
  table.body td.small-offset-2 {
    margin-left: 16.666666% !important;
  }
  table.body th.small-offset-2 {
    margin-left: 16.666666% !important;
  }
  table.body td.small-offset-3 {
    margin-left: 25% !important;
  }
  table.body th.small-offset-3 {
    margin-left: 25% !important;
  }
  table.body td.small-offset-4 {
    margin-left: 33.333333% !important;
  }
  table.body th.small-offset-4 {
    margin-left: 33.333333% !important;
  }
  table.body td.small-offset-5 {
    margin-left: 41.666666% !important;
  }
  table.body th.small-offset-5 {
    margin-left: 41.666666% !important;
  }
  table.body td.small-offset-6 {
    margin-left: 50% !important;
  }
  table.body th.small-offset-6 {
    margin-left: 50% !important;
  }
  table.body td.small-offset-7 {
    margin-left: 58.333333% !important;
  }
  table.body th.small-offset-7 {
    margin-left: 58.333333% !important;
  }
  table.body td.small-offset-8 {
    margin-left: 66.666666% !important;
  }
  table.body th.small-offset-8 {
    margin-left: 66.666666% !important;
  }
  table.body td.small-offset-9 {
    margin-left: 75% !important;
  }
  table.body th.small-offset-9 {
    margin-left: 75% !important;
  }
  table.body td.small-offset-10 {
    margin-left: 83.333333% !important;
  }
  table.body th.small-offset-10 {
    margin-left: 83.333333% !important;
  }
  table.body td.small-offset-11 {
    margin-left: 91.666666% !important;
  }
  table.body th.small-offset-11 {
    margin-left: 91.666666% !important;
  }
  table.body table.columns td.expander {
    display: none !important;
  }
  table.body table.columns th.expander {
    display: none !important;
  }
  table.body .right-text-pad {
    padding-left: 10px !important;
  }
  table.body .text-pad-right {
    padding-left: 10px !important;
  }
  table.body .left-text-pad {
    padding-right: 10px !important;
  }
  table.body .text-pad-left {
    padding-right: 10px !important;
  }
  table.menu {
    width: 100% !important;
  }
  table.menu td {
    width: auto !important; display: inline-block !important;
  }
  table.menu th {
    width: auto !important; display: inline-block !important;
  }
  table.menu.vertical td {
    display: block !important;
  }
  table.menu.vertical th {
    display: block !important;
  }
  table.menu.small-vertical td {
    display: block !important;
  }
  table.menu.small-vertical th {
    display: block !important;
  }
  table.menu[align="center"] {
    width: auto !important;
  }
  table.button.small-expand {
    width: 100% !important;
  }
  table.button.small-expanded {
    width: 100% !important;
  }
  table.button.small-expand table {
    width: 100%;
  }
  table.button.small-expanded table {
    width: 100%;
  }
  table.button.small-expand table a {
    text-align: center !important; width: 100% !important; padding-left: 0 !important; padding-right: 0 !important;
  }
  table.button.small-expanded table a {
    text-align: center !important; width: 100% !important; padding-left: 0 !important; padding-right: 0 !important;
  }
  table.button.small-expand center {
    min-width: 0;
  }
  table.button.small-expanded center {
    min-width: 0;
  }
  table.body .container {
    width: 100% !important;
  }
}
@media only screen and (min-width: 732px) {
  table.body table.milkyway-email-card {
    width: 525px !important;
  }
  table.body table.emailer-footer {
    width: 525px !important;
  }
}
@media only screen and (max-width: 731px) {
  table.body table.milkyway-email-card {
    width: 320px !important;
  }
  table.body table.emailer-footer {
    width: 320px !important;
  }
}
@media only screen and (max-width: 320px) {
  table.body table.milkyway-email-card {
    width: 100% !important; border-radius: 0; box-sizing: none;
  }
  table.body table.emailer-footer {
    width: 100% !important; border-radius: 0; box-sizing: none;
  }
}
@media only screen and (max-width: 280px) {
  table.body table.milkyway-email-card .milkyway-content {
    width: 100% !important;
  }
}
@media (min-width: 596px) {
  .milkyway-header {
    width: 11%;
  }
}
@media (max-width: 596px) {
  .milkyway-header {
    width: 50%;
  }
  .emailer-footer .emailer-border-bottom {
    border-bottom: 0.5px solid #E2E5E7;
  }
  .emailer-footer .make-you-smile {
    margin-top: 24px;
  }
  .emailer-footer .make-you-smile .email-tag-line {
    width: 80%; position: relative; left: 10%;
  }
  .emailer-footer .make-you-smile .universe-address {
    margin-bottom: 10px !important;
  }
  .emailer-footer .make-you-smile .email-tag-line {
    margin-bottom: 10px !important;
  }
  .have-questions-text {
    width: 70%;
  }
  .hide-on-small {
    display: none;
  }
  .product-card-stacked-row .thumbnail-image {
    max-width: 32% !important;
  }
  .product-card-stacked-row .thumbnail-content p {
    width: 64%;
  }
  .welcome-subcontent {
    text-align: left; margin: 20px 0 10px;
  }
  .milkyway-title {
    padding: 16px;
  }
  .meta-data {
    text-align: center;
  }
  .label {
    text-align: center;
  }
  .welcome-email .wavey-background-subcontent {
    width: calc(100% - 32px);
  }
}
@media (min-width: 597px) {
  .emailer-footer .show-on-mobile {
    display: none;
  }
  .emailer-footer .emailer-border-bottom {
    border-bottom: none;
  }
  .have-questions-text {
    border-bottom: none;
  }
  .hide-on-large {
    display: none;
  }
  .milkyway-title {
    padding: 55px 55px 16px;
  }
}
@media only screen and (max-width: 290px) {
  table.container.your-tickets .tickets-container {
    width: 100%;
  }
}
</style>
    <table class="body" data-made-with-foundation="" style="background: #FAFAFA; border-collapse: collapse; border-spacing: 0; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; height: 100%; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 100%" bgcolor="#FAFAFA">
      <tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
        <td class="center" align="center" valign="top" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word">
          <center style="min-width: 580px; width: 100%">
            <table class=" spacer  float-center" align="center" style="border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="20px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: normal; hyphens: auto; line-height: 20px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
            <table class="header-spacer spacer  float-center" align="center" style="border-collapse: collapse; border-spacing: 0; float: none; line-height: 60px; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="16px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>

<table class="header-spacer-bottom spacer  float-center" align="center" style="border-collapse: collapse; border-spacing: 0; float: none; line-height: 30px; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="16px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 16px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>

            <table class="milkyway-email-card container float-center" align="center" style="background: #FFFFFF; border-collapse: collapse; border-radius: 6px; border-spacing: 0; box-shadow: 0 1px 8px 0 rgba(28,35,43,0.15); float: none; margin: 0 auto; overflow: hidden; padding: 0; text-align: center; vertical-align: top; width: 580px" bgcolor="#FFFFFF"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">
              
              <table class="milkyway-content welcome-email container" align="center" style="background: #FFFFFF; border-collapse: collapse; border-spacing: 0; hyphens: none; margin: auto; max-width: 100%; padding: 0; text-align: inherit; vertical-align: top; width: 280px !important" bgcolor="#FFFFFF"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">
<table class=" spacer " style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="50px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 50px; font-weight: normal; hyphens: auto; line-height: 50px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
<table class=" row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
<th class=" small-12 large-12 columns first last" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
<th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
<center style="min-width: 0; width: 100%">

<img width="250" src="http://imgfz.com/i/V46MxEh.png" align="center" class=" float-center float-center float-center" style="-ms-interpolation-mode: bicubic; clear: both; display: block; float: none; margin: 0 auto; max-width: 100%; outline: none; text-align: center; text-decoration: none; width: auto">
  
</center>
 
</th>
<th class="expander" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0" align="left"></th>
</tr></tbody></table></th>
</tr></tbody></table>

<table class="milkyway-content row" style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 280px !important"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
  <th class=" small-12 large-12 columns first last" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
<th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
    <h1 class="welcome-header" style="color: inherit; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 600; hyphens: none; line-height: 30px; margin: 0 0 24px; padding: 0; text-align: left; width: 100%; word-wrap: normal" align="left">¡Queja o Sugerencia! </h1>
    <h2 class="welcome-subcontent" style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 300; line-height: 22px; margin: 0; padding: 0; text-align: center; width: 100%; word-wrap: normal" align="left">Darle click en el boton para recuperar tu contraseña</h2>
  </th>
<th class="expander" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0" align="left"></th>
</tr></tbody></table></th>
</tr></tbody></table>

<table class=" spacer " style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="30px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 30px; font-weight: normal; hyphens: auto; line-height: 30px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
<table class="milkyway-content wrapper" align="center" style="border-collapse: collapse; border-spacing: 0; hyphens: none; margin: auto; max-width: 100%; padding: 0; text-align: left; vertical-align: top; width: 280px !important"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td class="wrapper-inner" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top"></td></tr></tbody></table>
<table class="milkyway-content row" style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 280px !important"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
<th class="milkyway-padding small-12 large-12 columns first last" valign="middle" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
<th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
<table class="cta-text primary radius expanded button" style="border-collapse: collapse; border-spacing: 0; font-size: 14px; font-weight: 400; line-height: 0; margin: 0 0 16px; padding: 0; text-align: left; vertical-align: top; width: 100% !important"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; background: #ef7f1a; border: 2px none  #ef7f1a; border-collapse: collapse !important; border-radius: 6px; color: #FFFFFF; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" bgcolor=" #EF7F1A" valign="top"><a href="#" style="border: 0 solid #ef7f1a; border-radius: 6px; color: #FFFFFF; display: inline-block; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: bold; line-height: 1.3; margin: 0; padding: 13px 0; text-align: center; text-decoration: none; width: 100%" target="_blank">
<p class="text-center" style="color: white; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 300; letter-spacing: 1px; line-height: 1.3; margin: 0; padding: 0; text-align: center" align="center">
Recuperar Contraseña
</p>
</a></td></tr></tbody></table></td></tr></tbody></table>
</th>
<th class="expander" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0" align="left"></th>
</tr></tbody></table></th>
</tr></tbody></table>


<table class=" spacer " style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="30px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 30px; font-weight: normal; hyphens: auto; line-height: 30px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
</td></tr></tbody></table>
<table class="have-questions-wrapper  container" align="center" style="background-color: #F5F5F5 !important; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 100% !important" bgcolor="#F5F5F5"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">
  <table class=" spacer " style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="24px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: normal; hyphens: auto; line-height: 24px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>

  <table class="milkyway-content row" style="border-collapse: collapse; border-spacing: 0; display: table; hyphens: none; margin: auto; max-width: 100%; padding: 0; position: relative; text-align: left; vertical-align: top; width: 280px !important"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
    <th class=" small-12 large-12 columns first last" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0; text-align: left; width: 564px" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
<th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
    <img width="10" src="http://imgfz.com/i/6uSb85M.png" style="-ms-interpolation-mode: bicubic; clear: both; display: block; float: none; margin: 0 auto; max-width: 50%; outline: none; text-align: center; text-decoration: none; width: auto">
      <h3 style="color: inherit; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: 600; line-height: 26px; margin: 10 10 10px; padding: 0; text-align: center; word-wrap: normal" align="left">Gracias por la confianza </h3>


    </th>
<th class="expander" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0" align="left"></th>
</tr></tbody></table></th>
  </tr></tbody></table>

  <table class=" spacer " style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="24px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: normal; hyphens: auto; line-height: 24px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
</td></tr></tbody></table>


            </td></tr></tbody></table>
            <table class=" spacer  float-center" align="center" style="border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td height="20px" style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: normal; hyphens: auto; line-height: 20px; margin: 0; mso-line-height-rule: exactly; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">&nbsp;</td></tr></tbody></table>
            <table class="emailer-footer container float-center" align="center" style="background-color: transparent !important; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 580px" bgcolor="transparent"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-collapse: collapse !important; color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; hyphens: auto; line-height: 1.3; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word" align="left" valign="top">
<table class=" row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
<th class=" small-12 large-4 columns first" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 8px 16px 16px; text-align: left; width: 177.3333333333px" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
<th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
</th>
<th class="emailer-border-bottom small-12 large-11 columns first" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 91.666666%" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">

</th></tr></tbody></table></th>
<th class="show-for-large small-12 large-1 columns last" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 8.333333%" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody>

</th></tr></tbody></table></th>
</tr></tbody></table></th>
<th class=" small-12 large-4 columns" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 8px 16px; text-align: left; width: 177.3333333333px" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left">
<th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">
</th>
<th class="emailer-border-bottom small-12 large-11 columns first" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 91.666666%" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%">

</p>
</th></tr></tbody></table></th>
<th class="show-for-large small-12 large-1 columns last" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0 auto; padding: 0 0 16px; text-align: left; width: 8.333333%" align="left"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%"><tbody><tr style="padding: 0; text-align: left; vertical-align: top" align="left"><th style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left" align="left">

</th></tr></tbody></table></th>
</tr></tbody></table></th>



<p class="text-center email-tag-line" style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.5; margin: 0; padding: 0; text-align: center" align="center">
Made with ❤️ in Istanbul
</p>
<p class="universe-address" style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.5; margin: 0; padding: 0; text-align: center !important" align="center">
Yeşilce Mah. Emirşah Sokak 21, Kağıthane, Istanbul
</p>
<p class="help-email-address text-center" style="color: #6F7881; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.5; margin: 0; padding: 0; text-align: center" align="center">
<span class="text-divider" style="margin-left: 10px; margin-right: 10px">
©
2019
<a href="https://e-bursum.com/" style="color: #EF7F1A; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none" target="_blank">
e-bursum.com
</p>
</th>
<th class="expander" style="color: #1C232B; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; line-height: 1.3; margin: 0; padding: 0; text-align: left; visibility: hidden; width: 0" align="left"></th>
</tr></tbody></table></th>
</tr></tbody></table>
</td></tr></tbody></table>

          </center>
        </td>
      </tr>
    </tbody></table>
  

</body>
<!-- partial -->
  
</body>
</html>
'
        ;
        $mail->CharSet = 'UTF-8';
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

   }

}