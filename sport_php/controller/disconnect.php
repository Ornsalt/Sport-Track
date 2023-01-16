<?php
session_start();
require(CTR_DIR.'/Controller.php');

class DisconnectUserController extends Controller{
    public function post($request) {
        session_abort();
        $this->render('page/user_disconnect', []);
    }
}
?>