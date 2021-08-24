<?php

namespace App\Modules;

use App\Models\Categories;
use App\Models\CategoryProduct;
use App\Models\Groups;
use App\Models\Products;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\This;

class Beautify
{
    static function setThubm ($color): ?string
    {

        $colors = [
            'Антрацитовый'          => ['bg'=>'#464451', 'color'=>'#b5b0b9'],
            'Бежево-серый'          => ['bg'=>'#6d6552', 'color'=>'#eddbb2'],
            'Бежевый'               => ['bg'=>'#f5f5dc', 'color'=>'#75756a'],
            'Белый'                 => ['bg'=>'#ffffff', 'color'=>'#808080'],
            'Белый/красный'         => ['bg'=>'linear-gradient(138deg, rgba(255,0,0,1) 0%, rgba(255,255,255,1) 26%, rgba(255,81,81,1) 49%, rgba(255,255,255,1) 72%, rgba(255,0,0,1) 96%)', 'color'=>'#191919'],
            'Бирюзовый'             => ['bg'=>'#30d5c8', 'color'=>'#145751'],
            'Бордовый'              => ['bg'=>'#9b2d30', 'color'=>'#f1f1f1'],
            'Бронзово-коричневый'   => ['bg'=>'linear-gradient(120deg, rgba(205,127,50,1) 50%, rgba(150,75,0,1) 50%);', 'color'=>'#ffffff'],
            'Бронзовый'             => ['bg'=>'#cd7f32', 'color'=>'#ffffff'],
            'Голубой'               => ['bg'=>'#42aaff', 'color'=>'#215580'],
            'Горчичный'             => ['bg'=>'#ffdb58', 'color'=>'#806e2d'],
            'Дымчатый'              => ['bg'=>'#c4c4bc', 'color'=>'#191919'],
            'Желтый'                => ['bg'=>'#ffff00', 'color'=>'#808000'],
            'Желтый металлик'       => ['bg'=>'radial-gradient(circle, rgba(255,255,0,1) 0%, rgba(201,148,0,1) 100%)', 'color'=>'#191919'],
            'Жемчужный'             => ['bg'=>'radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(255,243,243,1) 100%)', 'color'=>'#191919'],
            'Зеленый'               => ['bg'=>'#008000', 'color'=>'#00ff00'],
            'Зеленый неон'          => ['bg'=>'radial-gradient(circle, rgba(52,221,20,1) 0%, rgba(164,255,0,1) 100%)', 'color'=>'#191919'],
            'Змеиный'               => ['bg'=>'radial-gradient(circle, rgba(75,122,66,1) 0%, rgba(128,184,28,1) 100%)', 'color'=>'#ffffff'],
            'Золотистый'            => ['bg'=>'', 'color'=>''],
            'Золотой'               => ['bg'=>'radial-gradient(circle, rgba(255,215,0,1) 0%, rgba(246,184,90,1) 100%)', 'color'=>'#191919'],
            'Каштановый'            => ['bg'=>'#CD5C5C', 'color'=>'#ffffff'],
            'Комбинированный'       => ['bg'=>'linear-gradient(138deg, rgba(255,0,0,1) 0%, rgba(246,179,90,1) 16%, rgba(235,246,90,1) 34%, rgba(96,246,90,1) 52%, rgba(84,236,251,1) 67%, rgba(90,117,246,1) 84%, rgba(246,90,203,1) 100%)', 'color'=>'#191919'],
            'Коралловый'            => ['bg'=>'#ff7f50', 'color'=>'#803f28'],
            'Коричневый'            => ['bg'=>'#964b00', 'color'=>'#170b00'],
            'Кофейный'              => ['bg'=>'#442d25', 'color'=>'#c4816a'],
            'Красно-коричневый'     => ['bg'=>'#592321', 'color'=>'#d95550'],
            'Красный'               => ['bg'=>'#ff2e2e', 'color'=>'#ffffff'],
            'Кремовый'              => ['bg'=>'#fdf4e3', 'color'=>'#7d7970'],
            'Крокодиловый'          => ['bg'=>'#736d58', 'color'=>'#ffffff'],
            'Лакированный'          => ['bg'=>'linear-gradient(138deg, rgba(47,47,47,1) 0%, rgba(255,255,255,1) 50%, rgba(68,68,68,1) 98%)', 'color'=>'#191919'],
            'Матовый'               => ['bg'=>'linear-gradient(138deg, rgba(255,255,255,1) 0%, rgba(68,68,68,1) 100%)', 'color'=>'#191919'],
            'Махагон'               => ['bg'=>'#4c2f27', 'color'=>'#ffffff'],
            'Медный'                => ['bg'=>'#b87333', 'color'=>'#382310'],
            'Металлик'              => ['bg'=>'linear-gradient(138deg, rgba(255,255,255,1) 31%, rgba(68,68,68,1) 100%)', 'color'=>'#191919'],
            'Миндальный'            => ['bg'=>'#efdecd', 'color'=>'#191919'],
            'Молочный'              => ['bg'=>'#fff6d4', 'color'=>'#191919'],
            'Мятный'                => ['bg'=>'#3eb489', 'color'=>'#123629'],
            'Небесно-голубой'       => ['bg'=>'#75bbfd', 'color'=>'#191919'],
            'Огненно-красный'       => ['bg'=>'#af2b1e', 'color'=>'#000000'],
            'Оливковый'             => ['bg'=>'#808000', 'color'=>'#ffff00'],
            'Оранжевый'             => ['bg'=>'#ffa500', 'color'=>'#805300'],
            'Ореховый'              => ['bg'=>'#3e2b23', 'color'=>'#ffffff'],
            'Перламутровый'         => ['bg'=>'radial-gradient(circle, rgb(255 232 232) 0%, rgba(255,236,236,1) 100%);', 'color'=>'#191919'],
            'Персик'                => ['bg'=>'#ffd8b1', 'color'=>'#191919'],
            'Песочный'              => ['bg'=>'#fcdd76', 'color'=>'#7d6d3b'],
            'Пудровый'              => ['bg'=>'#ffb2d0', 'color'=>'#191919'],
            'Разноцветный'          => ['bg'=>'linear-gradient(138deg, rgba(255,0,0,1) 0%, rgba(246,179,90,1) 16%, rgba(235,246,90,1) 34%, rgba(96,246,90,1) 52%, rgba(84,236,251,1) 67%, rgba(90,117,246,1) 84%, rgba(246,90,203,1) 100%)', 'color'=>'#191919'],
            'Розовато-лиловый'      => ['bg'=>'#993366', 'color'=>'#ffffff'],
            'Розовый'               => ['bg'=>'#ffc0cb', 'color'=>'#806065'],
            'Рыжий'                 => ['bg'=>'#d77d31', 'color'=>'#573214'],
            'Салатовый'             => ['bg'=>'#99ff99', 'color'=>'#4d804d'],
            'Светло-бежевый'        => ['bg'=>'#fffeb6', 'color'=>'#191919'],
            'Светло-голубой'        => ['bg'=>'#87cefa', 'color'=>'#42657a'],
            'Светло-золотой'        => ['bg'=>'#ffd700', 'color'=>'#191919'],
            'Светло-коричневый'     => ['bg'=>'#987654', 'color'=>'#1a140e'],
            'Светло-розовый'        => ['bg'=>'#ffb6c1', 'color'=>'#805b60'],
            'Светло-рубиновый'      => ['bg'=>'#ca0147', 'color'=>'#ffffff'],
            'Светло-серый'          => ['bg'=>'#bbbbbb', 'color'=>'#3b3b3b'],
            'Светло-синий'          => ['bg'=>'#a6caf0', 'color'=>'#4d5e70'],
            'Серебристый'           => ['bg'=>'#c5c9c7', 'color'=>'#191919'],
            'Серебряный'            => ['bg'=>'#c0c0c0', 'color'=>'#404040'],
            'Серо-голубой'          => ['bg'=>'#77a1b5', 'color'=>'#191919'],
            'Серо-коричневый'       => ['bg'=>'#403a3a', 'color'=>'#bfaeae'],
            'Серый'                 => ['bg'=>'#808080', 'color'=>'#ffffff'],
            'Серый металлик'        => ['bg'=>'radial-gradient(circle, rgba(128,128,128,1) 0%, rgba(238,238,238,1) 100%)', 'color'=>'#191919'],
            'Сине-коричневый'       => ['bg'=>'radial-gradient(circle, rgba(0,35,255,1) 0%, rgba(190,67,0,1) 100%)', 'color'=>'#ffffff'],
            'Синий'                 => ['bg'=>'#0000ff', 'color'=>'#ffffff'],
            'Синяя замша'           => ['bg'=>'radial-gradient(circle, rgba(30,43,122,1) 0%, rgba(33,33,88,1) 100%)', 'color'=>'#ffffff'],
            'Сиреневый'             => ['bg'=>'#c8a2c8', 'color'=>'#473a47'],
            'Темная бронза'         => ['bg'=>'#cd7f32', 'color'=>'#ffffff'],
            'Темно-бежевый'         => ['bg'=>'#ac9362', 'color'=>'#ffffff'],
            'Темно-бордовый'        => ['bg'=>'#800002', 'color'=>'#ffffff'],
            'Темно-зеленый'         => ['bg'=>'#013220', 'color'=>'#04b372'],
            'Темно-коричневый'      => ['bg'=>'#654321', 'color'=>'#e6994c'],
            'Темно-оливковый'       => ['bg'=>'#556832', 'color'=>'#bee86f'],
            'Темно-серый'           => ['bg'=>'#49423d', 'color'=>'#c9b7a9'],
            'Тёмно-синий'           => ['bg'=>'#002137', 'color'=>'#80ccff'],
            'Фиолетовый'            => ['bg'=>'#8b00ff', 'color'=>'#ffffff'],
            'Фисташковый'           => ['bg'=>'#bef574', 'color'=>'#5a7537'],
            'Хаки'                  => ['bg'=>'#806b2a', 'color'=>'#ffd454'],
            'Черный'                => ['bg'=>'#000000', 'color'=>'#ffffff'],
            'Шампань'               => ['bg'=>'#fcfcee', 'color'=>'#7d7d75'],
            'Шафран'                => ['bg'=>'#f4d03f', 'color'=>'#191919'],
            'Шафрановый'            => ['bg'=>'#f4d03f', 'color'=>'#191919'],
            'Экрю'                  => ['bg'=>'#cdb891', 'color'=>'#4d4536'],
        ];
        if (isset($colors[$color]))
            return '<div class="filter-thumb" style="background:'. $colors[$color]['bg'] . '; color:'. $colors[$color]['color'].';"></div>';

        return null;
    }
}