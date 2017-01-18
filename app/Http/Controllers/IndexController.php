<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MyFormRequest;
use App\Opers;

class IndexController extends Controller
{
    public function index(MyFormRequest $request){
        $result = new \stdClass();
        $result->errors = FALSE;
        return json_encode($result);
    }
    
}