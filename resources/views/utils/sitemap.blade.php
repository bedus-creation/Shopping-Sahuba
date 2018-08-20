<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" 
  xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" 
  xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
    <url> 
        <loc>https://sahuba.com/</loc> 
        <changefreq>daily</changefreq>
        <image:image>
            <image:loc>https://aammui.com/img/bedus-creation-icon.png</image:loc>
            <image:caption>Sahuba Logo</image:caption>
        </image:image>
    </url>
    @foreach($products as $item)
    <url>
        <loc>{{url($item->product_link())}}</loc>
        <lastmod>{{$item->updated_at}}+5:45</lastmod>
        @foreach($item->medias as $media)
        <image:image>
            <image:loc>{{$media->link()}}</image:loc>
            <image:caption>{{$item->name}}</image:caption>
        </image:image>
        @endforeach
    </url> 
    @endforeach
</urlset>