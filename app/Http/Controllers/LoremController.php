<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;

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
    public function postIndex() {
        $faker = \Faker\Factory::create();
        $litype = $_POST["litype"];
        if ($litype == "paragraphs") {
          $paragraphs = $faker->paragraphs($nb = $_POST["num"]);
        } elseif ($litype == "sentences") {
          $paragraphs = $faker->sentences($nb = $_POST["num"]);
        } else {
          $paragraphs = $faker->words($nb = $_POST["num"]);
        }
        return view('lorem')->with('paragraphs',$paragraphs);
    }
}
