<?php
$apiKey = 'f93cc3a108a6d40750470e63a6fa0b80-us10';
$listId = '878736b533';
$double_optin=false;
$send_welcome=false;
$email_type = 'html';
$email = $_POST['email'];
//replace us2 with your actual datacenter
$submit_url = "http://us10.api.mailchimp.com/1.3/?method=listSubscribe";
$data = array(
    'email_address'=>$email,
    'apikey'=>$apiKey,
    'id' => $listId,
    'double_optin' => $double_optin,
    'send_welcome' => $send_welcome,
    'email_type' => $email_type
);
$payload = json_encode($data);
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $submit_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($payload));
 
$result = curl_exec($ch);
curl_close ($ch);
$data = json_decode($result);
if ($data->error){
    echo "Hey Hey, not so fast my friend.";
} else {
    echo "Sweet. You'll be onboarding shortly.";
}