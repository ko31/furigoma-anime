<?php
require 'vendor/autoload.php';

use Intervention\Image\ImageManager;

$koma = ['img/fu.png', 'img/to.png'];

$manager = new ImageManager();

for ($i=0; $i<32; $i++) {
    $decbin = str_pad(decbin($i), 5, '0', STR_PAD_LEFT);
    $bg = $manager->make('img/bg.png');
    $bg->insert($manager->make($koma[substr($decbin, 0, 1)])->rotate(rand(1, 359)), 'top-left', rand(30, 100), rand(30, 100));
    $bg->insert($manager->make($koma[substr($decbin, 1, 1)])->rotate(rand(1, 359)), 'top-right', rand(30, 100), rand(30, 100));
    $bg->insert($manager->make($koma[substr($decbin, 2, 1)])->rotate(rand(1, 359)), 'center', rand(-30, 30), rand(-30, 30));
    $bg->insert($manager->make($koma[substr($decbin, 3, 1)])->rotate(rand(1, 359)), 'bottom-left', rand(30, 100), rand(30, 100));
    $bg->insert($manager->make($koma[substr($decbin, 4, 1)])->rotate(rand(1, 359)), 'bottom-right', rand(30, 100), rand(30, 100));
    $bg->save("dst/output{$i}.png");
}
