<?php

namespace app\controllers;

class ReplyController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;
    public $layout="menu.php";
    public function actionIndex()
    {
        //$this->layout='menu.php';
        //include ('../views/layouts/menu.php');
        $sql="select * from reply INNER  join text_reply on reply.reid=text_reply.reid";
        $connection=\Yii::$app->db->createCommand($sql);
        $arr=$connection->queryAll();
        return $this->render('reply',['arr'=>$arr]);
    }
    public function actionRuled(){
        //include ('../views/layouts/menu.php');
        $sql="select * from we_account ";
        $connection=\Yii::$app->db->createCommand($sql);
        $arr=$connection->queryAll();
        return $this->render('ruled',['arr'=>$arr]);
    }
    public function actionAdds(){
        $connection=\Yii::$app->db;
        $arr=\Yii::$app->request->post();
        $connection->createCommand()->insert('reply', [
            'aid' => $arr['user'],
            'rename' => $arr['name'],
            'rekeyword'=>$arr['keyword'],
        ])->execute();
        $reid=$connection->getLastInsertID();
        //$reid=$connection->getLastInsertID();
        $connection->createCommand()->insert('text_reply', [
            'reid' => "$reid",

            'trcontent'=>$arr['content'],
        ])->execute();
        $this->redirect(array('/reply/index'));
    }

}
