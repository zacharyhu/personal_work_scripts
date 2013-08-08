<?php
$this->pageCaption='';
$this->pageTitle=Yii::app()->name;
?>

<h2>欢迎进入 <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h2>

<p>内部系统，仅供内部人员使用
</p>
<br><br><br>
<?php 
     if (Yii::app()->user->isGuest){
        echo "<h2>登录后查看更多功能" ;
        $this->widget('bootstrap.widgets.TbButton', array(
        		'label'=>'点击登录',
        		'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        		'size'=>'large', // null, 'large', 'small' or 'mini'\
        		'url'=>array('/site/login'),
        ));
        echo "</h2>";
     }else {
		if (!Yii::app()->user->isGuest){
		$show_name  = GpDcUser::model()->getUserName(Yii::app()->user->name);
		}else{
		$show_name = Yii::app()->user->name;
		}
        echo "Welcome ".$show_name." !    现在是  ".date("Y-m-d H:i:s");     	
     }
?>
