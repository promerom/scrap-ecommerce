<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ProductRepository;
use App\Repository\FavoriteRepository;
use App\Entity\Favorite;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/api/favorites')]
class FavoriteController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function list(FavoriteRepository $repo): JsonResponse
    {
        $user = $this->getUser();
        $favorites = $repo->findBy(['user' => $user]);
        return $this->json($favorites);
    }

    #[Route('/add', methods: ['POST'])]
    public function add(Request $request, ProductRepository $productRepo, EntityManagerInterface $em): JsonResponse
    {
        $productId = $request->request->get('product_id');
        $user = $this->getUser();
        $product = $productRepo->find($productId);

        if(!$product || !$user) {
            return $this->json(['success' => false, 'error' => 'Producto o usuario no encontrado'], 400);
        }

        $favorite = new Favorite();
        $favorite->setUser($user);
        $favorite->setProduct($product);
        $em->persist($favorite);
        $em->flush();

        return $this->json(['success' => true]);
    }
}