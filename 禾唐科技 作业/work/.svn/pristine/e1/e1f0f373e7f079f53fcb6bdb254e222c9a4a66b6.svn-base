<?php
namespace Home\Controller;
use Think\Controller;
use Home\Controller\IndexController;
class ScoreController extends BaseController {
    public function _initialize(){
        parent::_initialize();
    }
    public function score(){
        if(!ss_h_uid() || ss_h_uid() == '' ){
            $this->redirect('User/login');
        }
        $Sc=D('Score');
        $Judge=$Sc->Estimate();
//        dump($Judge);
//        dump(ss_h_uid());
        if(!$Judge || empty($Judge)){
            $message='你不是留学生！';
            $this->errorPage($message);
        }
        else{
            $year=I('year');
            $Detail = $Sc->getDetail($year);
            $this->assign('detail',$Detail);
            $Options=$Sc->getYear();
            $this->assign('Options',$Options);
//            $this->assign('session_id',ss_uid());
            $this->display();
        }


    }


}