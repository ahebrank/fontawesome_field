<?php

require_once('../YamlParser.php');
$icons = YamlParser::load('../icons.yml');

print_r($icons);
