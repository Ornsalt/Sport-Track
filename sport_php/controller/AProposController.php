<?php
require(CTR_DIR.'/Controller.php');

class AProposController extends Controller {
    public function get($request) {
        $this->render('apropos', []);
    }
}
?>