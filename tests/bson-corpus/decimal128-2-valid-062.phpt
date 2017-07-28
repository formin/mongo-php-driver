--TEST--
Decimal128: [decq630] fold-down full sequence
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('180000001364000000E8890423C78A000000000000FE5F00');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "1.0000000000000000000E+6130"}}';

// Canonical BSON -> Native -> Canonical BSON 
echo bin2hex(fromPHP(toPHP($canonicalBson))), "\n";

// Canonical BSON -> Canonical extJSON 
echo json_canonicalize(toCanonicalJSON($canonicalBson)), "\n";

// Canonical extJSON -> Canonical BSON 
echo bin2hex(fromJSON($canonicalExtJson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
180000001364000000e8890423c78a000000000000fe5f00
{"d":{"$numberDecimal":"1.0000000000000000000E+6130"}}
180000001364000000e8890423c78a000000000000fe5f00
===DONE===