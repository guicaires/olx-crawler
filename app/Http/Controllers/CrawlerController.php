<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Support\Facades\Cache;

class CrawlerController extends Controller
{
    private $item;
    private $results = array();
    private $url = 'https://olx.com.br/autos-e-pecas/carros-vans-e-utilitarios?q=';

    public function olxCrawler ($search = null)
    {
        $client = new Client();

        if (Cache::has($search)) {
            return Cache::get($search);
        }

        $page = $client->request('GET', $this->url . $search);

        $page->filter('.fnmrjs-1')->each(function($item, $key) {

            $this->item = $item;

            $this->results[$key] = [
                'title' => $this->getText('h2'),
                'image' => $this->getImg(),
                'description' => $this->getText('.iNpuEh > div:nth-child(3) > span'),
                'price' => $this->getText('p'),
                'date' =>  $this->getText('.gHqbSa > div > div > span:nth-child(1)'),
                'time' => $this->getText('.gHqbSa > div > div > span:nth-child(2)'),
                'location' => $this->getText('.gmtqTp > span'),
            ];

        });

        if (count($this->results) > 0 && $search) {
            Cache::put($search, $this->results, 60 * 60 * 1); // 1 hour
        }

        return response($this->results);
    }

    private function getText($filter)
    {
        return $this->item->filter($filter)->count() ? $this->item->filter($filter)->text() : '';
    }

    private function getImg($filter = 'img')
    {
        return $this->item->filter($filter)->count() ? $this->item->filter($filter)->attr('src') : '';
    }
}
