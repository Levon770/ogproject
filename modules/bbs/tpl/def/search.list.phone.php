<?php

/**
 * Поиск объявлений: список (phone)
 * @var $this BBS
 */

$lng_fav_in = _t('bbs', 'Добавить в избранное');
$lng_fav_out = _t('bbs', 'Удалить из избранного');
$lng_quick = _t('bbs', 'срочно');

if ($list_type == BBS::LIST_TYPE_LIST) { ?>
    <div class="sr-page__list sr-page__list_mobile visible-phone">
        <? foreach ($items as &$v) { ?>
            <div class="sr-page__list__item<? if ($v['svc_marked']) { ?> selected<? } ?>">
                    <div         class="sr-page__list__item_img">
                        <? if ($v['imgs']) { ?>
                            <td class="rel inlblk">
                                <a class="thumb stack rel inlblk" href="<?= $v['link'] ?>" title="<?= $v['title'] ?>">
                                    <img src="<?= $v['img_s'] ?>" alt="<?= $v['title'] ?>"/>
                                    <? if ($v['imgs'] > 1) { ?>
                                        <span class="photo-count"><i class="fa fa-camera"></i> <?= $v['imgs'] ?></span>
                                    <? } ?>
                                </a>
                            </td>
                        <? } ?>
                    </div>
                    <div class="sr-page__list__item_descr">
                        <? if ($v['fav']) { ?>
                            <a href="javascript:void(0);" class="item-fav active j-i-fav"
                               data="{id:<?= $v['id'] ?>}" title="<?= $lng_fav_out ?>"><span class="item-fav__star"><i
                                            class="fa fa-star j-i-fav-icon"></i></span></a>
                        <? } else { ?>
                            <a href="javascript:void(0);" class="item-fav j-i-fav" data="{id:<?= $v['id'] ?>}"
                               title="<?= $lng_fav_in ?>"><span class="item-fav__star"><i
                                            class="fa fa-star-o j-i-fav-icon"></i></span></a>
                        <? } ?>
                        <h5><? if ($v['svc_quick']) { ?><span
                                    class="label label-warning quickly"><?= $lng_quick ?></span>&nbsp;<? } ?><a
                                    href="<?= $v['link'] ?>"><?= $v['title'] ?></a></h5>

                        <div class="sr-page__list__item_price">
                            <? if ($v['price_on']) { ?>
                                <? if ($v['price']) { ?><strong><?= $v['price'] ?></strong><? } ?>
                                <? if ($v['price_mod']) { ?>
                                    <small><?= $v['price_mod'] ?></small><? } ?>
                            <? } ?>
                        </div>
                        <div class="sr-page__list__item_descr">
                            <?= $v['cat_title'] ?><br/>
                            <? if (!empty($v['city_title'])): ?>
                                <i class="fa fa-map-marker"></i> <?= $v['city_title'] ?><?= !empty($v['district_title']) ? ', ' . $v['district_title'] : '' ?><? endif; ?>
                        </div>
                        <div class="sr-page__list__item_date"><?= $v['publicated'] ?></div>
                    </div>
                    <tr>
                        <td colspan="2" >

                        </td>
                    </tr>
                    <tr>

                    </tr>
            </div>
        <? }
        unset($v); ?>
    </div>


<? } else if ($list_type == BBS::LIST_TYPE_GALLERY) { ?>
    <div class="sr-page__gallery sr-page__gallery_mobile visible-phone">
        <div class="thumbnails">
            <? foreach ($items as &$v) { ?>
                <div class="sr-page__gallery__item thumbnail rel span4<? if ($v['svc_marked']) { ?> selected<? } ?>">
                    <? if ($v['fav']) { ?>
                        <a href="javascript:void(0);" class="item-fav active j-i-fav" data="{id:<?= $v['id'] ?>}"
                           title="<?= $lng_fav_out ?>"><span class="item-fav__star"><i
                                        class="fa fa-star j-i-fav-icon"></i></span></a>
                    <? } else { ?>
                        <a href="javascript:void(0);" class="item-fav j-i-fav" data="{id:<?= $v['id'] ?>}"
                           title="<?= $lng_fav_in ?>"><span class="item-fav__star"><i
                                        class="fa fa-star-o j-i-fav-icon"></i></span></a>
                    <? } ?>
                    <div class="sr-page__gallery__item_img align-center">
                        <a class="rel inlblk" href="<?= $v['link'] ?>" title="<?= $v['title'] ?>">
                            <img style="width: 100%;height: 120px;" src="<?= $v['img_m'] ?>" alt="">
                            <? if($v['imgs'] > 1) { ?>
                                <span class="photo-count"><i class="fa fa-camera white"></i> <?= $v['imgs'] ?></span>
                            <? } ?>
                        </a>
                    </div>
                    <div class="sr-page__gallery__item_descr">
                        <h4 title="<?= $v['title'] ?>"><? if ($v['svc_quick']) { ?><span
                                    class="label label-warning quickly"><?= $lng_quick ?></span>&nbsp;<? } ?><a
                                    href="<?= $v['link'] ?>"><?= $v['title'] ?></a></h4>
                        <p class="sr-page__gallery__item_price">
                            <? if ($v['price_on']) { ?>
                                <strong><?= $v['price'] ?> <small> <?= $v['price_mod'] ?></small></strong>
                            <? } ?>
                        </p>
                        <p>
                            <small>
                                <?= $v['cat_title'] ?><br/>
                            </small>
                            <small>
                                <? if (!empty($v['city_title'])): ?><i
                                        class="fa fa-map-marker"></i> <?= $v['city_title'] ?><?= !empty($v['district_title']) ? ', ' . $v['district_title'] : '' ?><? endif; ?>
                            </small>
                        </p>
                    </div>
                </div>
            <? } ?>
        </div>
    </div>
<? } else if ($list_type == BBS::LIST_TYPE_MAP) { ?>
    <? if (!Request::isAJAX()) { ?>
        <div class="sr-page__map sr-page__map_mobile visible-phone">
            <div class="sr-page__map_ymap span12">
                <div class="j-search-map-phone" style="height: 300px; width: 100%;"></div>
            </div>
        </div>
        <div class="sr-page__list sr-page__list_mobile j-maplist visible-phone">
    <? } ?>
    <? foreach ($items as &$v) { ?>
        <div class="sr-page__list__item<? if ($v['svc_marked']) { ?> selected<? } ?>">
            <table>
                <tr>
                    <td colspan="2" class="sr-page__list__item_descr">
                        <? if ($v['fav']) { ?>
                            <a href="javascript:void(0);" class="item-fav active j-i-fav" data="{id:<?= $v['id'] ?>}"
                               title="<?= $lng_fav_out ?>"><span class="item-fav__star"><i
                                            class="fa fa-star j-i-fav-icon"></i></span></a>
                        <? } else { ?>
                            <a href="javascript:void(0);" class="item-fav j-i-fav" data="{id:<?= $v['id'] ?>}"
                               title="<?= $lng_fav_in ?>"><span class="item-fav__star"><i
                                            class="fa fa-star-o j-i-fav-icon"></i></span></a>
                        <? } ?>
                        <h5>
                            <? if ($v['svc_quick']) { ?>
                                <span class="label label-warning quickly"><?= $lng_quick ?></span>&nbsp;
                            <? } ?>
                            <a href="<?= $v['link'] ?>"><?= $v['title'] ?></a>
                        </h5>

                    </td>
                </tr>
                <tr>
                    <td class="sr-page__list__item_date"><?= $v['publicated'] ?></td>
                    <td class="sr-page__list__item_price">
                        <? if ($v['price_on']) { ?>
                            <? if ($v['price']) { ?><strong><?= $v['price'] ?></strong><? } ?>
                            <? if ($v['price_mod']) { ?>
                                <small><?= $v['price_mod'] ?></small><? } ?>
                        <? } ?>
                    </td>
                </tr>
            </table>
        </div>
    <? }
    unset($v); ?>
    <? if (!Request::isAJAX()) { ?>
        </div>
    <? } ?>
<? }