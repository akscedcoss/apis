<?php

use Phalcon\Mvc\Controller;


class IndexController extends Controller
{
    public function indexAction()
    {
        // phpinfo();
        //
        die;
        $url = "https://google.com";

        // Initialize a CURL session.
        $ch = curl_init();

        //grab URL and pass it to the variable.
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_exec($ch);
    }
}
