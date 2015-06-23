<?php
/**
 * Этот маленький скриптик подскажет какие из функций PHP сколько поедают ресурсов и затрачивают времени.
 * Он поможет не использовать сверх производительные функции.
 * Советую тестировать на локалхосте.
 */

$total = 5000;
// Генерим массив
$array = array();
for ($j = 0; $j < $total; $j++) {
	$array[$j] = 'a' . $j;
}

// Проверяем in_array
$s = microtime(true);
for ($j = 0; $j < $total; $j++) {
	in_array("a555", $array);
}
echo "in_array: " . (microtime(true) - $s) . "\n";

// Проверяем array_flip
$s = microtime(true);
$array = array_flip($array);
echo "<br />array_flip:     " . (microtime(true) - $s) . "\n";

// Проверяем array_key_exists
$s = microtime(true);
for ($j = 0; $j < $total; $j++) {
	array_key_exists("555", $array);
}
echo "<br />array_key_exists:     " . (microtime(true) - $s) . "\n";

// Проверяем isset
$s = microtime(true);
for ($j = 0; $j < $total; $j++) {
	if(isset($array[555])) $c = true;
}
echo "<br />isset:     " . (microtime(true) - $s) . "\n";

// Проверяем isset через foreach
$s = microtime(true);
for ($j = 0; $j < $total; $j++) {
	foreach($array AS $k=>$v) {
		if(isset($v) && $v == "a555") $c = true;
	}

}
echo "<br />foreach isset:     " . (microtime(true) - $s) . "\n";

// Проверяем Просто foreach
$s = microtime(true);
for ($j = 0; $j < $total; $j++) {
	foreach($array AS $k=>$v) {
		if($v == "a555") $c = true;
	}

}
echo "<br />foreach:     " . (microtime(true) - $s) . "\n";

?>
