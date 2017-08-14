<?php
$lng_fav_in = _t('bbs', 'Добавить в избранное');
$lng_fav_out = _t('bbs', 'Удалить из избранного');
$lng_quick = _t('bbs', 'срочно');
?>
<div class="index-latest" id="j-bbs-index-last-block">
	<div class="index-latest__heading">
		<h2><?= $title ?></h2>
	</div>
	<div class="sr-page__gallery sr-page__gallery_desktop">
		<div id="j-bbs-index-last-carousel" class="thumbnails">
     		<? $items_1ast= array_splice($items, 0,5); shuffle($items); $result = array_merge($items_1ast, $items); foreach($result as $v): ?>
				<a title="<?= $v['title'] ?>" href="<?= $v['link'] ?>" class="sr-page__gallery__item index-latest__item thumbnail rel<? if($v['svc_marked']){ ?> selected<? } ?>">
					<? if($v['fav']) { ?>
						<span href="javascript:void(0);" class="item-fav active j-i-fav" data="{id:<?= $v['id'] ?>}" title="<?= $lng_fav_out ?>"><span class="item-fav__star"><i class="fa fa-star j-i-fav-icon"></i></span></span>
					<? } else { ?>
						<span href="javascript:void(0);" class="item-fav j-i-fav" data="{id:<?= $v['id'] ?>}" title="<?= $lng_fav_in ?>"><span class="item-fav__star"><i class="fa fa-star-o j-i-fav-icon"></i></span></span>
					<? } ?>
					<div class="sr-page__gallery__item_img align-center">
                        <img class="lazy" alt="<?=$v['title'];?>" data-original="<?=$v['img_m'];?>">
						<? if($v['imgs'] > 1) { ?>
							<span class="photo-count"><i class="fa fa-camera white"></i> <?= $v['imgs'] ?></span>
						<? } ?>
					</div>

					<div class="sr-page__gallery__item_descr">
						<h4><? if($v['svc_quick']) { ?><span class="label label-warning quickly"><?= $lng_quick ?></span>&nbsp;<? } ?><div><?= $v['title'] ?></div></h4>
						<p class="sr-page__gallery__item_price">
							<? if($v['price_on']) { ?>
								<strong><?= $v['price'] ?></strong>
							<? } ?>
						</p>
					</div>
				</a>
			<? endforeach; ?>
		</div>
	</div>
</div>
