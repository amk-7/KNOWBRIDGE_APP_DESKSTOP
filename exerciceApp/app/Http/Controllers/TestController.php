<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function test(){

        echo "time(): ".time()."<br>";

       /* echo strtotime("now");
        echo "_____";*/

       echo "date(U): ".date("U")."<br>";

       echo "strtotime(): ".strtotime("now")."<br>";


        //echo date("l d M Y a H:i:s ", time());


        echo  "strtotime('d M Y'): ".strtotime("2022/10/28")."<br>";


        echo "Les fonctions date() et gmdate()<br>";

        echo "date('d M Y'): ".date("l d M Y à H:i:s")."<br>";

        echo "gmdate('d M Y'): ".gmdate("l d M Y à H:i:s")."<br>";

    }


}
