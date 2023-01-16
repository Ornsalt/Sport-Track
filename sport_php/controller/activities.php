<?php
require(CTR_DIR.'/Controller.php');
require(MOD_DIR.'/DAO/ActivityDAO.php');
require(MOD_DIR.'/DAO/UserDAO.php');

class AProposController extends Controller {

    public function get($request) {
        session_start();
        $this->render('page/list_activities', ['activities' => ActivityDAO::getInstance()->findFromId(UserDAO::getInstance()->getUser($_SESSION['email'], $_SESSION['password'])->getId())]);
    }
}

?>
