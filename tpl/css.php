<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<? if((strtok($_SERVER['REQUEST_URI'], '?') == '/' || strtok($_SERVER['REQUEST_URI'], '?') == '/index.php')) {?>
   <meta property="og:image" content="http://ogut.am/files/images/items/ogut-soc.png">
   <meta property="og:image:secure_url" content="https://ogut.am/files/images/items/ogut-soc.png">
<? } ?>

<link rel="stylesheet" media="all" type="text/css" href="<?= SITEURL_STATIC ?>/css/normalize.min.css" />
<link rel="stylesheet" media="all" type="text/css" href="<?= SITEURL_STATIC ?>/css/custom-bootstrap.css" />
<link rel="stylesheet" media="all" type="text/css" href="<?= SITEURL_STATIC ?>/css/main.css" />
<link rel="stylesheet" media="all" type="text/css" href="<?= SITEURL_STATIC ?>/css/font-awesome.min.css" />

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-102573085-1', 'auto');
    ga('send', 'pageview');

</script>
<script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter44885101 = new Ya.Metrika({ id:44885101, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/44885101" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

<?
foreach(tpl::$includesCSS as $v) {
    ?><link rel="stylesheet" href="<?= $v; ?>" type="text/css" /><?
}
