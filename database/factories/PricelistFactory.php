<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker){
    return[
        'ID_PRICELIST'  =>'',
        'NAMA_CATEGORY' =>'',
        'TUJUAN_SEWA'   =>'',
        'PRICELIST_SEWA'=>''
    ];
});