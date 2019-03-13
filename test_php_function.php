<?php
/**
 * This small script will tell you which of the PHP functions how much they eat resources and spend time.
 * It will help not to use super productive functions.
 * I advise you to test on localhost.
 */

$total = 5000;
// Craft array
$array = array();
for ($j = 0; $j < $total; $j++) {
	$array[$j] = 'a' . $j;
}

// check "in_array"
$s = microtime(true);
for ($j = 0; $j < $total; $j++) {
	in_array("a555", $array);
}
echo "in_array: " . (microtime(true) - $s) . "\n";

// check "array_flip"
$s = microtime(true);
$array = array_flip($array);
echo "<br />array_flip:     " . (microtime(true) - $s) . "\n";

// check "array_key_exists"
$s = microtime(true);
for ($j = 0; $j < $total; $j++) {
	array_key_exists("555", $array);
}
echo "<br />array_key_exists:     " . (microtime(true) - $s) . "\n";

// check "isset"
$s = microtime(true);
for ($j = 0; $j < $total; $j++) {
	if(isset($array[555])) $c = true;
}
echo "<br />isset:     " . (microtime(true) - $s) . "\n";

// check "isset" with "foreach"
$s = microtime(true);
for ($j = 0; $j < $total; $j++) {
	foreach($array AS $k=>$v) {
		if(isset($v) && $v == "a555") $c = true;
	}

}
echo "<br />foreach isset:     " . (microtime(true) - $s) . "\n";

// check "foreach"
$s = microtime(true);
for ($j = 0; $j < $total; $j++) {
	foreach($array AS $k=>$v) {
		if($v == "a555") $c = true;
	}

}
echo "<br />foreach:     " . (microtime(true) - $s) . "\n";

?>
