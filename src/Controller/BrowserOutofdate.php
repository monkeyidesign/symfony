<?php namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BrowserOutofdate extends AbstractController

{
    /**
     *
     * @Route("/", name="browsers_outofdate")
     *
     */
    public function index()
    {
        $ua = $_SERVER['HTTP_USER_AGENT'];

        $version = [];
        if (strpos($ua, 'MSIE') !== false && strpos($ua, 'MSIE 7.0') !== false) {
            $version['ie'] = "IE7";
        }elseif(strpos($ua, 'MSIE') !== false && strpos($ua, 'MSIE 8.0') !== false) {
            $version['ie'] = "IE8";
        }elseif(strpos($ua, 'MSIE') !== false && strpos($ua, 'MSIE 9.0') !== false) {
            $version['ie'] = "IE9";
        }elseif(strpos($ua, 'MSIE') !== false && strpos($ua, 'MSIE 10.0') !== false) {
            $version['ie'] = "IE10";
        }else{
            if(strpos($ua, 'MSIE') == false && strpos($ua, 'rv:11.0') !== false) {
                $version['ie'] = "IE11";
            }
        }
        if(strpos($ua, 'MSIE') !== false || strpos($ua, 'Trident') !== false || strpos($ua, 'rv') !== false) {
            $version['desc']['en-browser'] = "Your web browser (Internet Explorer {$version['ie']}) is out of date.";
            $version['desc']['en-recommand'] = "Use another browser (Edge, Chrome or Firefox) for more security, speed and the best experience on this site.";
            $version['desc']['it-browser'] = "Il browser che stai utilizzando non è più supportato.";
            $version['desc']['it-recommand'] = "Utilizza un altro browser come ad esempio Edge, Chrome o Firefox per maggiore sicurezza, velocità e migliori prestazioni all'interno del nostro sito";
            $version['desc']['es-browser'] = "El navegador que está utilizando ya no es compatible.";
            $version['desc']['es-recommand'] = "Use otro navegador como Edge, Chrome o Firefox para mayor seguridad, velocidad y mejor rendimiento dentro de nuestro sitio";
        }

        if(strpos($ua, 'MSIE') !== false || strpos($ua, 'Trident') !== false || strpos($ua, 'rv') !== false) {
            if($version['desc']['en-browser']){
                $ieCheck_en = $version['desc']['en-browser'];
                $ieCheckDesc_en = $version['desc']['en-recommand'];
            }
            return $this->render('base.html.twig', [
                'ieCheck' => $ieCheck_en,
                'ieCheckDesc' => $ieCheckDesc_en
            ]);
        }else{
            return $this->render('base.html.twig', [
                'ieCheck' => null,
                'ieCheckDesc' => null
            ]);
        }


    }
}
