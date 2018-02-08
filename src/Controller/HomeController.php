<?php
/**
 * Created by PhpStorm.
 * User: kgaurav
 * Date: 08/02/18
 * Time: 10:17 AM
 */

namespace App\Controller;



use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    /**
     * @return Response
     *
     */
    public function index()
    {
        return new Response('Home Sweet Home !!!');

    }

}