<!DOCTYPE html>
<html class="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?= SEO::i()->metaRender() ?>
<? if( User::id() ){ ?><meta name="csrf_token" content="<?= bff::security()->getToken() ?>"  /><? } ?>
<link rel="shortcut icon" href="<?= SITEURL_STATIC ?>/favicon.ico"/>
<link rel="alternate" href="<?= SITEURL_STATIC ?>" hreflang="hy-AM" />
<? include 'css.php'; ?>
</head>
<body class="q<?= bff::database()->statQueryCnt(); ?>">
<? include 'alert.php'; ?>
<div id="wrap">
    <? include 'header.php'; ?>
    <!-- BEGIN main content -->
    <div id="main">
        <div class="content">
            <div class="container-fluid">
            <!-- BEGIN filter -->
            <? include ('filter.php'); ?>
            <!-- END filter -->
            <? if (DEVICE_DESKTOP_OR_TABLET && ($bannerTop = Banners::view('site_top'))) { ?>
                <div class="l-banner l-banner_top hidden-phone">
                    <div class="l-banner__content">
                        <?= $bannerTop; ?>
                    </div>
                </div>
            <? } ?>
            <?= $centerblock; ?>
            </div>
        </div>
    </div>
    <!-- END main content -->
    <!--<div id="push"></div>-->
</div>
<? include 'footer.php'; ?>
</body>
</html>