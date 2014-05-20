<?php

/**
 * Test: Nette\Neon\Neon::decode block hash and array.
 *
 * @author     David Grudl
 */

use Nette\Neon\Neon,
	Tester\Assert;


require __DIR__ . '/../bootstrap.php';


Assert::same( array(
	'a' => array(1, 2),
	'b' => 1,
), Neon::decode('
a: {1, 2, }
b: 1') );


Assert::same( array(
	'a' => 1,
	'b' => 2,
), Neon::decode(
' a: 1
 b: 2') );


Assert::same( array(
	'a' => 'x',
	'x',
), Neon::decode('
a: x
- x') );


Assert::same( array(
	'x',
	'a' => 'x',
), Neon::decode('
- x
a: x
') );


Assert::same( array(
	'x' => array(
		'x',
		'a' => 'x',
	),
), Neon::decode('
x:
	- x
	a: x
') );


Assert::same( array(
	'x' => array(
		'y' => array(
			NULL,
		),
	),
	'a' => 'x',
), Neon::decode(
'x:
	y:
		-
a: x
') );


Assert::same( array(
	'x' => array(
		'a' => 1,
		'b' => 2,
	),
), Neon::decode('
x: {
	a: 1
b: 2
}
') );


Assert::same( array(
	'one',
	'two',
), Neon::decode('
{
	one
two
}
') );


Assert::same( array(
	array(
		'x' => 20,
		array(
			'a' => 10,
			'b' => 10,
		),
	),
	'y',
), Neon::decode('
- x: 20
  - a: 10
    b: 10
- y
') );


Assert::same( array(
	array(
		'x' => NULL,
		'a' => 10,
	),
	array(
		'y' => array('b' => 20),
	),
), Neon::decode("
- x:
\ta: 10
-\ty:
\t\tb: 20
") );


Assert::same( array(
	array(
		'x' => array('a' => 10),
	),
), Neon::decode('
- x:
    a: 10
') );