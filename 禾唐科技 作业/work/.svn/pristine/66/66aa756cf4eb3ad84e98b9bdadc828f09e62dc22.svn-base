<?php
namespace Home\Model;
use Think\Model;
class FriendLinkModel extends BaseModel{
    public function getLink(){              //type:0是普通链接,1是主题链接
       return $this->where(array('status'=>1,'type'=>0))->order('rank desc')->limit(4)->select();
    }
    public function getTopicLink(){
        $link = $this->alias('fl')
            ->join($this->dbPrex.'frame_file as f ON fl.img=f.id')
            ->where(array('fl.status'=>1,'fl.type'=>1))
            ->order('fl.create_time desc')->limit(1)
            ->field('savepath,savename,fl.url,fl.name')
            ->find();
        $imgUrl = $link['savepath'].$link['savename'];
        $link['path']=$imgUrl;
//        dump($link);
        return $link;

    }
}