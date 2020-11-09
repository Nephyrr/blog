<?php

namespace App\Service;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CardAccueil
{

    private $articles;

    public function  __construct($desArtciles) {
        $this->articles = $desArtciles;

    }

    /**
     * @Route("/index", name="index")
     */
    public function getCards()
    {
        $html = '';
           foreach ($this->articles as $article)
           {
            $html .= '
                    <div class="col-md-4" >
                            <img src="/img/' . $article->getImage() . '" class="card-img-top" alt="..." >
                            <div class="card-body">
                                <h5 class="card-title">' . $article->getTitre() . '</h5>
                                <p class="card-text">' . $article->getContenu() . '</p>
                                <a href="" class="btn btn-primary">Test</a>
                            </div>
                    </div>
            ';
            //dump($html);die;
        }

        return $html;
        
    }

            /*.$this->path.$this->$articles->getImage().*/
            /*<img src="" class="card-img-top" alt="...">*/
}
