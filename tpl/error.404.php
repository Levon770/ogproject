<h1 class="align-center hidden-phone"><?= _t('error', 'Страница не найдена. Ошибка 404.') ?></h1>
<div class="l-spacer hidden-phone"></div>
<div class="l-page__spacer l-page__spacer_empty l-page__spacer_top"></div>
<div class="row-fluid">
    <div class="span4 offset2">
        <p>
            <span class="visible-phone"><b><?= _t('error', 'Страница не найдена. Ошибка 404.') ?></b></span>
            <?= _t('error', 'Страницы, на которую вы попытались попасть не существует.') ?>
        </p>
        <p><?= _t('error', 'Попробуйте её найти вернувшись на <a [home]>главную страницу</a>.', array('home'=>'href="'.bff::urlBase().'"')) ?></p>
        <div class="l-page__spacer l-page__spacer_empty l-page__spacer_top"></div>
    </div>
    
</div>