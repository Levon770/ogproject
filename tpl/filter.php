<?php

    $coveringCity = Geo::coveringType(Geo::COVERING_CITY);
    if ( ! $coveringCity)
    {
        tpl::includeJS('filter', false, 3);

        # фильтр: регион
        $regionID = 0;
        $regionData = Geo::filter(); # user
        if( ! empty($regionData['id']) ) {
            $regionID = $regionData['id'];
        }
    }
    $titleAll = _t('filter', 'Все регионы');
    if (!$coveringCity && Geo::coveringType(Geo::COVERING_COUNTRIES)) {
        $titleAll = _t('filter', 'Все страны');
    }
?>

<? /* Форма поиска */ ?>
<?= Site::i()->filterForm() ?>