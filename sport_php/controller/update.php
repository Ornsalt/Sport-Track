<?php
require(MOD_DIR.'/DAO/UserDAO.php');
require(CTR_DIR.'/Controller.php');

class UpdateController extends Controller{

    public function post($request) {
        session_start();
        print_r($_SESSION['email'], $_SESSION['password']);
        $user = UserDAO::getInstance()->getUser($_SESSION['email'], $_SESSION['password']);
        $_SESSION['email'] = $request['email'];
        $_SESSION['password'] = $request['password'];
        $user->init($user->getId(), $request['name'], $request['lastname'], $request['birthday'], $request['sex'], $request['height'], $request['weight'], $request['email'], $request['password']);
        UserDAO::getInstance()->update($user);
        $this->render('page/user_connect_valid',['email' => $user->getEmail(), 'password' => $user->getPassWord(), 'name' => $user->getName(), 'lastname' => $user->getLastName(), 'birthday' => $user->getBirthDay(), 'height' => $user->getHeight(), 'weight' => $user->getWeight(), 'sex' => $user->getSex()]);
    }
}
?>
