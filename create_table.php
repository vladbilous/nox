<?php
require __DIR__ . '/DB.php';
$sql = "CREATE TABLE IF NOT EXISTS slider_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slider_type VARCHAR(50) NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    sort_order INT DEFAULT 0
)";
DB::execute($sql);
echo "Table created successfully.\n";
