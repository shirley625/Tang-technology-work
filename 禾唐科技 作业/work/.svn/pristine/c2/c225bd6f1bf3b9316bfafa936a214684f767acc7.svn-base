<?php 
namespace Home\Model;
use Think\Model;
class BannerModel extends BaseModel{
	public function getBanner(){

		$banner_img = $this->alias('b')
                ->join('edu_frame_file AS f ON b.img_title = f.id')
                ->where(array(
                    'status'=>1,
                    'index_show'=>array('neq',0)
                ))->field('b.id,b.index_show,f.savepath,f.savename')->order('b.create_time desc')->limit(5)->select();

        foreach($banner_img as $k=>&$v){
            $v['img_url'] = $v['savepath'].$v['savename'];
        }

        return $banner_img;
	}
}

?>