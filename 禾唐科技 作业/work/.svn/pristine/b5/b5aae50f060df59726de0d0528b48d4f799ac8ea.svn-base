<?php
namespace Home\Model;
use Think\Model;
class ScoreModel extends Model {
    public function Estimate(){
        $Judge=$this
            ->alias('s')
            ->join('edu_user AS eu ON s.stu_id = eu.id','left')
            ->field('eu.id,eu.user_no,eu.country,s.id')
            ->where(array(
                    'eu.id'=>ss_h_uid(),//登录id
                    'eu.country'=>array('neq','中国')
                )
            )
            ->select();
//        dump($Judge);
            return $Judge;
    }

    public function getDetail($year){
        $Detail = $this
            ->alias('s')
            ->join('edu_user AS eu ON s.stu_id = eu.id','left')
            ->join('edu_exam_course AS eec ON s.course_id = eec.id','left')
            ->field('eu.name AS uname ,eu.id,eu.roles,eu.user_no,eu.password,eu.sex,eu.birth,eu.phone,eu.qq,eu.email,eu.country,eu.session_id,eu.login_last_time,eu.login_times,eu.status,s.course_id,s.stu_id,s.score,s.year,s.term,eec.name,eec.credit')
            ->where(array(
                'eu.id'=>ss_h_uid(),//登录id
                'year'=>$year?$year:array('gt',0),
                'country'=>array('neq','中国')
            ))
            ->select();
//          dump(ss_uid());
//			dump($Detail);
        return $Detail;
    }
    public function getYear(){
        $Options=$this
            ->alias('s')
            ->join('edu_user AS eu ON s.stu_id = eu.id','left')
            ->field('eu.id,eu.user_no,s.id,s.year')
            ->where(array(
                    'eu.id'=>ss_h_uid(),//登录id
                )
            )->group('year')
            ->select();
//        dump($Options);
        return $Options;
    }
}