<?php

namespace App\Service\Scraper;

class ExampleScraper
{
    public function scrape(string $url): array
    {
        // Ejemplo: retorna productos estáticos para la demo.
        return [
            [
                'name' => 'Producto Demo 1',
                'description' => 'Descripción producto demo 1',
                'imageUrl' => 'https://via.placeholder.com/150',
                'price' => 999.99,
            ],
            [
                'name' => 'Producto Demo 2',
                'description' => 'Descripción producto demo 2',
                'imageUrl' => 'https://via.placeholder.com/150',
                'price' => 799.50,
            ],
        ];
    }
}