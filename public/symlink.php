<?php
$targetFolder = $_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
$linkFolder = $_SERVER['DOCUMENT_ROOT'].'/public/storage';
$test=symlink($targetFolder,$linkFolder);
dd($test);
echo 'Symlink process successfully completed';