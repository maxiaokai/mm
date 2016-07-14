<?php

namespace app\controllers;

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class IndexController extends Controller
{
    public $layout="menu.php";
    public $enableCsrfValidation = false;
    /**
     * @return string
     * 页面展示
     */
    public function actionIndex()
    {
        if(is_file("../assets/one.php")){
            return $this->redirect("index.php?r=index/login");
        }else{
            return $this->renderPartial('one');
        }

    }
    //跳转下一页
    public function actionNext(){
        return $this->renderPartial("two");
    }
    public function actionThree(){

        return $this->renderPartial("three");
    }
    public function actionLast(){
        $post=\Yii::$app->request->post();
        $server=$post['dbserver'];  //数据库主机
        $name=$post['dbname']; //数据库用户
        $pwd=$post['dbpwd']; //数据库密码
        $kname=$post['name']; //数据库名称
        $uname=$post['u_username']; //账号
        $upwd=$post['password']; //密码
        $prefix=$post['prefix'];//端口号
        if(@$connect = mysqli_connect("$server","$name","$pwd")){
            $db_select=mysqli_select_db($connect,$kname);
            if($db_select){
                $sql="drop database $kname";
                @mysqli_query($connect,$sql);
            }
            $sql="CREATE DATABASE ".$kname." DEFAULT CHARSET utf8 COLLATE utf8_general_ci"; //建库
            @$result = mysqli_query($connect,$sql);
            mysqli_select_db($connect,$kname);
            //读取文件内容
            $file=file_get_contents('../assets/we7.sql');
            //var_dump($file);die;
            $arr=explode('-- ----------------------------',$file);

            for($i=0;$i<count($arr);$i++){
                if($i%2==0){
                    $a=explode(";",trim($arr[$i]));
                    array_pop($a);
                    foreach($a as $v){
                        @mysqli_query($connect,$v);
                    }
                }
            }
            $str="<?php
					return [
						'class' => 'yii\db\Connection',
						'dsn' => 'mysql:host=".$post['dbserver'].";port=$prefix;dbname=".$post['name']."',
						'username' => '".$post['dbname']."',
						'password' => '".$post['dbpwd']."',
						'charset' => 'utf8',
					];";
            file_put_contents('../config/db.php',$str);
            $str1="<?php
                \$pdo=new PDO('mysql:host= $server;port=$prefix;dbname=$kname','$name','$pwd',array(PDO::MYSQL_ATTR_INIT_COMMAND=>'set names utf8'));
                   ?>";
            file_put_contents('../assets/abc.php',$str1);
            //$table= "CREATE Table .$prefix.user DEFAULT CHARSET utf8 COLLATE utf8_general_ci"; //建库

            $sql="insert into users  (uid,name,pwd) VALUES (null,'$uname','$upwd')";
            mysqli_query($connect,$sql);
            mysqli_close($connect);
            $counter_file       =   '../assets/one.php';//文件名及路径,在当前目录下新建aa.txt文件
            $fopen    =   fopen($counter_file,'wb');//新建文件命令
            fputs($fopen,   'aaaaaa ');//向文件中写入内容;
            fclose($fopen);
            $strs=str_replace("//'db' => require(__DIR__ . '/db.php'),","'db' => require(__DIR__ . '/db.php'),",file_get_contents("../config/web.php"));
            file_put_contents("../config/web.php",$strs);
            return $this->renderPartial('last');

        }else{
            echo "<script>
                        if(alert('数据库账号或密码错误')){
                             location.href='index.php?r=index/three';
                        }else{
                            location.href='index.php?r=index/three';
                        }
            </script>";

        }


    }
    function actionLogin(){

        return $this->renderPartial('login');
    }
    /**
     * @return string
     * @判断ip
     * @判断登录
     * @保存session
     */
    public function actionMain(){
        if(!$_POST){
            return $this->renderPartial('login');
        }else{
//            $ip=$_SERVER["REMOTE_ADDR"];
            $ip = '127.0.0.1';
            $ipVal = Yii::$app->db->createCommand("select * from ip WHERE ip='$ip'")->execute();
            if(!$ipVal) {
                echo "你没有权限登陆";
            }else{

                $arr = Yii::$app->request->post();
                $name = $arr['name'];
                $sql="select * from users WHERE(name= '$name')";
                //echo $sql;die;
                $re = Yii::$app->db->createCommand($sql)->execute();
                if($re){
                    $pwd = $arr['pwd'];
                    $res = Yii::$app->db->createCommand("select * from users where(pwd = '$pwd' AND name='$name')")->execute();
                    if($res){
                        //存session
                        $session = Yii::$app->session;
                        $session->open();
                        $session -> set('name',$name);
                        return $this->redirect(['show/show']);
                    }else{
                        echo "密码错误";
                    }
                }else
                    echo "用户名错误";
                }
            }
        }


    /**
     * @return string{
     * 添加公众号
     */
    public function actionAdd(){
        if(\Yii::$app->request->method=='GET'){
            return $this->render('insert');
        }
        else{
            $atok=$this->actionRands(5);
            $url=substr('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],0,strpos('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],'we'))."weix9A/index.php?str=".$atok;
            $connection=\Yii::$app->db;
            $arr=\Yii::$app->request->post();
            $arr['atoken']=md5(rand(1000,9999));
            $session = Yii::$app->session;
            $session->open();

            $connection->createCommand()->insert('account', [
                'appid' => $arr['appid'],
                'aname' => $arr['aname'],
                'account' => $arr['account'],
                'appsecret' => $arr['appsecret'],
                'aurl' => $url,
                'atok'=>$atok,
                'uid'=> '1',
                'atoken'=>$arr['atoken'],

            ])->execute();
        }
        $this->redirect(array('/index/list'));
    }
    /**
     * 公众号展示列表
     */
    public function actionList(){
        $session = \Yii::$app->session;
        $session->open();
        $uid=$session->get("uid");
        echo $uid;
        $sql="select * from account join users on account.uid=users.uid where account.uid='1'";
        $connection=\Yii::$app->db->createCommand($sql);
        $arr=$connection->queryAll();
        $num=count($arr);
        return $this->render("demo",['arr'=>$arr,'num'=>$num]);
    }

    public function actionRands($length){
        $str = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randString = '';
        $len = strlen($str)-1;
        for($i = 0;$i < $length;$i ++)
        {
            $num = mt_rand(0, $len); $randString .= $str[$num];
        }
        return $randString ;
    }
    /**
     * 删除公众号
     */
    public function actionDelete(){
        $id=$_GET['id'];
        $sql="delete from account where id=$id";
        $re=\Yii::$app->db->createCommand($sql)->execute();
        //var_dump($arr);die;
        if($re){
            $sql="select * from account join users on account.uid=users.uid where account.uid='1'";
            $connection=\Yii::$app->db->createCommand($sql);
            $arr=$connection->queryAll();
            $num=count($arr);
            return $this->render("demo",['arr'=>$arr,'num'=>$num]);
        }

    }
    /**
     * 公众号修改页面
     */
    public function actionUpdate(){
        $id=$_GET['id'];
        $sql="select * from account  where id='$id'";
        $connection=\Yii::$app->db->createCommand($sql);
        $arr=$connection->queryAll();
        return $this->render('updates',['arr'=>$arr]);
    }

    /**
     * 修改
     */
    public function actionUpdates(){
        $db = \Yii::$app->db->createCommand();
        $arr=Yii::$app->request->post();
        $id=$arr['id'];
        $name=$arr['name'];
        $token=$arr['wetoken'];
        $res=$db->update('account',['aname' => "$name",'atoken'=>"$token"],"id = '$id'")->execute();
        if($res){
            $this->redirect(array('/index/list'));
        }
    }

}