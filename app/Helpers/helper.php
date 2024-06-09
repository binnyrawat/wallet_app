<?php

function checkEmailExist(string $email){
    $checkEmail = \App\Models\User::where('email',$email)->first();
    return $checkEmail ? true : false;
}

function webSetting(){
    return ['admin_email'=>'rawat8457@gmail.com','no_reply_email'=>'no-replay@example.com'];
}