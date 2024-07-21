<?php


function encryptLink($inputObj){
    $params = isset($inputObj->params) ? $inputObj->params : '';
    $url = url($inputObj->url);
    if($params!=''){
      $link = $url.'?eq='.urlencode(\Crypt::encrypt($inputObj->params));
      return $link;
    }
    return $url;
  }

  function decryptLink($input){
    $decrString = urldecode(\Crypt::decrypt($input));
    $reqArr = [];
    if(strpos($decrString,"=")!==false){
      $keyVal = explode("&",$decrString);
      if(count($keyVal) > 0){
        foreach($keyVal as $v):
          $kvarr = explode("=",$v);
          if(count($kvarr)>0){
            $reqArr[$kvarr[0]] = $kvarr[1];
          }
        endforeach;
      }
    }
    return $reqArr;
  }

function checkEmailExist(string $email){
    $checkEmail = \App\Models\User::where('email',$email)->first();
    return $checkEmail ? true : false;
}

function webSetting(){
    return ['admin_email'=>'rawat8457@gmail.com','no_reply_email'=>'no-replay@example.com'];
}

function getNoOfMembers(){
    return [10,12,15];
}

function getGroupAmount(){
    return [10,20,30];
}

function getExpiry($startDate,$no,$type,$format=null){
    if(is_null($format))
      return date("d, M Y",strtotime($startDate."+ $no ".$type));
    else
      return date("Y-m-d",strtotime($startDate."+ $no ".$type));
    return '';
}

function paypalAccessToken(){
  $clientId = getenv('PAYPAL_CLIENT_ID');
  $clientSecret = getenv('PAYPAL_SECRET_KEY_ID');
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://api-m.sandbox.paypal.com/v1/oauth2/token");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "Content-Type: application/x-www-form-urlencoded"
  ));
  curl_setopt($ch, CURLOPT_USERPWD, $clientId . ":" . $clientSecret);
  $response = curl_exec($ch);
  $resArr = json_decode($response);
  if (curl_errno($ch)) {
      echo 'Error:' . curl_error($ch);die;
  }
  curl_close($ch);
  return $resArr->access_token;
}

