<?php

/**
 * Просмотр объявления
 * @var $this BBS
 * @var $owner bool просматривает владелец объявления
 */

tpl::includeJS('bbs.view', false, 6);

tpl::includeJS('fancybox/jquery.fancybox.pack', false);
tpl::includeJS('fancybox/helpers/jquery.fancybox-thumbs', false);
tpl::includeCSS('/js/fancybox/jquery.fancybox', false);
tpl::includeCSS('/js/fancybox/helpers/jquery.fancybox-thumbs', false);

tpl::includeJS('fotorama/fotorama', false, '4.4.8');
tpl::includeCSS('/js/fotorama/fotorama', false);

$lang_fav_in = _t('bbs', 'Добавить в избранное');
$lang_fav_out = _t('bbs', 'Удалить из избранного');

$is_publicated = ($status == BBS::STATUS_PUBLICATED);
$is_publicated_out = ($status == BBS::STATUS_PUBLICATED_OUT);
$is_blocked = ($status == BBS::STATUS_BLOCKED && ($owner || $moderation));
$is_business = ($owner_type == BBS::OWNER_BUSINESS);
$is_map = (!empty($addr_addr) && $addr_lat != 0 && $cat_addr);
if ($is_map) {
    Geo::mapsAPI(false);
}
?>
<div class="row-fluid">
    <div class="l-page l-page_full l-page_full-left v-page span12">
        <div class="v-page__content" id="j-view-container">
            <? if ($is_publicated_out): ?>
                <div class="alert-inline">
                    <div class="alert-inline__content">
                        <div class="alert alert-info rel">
                            <div>
                                <?= _t('bbs', 'Объявление снято с публикации') ?> <br/>
                                <small><?= tpl::date_format2($status_changed) ?></small>
                            </div>
                            <?php if ($owner) { ?><a href="#" class="btn btn-info alert-action j-item-publicate"><i
                                class="fa fa-refresh white"></i> <?= _t('bbs', 'Опубликовать снова') ?></a><? } ?>
                        </div>
                    </div>
                </div>
            <? endif; ?>
            <? if ($owner && $is_publicated && (strtotime($publicated_to) - BFF_NOW) < 518400 /* менее 6 дней */): ?>
                <div class="alert-inline">
                    <div class="alert-inline__content">
                        <div class="alert alert-info rel">
                            <div>
                                <?= _t('bbs', 'Объявление публикуется') ?><br/>
                                <small><?= _t('bbs', 'до [date]', array('date' => tpl::date_format2($publicated_to))) ?></small>
                            </div>
                            <a href="#" class="btn btn-info alert-action j-item-refresh"><i
                                    class="fa fa-refresh white"></i> <?= _t('bbs', 'Продлить') ?></a>
                        </div>
                    </div>
                </div>
            <? endif; ?>
            <? if ($is_blocked): ?>
                <div class="alert-inline">
                    <div class="alert-inline__content">
                        <div class="alert alert-error">
                            <?= _t('bbs', 'Объявление было заблокировано модератором.') ?><br/>
                            <?= _t('bbs', 'Причина блокировки:') ?>&nbsp;<strong><?= $blocked_reason ?></strong>
                        </div>
                    </div>
                </div>
            <? endif; ?>
            <? if ($is_publicated && BBS::premoderation() && !$moderated && !$moderation): ?>
                <div class="alert-inline">
                    <div class="alert-inline__content">
                        <div class="alert alert-error">
                            <?= _t('bbs', 'Данное объявление находится на модерации.') ?><br/>
                            <?= _t('bbs', 'После проверки оно будет опубликовано') ?>
                        </div>
                    </div>
                </div>
            <? endif; ?>
            <?= tpl::getBreadcrumbs($cats, true, 'breadcrumb'); ?>
            <div class="l-main l-main_maxtablet">
                <div class="l-main__content">
                    <? if (DEVICE_DESKTOP_OR_TABLET): ?>
                        <div class="hidden-phone js-item-view-title-info">
                            <h1 class="v-title">
                                <? if (!$is_publicated_out): ?>
                                    <? if ($fav): ?>
                                        <a href="#" class="item-fav active j-i-fav" data="{id:<?= $id ?>}"
                                           title="<?= $lang_fav_out ?>"><span class="item-fav__star"><i
                                                    class="fa fa-star j-i-fav-icon"></i></span></a>
                                    <? else: ?>
                                        <a href="#" class="item-fav j-i-fav" data="{id:<?= $id ?>}"
                                           title="<?= $lang_fav_in ?>"><span class="item-fav__star"><i
                                                    class="fa fa-star-o j-i-fav-icon"></i></span></a>
                                    <? endif; ?>
                                <? endif; ?>
                                <? if ($svc_quick) { ?><span
                                    class="label label-warning quickly"><?= _t('bbs', 'срочно') ?></span>&nbsp;<? } ?>
                                <span><?= $title ?></span>
                            </h1>
                            <div class="v-info">
                                <small>
                                    <span class="v-map-point"><i class="fa fa-map-marker"></i> <?= $city_title ?>, <?= _t('view', '[district]', array('district' => $district_data['title']));?>
                                    </span>
                                    | N <?= _t('view', '[id]', array('id' => $id)) ?>
                                    | <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                    <?= _t('view', '[date]', array('date' => tpl::date_format2($created))) ?>
                                    | <i class="fa fa-eye" aria-hidden="true"></i>
                                    <a href="#" <? if ($views_total) { ?> class="ajax" id="j-v-viewstat-desktop-link" <? } ?>>
                                        <?= _t('views ', '[views]', array('views' => $views_total)) ?>
                                        (+<?= _t('view', '[views_today]', array('views_today' => $views_today)) ?>)
                                    </a>

                                </small>
                            </div>
                        </div>
                    <? endif; # DEVICE_DESKTOP_OR_TABLET ?>
                    <? if (DEVICE_PHONE): ?>
                        <div class="visible-phone _mobile">
                            <h1 class="v-title">
                                <? if (!$is_publicated_out): ?>
                                    <? if ($fav): ?>
                                        <a href="#" class="item-fav _mobile active j-i-fav" data="{id:<?= $id ?>}"
                                           title="<?= $lang_fav_out ?>"><span class="item-fav__star"><i
                                                    class="fa fa-star j-i-fav-icon"></i></span></a>
                                    <? else: ?>
                                        <a href="#" class="item-fav _mobile j-i-fav" data="{id:<?= $id ?>}"
                                           title="<?= $lang_fav_in ?>"><span class="item-fav__star"><i
                                                    class="fa fa-star-o j-i-fav-icon"></i></span></a>
                                    <? endif; ?>
                                <? endif; # ! $is_publicated_out ?>
                                <? if ($svc_quick) { ?><span
                                    class="label label-warning quickly"><?= _t('bbs', 'срочно') ?></span>&nbsp;<? } ?>
                                <span><?= $title ?></span><? if ($price_on) { ?><? if ($price) { ?>, <strong
                                    class="nowrap"><?= $price ?></strong><? } ?><? if ($price_mod) { ?>
                                    <small class="nowrap mrgt0"><?= $price_mod ?></small><? } ?><? } ?>
                            </h1>
                            <div class="v-info">
                                <small>
                                    <span class="v-map-point"><i class="fa fa-map-marker"></i> <?= $city_title ?>, <?= _t('view', '[district]', array('district' => $district_data['title']));?></span>
                                    | N <?= _t('view', '[id]', array('id' => $id)) ?>
                                    | <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                    <?= _t('view', '[date]', array('date' => tpl::date_format2($created))) ?>
                                    | <i class="fa fa-eye" aria-hidden="true"></i>
                                    <span <? if ($views_total) { ?> class="ajax"  <? } ?>>
                                        <?= _t('views ', '[views]', array('views' => $views_total)) ?>
                                        (+<?= _t('view', '[views_today]', array('views_today' => $views_today)) ?>)
                                    </span>
                                </small>
                            </div>
                        </div>
                    <? endif; # DEVICE_PHONE ?>
                    <div class="l-center">
                        <div class="l-center__content v-page__content_center">
                            <div class="v-descr">
                                <div class="v-descr_photos">
                                    <div class="fotorama" id="j-view-images" data-auto="false"
                                         data-controlsonstart="false">
                                        <? 
                                        if($images) {
                                            $i = 0;
                                            foreach ($images as $v): ?>
                                                <div data-img="<?= $v['url_view'] ?>"
                                                     data-thumb="<?= $v['url_small'] ?>"
                                                     class="j-view-images-frame image-colors-palette">
                                                    <a href="javascript:;" data-zoom="<?= $v['url_zoom'] ?>"
                                                       class="v-descr_photos__zoom hidden-phone j-zoom"
                                                       data-index="<?= $i++; ?>">
                                                        <i class="fa fa-search-plus" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            <? endforeach;
                                        } else { ?>
                                            <img src="//ogut.am/files/images/items/def-m.png" alt="">
                                        <? }
                                        echo $this->itemVideo()->viewFotorama($video_embed);
                                        if ($is_map) { ?>
                                        <div data-thumb="<?= SITEURL_STATIC ?>/img/map_marker.gif"
                                             class="j-view-images-frame j-map">
                                            <div id="j-view-map"
                                                 style="height:<?= (DEVICE_DESKTOP ? '450' : '350') ?>px; width: 100%;"></div>
                                            </div><? } ?>
                                    </div>
                                </div>
                                <div class="v-descr_properties">
                                    <ul class="unstyled"><?= $dynprops ?></ul>
                                    <div class="clearfix"></div>
                                </div>
                                <? if ($is_map): ?>
                                    <p class="v-descr_address">
                                        <span class="v-descr_address_attr"><?= _t('view', 'Адрес') ?>:</span>
                                        <span class="v-descr_address_val"><?= $city_title ?>, <?
                                            if ($district_id && !empty($district_data['title'])) {
                                                echo _t('view', 'район [district]', array('district' => $district_data['title'])) . ', ';
                                            } ?><?
                                            if ($metro_id && !empty($metro_data['title'])) {
                                                echo _t('view', 'метро [station]', array('station' => $metro_data['title'])) . ', ';
                                            } ?><?= $addr_addr ?>,
                                        <a href="#" class="ajax"
                                           onclick="return jView.showMap(event);"><span><?= _t('view', 'показать на карте') ?></span></a>
                                    </span>
                                    </p>
                                <? elseif ($cat_addr && $metro_id && !empty($metro_data['title'])): ?>
                                    <p class="v-descr_address">
                                        <span class="v-descr_address_attr"><?= _t('view', 'Адрес') ?>:</span>
                                        <span class="v-descr_address_val"><?= $city_title ?>, <?
                                            if ($district_id && !empty($district_data['title'])) {
                                                echo _t('view', 'район [district]', array('district' => $district_data['title'])) . ', ';
                                            }
                                            ?><?= _t('view', 'метро [station]', array('station' => $metro_data['title'])); ?></span>
                                    </p>
                                <? endif; # is_map  ?>
                                <div class="v-descr_text"><?= nl2br($descr) ?></div>
                                <? if (!empty($share_code)) { ?>
                                    <div class="visible-phone hidden-tablet hidden-desktop">
                                        <?= $share_code ?>
                                    </div>
                                <? } ?>
                                <? if (!$is_publicated_out && !$owner && (!$moderation || ($moderation && !$moderated)) && DEVICE_DESKTOP_OR_TABLET):
                                    /* Форма связи с автором объявления */
                                    ?>
                                <? endif; # DEVICE_DESKTOP_OR_TABLET ?>
                                <? if(DEVICE_PHONE): ?>
                                    <div class="align-center visible-phone mrgb30">
                                        <div class="v-author__info">
                                            <a href="<?= $user['link'] ?>" class="v-author__avatar">
                                                <img src="<?= $user['avatar'] ?>" class="img-circle" alt=""/>
                                            </a>
                                            <span><?= $name ?></span>
                                            <? if ($owner_type == BBS::OWNER_PRIVATE) { ?>
                                                <small class="margin-5"><?= _t('view', 'частное лицо') ?></small>
                                            <? } ?>
                                            <small> <?= _t('users', 'на сайте с [date]', array('date' => '')) ?></small>
                                            <small> <?= _t('users', '[date]', array('date' => tpl::date_format2($user['created']))) ?></small>
                                        </div>
                                        <? if ($owner): ?>
                                            <div class="l-action-layer j-v-owner-panel">
                                                <a href="<?= BBS::url('item.edit', array('id' => $id, 'from' => 'view')) ?>">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i><span><?= _t('view', 'Изменить информацию') ?></span></a>
                                                <? if (!$is_publicated) { ?>
                                                    <a href="#" class="j-item-delete">
                                                        <i class="fa fa-ban" aria-hidden="true"></i>
                                                        <span><?= _t('view', 'Удалить') ?></span>
                                                    </a>
                                                <? } ?>
                                                <? if ($is_publicated) { ?>
                                                    <a href="#" class="j-item-unpublicate">
                                                        <i class="fa fa-ban" aria-hidden="true"></i><span><?= _t('view', 'Снять с публикации') ?></span></a>
                                                <? } ?>
                                                <? if ($is_publicated_out) { ?>
                                                    <a href="#" class="j-item-publicate">
                                                        <i class="fa fa-arrow-up"></i>
                                                        <span> <?= _t('view', 'Активировать') ?></span>
                                                    </a>
                                                <? } ?>
                                                <? if ($is_publicated && bff::servicesEnabled()) { ?>
                                                    <a href="<?= $promote_url ?>" class="btn btn-success"><?= _t('view', 'Рекламировать') ?></a>
                                                <? } ?>
                                            </div>
                                        <? endif; # owner ?>
                                        <a href="<?= ($is_shop ? $shop['link'] : $user['link']) ?>"
                                           class="ico"><span><?= ($is_shop ? _t('view', 'Все объявления магазина') : _t('view', 'Все объявления автора')) ?></span>
                                            <i class="fa fa-angle-double-right"></i></a>
                                        <div class="l-page__spacer l-page__spacer_top"></div>
                                        <? if (!empty($contacts['phones'])): ?>
                                            <div class="ajax j-v-contacts-expand-link">
                                                <div class="v-author__contact j-v-contacts-expand-block l-table">
                                                    <div class="v-author__contact_items">
                                                        <div><?= _t('view', 'Тел.') ?></div>
                                                        <div class="j-c-phones"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ajax j-v-contacts-expand-link tel-ico" data-toggle="modal" data-target="#callToModal">

                                            </div>
                                        <? endif; # phones ?>
                                        <div class="l-page__spacer l-page__spacer_top"></div>
                                        <div id="j-view-contact-mobile-block">
                                            <div class="v-descr_contact j-form hide">
                                                <div class="v-descr_contact__form">
                                                    <form action="?act=contact-form" id="j-view-contact-mobile-form">
                                                        <?= Users::i()->writeForm('j-view-contact-mobile-form') ?>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="ajax j-toggler"><?= _t('view', 'Написать сообщение') ?></div>
                                        </div>
                                        <div class="l-page__spacer l-page__spacer_top"></div>
                                        <? if (bff::servicesEnabled()) { ?>
                                            <div class="l-page__spacer l-page__spacer_top"></div>
                                            <a href="<?= $promote_url ?>" class="btn btn-success"><i
                                                    class="fa fa-hand-o-up white"></i> <?= _t('view', 'Продвинуть объявление') ?>
                                            </a>
                                        <? } ?>
                                    </div>
                                <? endif; # DEVICE_PHONE ?>
                            </div>
                            <?
                            /* Комментарии */
                            echo $comments;
                            /* Похожие объявления */
                            if ($is_publicated && !$moderation)
                                echo $similar;
                            ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <? /* Блок справа */ ?>
                <? if (DEVICE_DESKTOP_OR_TABLET): ?>
                    <div class="l-right hidden-phone">
                        <? if ($price_on): ?>
                            <div
                                class="v-price js-item-view-price<? if (empty($price_mod)) { ?> only<? } ?><? if (empty($price)) { ?> modonly<? } ?>">
                                <? if ($price) { ?><span><?= $price ?></span><? } ?><? if ($price_mod) { ?>
                                    <small><?= $price_mod ?></small><? } ?>
                            </div>
                        <? endif; # $price_on  ?>
                        <div class="item-view-owner-info js-item-view-owner">
                                <?= $this->viewPHP($aData, 'item.view.owner') ?>

                                <? if ($owner): ?>
                                    <div class="l-action-layer j-v-owner-panel">
                                        <a href="<?= BBS::url('item.edit', array('id' => $id, 'from' => 'view')) ?>">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                            <span> <?= _t('view', 'Изменить информацию') ?></span>
                                        </a>
                                        <? if (!$is_publicated) { ?>
                                            <a href="#" class="j-item-delete">
                                                <i class="fa fa-ban" aria-hidden="true"></i>
                                                <span><?= _t('view', 'Удалить') ?></span>
                                            </a>
                                        <? } ?>
                                        <? if ($is_publicated) { ?>
                                            <a href="#" class="j-item-unpublicate">
                                                <i class="fa fa-ban" aria-hidden="true"></i>
                                                <span><?= _t('view', 'Снять с публикации') ?></span>
                                            </a>
                                        <? } ?>
                                        <? if ($is_publicated_out) { ?>
                                            <a href="#" class="j-item-publicate">
                                                <i class="fa fa-arrow-up"></i>
                                                <span class="hidden-phone"><?= _t('view', 'Активировать') ?></span>
                                            </a>
                                        <? } ?>
                                        <? if ($is_publicated && bff::servicesEnabled()) { ?>
                                            <a href="<?= $promote_url ?>" class="btn btn-success"><?= _t('view', 'Рекламировать') ?></a>
                                        <? } ?>
                                    </div>
                                <? endif; # owner ?>

                                <? if (bff::servicesEnabled()) { ?>
                                    <div class="v-adv">
                                        <span class="l-page__spacer"></span>
                                        <a href="<?= $promote_url ?>" class="ico"><i class="fa fa-hand-o-up"></i>
                                            <span><?= _t('view', 'Продвинуть объявление') ?></span></a> <br/>
                                    </div>
                                <? } ?>
                                <div class="v-stat">
                                    <div id="j-v-viewstat-desktop-popup-container"></div>
                                    <div class="v-actions rel">

                                        <div id="j-v-send4friend-desktop-popup"
                                             class="v-send4friend-popup dropdown-block dropdown-block-right box-shadow abs hide">
                                            <div class="v-send4friend-popup__form">
                                                <form action="" class="form-inline">
                                                    <input type="hidden" name="item_id" value="<?= $id ?>"/>
                                                    <input type="text" name="email" class="input-medium j-required"
                                                           placeholder="<?= _t('', 'E-mail') ?>"/>
                                                    <button type="submit"
                                                            class="btn j-submit"><?= _t('', 'Отправить') ?></button>
                                                </form>
                                            </div>
                                        </div>
                                        <? if (!$owner) { ?>
                                            <a href="#" class="ico" id="j-v-claim-desktop-link">
                                                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                                <span><?= _t('view', 'Пожаловаться') ?></span></a> <br/>
                                            <div id="j-v-claim-desktop-popup"
                                                 class="v-complaint-popup dropdown-block dropdown-block-right box-shadow abs hide">
                                                <div class="v-complaint-popup__form">
                                                    <?= _t('item-claim', 'Նշեք դժգոհելու պատճառը') ?>
                                                    :
                                                    <form action="">
                                                        <? foreach ($this->getItemClaimReasons() as $k => $v):
                                                            ?><label class="checkbox"><input type="checkbox"
                                                                                             class="j-claim-check"
                                                                                             name="reason[]"
                                                                                             value="<?= $k ?>"/> <?= $v ?>
                                                            <div class="control__indicator"></div>
                                                            </label><?
                                                        endforeach; ?>
                                                        <div class="v-complaint-popup__form_other hide j-claim-other">
                                                            <?= _t('item-claim', 'Оставьте ваш комментарий') ?><br/>
                                                            <textarea name="comment" rows="3"
                                                                      autocapitalize="off"></textarea>
                                                        </div>
                                                        <? if (!User::id()): ?>
                                                            <?= _t('item-claim', 'Введите результат с картинки') ?><br/>
                                                            <input type="text" autocomplete="off" name="captcha"
                                                                   class="input-small required" value=""
                                                                   pattern="[0-9]*"/> <img src="" alt=""
                                                                                           class="j-captcha"
                                                                                           onclick="$(this).attr('src', '<?= tpl::captchaURL() ?>&rnd='+Math.random())"/>
                                                            <br/>
                                                        <? endif; ?>
                                                        <button type="submit"
                                                                class="btn btn-danger j-submit"><?= _t('item-claim', 'Отправить жалобу') ?></button>
                                                    </form>
                                                </div>
                                            </div>
                                        <? } ?>

                                        <? if (!empty($share_code)) { ?>
                                            <?= $share_code ?>
                                        <? } ?>
                                    </div>
                                </div>

                            </div>
                        <? # Баннер: справа - просмотр объявления ?>
                        <? if ($bannerRight = Banners::view('bbs_view_right', array('cat' => $cat_id, 'region' => $city_id))): ?>
                            <div class="l-banner banner-right">
                                <div class="l-banner__content">
                                    <?= $bannerRight ?>
                                </div>
                            </div>
                        <? endif; # $bannerRight ?>
                        <script>
                            (function () {
                                var priceblock = document.querySelector('.js-item-view-title-info').offsetHeight + 'px';
                                document.querySelector('.js-item-view-price').style.height = priceblock;
                            })();
                            window.onresize = function(event) {
                                (function () {
                                    var priceblock = document.querySelector('.js-item-view-title-info').offsetHeight + 'px';
                                    document.querySelector('.js-item-view-price').style.height = priceblock;
                                })();
                            };

                        </script>
                        <div class="fb-page" style="display: block; text-align: center;margin:20px auto" data-href="https://www.facebook.com/www.ogut.am" data-tabs="false" data-width="250" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/www.ogut.am" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/www.ogut.am">Ogut.am - Հայաստանի անվճար հայտարարություններ</a></blockquote></div>
                    </div>
                <? endif; # DEVICE_DESKTOP_OR_TABLET ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    <? js::start(); ?>
    $(function () {
        jView.init(<?= func::php2js(array(
        'lang' => array(
            'sendfriend' => array(
                'email' => _t('', 'E-mail адрес указан некорректно'),
                'success' => _t('', 'Сообщение было успешно отправлено'),
            ),
            'claim' => array(
                'reason_checks' => _t('item-claim', 'Укажите причину жалобы'),
                'reason_other' => _t('item-claim', 'Опишите причину подробнее'),
                'captcha' => _t('', 'Введите результат с картинки'),
                'success' => _t('item-claim', 'Жалоба успешно принята'),
            ),
        ),
        'item_id' => $id,
        'addr_lat' => $addr_lat,
        'addr_lon' => $addr_lon,
        'claim_other_id' => BBS::CLAIM_OTHER,
        'mod' => ($moderation ? BBS::moderationUrlKey($id) : '')
    )) ?>);
    });
    <? js::stop(); ?>

