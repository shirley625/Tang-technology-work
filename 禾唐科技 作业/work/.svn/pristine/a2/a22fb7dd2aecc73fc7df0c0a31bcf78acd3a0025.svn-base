<?php
namespace Home\Model;
use Think\Model;
class AnnounceModel extends BaseModel{
    public function getAnnounce(){
        return $this->where(array('status'=>1))->order('create_time desc')->limit(5)->select();
    }
}
