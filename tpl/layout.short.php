<!DOCTYPE html>
<html class="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?= SEO::i()->metaRender() ?>
<? if( User::id() ){ ?><meta name="csrf_token" content="<?= bff::security()->getToken() ?>"  /><? } ?>
<link rel="shortcut icon" href="<?= SITEURL_STATIC ?>/favicon.ico" />
<? include 'css.php'; ?>
</head>
<body class="q<?= bff::database()->statQueryCnt(); ?><?php if ((strpos($_SERVER['REQUEST_URI'], "user/login") !== false) || (strpos($_SERVER['REQUEST_URI'], "user/register") !== false) || (strpos($_SERVER['REQUEST_URI'], "user/forgot") !== false) ){echo ' user-page';}?>">
<? include 'alert.php'; ?>
<div id="wrap">
    <? include 'header.short.php'; ?>
    <!-- BEGIN main content -->
    <div id="main">
        <div class="content">
            <div class="container-fluid">
                <div class="l-top__logo">
                    <? if( DEVICE_DESKTOP_OR_TABLET ) { ?>
                        <!-- for: desktop & tablet -->
                        <div class="hidden-phone">
                            <a class="logo" href="<?= bff::urlBase() ?>"><img src="/img/do-logo.png" alt="" /></a>
                        </div>
                    <? } if( DEVICE_PHONE ) { ?>
                        <!-- for: mobile -->
                        <div class="l-top__logo_mobile visible-phone">
                            <a class="logo" href="<?= bff::urlBase() ?>"><img src="/img/do-logo.png" alt="" /></a>
                        </div>
                    <? } ?>
                </div>
                <?= $centerblock; ?>
            </div>
        </div>
    </div>
    <!-- END main content -->
    <div id="push"></div>
</div>
<? include 'footer.php'; ?>
</body>
</html>