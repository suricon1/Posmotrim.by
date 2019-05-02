<?php

namespace App\Console\Commands;

use App\Models\Site\Post;
use Illuminate\Console\Command;

class SitemapArticle extends Command
{
    const ITEMS_PER_PAGE = 1000;

    private $i = 0;
    private $temp = [];

    protected $signature = 'sitemap:article';

    protected $description = 'Generation sitemap-article.xml';

    public function handle()
    {
        $this->generateSitemapPages();
        $this->generateSitemapIndex();
    }

    private function generateSitemapPages()
    {
        Post::select('slug', 'date_edit')->active()->chunk(self::ITEMS_PER_PAGE, function ($flights) {

            $base = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>';
            $xmlbase = new \SimpleXMLElement($base);
            $row = $xmlbase->addChild("url");
            $row->addChild("loc", env('APP_URL', 'http://posmotrim.by'));
            $row->addChild("lastmod", date("c"));
            $row->addChild("changefreq", "monthly");
            $row->addChild("priority", "0,5");

            foreach ($flights as $flight) {
                $row = $xmlbase->addChild("url");
                $row->addChild("loc", route('site.article', ['alias' => $flight->slug]));
                $row->addChild("lastmod", date("Y-m-d\TH:i:s+02:00", $flight->date_edit));
                $row->addChild("priority", "0,6");
            }
            $xmlbase->saveXML(public_path("sitemaps/sitemap-article-{$this->i}.xml"));

            $this->temp[] = "/sitemaps/sitemap-article-{$this->i}.xml";
            $this->i++;
        });
    }

    private function generateSitemapIndex()
    {
        $base = '<?xml version="1.0" encoding="UTF-8"?><sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></sitemapindex>';
        $xmlbase = new \SimpleXMLElement($base);
        foreach ($this->temp as $item) {
            $row = $xmlbase->addChild("sitemap");
            $row->addChild("loc", env('APP_URL', 'http://posmotrim.by').$item);
        }
        $xmlbase->saveXML(public_path("sitemaps/sitemap-article.xml"));
    }
}
