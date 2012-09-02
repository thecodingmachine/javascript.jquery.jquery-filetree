<?php
use Mouf\InstallUtils;

// Let's init Mouf
InstallUtils::init(InstallUtils::$INIT_APP);

// Let's create the instance
$moufManager = MoufManager::getMoufManager();

if ($moufManager->instanceExists("javascript.jquery-filetree")) {
	$jQueryFileTree = $moufManager->getInstanceDescriptor("javascript.jquery-filetree");
} else {
	$jQueryFileTree = $moufManager->createInstance("WebLibrary");
	$jQueryFileTree->setName("javascript.jquery-filetree");
}
$jQueryFileTree->getProperty("jsFiles")->setValue(array(
	'vendor/mouf/javascript.jquery.jquery-filetree/jqueryFileTree.js'
));
$jQueryFileTree->getProperty("cssFiles")->setValue(array(
	'vendor/mouf/javascript.jquery.jquery-filetree/jqueryFileTree.css'
));
$renderer = $moufManager->getInstanceDescriptor('defaultWebLibraryRenderer');
$jQueryFileTree->getProperty("renderer")->setValue($renderer);
$jQueryFileTree->getProperty("dependencies")->setValue(array($moufManager->getInstanceDescriptor('jQueryLibrary')));

$webLibraryManager = $moufManager->getInstanceDescriptor('defaultWebLibraryManager');
if ($webLibraryManager) {
	$libraries = $webLibraryManager->getProperty("webLibraries")->getValue();
	$libraries[] = $jQueryFileTree;
	$webLibraryManager->getProperty("webLibraries")->setValue($libraries);
}

// Let's rewrite the MoufComponents.php file to save the component
$moufManager->rewriteMouf();

// Finally, let's continue the install
InstallUtils::continueInstall();