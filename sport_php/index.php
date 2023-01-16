<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

// Configuration
require_once ('./config.php');

// ApplicationController
require_once (CTR_DIR.'/ApplicationController.php');


// Add routes here
ApplicationController::getInstance()->addRoute('/', CTR_DIR.'/main.php');
ApplicationController::getInstance()->addRoute('connect', CTR_DIR.'/connect.php');
ApplicationController::getInstance()->addRoute('update', CTR_DIR.'/update.php');
ApplicationController::getInstance()->addRoute('disconnect', CTR_DIR.'/disconnect.php');
ApplicationController::getInstance()->addRoute('apropos', CTR_DIR.'/AProposController.php');
ApplicationController::getInstance()->addRoute('user_add', CTR_DIR.'/AddUserController.php');
ApplicationController::getInstance()->addRoute('activities', CTR_DIR.'/activities.php');
ApplicationController::getInstance()->addRoute('upload', CTR_DIR.'/upload.php');

// Process the request
ApplicationController::getInstance()->process();
?>