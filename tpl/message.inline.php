<?php

?>
<br />
<p class="<?= ( ! empty($align) ? $align : 'align-center') ?>">
    <?= $message ?>
    <? if( ! empty($auth)) { ?><br /><?= _t('', '<a [link_login]>Մուտք գործել</a> կամ <a [link_register]>գրանցվել</a>',
                    array('link_login'    => 'href="'.Users::url('login').'"',
                          'link_register' => 'href="'.Users::url('register').'"',)) ?><? } ?>
</p>