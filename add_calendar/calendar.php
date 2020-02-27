<?php

require('_classes/Autoloader.class.php');
Autoloader::setCacheFilePath('tmp/class_path_cache.txt');
Autoloader::excludeFolderNamesMatchingRegex('/^CVS|..*$/');
Autoloader::setClassPaths(array(
'_classes/',
));
spl_autoload_register(array('Autoloader', 'loadClass'));


echo "<pre>";
$params = array('title' => 'Nueva Prueba',
'datetime' => array(
'start' => '2019-10-15 10:30', 
'end' => '2019-10-15 13:00'),
'location' => 'Currando código',
'description' => 'Probando esta clase.'
);

$gCal = GoogleCalendar::createEventReminder($params);
echo $gCal;