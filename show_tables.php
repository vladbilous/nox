<?php
require 'DB.php';
$blocks = DB::fetchAll('DESCRIBE content_blocks');
print_r($blocks);
