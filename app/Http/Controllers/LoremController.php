<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoremController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /books
    */
    public function getIndex() {
        return view('lorem');
    }

    /**
     * Responds to requests to POST /books/create
     */
    public function postIndex(Request $request) {
        $faker = \Faker\Factory::create();
        $litype = $request->input('litype');
        if ($litype == "paragraphs") {
          $paragraphs = $faker->paragraphs($nb = $request->input('num'));
        } elseif ($litype == "sentences") {
          $paragraphs = $faker->sentences($nb = $request->input('num'));
        } else {
          $paragraphs = $faker->words($nb = $request->input('num'));
        }
        return view('lorem')->with('paragraphs',$paragraphs);
    }
}
