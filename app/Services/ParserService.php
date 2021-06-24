<?php declare(strict_types=1);


namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

use App\Contracts\ParserServiceContract;


class ParserService implements ParserServiceContract
{

    /**
     * @param string|null $url
     *
     */
    public function getNews(string $url):void
    {
        $e = explode("/", $url);
        $endElement = end($e);
        $xml = \XmlParser::load($url);
        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]

        ]);


        $dataSerialize = serialize($data);



        \Storage::append('parsing/' . $endElement . ".txt", $dataSerialize);
    }
}
