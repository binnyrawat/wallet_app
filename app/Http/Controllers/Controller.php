<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public $memberObj;
    public function __construct(){
        $this->memberObj = [];
        if(isset($_GET['eq'])){
            $headEq = $_GET['eq'];
            try{
                $arr = decryptLink($headEq);
                foreach($arr as $key=>$val):
                    $this->memberObj[$key] = $val;
                endforeach;
            }catch(\Exception $e){
                return abort(404);
            }
        }
    }
}
