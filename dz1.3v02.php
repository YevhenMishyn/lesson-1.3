<?php

$Earth = [
    'Africa' => [
        'Asilisaurus kongwe',
        'Megaloceros giganteus',
        'Kamoyapithecus',
        'Hyopsodus',
        'Barytherium grave',
        'Protochrysa',
        'Osbornoceros osborni fuscobasalis',
    ],
    'N_America' => [
        'Hippotragus leucophaeus',
        'Kenyapithecus wickeri hamiltoni',
        'Ictidorhinus martinisi',
        'Sphecomyrma mesaki concudense',
    ],
    'S_America' => [
        'Aegyptopithecus zeuxis',
        'Victoriapithecus koenigswald',
    ],
    'Eurasia' => [
        'Formica annosa florissantensis',
        'Podabrus',
    ],
    'Australia' => [
        'Lasius',
        'Glyptodon clavipes glom',
    ],
    'Antarctica' => [
        'Titanomyrma lubei fastigatus',
        'Herpetoskylax hopsoni',
        'Hipparion',
    ],
];

echo '<h2>Исходный массив:</h2>';
echo '<pre>';
print_r($Earth);


//Нужно провести поиск по континентам и найти всех животных из двух слов и перетащить их в новый массив

$TwoWordAnimals = [];
foreach ($Earth as $continent => $animalnames) {
    foreach ($animalnames as $animalname) {
        If (substr_count($animalname, ' ') ==  1) {
            $TwoWordAnimals[$continent][]= $animalname;
        }
    }
}
echo PHP_EOL;
echo '<h2>Массив только из двух слов:</h2>';
echo '<pre>';
print_r($TwoWordAnimals);

//Часть 2
//Нужно смешать первые и вторые имена.
//Новое имя должно начинаться с оригинального имени, т.е. первое слово не должно меняться.
//Все части имён должны быть использованы по одному разу.
//Дополнительно:
//
//Сохраните названия регионов, к которым относятся ваши звери.
//Принадлежность определяйте по изначальной принадлежности первого кусочка названия животного.

//Как это сделать?

//Нужно отделить вторые имена от первых
//Нужно создать отдельный массив многоуровневый из первых имен с сохранением структуры
//Нужно создать отдельный массив из вторых имен одноуровневый
//Нужно перемешать имена во втором массиве


$AnimalsNamePart1 = [];
$AnimalsNamePart2 = [];
foreach ($TwoWordAnimals as $continent => $animalnames) {
    foreach ($animalnames as $value) {
        $pieces = explode(" ", $value);
        $AnimalsNamePart1[$continent][] = $pieces[0];
        $AnimalsNamePart2[] = $pieces[1];
    }
}

echo PHP_EOL;
echo '<h2>Род</h2>';
echo '<pre>';
print_r($AnimalsNamePart1);
echo PHP_EOL;
echo '<h2>Вид</h2>';
echo '<pre>';
print_r($AnimalsNamePart2);



shuffle($AnimalsNamePart2);

//Нужно объединить перемешанные во втором массиве имена с именами в первом массиве
//Нужно вывести новые двойные имена на экран

$NewAnimalNames = [];
$i=0;
foreach ($AnimalsNamePart1 as $continent => $animaltypes) {
    foreach ($animaltypes as $value) {
        $NewAnimalNames[$continent][] = $value . " " . $AnimalsNamePart2[$i++];
    }
}

echo PHP_EOL;
echo '<h2>Массив новый:</h2>';
echo '<pre>';
print_r($NewAnimalNames);
echo PHP_EOL;

//Дополнительно:

//Пусть названия регионов выводятся заголовками <h2>, а под ними – относящиеся к этому региону животные.
//Между животными выводите запятые. В конце не должно быть висящих запятых, неуместных по правилам пунктуации.
//Решение:
// Функция implode состоит из клея и кусочка. клей пишется перед кусочком.
// но если кусочка нет, клей отдельно не выводится на экран.
// С помощью конкретинации, в конце строки с животными, ставим точку.

echo '<h2>Массив форматированный, с запятыми:</h2>';
foreach ($NewAnimalNames as $continent => $animaltypes) {
    echo "<h2>$continent</h2>";
    echo (implode (", ", $animaltypes)) . ".";
}
