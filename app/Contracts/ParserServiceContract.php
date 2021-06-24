<?php declare(strict_types=1);


namespace App\Contracts;


interface ParserServiceContract
{
    public function getNews(string $url);
}
