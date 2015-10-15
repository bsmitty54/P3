<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;

class PasswordController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /books
    */
    public function getIndex() {
        return view('password');
    }

    /**
     * Responds to requests to POST /books/create
     */
    public function postIndex() {
        return view('password');
    }
}
