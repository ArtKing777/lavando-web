<?php
Class EmailHelper {
    
    public static function Email($To, $Subject, $Body, $fromname = "", $fromemail = ""){
        if ($fromname == "") {
            $fromname = Helper::YiiParam("appName");
        }

        if ($fromemail == "") {
            $fromemail = Helper::YiiParam("adminEmail");
        }

        $name='=?UTF-8?B?'.base64_encode("Redsky on Trade").'?=';
        $subject='=?UTF-8?B?'.base64_encode($Subject).'?=';
        $headers="From: $fromname <{$fromemail}>\r\n".
                "Reply-To: {$fromemail}\r\n".
                "MIME-Version: 1.0\r\n".
                "Content-type: text/html; charset=UTF-8";

        return mail($To,$Subject,$Body,$headers);
    }

    public static function SMTPEmail($to, $subject, $message, $fromname = "", $fromemail = ""){
        if ($fromname == "") {
            $fromname = Helper::YiiParam("appName");
        }

        if ($fromemail == "") {
            $fromemail = Helper::YiiParam("adminEmail");
        }

        Yii::import('application.extensions.phpmailer.JPhpMailer');
        $mail = new JPhpMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com:465';
        //$mail->SMTPSecure = "ssl";
        $mail->SMTPAuth = true;
        $mail->Username = 'webneha143@gmail.com';
        $mail->Password = 'nk99india';
        $mail->SetFrom($fromemail, $fromname);
        $mail->Subject = $subject;
        $mail->AltBody = $message;
        $mail->MsgHTML($message);
        $mail->AddAddress($to);
        if(!$mail->Send()) {
            return false;
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
        else {
            return true;
            echo "Message sent!";
        }
    }
    
    public static function SendGridEmail($to, $subject, $message, $fromname = "", $fromemail = ""){

        if ($fromname == "") {
            $fromname = Helper::YiiParam("appName");
        }

        if ($fromemail == "") {
            $fromemail = Helper::YiiParam("adminEmail");
        }

        $url = 'https://api.sendgrid.com/';
        $user = 'webprakash';
        $pass = 'pk99india';
        $json_string = array(
            'to' => array(
                'webprakash@gmail.com'
            ),
            'category' => 'test_category'
        );

        $params = array(
            'api_user'  => $user,
            'api_key'   => $pass,
            'x-smtpapi' => json_encode($json_string),
            'to'        => 'webprakash@gmail.com',
            'subject'   => 'testing from curl',
            'html'      => 'testing body',
            'text'      => 'testing body',
            'from'      => 'webneha@gmail.com',
        );
        $request =  $url.'api/mail.send.json';
        // Generate curl request
        $session = curl_init($request);
        // Tell curl to use HTTP POST
        curl_setopt ($session, CURLOPT_POST, true);
        // Tell curl that this is the body of the POST
        curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
        // Tell curl not to return headers, but do return the response
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        // obtain response
        $response = curl_exec($session);
        curl_close($session);
        // print everything out
        print_r($response);
    }
    
}