<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class ShowController extends Controller
{
    public $enableCsrfValidation = false;
    public $layout="menu.php";
    public function actionShow()
    {
        return $this->render('index');
    }
    /**
     * 查看公众号
     */
    public function actionAddip()
    {
        return $this->render('addip');
    }
    public function actionAdd_pro()
    {
        $ip=$_POST['ip'];
        $db=\Yii::$app->db->createCommand();
        $re=$db->insert('ip',['ip'=>"$ip"])->execute();
        if($re){
            $arr=Yii::$app->db->createCommand('SELECT * FROM ip')->queryAll();
            return $this->redirect(['show/listip']);
        }
    }
    //展示ip列表
    public function actionListip(){
        $arr=Yii::$app->db->createCommand('SELECT * FROM ip')->queryAll();
        return $this->render('listip',['arr'=>$arr]);
    }
    //删除ip
    function actionDel(){
        $id=$_GET['id'];
        $db = \Yii::$app->db->createCommand();
        $arr=$db->delete('ip',['id' => $id] )->execute();
        if($arr){
            $arr=Yii::$app->db->createCommand('SELECT * FROM ip')->queryAll();
            return $this->render('listip',['arr'=>$arr]);
        }

    }
}