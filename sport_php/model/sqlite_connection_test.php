<?php
require_once('../config.php');
require_once(MOD_DIR.'/DAO/SqliteConnection.php');
require_once(MOD_DIR.'/DAO/ActivityDAO.php');
//require_once(MOD_DIR.'DAO/ActivityEntryDAO.php');
require_once(MOD_DIR.'/DAO/UserDAO.php');

$user1 = new User();
$user2 = new User();
$user3 = new User();

$act1 = new Activity();
$act2 = new Activity();

$user1->init(0, 'Samus', 'Aran', '06-08-1986', '♀', 1.91, 90.0, 'SamusAran@metroid.wink', 'metroidDread');
$user2->init(1, 'Ridley', 'Bad', '06-08-1986', '♂', 4.0, 952.544, 'Ridley@metroid.wink', 'tobigtofail');
$user3->init(1, 'Ridley', 'Bad', '06-08-1986', '♂', 4.0, 952.544, 'BestBoss@metroid.wink', 'tobigtofail');

UserDAO::getInstance()->insert($user1);
UserDAO::getInstance()->insert($user2);
UserDAO::getInstance()->delete($user1);
UserDAO::getInstance()->insert($user1);
UserDAO::getInstance()->update($user3);

print_r(UserDAO::getInstance()->findAll());
$tmp = UserDAO::getInstance()->getId($user3);
print_r($tmp);




$act1->init($tmp, 0, '01/09/2022', 'IUT -> RU', '13:00:00', '00:00:25', 98, 100.4, 103);
$act2->init($tmp, 0, '01/09/2022', 'IUT -> RU', '13:00:00', '00:00:24', 98, 100.4, 103);
ActivityDAO::getInstance()->insert($act1);
ActivityDAO::getInstance()->delete($act1);
ActivityDAO::getInstance()->insert($act1);
ActivityDAO::getInstance()->update($act2);
print_r(ActivityDAO::getInstance()->findAll());
?>