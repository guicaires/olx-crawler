<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;

class CrawlerController extends Controller
{
    private $results = array();
    private $url = 'https://olx.com.br/autos-e-pecas/carros-vans-e-utilitarios?q=';

    public function olxCrawler ($search = null)
    {
        $client = new Client();

        $page = $client->request('GET', $this->url . $search);

        $page->filter('.fnmrjs-1')->each(function($item, $key) {

            $this->results[$key] = [
                'title' => $item->filter('h2')->text(),
                'image' => $item->filter('img')->attr('src'),
                'description' => $item->filter('.iNpuEh > div:nth-child(3) > span')->text(),
                'price' => $item->filter('p')->text(),
                'date' =>  $item->filter('.gHqbSa > div > span:nth-child(1)')->text(),
                'time' => $item->filter('.gHqbSa > div > span:nth-child(2)')->text(),
                'location' => $item->filter('.gmtqTp > span')->text(),
            ];

        });

        return response($this->results);
    }
}
