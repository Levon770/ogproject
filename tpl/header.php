<?php
$url = array(
    'item.add' => BBS::url('item.add'),
    'user.login' => Users::url('login'),
    'user.register' => Users::url('register'),
    'user.logout' => Users::url('logout'),
);
?>

<div id="user-top">
    <div class="content">
        <div class="container-fluid">
            <!-- BEGIN filter -->
            <? if (DEVICE_DESKTOP_OR_TABLET) { ?>
                <div class="f-navigation row-fluid rel pull-left">
                    <!--for: desktop-->
                    <div class="f-navigation__menu rel hidden-phone">
                        <? if (DEVICE_DESKTOP_OR_TABLET) { ?>
                            <!--for: desktop-->
                            <div class="f-navigation__menu_desktop visible-tablet visible-desktop">
                                <ul class="nav nav-tabs">
                                    <?
                                    $aMainMenu = array_reverse(Sitemap::view('main'));
                                    foreach ($aMainMenu as $k => $v) {
                                        ?>
                                        <li><a
                                            href="<?= $v['link'] ?>"<?= ($v['target'] === '_blank' ? ' target="_blank"' : '') ?>><?= $v['title'] ?></a>
                                        </li><?
                                    }
                                    ?>
                                </ul>
                            </div>
                        <? } ?>
                    </div>
                </div>
            <? } ?>
            <? if (!User::id()) {
                $favsCounter = BBS::i()->getFavorites(0, true); ?>
                <!-- for: guest -->
                <div class="l-top__navbar_guest pull-right" id="j-header-guest-menu">
                    <? if (DEVICE_DESKTOP_OR_TABLET) { ?>
                        <!-- for: desktop & tablet -->
                        <div class="l-top__navbar_guest_desktop hidden-phone">
                            <div class="user-menu">
                                <span class="link-block block">
                                    <a href="<?= BBS::url('my.favs') ?>" class="btn">
                                        <i class="fa fa-star"></i>
                                        <span class="label label-success j-cnt-fav <?= (!$favsCounter ? 'hide' : '') ?>">
                                            <?= $favsCounter ?>
                                        </span>
                                    <?= _t('header', '<a [login_link]>
                                            Մուտք
                                        </a> / <a [reg_link]>
                                            Գրանցում
                                        </a>', array('login_link' => 'href="' . $url['user.login'] . '" class=""', 'reg_link' => 'href="' . $url['user.register'] . '"')) ?>
                                </span>
                            </div>
                        </div>
                    <? }
                    if (DEVICE_PHONE) { ?>
                        <!-- for: mobile -->
                        <div class="l-top__navbar_guest_mobile visible-phone">
                            <? $aMainMenu = array_reverse(Sitemap::view('main'));
                            foreach ($aMainMenu as $k => $v) { ?>
                                <a style="float:left;display: inline-block; margin: 6px 0 0 0;font-size: 14px;font-weight: 100;" href="<?= $v['link'] ?>"<?= ($v['target'] === '_blank' ? ' target="_blank"' : '') ?>>
                                    <i style="background: -webkit-linear-gradient(#38a0d0, #22759c); -webkit-background-clip: text; -webkit-text-fill-color: transparent; color: #41b8ee; font-size: 18px;" class="fa fa-home" aria-hidden="true"></i>
                                    <?= $v['title'] ?>
                                </a>
                                <? break ; } ?>
                            <span class="link-block block nowrap"><? if ($favsCounter) { ?><a
                                    href="<?= BBS::url('my.favs') ?>" class="btn"><i class="fa fa-star"></i>
                                    <span class="label label-success j-cnt-fav"><?= $favsCounter ?></span>
                                    </a><? } ?><?= _t('header', '<i class="fa fa-user-circle-o" aria-hidden="true"></i> <a [login_link]>Մուտք</a> / <a [reg_link]>Գրանցում</a>', array('login_link' => 'href="' . $url['user.login'] . '" class=""', 'reg_link' => 'href="' . $url['user.register'] . '"')) ?></span>
                        </div>
                    <? } ?>
                </div>
            <? } else {
                $userMenu = Users::i()->my_header_menu();
                ?>
                <!-- for: logined user -->
                <div class="l-top__navbar_user" id="j-header-user-menu">
                    <? if (DEVICE_DESKTOP_OR_TABLET) { ?>
                        <!-- for: desktop & tablet -->
                        <div class="l-top__navbar_user_desktop hidden-phone">
                            <div class="user-menu pull-right">
                                <div class="btn-group nowrap">
                                    <a class="btn"
                                       href="<?= BBS::url('my.items') ?>"></a>
                                    <a href="<?= $userMenu['menu']['favs']['url'] ?>" class="btn">
                                        <i class="fa fa-star"></i>
                                        <span class="label label-success<?= (!$userMenu['user']['cnt_items_fav'] ? ' hide' : '') ?> j-cnt-fav"><?= $userMenu['user']['cnt_items_fav'] ?></span></a>
                                    <a href="<?= $userMenu['menu']['messages']['url'] ?>" class="btn">
                                        <i class="fa fa-commenting"></i>
                                        <span class="label label-success<?= (!$userMenu['user']['cnt_internalmail_new'] ? ' hide' : '') ?> j-cnt-msg"><?= $userMenu['user']['cnt_internalmail_new'] ?></span></a>
                                    <!-- start: User Dropdown -->
                                    <span href="#" class="btn dropdown">
                                        <i class="fa fa-user-circle-o"></i>
                                        <? if($userMenu['user']['name']) {?>
                                        <span> <?= tpl::truncate($userMenu['user']['name'], 20) ?></span>
                                        <? } else { ?>
                                            <span> Իմ էջը </span>
                                        <? } ?>
                                        <i class="fa fa-angle-down"></i>

                                        <ul class="dropdown-menu">
                                            <? foreach ($userMenu['menu'] as $k => $v):
                                                if ($v == 'D') { ?>
                                                    <li class="divider"></li><? } else { ?>
                                                    <li><a href="<?= $v['url'] ?>" class="ico"><i
                                                            class="<?= $v['i'] ?>"></i> <?= $v['t'] ?></a></li><? }
                                            endforeach; ?>
                                        </ul>
                                    </span>

                                    <!-- end: User Dropdown -->

                                </div>
                            </div>
                        </div>
                    <? }
                    if (DEVICE_PHONE) { ?>
                        <!-- for: mobile -->
                        <div class="l-top__navbar_user_mobile visible-phone">
                            <? $aMainMenu = array_reverse(Sitemap::view('main'));
                                foreach ($aMainMenu as $k => $v) { ?>
                                    <a style="display:inline-block;margin: 7px 0 0 10px;font-size: 14px;font-weight: 100;" href="<?= $v['link'] ?>"<?= ($v['target'] === '_blank' ? ' target="_blank"' : '') ?>>
                                        <i style="background: -webkit-linear-gradient(#38a0d0, #22759c); -webkit-background-clip: text; -webkit-text-fill-color: transparent; color: #41b8ee; font-size: 18px;" class="fa fa-home" aria-hidden="true"></i>
                                        <?= $v['title'] ?>
                                    </a>
                                <? break ; } ?>
                            <div class="user-menu pull-right">
                                <ul class="btn-group">
                                    <li class="btn<? if ($userMenu['user']['cnt_items_fav']) { ?> active-counter<? } ?>">
                                        <a href="<?= $userMenu['menu']['favs']['url'] ?>"><i
                                                class="fa fa-star"></i></a></li>
                                    <li class="btn<? if ($userMenu['user']['cnt_internalmail_new']) { ?> active-counter<? } ?>">
                                        <a href="<?= $userMenu['menu']['messages']['url'] ?>"><i
                                                class="fa fa-commenting"></i></a></li>
                                    <li class="btn">
                                        <!-- start: User Dropdown -->
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                            <i class="fa fa-user-circle-o"></i>
                                            <i class="fa fa-caret-down hidden-phone"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <? foreach ($userMenu['menu'] as $k => $v):
                                                if ($v == 'D') { ?>
                                                    <li class="divider"></li><? } else { ?>
                                                    <li><a href="<?= $v['url'] ?>"><i
                                                            class="<?= $v['i'] ?>"></i> <?= $v['t'] ?></a>
                                                    </li><? }
                                            endforeach; ?>
                                        </ul>
                                        <!-- end: User Dropdown -->
                                    </li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    <? } ?>
                </div>
            <? } ?>
        </div>
    </div>
</div>

<!-- BEGIN header -->
<div id="header">
    <div class="content">
        <div class="container-fluid">
            <div class="l-top row-fluid">
                <? if (DEVICE_DESKTOP_OR_TABLET) { ?>
                    <div class="l-top__logo span5 hidden-phone">
                        <!-- for: desktop & tablet -->
                        <div class="l-top__logo_desktop pull-left rel">
                            <a class="logo" href="<?= bff::urlBase() ?>"><img src="/img/do-logo.png"
                                                                              alt="ogut.am"/>
                                <span><?= config::get('title_' . LNG) ?></span></a>
                            <?

                            ?>
                        </div>
                    </div>
                <? } ?>
                <div class="l-top__navbar span7">
                    <? if (!User::id()) {
                        $favsCounter = BBS::i()->getFavorites(0, true); ?>
                        <!-- for: guest -->
                        <div class="l-top__navbar_guest" id="j-header-guest-menu">
                            <? if (DEVICE_DESKTOP_OR_TABLET) { ?>
                                <!-- for: desktop & tablet -->
                                <div class="l-top__navbar_guest_desktop hidden-phone">
                                    <div class="user-menu">
                                        <div class="btn-group">
                                            <a class="btn btn-success nowrap" href="<?= $url['item.add'] ?>"><i
                                                    class="fa fa-plus white"></i> <?= _t('header', 'Добавить объявление') ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <? }
                            ?>
                        </div>
                    <? } else {
                        $userMenu = Users::i()->my_header_menu();
                        ?>
                        <!-- for: logined user -->
                        <div class="l-top__navbar_user" id="j-header-user-menu">
                            <? if (DEVICE_DESKTOP_OR_TABLET) { ?>
                                <!-- for: desktop & tablet -->
                                <div class="l-top__navbar_user_desktop hidden-phone">
                                    <div class="user-menu pull-right">
                                        <div class="btn-group nowrap">
                                            <a href="<?= $url['item.add'] ?>" class="btn btn-success"><i
                                                    class="fa fa-plus white"></i><span> <?= _t('header', 'Добавить объявление') ?></span></a>
                                        </div>
                                    </div>
                                </div>
                            <? }
                            ?>
                        </div>
                    <? } ?>
                    <? if (DEVICE_PHONE) { ?>
                        <!-- for: mobile -->
                        <div class="l-top__navbar_user_mobile visible-phone">
                            <a class="logo" href="<?= bff::urlBase() ?>">
                                <img src="/img/do-logo.png" alt="ogut.am"/>
                            </a>
                            <div class="l-table-row">
                                <div class="user-menu l-table-cell">
                                    <div class="btn-group">
                                        <a class="btn btn-success nowrap hide-sm-phone"
                                           href="<?= $url['item.add'] ?>">
                                            <i class="fa fa-plus white"></i> <?= _t('header', 'Добавить объявление') ?>
                                        </a>
                                        <a class="btn btn-success nowrap visible-sm-phone" href="<?= $url['item.add'] ?>">
                                            <i class="fa fa-plus white"></i>
                                        </a>
                                        <a class="btn btn-navbar hidden" data-target=".l-top__navbar .nav-collapse"
                                           data-toggle="collapse">
                                            <span class="fa fa-bars"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- for mobile: collapsed main menu (guest & logined)-->
                        <div class="l-top__mmenu nav-collapse collapse visible-phone">
                            <ul class="nav nav-list">
                                <li<? if (bff::isIndex()) { ?> class="active"<? } ?>><a
                                        href="<?= bff::urlBase() ?>"><?= _t('', 'Главная') ?></a></li>
                                <? $aMainMenu = Sitemap::view('main');
                                foreach ($aMainMenu as $k => $v) {  ?>
                                <li<? if ($v['a']) { ?> class="active"<? } ?>><a
                                        href="<?= $v['link'] ?>"><?= $v['title'] ?></a>
                                </li>
                                <? } ?>
                            </ul>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END header -->