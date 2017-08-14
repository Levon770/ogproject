<?php

/**
 * Просмотр объявления: Список похожих объявлений
 * @var $this BBS
 */
$similar = &$aData;
if (empty($similar)) return '';

?>
<div class="v-like">
    <div class="v-like_title"><?= _t('view', 'Другие похожие объявления') ?></div>
    <? if(DEVICE_DESKTOP_OR_TABLET) { ?>
    <div class="sr-page__list sr-page__list_desktop v-like__list hidden-phone">
        <?
        $similar_total = sizeof($similar); $i = 1;
        foreach($similar as &$v): ?>
        <div class="sr-page__list__item v-like__list__item">
            <table>
                <tr>
                    <td class="sr-page__list__item_img">
                        <? if ($v['imgs']) { ?>
                            <span class="rel inlblk">
                                <a class="thumb stack rel inlblk" href="<?= $v['link'] ?>" title="<?= $v['title'] ?>">
                                    <img class="lazy" data-original="<?=$v['img_s'];?>" alt="<?= $v['title'] ?>"/>
                                    <? if ($v['imgs'] > 1) { ?>
                                        <span class="photo-count"><i class="fa fa-camera"></i> <?= $v['imgs'] ?></span>
                                    <? } ?>
                                </a>
                            </span>
                        <? } else { ?>
                            <span class="rel inlblk">
                                <a class="thumb stack rel inlblk" href="<?= $v['link'] ?>" title="<?= $v['title'] ?>">
                                    <img class="lazy" data-original="<?=$v['img_s'];?>" alt="<?= $v['title'] ?>"/>
                                </a>
                            </span>
                        <? } ?>
                    </td>
                    <td class="sr-page__list__item_date">

                        <? if ($v['fav']) { ?>
                            <a href="javascript:void(0);" class="item-fav active j-i-fav"
                               data="{id:<?= $v['id'] ?>}" title="<?= $lng_fav_out ?>"><span class="item-fav__star"><i
                                        class="fa fa-star j-i-fav-icon"></i></span></a>
                        <? } else { ?>
                            <a href="javascript:void(0);" class="item-fav j-i-fav" data="{id:<?= $v['id'] ?>}"
                               title="<?= $lng_fav_in ?>"><span class="item-fav__star"><i
                                        class="fa fa-star-o j-i-fav-icon"></i></span></a>
                        <? } ?>
                    </td>
                    <td class="sr-page__list__item_descr">
                        <h3><? if ($v['svc_quick']) { ?><span
                                class="label label-warning quickly"><?= $lng_quick ?></span>&nbsp;<? } ?><a
                                href="<?= $v['link'] ?>"><?= $v['title'] ?></a></h3>
                        <p>
                            <small>
                                <?= $v['cat_title'] ?><br/>
                                <? if (!empty($v['city_title'])): ?><i
                                    class="fa fa-map-marker"></i> <?= $v['city_title'] ?><?= !empty($v['district_title']) ? ', ' . $v['district_title'] : '' ?><? endif; ?>
                            </small>
                        </p>
                        <span><?= $v['publicated'] ?></span>
                    </td>
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
        <? if($i++ != $similar_total) { ?><div class="spacer"></div><? } ?>
        <? endforeach; unset($v); ?>
    </div>

    <? } ?>
    <? if(DEVICE_PHONE){ ?>
    <div class="sr-page__list sr-page__list_mobile v-like__list visible-phone">
        <? foreach($similar as &$v): ?>
            <div class="sr-page__list__item v-like__list__item">
                <div         class="sr-page__list__item_img">
                    <? if ($v['imgs']) { ?>
                        <td class="rel inlblk">
                            <a class="thumb stack rel inlblk" href="<?= $v['link'] ?>" title="<?= $v['title'] ?>">
                                <img class="lazy" data-original="<?=$v['img_s'];?>" alt="<?= $v['title'] ?>"/>
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
        <? endforeach; unset($v); ?>
    </div>
    <? } ?>
</div>