<?php
namespace BasisInfo\Model;
use Common\Model\HyAllModel;
use System\Model\HomkaiServiceModel;
use BasisInfo\Model\StudentModel;

/**
 * 学生管理模型
 *
 * @author
 */
class StudentTModel extends StudentModel {

    protected function initPageOptions() {
        return array (
            'checkbox'	=>	false,
            'deleteType'=> 'status|9',
            'actions' 	=> array (

            ),
            'buttons' =>array(),
            'order'		=>	'user.id desc',
        );
    }
}
