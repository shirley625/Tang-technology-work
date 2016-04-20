<?php
namespace BasisInfo\Model;
use Common\Model\HyAllModel;
use System\Model\HomkaiServiceModel;
use BasisInfo\Model\TeacherModel;


/**
 * 教工管理模型
 *
 * @author
 */
class TeacherTModel extends TeacherModel {


    protected function initPageOptions() {
        return array (
            'checkbox'	=>	false,
            'deltype'	=> 'status|9',
            'actions' 	=> array (

            ),
            'buttons' =>array(),
            'order'		=>	'user.id desc',
        );
    }

}
