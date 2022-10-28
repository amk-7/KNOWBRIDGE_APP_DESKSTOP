<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurlController extends Controller
{
    public function index() {
        $curl_session = curl_init('http://api.football-data.org/v2/competitions');
        curl_setopt($curl_session, CURLOPT_HEADER, true);
        $donnees = curl_exec($curl_session);
        curl_close($curl_session);
        return  view('curl-get')->with('donnees', $donnees);
    }

    public function userConnection(Request $request) {
        $canal =curl_init();
        curl_setopt($canal, CURLOPT_URL, $request->adresse);
        $user = array('email' => $request->email, 'password' => $request->password);
        curl_setopt($canal, CURLOPT_POST, true);
        curl_setopt($canal, CURLOPT_POSTFIELDS, $user);
        $reponse = curl_exec($canal);
        curl_close($canal);
        echo $reponse;

    }
}
