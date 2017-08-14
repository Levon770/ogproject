<?php foreach (tpl::$includesJS as $v) { ?>
    <script src="<?= $v ?>" type="text/javascript" charset="utf-8"></script>
<?php } ?>

<script type="text/javascript">
    <? js::start(); ?>
    $(function () {
        app.init({
            adm: false, host: '<?= SITEHOST ?>', hostSearch: '<?= Geo::url() ?>', rootStatic: '<?= SITEURL_STATIC ?>',
            cookiePrefix: 'bff_', regionPreSuggest: <?= Geo::regionPreSuggest() ?>, lng: '<?= LNG ?>',
            lang: <?= func::php2js(array(
            'fav_in' => _t('bbs', 'Добавить в избранное'),
            'fav_out' => _t('bbs', 'Удалить из избранного'),
            'fav_added_msg' => _t('bbs', ' <a [fav_link]></a>', array('fav_link' => 'href="' . BBS::url('my.favs') . '" class="green-link"')),
            'fav_added_title' => _t('bbs', 'Объявление добавленно в избранные'),
            'fav_limit' => _t('bbs', 'Авторизуйтесь для возможности добавления большего количества объявлений в избранные'),
            'form_btn_loading' => _t('', 'Подождите...'),
            'form_alert_errors' => _t('', 'При заполнении формы возникли следующие ошибки:'),
            'form_alert_required' => _t('', 'Заполните все отмеченные поля'),
        )); ?>,
            mapType: '<?= Geo::mapsType() ?>',
            logined: <?= User::id() > 0 ? 'true' : 'false'; ?>,
            device: '<?= bff::device() ?>',
            catsFilterLevel: <?= BBS::catsFilterLevel(); ?>
        });
    });
    <? js::stop(true); ?>
</script>

<?= js::renderInline(js::POS_HEAD); ?>

<!--  FB SDK Code  -->
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.async=true; js.src = "//connect.facebook.net/hy_AM/sdk.js#xfbml=1&version=v2.9&appId=438778766502114";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    $(document).ready(function () {
        if ($(window).width() > 768) {
            $("#typed").typed({
                strings: ["Ուզու՞մ ես արագ վաճառել 🤔^2500"," Ավելացրու հայտարարությունդ մեզ մոտ, լիովին անվճար 😉 ^2500", "Մեքենաներ, անշարժ գույք, աշխատանք, ծառայություններ, տեխնիկա և շատ ավելին․․․ 📌"],
                typeSpeed: 15,
                backSpeed: 5,
                backDelay: 2000
            })
        }
        $('.menu-nav-frame').owlCarousel({
            loop: false,
            margin: 0,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 6,
                    nav: false
                },
                1000: {
                    items: 8,
                    nav: true,
                    loop: false,
                    margin: 0
                }
            }
        });
        $("img.lazy").lazyload({});
        $(document).ajaxStop(function () { $('img.lazy').lazyload({}).removeClass("lazy");});
    });
</script>
<!--<script type="text/javascript" src="//ogut.am/livechat/php/app.php?widget-init.js"></script>-->
