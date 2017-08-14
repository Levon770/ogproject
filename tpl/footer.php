<?php
$aFooterMenu = Sitemap::view('footer');
$aCounters = Site::i()->getCounters();

?>
<!-- BEGIN footer -->
<? if (DEVICE_DESKTOP_OR_TABLET): ?>
    <p class="c-scrolltop" id="j-scrolltop" style="display: none;">
        <a href="#"><span><i class="fa fa-arrow-up"></i></span><?= _t('', 'Наверх'); ?></a>
    </p>
    <div id="footer" class="l-footer hidden-phone">
        <div class="content">
            <div class="container-fluid  l-footer__content">
                <div class="row-fluid l-footer__content_padding">
                    <div class="span3">
                        <?= config::get('copyright_' . LNG); ?>
                        <a target="_blank" href="https://www.facebook.com/www.ogut.am/"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                        <a target="_blank" href="https://twitter.com/OgutArmenia"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                        <a target="_blank" href="https://plus.google.com/u/0/101135398419002929328"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
                        <a target="_blank" href="https://vk.com/oguta_am"><i class="fa fa-vk" aria-hidden="true"></i></a>
                        <a target="_blank" href="https://ok.ru/group/53754218938437/market"><i class="fa fa-odnoklassniki-square" aria-hidden="true"></i></a>

                    </div>
                    <div class="span3">
                        <? if (!empty($aFooterMenu['col1']['sub'])) { ?>
                            <ul><? foreach ($aFooterMenu['col1']['sub'] as $v) {
                                    echo '<li><a href="' . $v['link'] . '"' . ($v['target'] === '_blank' ? ' target="_blank"' : '') . ' class="' . $v['style'] . '">' . $v['title'] . '</a></li>';
                                } ?>
                            </ul>
                        <? } ?>
                    </div>
                    <div class="span3">
                        <? if (!empty($aFooterMenu['col2']['sub'])) { ?>
                            <ul><? foreach ($aFooterMenu['col2']['sub'] as $v) {
                                    echo '<li><a href="' . $v['link'] . '"' . ($v['target'] === '_blank' ? ' target="_blank"' : '') . ' class="' . $v['style'] . '">' . $v['title'] . '</a></li>';
                                } ?>
                            </ul>
                        <? } ?>
                    </div>
                    <div class="span3">
                        <? if (!empty($aFooterMenu['col3']['sub'])) { ?>
                            <ul><? foreach ($aFooterMenu['col3']['sub'] as $v) {
                                    echo '<li><a href="' . $v['link'] . '"' . ($v['target'] === '_blank' ? ' target="_blank"' : '') . ' class="' . $v['style'] . '">' . $v['title'] . '</a></li>';
                                } ?>
                            </ul>
                        <? } ?>
                        <div class="l-footer__content__counters">
                            <? # Выбор языка:
                            $languages = bff::locale()->getLanguages(false);
                            if (sizeof($languages) > 1) { ?>
                                <div class="l-footer__lang rel">
                                    <?= _t('', 'Язык:') ?> <a class="dropdown-toggle ajax ajax-ico"
                                                              id="j-language-dd-link" data-current="<?= LNG ?>"
                                                              href="javascript:void(0);">
                                        <span class="lnk"><?= $languages[LNG]['title'] ?></span> <i
                                                class="fa fa-caret-down"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-block pull-left box-shadow" id="j-language-dd">
                                        <ul>
                                            <? foreach ($languages as $k => $v) { ?>
                                                <li>
                                                    <a href="<?= bff::urlLocaleChange($k) ?>"
                                                       class="ico <? if ($k == LNG) { ?> active<? } ?>">
                                                        <img src="<?= SITEURL_STATIC . '/img/lang/' . $k . '.gif' ?>"
                                                             alt=""/>
                                                        <span><?= $v['title'] ?></span>
                                                    </a>
                                                </li>
                                            <? } ?>
                                        </ul>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    <? js::start() ?>
                                    $(function () {
                                        app.popup('language', '#j-language-dd', '#j-language-dd-link');
                                    });
                                    <? js::stop() ?>
                                </script>
                            <? }
                            ?>
                            <div class="l-footer__content__counters__list">
                                <? if (!empty($aCounters)) { ?>
                                    <? foreach ($aCounters as $v) { ?>
                                        <div class="item"><?= $v['code'] ?></div><? } ?>
                                <? } ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<? endif; ?>
