<?php

// Рабочая. Получаем артикул товара (Указан только в ссылке)
function article($offer) {
  $prefix = $offer['url']; 
  if (strpos($prefix, '%3Fsku')) $prefix = explode('%3Fsku', $prefix)[0];
  if (strpos($prefix, '%2F')) $prefix = explode('%2F', $prefix);
  $prefix = $prefix[count($prefix)-2];
  if (strpos($prefix, '_')) $prefix = explode('_', $prefix)[0];
  return $prefix;
}

// Уникальность можно взять только из айди атрибута или из ссылки по артикулу
function uniq($offer) {
  $prefix = $offer['attributes']['id']; 
  if (strpos($prefix, 's')) $prefix = explode('s', $prefix)[0];
  return $prefix;
}

function category($offer) {
    return ['Рабочая Sela'];
}

function name($offer) {
  if (isset($offer['model'])) {
    $newName = $offer['model'];
    // Удаляем "гендерность" из model товаров, у которых это указано
    $deleteGender = array(" для женщин", " женская", " женское", " женский", " женские", " для девочек", " для девочки", " для мальчиков", " для мальчика", " детский", " детская", " детские", " детское", " детских", "Детская ", "Детские ", "Детский ", "Детское ", " для детей и взрослых");
    $newName = str_replace($deleteGender, "", $newName);
  } else $newName = 'Товар';
  
  return $newName . ' Sela ' . article($offer);
}

function price($offer) {
  return $offer['price'];
}

function oldprice($offer) {
   return $offer['oldprice'] ?? null;
}

function image($offer) {
    return $offer['picture'];
}

function href($offer) {
    return $offer['url'];
}

// Пол можно определить только по ID категории. Нет мужских товаров. Только женщины, мальчики и девочки.
// В категории Дети (ID=3) есть несколько товаров. Здесь мы отталкиваемся от model. Если в model не указано, возвращаем и девочкам и мальчикам
function vozrast($offer) {

}


function brend($offer) {
    return 'Sela';
}

function magazin($offer) {
    return 'Sela';
}
  
function vozrast($offer) {
  if (isset($offer['categoryId'])) {
    if(in_array($offer['categoryId'], ["1", "7", "159", "158", "157", "156", "347", "351", "155", "154", "8", "183", "182", "180", "179", "178", "177", "18", "172", "171", "170", "168", "167", "166", "165", "164", "15", "4", "376", "377", "380", "379", "378", "381", "21", "175", "173", "163", "135", "136", "137", "138", "16", "202", "185", "153", "152", "150", "149", "348", "6", "192", "191", "190", "189", "343", "342", "9", "198", "197", "196", "195", "194", "344", "212", "193", "23", "200", "199", "188", "187", "147", "146", "22", "432", "435", "434", "433", "10", "13", "161", "162", "86", "144", "346", "143", "142", "141", "19", "12", "11", "340", "14"], TRUE))
      return 'для взрослых';
    if(in_array($offer['categoryId'], ["3", "40", "45", "219", "216", "215", "214", "374", "56", "228", "229", "226", "225", "224", "46", "361", "222", "53", "54", "247", "245", "43", "57", "241", "240", "239", "44", "364", "266", "265", "264", "263", "262", "261", "260", "47", "363", "258", "254", "58", "398", "50", "59", "251", "248", "51", "42", "272", "271", "267", "268", "270", "269", "88", "280", "279", "278", "277", "274", "422", "52", "41", "62", "289", "288", "375", "73", "357", "356", "355", "354", "297", "299", "63", "69", "71", "74", "310", "308", "307", "64", "323", "61", "314", "311", "315", "75", "324", "60", "333", "331", "330", "67", "89", "373", "372", "371", "370", "369", "68", "70"], TRUE))
      return 'для детей';
    return 'Не определено Sela';
  }
 return 'Не определено Sela';
}

// Цвет определяем по name. Практически у всех и цвет и размер указан в конце в скобках.
function cvet($offer) {
  if (isset($offer['name'])) {
    if (strstr($offer['name'], 'розовый')) return 'розовый';
    if (strstr($offer['name'], 'коричневый')) return 'коричневый';
    if (strstr($offer['name'], 'желтый')) return 'желтый';
    if (strstr($offer['name'], 'белый принт')) return ['белый', 'разноцветный'];
    if (strstr($offer['name'], 'белый')) return 'белый';
    if (strstr($offer['name'], 'голубой')) return 'голубой';
    if (strstr($offer['name'], 'черный')) return 'черный';
    if (strstr($offer['name'], 'серый')) return 'серый';
    if (strstr($offer['name'], 'синий')) return 'синий';
    if (strstr($offer['name'], 'зеленый')) return 'зеленый';
    if (strstr($offer['name'], 'бежевый')) return 'бежевый';
    if (strstr($offer['name'], 'сиреневый')) return 'сиреневый';
    if (strstr($offer['name'], 'красный')) return 'красный';
    if (strstr($offer['name'], 'оранжевый')) return 'оранжевый';
    if (strstr($offer['name'], 'принт')) return 'разноцветный';
    if (strstr($offer['name'], 'фиолетовый')) return 'фиолетовый';
    if (strstr($offer['name'], 'серебро')) return 'серебряный';
    if (strstr($offer['name'], 'бордовый')) return 'бордовый';
    if (strstr($offer['name'], 'бирюзовый')) return 'бирюзовый';
    if (strstr($offer['name'], 'золото')) return 'золотой';
    if (strstr($offer['name'], 'малиновый')) return 'малиновый';
    return null;
  }
 return 'Не определено Sela';
} 

function descFirst($offer) {
    return null;
}

function descSecond($offer) {
    return null;
}