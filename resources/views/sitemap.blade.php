<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>

@if($type == 'sitemap')
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@if(isset($links) && !empty($links))
@foreach($links as $key => $link)
@for ($i = 1; $i <= $link; $i++)
<sitemap>
<loc>{{ route('index') }}/{{ $type }}/{{ $key }}/{{ $i }}</loc>
</sitemap>
@endfor
@endforeach
@endif
</sitemapindex>
@else
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@if(isset($links) && !empty($links))
@foreach($links as $key => $link)
<url>
<loc>{{ route('index') }}/{{ $type }}/{{ $link }}</loc>
<changefreq>weekly</changefreq>
<priority>1.0</priority>
</url>
@endforeach
@endif
</urlset>
@endif


