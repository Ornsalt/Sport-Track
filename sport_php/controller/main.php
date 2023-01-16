<?php
require(CTR_DIR.'/Controller.php');

class MainController extends Controller{

    public function get($request) {
        $this->render('main',[]);
    }
}
?>
