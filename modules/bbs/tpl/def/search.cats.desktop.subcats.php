<div class="f-categories hidden-phone">
    <div class="f-categories-in" id="j-f-categories-block">
        <?
        $count = 0;
        $cols = 1;
        $colsClass = 3;
        $catsTotal = sizeof($cats);
        foreach (array(24 => 1, 25 => 2, 60 => 3, 300 => 4) as $k => $v) {
            if ($catsTotal <= $k) {
                $cols = $v;
                $colsClass = (3 / $v);
                break;
            }
        }
        $cats = ($cols > 1 ? array_chunk($cats, ceil($catsTotal / $cols)) : array($cats));
        foreach ($cats as $catsChunk):?>
            <? foreach ($catsChunk as $v): $count++; ?>
                <ul class="f-categories-col">
                    <li title="<?= $v['t'] ?>" class="<? if ($count > 12) {
                        echo ' hide';
                    } ?>">
                        <a href="<?= $v['l'] ?>">
                            <span class="f-categories-col-item"><?= $v['t'] ?><? if ($v['subs']) { ?><? } ?></span>
                            <span class="f-categories-col-count"><?= $v['items'] ?></span>
                        </a>
                    </li>
                </ul>
            <? endforeach; ?>
        <? endforeach; ?>
        <ul class="f-categories-col <? if ($count <= 12) {
            echo ' hidden';
        } ?>">
            <li class="f-categories-col-more">
                <a href="#" class="ajax pseudo-link-ajax" id="j-f-categories-toggle"> ևս <? echo ($count - 12)?>
                    կատեգորիա ․․․ </a>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div>