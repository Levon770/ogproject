<div class="row-fluid">
    <div class="l-page index-page span12">
<? if(DEVICE_DESKTOP_OR_TABLET) { ?>
        <? if( ! empty($titleh1) ): ?>
            <h1 class="align-center hidden-phone"><?= $titleh1; ?></h1>
            <span id="typed" class="align-center hidden-phone"></span>
            <div class="l-spacer hidden-phone"></div>
        <? endif; ?>
        <div class="index__catlist hidden-phone">
            <?= BBS::i()->catsList('index', bff::DEVICE_DESKTOP, 0); ?>
        </div>
        <?= $last ?>
        <div class="l-info  hidden-phone"><?= $seotext; ?></div>
<? } else { ?>
    <?= $last ?>
<? } ?>
    </div>
</div>