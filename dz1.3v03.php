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

$AnimalsNamePart1 = [];
$AnimalsNamePart2 = [];
foreach ($Earth as $continent => $animalnames) {
    foreach ($animalnames as $value) {
        If (substr_count($value, ' ') ==  1) {
			$pieces = explode(" ", $value);
			$AnimalsNamePart1[$continent][] = $pieces[0];
			$AnimalsNamePart2[] = $pieces[1];
        }
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

echo '<h2>Массив форматированный, с запятыми:</h2>';
foreach ($NewAnimalNames as $continent => $animaltypes) {
    echo "<h2>$continent</h2>";
    echo (implode (", ", $animaltypes)) . ".";
}
?>
