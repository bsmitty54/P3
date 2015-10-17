<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    public function postIndex(Request $request) {
      $wordlist = Array();
      $wc=0;

      $wcat = "Random";

      if (null !== $request->input('wordcat')) {
        $wcat = $request->input('wordcat');
      }

      //load the word files

      if($wcat=="Animals" || $wcat=="Random") {
        list($wc,$wordlist) = $this->load_words("data/animals.txt","Animals",$wcat,$wc,$wordlist);
      }
      if($wcat=="Things" || $wcat=="Random") {
        list($wc,$wordlist) = $this->load_words("data/things.txt","Things",$wcat,$wc,$wordlist);
      }
      if($wcat=="Colors" || $wcat=="Random") {
        list($wc,$wordlist) = $this->load_words("data/colors.txt","Colors",$wcat,$wc,$wordlist);
      }
      if($wcat=="Verbs" || $wcat=="Random") {
        list($wc,$wordlist) = $this->load_words("data/verbs.txt","Verbs",$wcat,$wc,$wordlist);
      }


      // now generate the passwords based on the user's selections

      $pw = Array();

      if (null !== $request->input('words')) {
        $pwcnt = (int) $request->input('pwcnt');
        $schar = (int) $request->input('schar');
        $digits = (int) $request->input('digits');
        for ($x = 0; $x < $pwcnt; $x++) {

          // first get the proper # of randomm words from the word list

          $sc = "!@#$%&*()+{}[]\/?";
          $dig = "0123456789";
          $rwords = Array();
          $num = (int) $request->input('words');
          for ($i = 0; $i < $num; $i ++ ) {
            // if wordlist has more entries than word needed for password, assure uniqueness
            $newword = $wordlist[rand(0,count($wordlist)-1)];
            while (array_search($newword,$rwords) && $num <= count($wordlist)) {
              $newword = $wordlist[rand(0,count($wordlist))];
            }
            //$newword = "test";
            $rwords[$i] = $newword;
          }

          // now string them together

          $pword = '';
          for ($i = 0; $i < count($rwords); $i++) {
            // check for camelcase
            $sep = $request->input('separator');
            $rwords[$i] = strtolower($rwords[$i]);
            if ($sep == "CamelCase") {
              $rwords[$i] = ucfirst($rwords[$i]);
            }
            if($sep == "Hyphen" && $i>0) {
              $rwords[$i] = "-" . $rwords[$i];
            }
            if($sep == "Space" && $i>0) {
              $rwords[$i] = " " . $rwords[$i];
            }
            // now add a special character or a digit if needed

            if ($schar > $i) {
              //add a special character - remove the character from the string to
              //prevent duplicates
              $r = rand(0,strlen($sc)-1);
              $c = substr($sc,$r,1);
              $sc = str_replace($c,'',$sc);
              $rwords[$i] = $rwords[$i] . $c;
            }
            if ($digits > $i) {
              //add a digit - remove the digit from the string to
              //prevent duplicates
              $r = rand(0,strlen($dig)-1);
              $c = substr($dig,$r,1);
              $dig = str_replace($c,'',$dig);
              $rwords[$i] = $rwords[$i] . $c;
            }

            // now concatenate the word to the password
            $pword = $pword . $rwords[$i];
          }

          $pw[$x] = $pword;
        }
      }
        return view('password')->with('pw',$pw);
    }


    private function load_words($fname,$catname,$wcat,$wc,$wordlist) {
      //global $wordlist;
      //global $wcat,$wc;


      $file = fopen($fname,'r') or die($php_errormsg);
      while (! feof($file)) {
        if ($line = fgets($file)) {

            $words = preg_split('/\s+/',$line,-1,PREG_SPLIT_NO_EMPTY);
            // load the words now

            for ($i = 0; $i < count($words); $i++) {
              // load the words

              if($wcat==$catname || $wcat=="Random") {
                $wordlist[$wc] = $words[$i];
                $wc++;
              }

            }
          }
        }
        fclose($file) or die($php_errormsg);
        return array($wc,$wordlist);
      }
}
