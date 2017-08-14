<?php
/**
 * Блог: список постов - главная
 * @var $this Blog
 */
?>
<div class="row-fluid">
    <div class="l-page l-page_right span12">

        <?= tpl::getBreadcrumbs($breadCrumbs) ?>

        <div class="l-table">
            <div class="l-table-row">
                <div class="l-main l-table-cell">
                    <div class="l-main__content">

                        <h1><?= _t('blog', 'Блог проекта') ?></h1>

                        <?= $list ?>

                        <br />
                        <?= $pgn ?>
                    </div>
                </div>

                <?= $rightBlock ?>

            </div>
        </div>
    </div>
</div>