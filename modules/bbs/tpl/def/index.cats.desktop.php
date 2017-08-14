<?php

$i = 0;
foreach($cats as $k=>$v): ?>
   <div class="index__catlist__item i<?= $i%2 ?>">
        <a href="<?= $v['l'] ?>" class="img"><img src="<?= $v['i'] ?>" alt="" /></a>
        <div class="title">
            <a href="<?= $v['l'] ?>"><?= $v['t'] ?></a>
            <span class="index__catlist__item__count">(<?= $v['items'] ?>)</span>
        </div>
        <? if($v['subn']): ?>
            <div class="links">
                <? $j = 0; foreach($v['sub'] as $vv) { ?><a href="<?= $vv['l'] ?>"><?= $vv['t'] ?></a><? if($j++ < $v['subv']) echo '; '; } ?>
                <? if($v['subn'] > $v['subv']){ ?> ...<? } ?>
            </div>
        <? endif; ?>
   </div>
   <? if($i++%2) { ?><div class="clearfix"></div><? }
endforeach; ?>
<div class="clearfix"></div>