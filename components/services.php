<?php
// components/services.php — service landing pages (SEO): URL slug => settings.
// Texts live in the CMS under "svcpage_<key>_*" keys (database/service_texts.php), prices come from the price list.
// 'prices' => [category slug, [subcategory positions in that category (0-based, by sort order)] or null for all]
return [
    'manicure-warszawa-wola' => [
        'key' => 'manicure',
        'image' => '/assets/img/nox/manicure-hybrydowy-bordowy.webp',
        'prices' => ['manicure', [0]],
        'gallery' => ['manicure-hybrydowy-bordowy', 'manicure-clean-pink-nude', 'manicure-french-sliwkowy-matowy', 'manicure-czerwony-klasyczny', 'manicure-mleczny', 'manicure-kocie-oko-szmaragd', 'manicure-matowy-szalwia', 'manicure-nude-zdobienie', 'manicure-japonski-pasta', 'work-cherry', 'work-plum-matte', 'work-milky-nude'],
    ],
    'przedluzanie-paznokci-warszawa-wola' => [
        'key' => 'extensions',
        'image' => '/assets/img/nox/przedluzanie-paznokci-migdal-mleczny.webp',
        'prices' => ['manicure', [1]],
        'gallery' => ['przedluzanie-paznokci-migdal-mleczny', 'przedluzanie-paznokci-dlugie-biale', 'przedluzanie-paznokci-kwadrat-nude', 'przedluzanie-paznokci-migdal-nude', 'przedluzanie-paznokci-french', 'paznokcie-zdobienia-3d', 'paznokcie-zdobienie-morskie', 'work-french-almond', 'work-plum-french', 'work-french-square'],
    ],
    'pedicure-warszawa-wola' => [
        'key' => 'pedicure',
        'image' => '/assets/img/nox/pedicure-hybrydowy-czerwony.webp',
        'prices' => ['pedicure', null],
        'gallery' => ['pedicure-hybrydowy-czerwony', 'pedicure-bordowy', 'pedicure-wisniowy', 'pedicure-czerwony-klasyczny', 'pedicure-burgund', 'pedicure-nude', 'work-pedicure-red'],
    ],
    'brwi-rzesy-warszawa-wola' => [
        'key' => 'brows',
        'image' => '/assets/img/nox/laminowanie-rzes-efekt.webp',
        'prices' => ['brows', null],
        'gallery' => ['laminowanie-rzes-efekt', 'laminowanie-farbowanie-rzes-przed-po', 'work-lash-lift', 'work-lash-lamination', 'work-lash-before-after', 'elektroepilacja-gabinet', 'elektroepilacja-zabieg'],
    ],
    'fryzjer-warszawa-wola' => [
        'key' => 'hair',
        'image' => '/assets/img/nox/fryzjer-bob.webp',
        'prices' => ['hair', [0, 2]],
        'gallery' => ['fryzjer-bob', 'fryzjer-balayage', 'fryzjer-dlugie-proste-wlosy', 'fryzjer-stylizacja-wlosow', 'work-hair-brunette', 'work-hair-blonde'],
    ],
    'barber-warszawa-wola' => [
        'key' => 'barber',
        'image' => '/assets/img/nox/barber-strzyzenie-meskie.webp',
        'prices' => ['hair', [1]],
        'gallery' => ['barber-strzyzenie-meskie', 'work-barber-fade', 'work-barber-classic', 'fryzjer-barber-vadzim'],
    ],
];
