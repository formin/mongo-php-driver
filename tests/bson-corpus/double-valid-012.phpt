--TEST--
Double type: -Inf
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('10000000016400000000000000F0FF00');
$canonicalExtJson = '{"d": {"$numberDouble": "-Infinity"}}';
$relaxedExtJson = '{"d": {"$numberDouble": "-Infinity"}}';

// Canonical BSON -> Native -> Canonical BSON 
echo bin2hex(fromPHP(toPHP($canonicalBson))), "\n";

// Canonical BSON -> Canonical extJSON 
echo json_canonicalize(toCanonicalJSON($canonicalBson)), "\n";

// Canonical BSON -> Relaxed extJSON 
echo json_canonicalize(toRelaxedJSON($canonicalBson)), "\n";

// Canonical extJSON -> Canonical BSON 
echo bin2hex(fromJSON($canonicalExtJson)), "\n";

// Relaxed extJSON -> BSON -> Relaxed extJSON 
echo json_canonicalize(toRelaxedJSON(fromJSON($relaxedExtJson))), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
10000000016400000000000000f0ff00
{"d":{"$numberDouble":"-Infinity"}}
{"d":{"$numberDouble":"-Infinity"}}
10000000016400000000000000f0ff00
{"d":{"$numberDouble":"-Infinity"}}
===DONE===