<?php

namespace App\Service;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CardContact
{

    private $articles;

    public function  __construct($desArtciles)
    {
        $this->articles = $desArtciles;
    }

    /**
     * @Route("/index", name="index")
     */
    public function getCards()
    {
        $html = '';
        foreach ($this->articles as $article) {
            $html .= '
                    <div class="card">
                            <img src="/img/' . $article->getImage() . '" class="card-img-top" alt="..." >
                            <div class="card-body text-center">
                                <h5 class="card-title">' . $article->getTitre() . '</h5>
                                <p class="card-text">' . $article->getContenu() . '</p>
                                <p class="card-text">Me contacter au : 0643600513</p>
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
