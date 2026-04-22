<?php
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR);
require 'app/Config/Paths.php';
$paths = new Config\Paths();
require $paths->systemDirectory . '/Boot.php';
$app = CodeIgniter\Boot::bootWeb($paths);

$db = \Config\Database::connect();

try {
    $countUsers = $db->table('users')->countAllResults();
    $countAlumni = $db->table('alumni')->countAllResults();
    echo "Total Users: $countUsers\n";
    echo "Total Alumni: $countAlumni\n";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
