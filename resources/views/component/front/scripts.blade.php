<script src="{{url('/js/app.js')}}"></script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-4419475170841205",
    enable_page_level_ads: true
  });
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-106586554-5"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-106586554-5');
</script>

<script>
    if($('#searchInput').val()!==''){
        $('#nav-search').addClass('show');
    }

    $(document).mouseup(function(e) 
    {
        var container = $("#searchInput");

        if (!container.is(e.target) && container.has(e.target).length === 0) 
        {
            $('#nav-search').removeClass('show');
        }
    });
        
</script>