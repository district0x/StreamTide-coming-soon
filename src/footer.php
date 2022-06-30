<!--<script src="<?php //echo $app->getBaseUrl(); ?>dist/app.bundle.js"></script>-->
<?php
if(isset($_POST['email']) && !empty($_POST['email'])){
    /** user email */
    $user_email = $_POST['email']; //User email

    $api_key = "";  //Account Api Key
    $split_api = explode("-",$api_key);
    
    $dc = $split_api[1]; //Server name
   
    $list_id = 123456;  //Mailchimp List id(Audience Id)

    $mailchimp_url = "https://$dc.api.mailchimp.com/3.0/lists/$list_id/members/"; //Mailchimp Url

    $send_data =  array(
        "email_address" => $user_email,
        "status" => "subscribed",
    );
    //Curl
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $mailchimp_url,
        CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
        CURLOPT_USERPWD => "anystring:$api_key",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($send_data),
    ));
            
    $curl_response = curl_exec($curl); 	
    
    $response = json_decode($curl_response);
    curl_close($curl);

    if(isset($response->id)){
        echo 1;
        die;
    }else{
        echo 0;
        die;
    }
}
?>
</body>
</html>
