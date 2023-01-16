<?php
require_once(CTR_DIR.'/Controller.php');
require_once(MOD_DIR.'/DAO/UserDAO.php');
require_once(MOD_DIR.'/DAO/ActivityDAO.php');
require_once(MOD_DIR.'/DAO/ActivityEntryDAO.php');

class UploadActivityController extends Controller {
    
    private function parseJson($content) {
        session_start();
        $user = UserDAO::getInstance()->getUser($_SESSION['email'], $_SESSION['password']);
        $act = new Activity();
        $act->init(0, $user->getId(), $content['activity']['date'], $content['activity']['description'], "", "", 0, 0, 0);
        ActivityDAO::getInstance()->insert($act, $user);

        foreach ($content['data'] as $x) {
            $data = new Data();
            $data->init(0, ActivityDAO::getInstance()->findMaxId()[0]->getId(), $x['time'], $x['cardio_frequency'], $x['latitude'], $x['longitude'], $x['altitude']);
            ActivityEntryDAO::getInstance()->insert($data);
        }
    }

    public function get($request) {
        $this->render('page/upload_activity_form', []);
    }

    public function post($request) {
        $data = file_get_contents($_FILES['fichierJson']['tmp_name']);
        $content = json_decode($data, true);
        $this->parseJson($content);

        $this->render('page/list_activities', ['activities' => ActivityDAO::getInstance()->findFromId(UserDAO::getInstance()->getUser($_SESSION['email'], $_SESSION['password'])->getId())]);
    }
}
?>