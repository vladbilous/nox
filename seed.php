<?php
require 'f:/OSPanel_2024/home/nox/DB.php';
$hero_imgs = ['04.DIgV1dWw_1CSoJW','05.DK2cK-Is_1Tm2o4','06.BHFJqsXQ_2ggQVj','07.CI7nJox7_ZH3xHp','08.r1yclwGx_ZKRrAg','09.B6vK9DYb_ZWa1pX','10.CCWLUVQQ_ZB6MGz','11.BCUSUzih_ZMSBoh','12.D91Ql-NB_2d7X3R'];
foreach($hero_imgs as $i => $img) {
    DB::execute("INSERT INTO slider_images (slider_type, image_path, sort_order) VALUES ('hero', '/assets/img/slider-image-{$img}.webp', " . ($i * 10) . ")");
}
$gallery_imgs = ['example-45.B73oY6kH_1E2fI7','example-46.DtNaiMAD_1yV74Q','example-47.D73y607t_22N8fJ','example-48.CRwQoB9M_1n19Xf'];
foreach($gallery_imgs as $i => $img) {
    DB::execute("INSERT INTO slider_images (slider_type, image_path, sort_order) VALUES ('gallery', '/assets/img/{$img}.webp', " . ($i * 10) . ")");
}
echo "Seeded.";