</script>

<div class="v-descr_contact modal hidden-phone fade" id="sendmessage" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <a name="contact-form"></a>
                <div class="v-descr_contact_title"><?= _t('view', 'Свяжитесь с автором объявления') ?></div>
            </div>
            <div class="modal-body v-descr_contact__form">
                <div class="v-descr_contact_user"><?= $name ?></div>
                <form action="?act=contact-form" id="j-view-contact-form">
                    <?= Users::i()->writeForm('j-view-contact-form') ?>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="callToModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="v-author__info">
                    <a href="<?= $user['link'] ?>" class="v-author__avatar">
                        <img src="<?= $user['avatar'] ?>" class="img-circle" alt=""/>
                    </a>
                    <span><?= $name ?></span><br/>
                    <? if ($owner_type == BBS::OWNER_PRIVATE) { ?>
                        <small class="margin-5"><?= _t('view', 'частное лицо') ?></small>
                    <? } ?>
                    <small> <?= _t('users', 'на сайте с [date]', array('date' => '')) ?></small>
                    <small> <?= _t('users', '[date]', array('date' => tpl::date_format2($user['created']))) ?></small>
                </div>
            </div>
            <div class="modal-body">
                <? if($contacts['has']) { ?>
                    <div class="j-v-contacts-expand-block">
                        <? if( ! empty($contacts['phones']) ): ?>
                            <div class="v-author__contact_content j-c-phones">
                                <span class="hide-tail">
                                    <? foreach($contacts['phones'] as $v) { ?>
                                        <?= $v ?>
                                    <? } ?>
                                </span>
                            </div>
                        <? endif; # phones ?>
                    </div>
                <? } ?>
                <p class="modal-info-txt hidden-phone">
                    Զանգահարելիս խնդրում ենք նշել, որ հայտարարությունը գտել եք ogut.am կայքում։
                    Մի համաձայնվեք կանխավճար տալ, եթե անձամբ չեք ճանաչում վաճառողին և վստահ չեք նրա ազնվության վրա։
                    Գնելուց առաջ խորհուրդ է տրվում ստուգել ապրանքը վաճառողի ներկայությամբ։
                </p>
            </div>
            <div class="modal-footer" data-dismiss="modal">
                <div class="hidden-phone visible-tablet visible-desktop">Լավ</div>
                <div class="visible-phone hidden-tablet hidden-desktop">Փակել</div>
            </div>
        </div>
    </div>
</div>