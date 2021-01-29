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



class User extends Controller
{
    public $model;
    public function __construct()
    {
        /* Do not change/remove anything */
        $this->model = new Model\User();
    }
    public function set(Request $request, Response $response): Response
    {
//        insert profile
        $profile = Model\Profile::init()->insert([
            'about' => $request->getPost('about'),
            'name' => $request->getPost('name'),
        ]);

//        insert user
        $details = $request->getPost();
        $details['profile_id'] = $profile->last_insert_id;

        $this->model->insert($details);
//


        return $response->success('Heyy',$request->getPost());
    }
    /*
    your service  functions
    */

}