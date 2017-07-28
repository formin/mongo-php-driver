--TEST--
Double type: NaN
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('10000000016400000000000000F87F00');
$canonicalExtJson = '{"d": {"$numberDouble": "NaN"}}';
$relaxedExtJson = '{"d": {"$numberDouble": "NaN"}}';

// Canonical BSON -> Native -> Canonical BSON 
echo bin2hex(fromPHP(toPHP($canonicalBson))), "\n";

// Canonical BSON -> Canonical extJSON 
echo json_canonicalize(toCanonicalJSON($canonicalBson)), "\n";

// Canonical BSON -> Relaxed extJSON 
echo json_canonicalize(toRelaxedJSON($canonicalBson)), "\n";

// Relaxed extJSON -> BSON -> Relaxed extJSON 
echo json_canonicalize(toRelaxedJSON(fromJSON($relaxedExtJson))), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
10000000016400000000000000f87f00
{"d":{"$numberDouble":"NaN"}}
{"d":{"$numberDouble":"NaN"}}
{"d":{"$numberDouble":"NaN"}}
===DONE===