<? if (DEVICE_PHONE): ?>
    <div id="footer" class="l-footer l-footer_mobile visible-phone">
        <div class="l-footer_mobile__menu">
            <? if (!empty($aFooterMenu['col1']['sub'])) { ?>
                <ul><? foreach ($aFooterMenu['col1']['sub'] as $v) {
                        echo '<li><a href="' . $v['link'] . '"' . ($v['target'] === '_blank' ? ' target="_blank"' : '') . ' class="' . $v['style'] . '">' . $v['title'] . '</a></li>';
                    } ?>
                </ul>
            <? } ?>
        </div>
        <div class="l-footer_mobile__menu">
            <? if (!empty($aFooterMenu['col2']['sub'])) { ?>
                <ul><? foreach ($aFooterMenu['col2']['sub'] as $v) {
                        echo '<li><a href="' . $v['link'] . '"' . ($v['target'] === '_blank' ? ' target="_blank"' : '') . ' class="' . $v['style'] . '">' . $v['title'] . '</a></li>';
                    } ?>
                </ul>
            <? } ?>
        </div>
        <div class="span3">
            <a target="_blank" href="https://www.facebook.com/www.ogut.am/"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
            <a target="_blank" href="https://twitter.com/OgutArmenia"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
            <a target="_blank" href="https://plus.google.com/u/0/101135398419002929328"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
            <a target="_blank" href="https://vk.com/oguta_am"><i class="fa fa-vk" aria-hidden="true"></i></a>
            <a target="_blank" href="https://ok.ru/group/53754218938437/market"><i class="fa fa-odnoklassniki-square" aria-hidden="true"></i></a>
        </div>
        <div class="l-footer_mobile__lang mrgt20">
            <? # Выбор языка:
            $languages = bff::locale()->getLanguages(false);
            if (sizeof($languages) > 1) { ?>
                <div class="l-footer__lang rel">
                    <?= _t('', 'Язык:') ?> <a class="dropdown-toggle ajax ajax-ico" id="j-language-dd-phone-link"
                                              data-current="<?= LNG ?>" href="javascript:void(0);">
                        <span class="lnk"><?= $languages[LNG]['title'] ?></span> <i class="fa fa-caret-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-block box-shadow" id="j-language-dd-phone">
                        <ul>
                            <? foreach ($languages as $k => $v) { ?>
                                <li>
                                    <a href="<?= bff::urlLocaleChange($k) ?>"
                                       class="ico <? if ($k == LNG) { ?> active<? } ?>">
                                        <img src="<?= SITEURL_STATIC . '/img/lang/' . $k . '.gif' ?>" alt=""/>
                                        <span><?= $v['title'] ?></span>
                                    </a>
                                </li>
                            <? } ?>
                        </ul>
                    </div>
                </div>
                <script type="text/javascript">
                    <? js::start() ?>
                    $(function () {
                        app.popup('language-phone', '#j-language-dd-phone', '#j-language-dd-phone-link');
                    });
                    <? js::stop() ?>
                </script>
            <? }
            ?>
        </div>
        <div class="l-footer_mobile__copy mrgt15">
            <div style="display:block;margin-bottom: 10px" class="fb-like" data-href="https://www.facebook.com/www.ogut.am/"
                 data-layout="box_count" data-action="like" data-size="small" data-show-faces="true"
                 data-share="false"></div>
            <?= config::get('copyright_' . LNG); ?>

            <br>
        </div>
    </div>
<? endif; ?>
<!-- END footer -->
<? include 'js.php'; ?>
<?= js::renderInline(js::POS_FOOT); ?>
<?

?>
