<?php
require(MOD_DIR.'/DAO/UserDAO.php');
require(CTR_DIR.'/Controller.php');

class AddUserController extends Controller {
    public function get($request) {
        $this->render('page/user_add_form', []);
    }

    public function post($request) {
        $user = new User();
        $user->init(0, $request['name'], $request['lastname'], $request['birthday'], $request['sex'], $request['height'], $request['weight'], $request['email'], $request['password']);
        UserDAO::getInstance()->insert($user);
        $this->render('page/user_add_valid', []);
    }
}
?>