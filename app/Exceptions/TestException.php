<?php

namespace App\Exceptions;
use App\Exceptions\CustomException;

class TestException extends CustomException {

    public static function siteIsDown(){
        return "Site is down";
    }

    public static function siteIsWorking(){
        return "Site is working";
    }
}
