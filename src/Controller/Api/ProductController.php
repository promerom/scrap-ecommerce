<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;

#[Route('/api/products')]
class ProductController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function list(ProductRepository $repo, Request $request): JsonResponse
    {
        $storeId = $request->query->get('store');
        $categoryId = $request->query->get('category');

        $criteria = [];
        if ($storeId) $criteria['store'] = $storeId;
        if ($categoryId) $criteria['category'] = $categoryId;

        $products = $repo->findBy($criteria, ['scrapedAt' => 'DESC'], 100);

        return $this->json($products);
    }
}