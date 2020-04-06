<?php namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController {
    /**
     * @Route("/", name="index_page")
     */

    public function index(){
        return $this->render('base.html.twig');
    }
    public function browser_outofdate()
    {
        return $this->render('browser-outofdate.html.twig');
    }
}
