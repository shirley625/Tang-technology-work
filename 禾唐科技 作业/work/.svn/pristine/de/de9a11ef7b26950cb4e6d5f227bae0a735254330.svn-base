<?php
// 本类由系统自动生成，仅供测试用途
namespace Excel\Controller;
use Common\Controller\HyAllController;
class ExcelController extends HyAllController {

    public function excel(){

        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
        import("Org.Util.PHPExcel");
        //要导入的xls文件，位于根目录下的Public文件夹
        $filename="./Public/uploads/excel/edu_user.xls";
        //创建PHPExcel对象，注意，不能少了
        $PHPExcel=new \PHPExcel();
        //如果excel文件后缀名为.xls，导入这个类
        import("Org.Util.PHPExcel.Reader.Excel5");
        //如果excel文件后缀名为.xlsx，导入这下类
        //import("Org.Util.PHPExcel.Reader.Excel2007");
        //$PHPReader=new \PHPExcel_Reader_Excel2007();

        $PHPReader=new \PHPExcel_Reader_Excel5();
        //载入文件
        $PHPExcel=$PHPReader->load($filename);
        //获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
        $currentSheet=$PHPExcel->getSheet(0);
        //获取总列数
        $allColumn=$currentSheet->getHighestColumn();
        //获取总行数
        $allRow=$currentSheet->getHighestRow();
        //循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
        for($currentRow=1;$currentRow<=$allRow;$currentRow++){
            //从哪列开始，A表示第一列
            for($currentColumn='A';$currentColumn<=$allColumn;$currentColumn++){
                //数据坐标
                $address=$currentColumn.$currentRow;
                //读取到的数据，保存到数组$arr中
                $arr[$currentRow][$currentColumn]=$currentSheet->getCell($address)->getValue();
            }

        }
          //  dump($this->model);
   //     dump($arr);

//        $data_for_user = array();
//        $data_for_student = array();
//        $error_write = array();
//        $error_equal = array();
//        foreach($arr as $k=>$v){
//            $data_for_user['user_no'] = $v['C'];
//            $data_for_user['name'] = $v['D'];
//            $data_for_user['roles'] = '21';
//            $data_for_user['password'] = 'tHHPF4VYX4V7S7CAryffPdAFtpHlcSZVIL7aUKqVAIEuoQedpaPeSU62_ARBH4fa-6H7qT-vCApYp6CpHSqJn1aUi3XGBsAer2IzMIET7f4TxeJscQxCKd2aNiQe2fyW';
//            $data_for_user['sex'] = $v['G'];
//            $data_for_user['birth'] = $v['I'];
//            $data_for_user['phone'] = $v['E'];
//            $data_for_user['qq'] = $v['F'];
//            $data_for_user['email'] = $v['H'];
//            $data_for_user['country'] = $v['J'];
//            $equal_user_id = M('user')->where(array(
//                'user_no' => $v['C']
//            ))->find();
//            if($equal_user_id){
//                $error_equal[] =  $v['C'];
//                continue;
//            }
//            $user_id = M('user')->data($data_for_user)->add();
//            $class_name = $v['B'];
//            $class_id = M('class')->where(array(
//                'name'=>$class_name,
//                'status'=>array('eq',1)
//            ))->getField('id');
//            $data_for_student['user_id'] = $user_id;
//            $data_for_student['class_id'] = $class_id;
//            $student_id = M('student')->data($data_for_student)->add();
//            if($user_id && $class_id && $student_id){
//                continue;
//            }else{
//                $error_write[] = $v['C'];
//                break;
//            }
//        }

  //      dump($error_equal);
 //       dump($error_write);
        $this->display();
    }

    public function out(){
        $data=array(
            array('username'=>'zhangsan','password'=>"123456"),
            array('username'=>'lisi','password'=>"abcdefg"),
            array('username'=>'wangwu','password'=>"111111"),
        );
        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");

        $filename="test_excel";
        $headArr=array("用户名","密码");
        $this->getExcel($filename,$headArr,$data);
    }

    private	function getExcel($fileName,$headArr,$data){
        //对数据进行检验
        if(empty($data) || !is_array($data)){
            die("data must be a array");
        }
        //检查文件名
        if(empty($fileName)){
            exit;
        }

        $date = date("Y_m_d",time());
        $fileName .= "_{$date}.xls";

        //创建PHPExcel对象，注意，不能少了\
        $objPHPExcel = new \PHPExcel();
        $objProps = $objPHPExcel->getProperties();

        //设置表头
        $key = ord("A");
        foreach($headArr as $v){
            $colum = chr($key);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $key += 1;
        }

        $column = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();
        foreach($data as $key => $rows){ //行写入
            $span = ord("A");
            foreach($rows as $keyName=>$value){// 列写入
                $j = chr($span);
                $objActSheet->setCellValue($j.$column, $value);
                $span++;
            }
            $column++;
        }

        $fileName = iconv("utf-8", "gb2312", $fileName);
        //重命名表
        // $objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        exit;
    }

}