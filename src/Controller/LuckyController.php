<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;

$package = new Package(new EmptyVersionStrategy());

class LuckyController extends AbstractController

{
    #[Route('/')]
    public function homePage(): Response
    {
        $tracks = [
            'bopuahah : ksdfsqqsqjds',
            'bopsdfh : kdfsjds',
            'bosdfsdpuahah : ksjdsqdvvs',
            'bohah : ksjdsvshjj455',
        ]; 


        return $this->render('homepage.html.twig',  [
            'title' => 'pB and James',
            'tracks' => $tracks
        ]);
    }

    #[Route('/browse/{slug}')]
// slug will be use as argument in the url, it will be display into the response
    public function browse(string $slug = null): Response
    
    {
        if ($slug) {
            $title = u(str_replace('-',' ',$slug))->title(true);
        } else {
            $title = 'All Gender';
        }
        
        

            return new Response('Gender: '.$title);
    }
}