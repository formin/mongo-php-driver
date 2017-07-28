--TEST--
Decimal128: [decq745] DPD: one of each of the huffman groups
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('18000000136400D303000000000000000000000000403000');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "979"}}';

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
18000000136400d303000000000000000000000000403000
{"d":{"$numberDecimal":"979"}}
18000000136400d303000000000000000000000000403000
===DONE===