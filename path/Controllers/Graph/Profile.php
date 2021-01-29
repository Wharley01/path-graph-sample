<?php

/*
* This is automatically generated 
* Edit to fit your need
* Powered By: Path
*/

namespace Path\App\Controllers\Graph;


use Path\Core\Router\Graph\Controller;
use Path\Core\Http\Request;
use Path\Core\Http\Response;
use Path\Core\Storage\Sessions;

use Path\App\Database\Model;



class Profile extends Controller
{
    public $model;
    public function __construct()
    {
        /* Do not change/remove anything */
        $this->model = new Model\Profile();
    }
    
    /*
    your service  functions
    */

}