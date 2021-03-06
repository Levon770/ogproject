<?php

# Магазин:
if ($shop_id && $shop) { ?>
<div class="v-author v-author_shop">
    <? if ($shop['logo']) { ?><a href="<?= $shop['link'] ?>" class="v-author__avatar">
        <img src="<?= $shop['logo'] ?>" class="img" alt=""/>
        </a><? } ?>
    <div class="v-author__info">
        <a href="<?= $shop['link'] ?>" title="<?= $shop['title'] ?>"><span><?= $shop['title'] ?></span></a>
        <div class="v-author_shop__descr">
            <? if (($descr_limit = 100) && mb_strlen($shop['descr']) > $descr_limit) { ?>
                <div><?= tpl::truncate($shop['descr'], $descr_limit, '', true) ?><a href="#"
                                                                                    class="ajax v-author_shop__descr_expand"
                                                                                    id="j-view-owner-shop-descr-ex">...</a>
                </div>
                <div class="hide"><?= mb_substr($shop['descr'], $descr_limit); ?></div>
                <script type="text/javascript">
                    <? js::start() ?>
                    $(function(){
                        $('#j-view-owner-shop-descr-ex').on('click', function(e){ nothing(e);
                            var $content = $(this).parent(); $(this).remove();
                            $content.html($content.text() + $content.next().text());
                        });
                    });
                    <? js::stop() ?>
                </script>
            <? } else { ?>
                <?= $shop['descr']; ?>
            <? } ?>
        </div>
        <? if (!empty($shop['site'])) { ?>
            <div class="v-author_shop__link"><a href="<?= bff::urlAway($shop['site']) ?>" target="_blank" rel="nofollow"
                                                class="ico hide-tail j-away"><i class="fa fa-globe"></i>
                <span><?= $shop['site'] ?></span></a></div><? } ?>
        <? if (!empty($shop['addr_addr'])) {
            $addr_map = (floatval($shop['addr_lat']) && floatval($shop['addr_lon']));
            if ($addr_map) {
                Geo::mapsAPI(false);
            }
            ?>
            <div class="v-author_shop__address rel">
                <? if ($addr_map) { ?><a href="#" class="ico ajax" id="j-view-owner-shop-map-toggler"><i
                        class="fa fa-map-marker"></i> <span><?= _t('view', 'Показать на карте') ?></span></a><? } ?>
                <span
                    class="v-author_shop__address_info"><?= $shop['region_title'] . ', ' . $shop['addr_addr'] ?></span>
                <? if ($addr_map) { ?>
                    <div id="j-view-owner-shop-map-popup"
                         class="v-map-popup v-map-popup_shop dropdown-block dropdown-block-right box-shadow hide abs">
                        <div id="j-view-owner-shop-map-container" class="map-google"
                             style="height: 100%; width: 100%; "></div>
                        <script type="text/javascript">
                    <? js::start() ?>
                    $(function(){
                        var jViewShopMap = (function(){
                            var map = false;
                            app.popup('view-shop-map', '#j-view-owner-shop-map-popup', '#j-view-owner-shop-map-toggler', {
                                onShow: function($p){
                                    $p.fadeIn(100, function(){
                                        if(map) {
                                            map.panTo([<?= HTML::escape($shop['addr_lat'] . ',' . $shop['addr_lon'], 'js') ?>], {delay: 10, duration: 200});
                                        }else{
                                            map = app.map('j-view-owner-shop-map-container', '<?= HTML::escape($shop['addr_lat'] . ',' . $shop['addr_lon'], 'js') ?>', false, {
                                                marker: true,
                                                zoom: 12,
                                                controls: 'view'
                                            });
                                        }
                                    });
                                }
                            });
                        }());
                    });
                    <? js::stop() ?>


                        </script>
                    </div>
                <? } ?>
            </div>
        <? } ?>
    </div>
    <? } else {
    # Частное лицо: ?>
    <div class="v-author">
        <a href="<?= $user['link'] ?>" class="v-author__avatar">
            <span class="tooltiptext">Տեսնել բոլոր հայտարարությունները</span>
            <img src="<?= $user['avatar'] ?>" class="img-circle" alt=""/>
        </a>
        <a href="<?= $user['link'] ?>">
            <div class="v-author__info">
                <span><?= $name ?></span><br/>
                <? if ($owner_type == BBS::OWNER_PRIVATE) { ?>
                    <small class="margin-5"><?= _t('view', 'частное лицо') ?></small>
                <? } else { ?>
                    <small class="margin-5"> <?= _t('view', 'Միջնորդ') ?> </small>
                <? } ?>
                <small> <?= _t('users', 'на сайте с [date]', array('date' => '')) ?></small>
                <small> <?= _t('users', '[date]', array('date' => tpl::date_format2($user['created']))) ?></small>
            </div>
        </a>
        <div class="clearfix"></div>
        <? } ?>
        <div class="v-author__contact">
            <? if ($contacts['has']) { ?>
                <div class="v-author__contact__title">
                    <a href="#" data-toggle="modal" data-target="#callToModal" class="ajax j-v-contacts-expand-link">
                        <?= _t('view', 'показать контакты') ?>
                    </a>
                </div>
            <? } ?>
            <? if (!$owner) { ?>
                <div class="v-author__contact_write">
                    <a class="btn btn-info" data-toggle="modal"
                       data-target="#sendmessage"><?= _t('view', 'Написать автору') ?></a>
                </div>
            <? } ?>
        </div>
    </div>
