<?php
session_start();
require(MOD_DIR.'/DAO/UserDAO.php');
require(CTR_DIR.'/Controller.php');

class ConnectController extends Controller{

    public function get($request) {
        $this->render('page/user_connect_form',[]);
    }

    public function post($request) {
        if (!empty($user = UserDAO::getInstance()->getUser($request['email'], $request['password']))) {
            $_SESSION['email'] = $request['email'];
            $_SESSION['password'] = $request['password'];
            $this->render('page/user_connect_valid',['email' => $user->getEmail(), 'password' => $user->getPassWord(), 'name' => $user->getName(), 'lastname' => $user->getLastName(), 'birthday' => $user->getBirthDay(), 'height' => $user->getHeight(), 'weight' => $user->getWeight(), 'sex' => $user->getSex()]);
        } else {
            $this->render('page/user_connect_form',[]);
        }
    }
}
?>
