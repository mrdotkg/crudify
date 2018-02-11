<?php
/**
 * Created by PhpStorm.
 * User: kgaurav
 * Date: 08/02/18
 * Time: 10:17 AM
 */

namespace App\Controller\Website;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * @Route("/index")
     * @return Response
     */
    public function index()
    {
        return $this->render('Product/index.html.twig');

    }
    /**
     * @Route("/create")
     * @return Response
     */
    public function create()
    {
        return $this->render('Product/create.html.twig');

    }

}