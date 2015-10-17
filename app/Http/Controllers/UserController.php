<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /books
    */
    public function getIndex() {
        return view('user');
    }

    /**
     * Responds to requests to POST /books/create
     */
    public function postIndex(Request $request) {
        $faker = \Faker\Factory::create();

        // initialize an array to store the user date
        $users = Array();
        $num=0;
        if (null !== $request->input('users')) {
          $num = $request->input('users');
        }
        for ($i=0; $i<$num; $i++) {
          $users[$i][0] = $faker->name;
          if (null !== $request->input('address')) {
            $users[$i][1] = $faker->address;
          }
          if (null !== $request->input('dob')) {
            $users[$i][2] = $faker->dateTimeThisCentury->format('Y-m-d');
          }
          if (null !== $request->input('profile')) {
            $users[$i][3] = $faker->text;
          }
        }
        return view('user')->with('users',$users);
    }


}
