<?php

namespace App\Console\Commands;

use App\Models\Site\Post;
use App\Models\Site\Countri;
use Illuminate\Console\Command;

class SitemapSection extends Command
{
    protected $signature = 'sitemap:section';

    protected $description = 'Generation sitemap-section.xml';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        //$site_url = env('APP_URL', 'http://posmotrim.by');
        $base = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>';
        $xmlbase = new \SimpleXMLElement($base);
        $row = $xmlbase->addChild("url");
        $row->addChild("loc", env('APP_URL', 'http://posmotrim.by'));
        $row->addChild("lastmod", date("c"));
        $row->addChild("changefreq", "monthly");
        $row->addChild("priority", "1");

        $countris = Countri::select('id', 'slug')->get();
        foreach ($countris as $countri)
        {
            $this->addChild($xmlbase, route('site.section', ['region' => $countri->slug]));

            $tags = Post::getAllTagPosts('countri_id', $countri->id);
            foreach ($tags as $slug => $val)
            {
                $this->addChild($xmlbase, route('site.section.tag', ['region' => $countri->slug,'tag' => $slug]));
            }
        }
        $xmlbase->saveXML(public_path("sitemaps/sitemap-section.xml"));
    }

    public function addChild ($xmlbase, $route)
    {
        $row = $xmlbase->addChild("url");
        $row->addChild("loc", $route);
        //$row->addChild("lastmod", date("Y-m-d\TH:i:s+02:00"));
        $row->addChild("priority", "0,5");
    }
}