<?php

use Phalcon\Mvc\Controller;


class IndexController extends Controller
{
    /**
     * getJsonResponse Function 
     * Function will get url as a parameter 
     * Curl it 
     * and return Json Data
     * @return void
     */
    public function getJsonResponse($url)
    {
        // Initialize a CURL session.
        $ch = curl_init();
        //grab URL and pass it to the variable.
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch));
        return $response;
    }

    public function indexAction()
    {   
        // If Post Request 
        if ($this->request->isPost()) {
            $token = explode(" ",$this->request->getPost('query'));
            $token = implode("+",$token);
            $url="https://openlibrary.org/search.json?q=$token&mode=ebooks&has_fulltext=true";
            $this->view->res= $this->getJsonResponse($url);
        }
     }
    /**
     * iss Action  function
     * Here will request For current Location of ISS and Number of Poeple In sapace 
     * @return void
     */
    public function issAction()
    {
        //Get data of Current Loc of ISS
        $this->view->loc = $this->getJsonResponse("http://api.open-notify.org/iss-now.json?");
        // Get Number of people In Space 
        $this->view->people = $this->getJsonResponse("http://api.open-notify.org/astros.json?");
    }

    /**
     * Get details function
     *
     * @return void
     */
    public function detailAction($key)
    {   
    
        $url="https://openlibrary.org/works/$key.json";
      

        $this->view->detail = $this->getJsonResponse($url);
       

     }

 

}
