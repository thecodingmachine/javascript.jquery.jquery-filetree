<?php
require_once __DIR__."/../../autoload.php";

use Mouf\Actions\InstallUtils;
use Mouf\MoufManager;
use Mouf\Html\Utils\WebLibraryManager\WebLibraryInstaller;

// Let's init Mouf
InstallUtils::init(InstallUtils::$INIT_APP);

// Let's create the instance
$moufManager = MoufManager::getMoufManager();

WebLibraryInstaller::installLibrary("javascript.jquery-filetree",
		array(
			'vendor/mouf/javascript.jquery.jquery-filetree/jqueryFileTree.js'
		),
		array(
			'vendor/mouf/javascript.jquery.jquery-filetree/jqueryFileTree.css'
		),
		array(
			'jQueryLibrary'
		)
	);

// Let's rewrite the MoufComponents.php file to save the component
$moufManager->rewriteMouf();

// Finally, let's continue the install
InstallUtils::continueInstall();