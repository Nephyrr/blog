<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\Card;
use App\Service\CardAccueil;
use App\Service\CardContact;
use App\Entity\Articles;
use App\Repository\UserRepository;
use App\Entity\User;
use App\Controller\ArticlesController;

use App\Form\ArticlesType;
use App\Repository\ArticlesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\SecurityController;
use App\Form\UserType;
use App\Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;



class Controller extends AbstractController
{
    /**
     * @Route("/articles", name="articles")
     */
    public function articles()
    {
        

        $entityManager = $this->getDoctrine()->getManager();
        $article = $entityManager->getRepository(Articles::class)->findBy([], ['id' => 'DESC']);

        $card = new Card($article);
        return $this->render('/articles.html.twig', [
            'controller_name' => 'Controller.php',
            'article' => $article,
            'card' => $card->getCards()


        ]);
        
    }

    /**
     * @Route("/", name="home")
     */
    public function home(ArticlesRepository $articleRepo)
    {
        $articles = $articleRepo->limit();
        $cardAccueil = new CardAccueil($articles);
        return $this->render('/index.html.twig', [
            'controller_name' => 'Controller.php',
            'article' => $articles,
            'cards' => $cardAccueil->getCards()


        ]);
    }

     /**
     * @Route("/accueil", name="accueil")
     */
    public function accueil(ArticlesRepository $articleRepo )
    {
        $articles = $articleRepo->limit();
        $cardAccueil = new CardAccueil($articles);
        return $this->render('/index.html.twig', [
            'controller_name' => 'Controller.php',
            'article' => $articles,
            'cards' => $cardAccueil->getCards()


        ]);
    }



    /**
     * @Route("/about", name="about")
     */
    public function about(ArticlesRepository $articleRepo)
    {
        $articles = $articleRepo->lucas('Lucas');
        $cardContact = new CardContact($articles);
        return $this->render('/about.html.twig', [
            'controller_name' => 'Controller.php',
            'article' => $articles,
            'cards' => $cardContact->getCards()


        ]);
    }

    

    /**
     * @Route("/liste", name="articles_index", methods={"GET"})
     */
    public function index(ArticlesRepository $articlesRepository): Response
    {
        return $this->render('articles/index.html.twig', [
            'articles' => $articlesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    public function userName()
    {
        $user = $this->getUser();
        
        return $this->render('base.html.twig', [
            'username' => $user
        ]);

    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
    

    

    /**
     * @Route("/{plus}", name="articles_show", methods={"GET"})
     */
    public function plus(Articles $article): Response
    {
        return $this->render('articles/show.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/new", name="articles_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $article = new Articles();
        $form = $this->createForm(ArticlesType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('articles_index');
        }

        return $this->render('articles/new.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="articles_show", methods={"GET"})
     */
    public function show(Articles $article): Response
    {
        return $this->render('articles/show.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="articles_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Articles $article): Response
    {
        $form = $this->createForm(ArticlesType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('articles_index');
        }

        return $this->render('articles/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="articles_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Articles $article): Response
    {
        if ($this->isCsrfTokenValid('delete' . $article->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            $entityManager->flush();
        }

        return $this->redirectToRoute('articles_index');
    }



   
}
