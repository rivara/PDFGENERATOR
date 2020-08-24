<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Core extends MX_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function robots()
    {
        header("Content-Type:text/plain");
        if(strpos($_SERVER['SERVER_NAME'], 'localhost') !== false || strpos($_SERVER['SERVER_NAME'], 'devsite') !== false) {
            echo 'User-agent: *'.chr(13);
            echo 'Disallow:'.chr(13);
            echo 'Disallow: *'.chr(13);
        } else {
            echo 'User-agent: *'.chr(13);
            echo 'Allow:'.chr(13);
            echo 'Allow: *'.chr(13);
            echo 'Disallow: /js/'.chr(13);
            echo 'Disallow: /css/'.chr(13);
        }
    }
}
