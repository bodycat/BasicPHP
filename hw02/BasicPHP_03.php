<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BasicPHP_03_3</title>
</head>
<body>
<pre>
	Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.
</pre>
<?php
	$a = rand(1,10);
	$b = rand(1,10);
	$c = "<br>";

	echo "a = $a<br>b = $b<hr>";

	function addition($a, $b) {
	    return $a + $b;
	}

	function subtraction($a, $b) {
	    return $a - $b;
	}

	function multiplication($a, $b) {
	    return $a * $b;
	}

	function division($a, $b) {
	    return $a / $b;
	}

	echo "a + b = $a + $b = " . addition($a, $b) . $c;
	echo "a - b = $a - $b = " . subtraction($a, $b) . $c;
	echo "a * b = $a * $b = " . multiplication($a, $b) . $c;
	echo "a / b = $a / $b = " . division($a, $b) . $c;
?>	
</body>
</html>