<div class="wide form">

 <?php $form=$this->beginWidget('BActiveForm', array(
 	'action'=>Yii::app()->createUrl($this->route),
 	'method'=>'get',
 ));?>
	<!-- 	搜索起始时间，使用timepicker控件 -->
	<div class="clearfix"> 
	<?php 
    echo Yii::t('main', '大厅: ');
	echo $form->dropDownList($model,'lobby_id',TvGpCfgGameLobbyInfo::model()->getLobbyList(),array('empty'=>'-- 全 部 --','style'=>'width:140px;'));
	echo Yii::t('main', 'CP: ');
	echo $form->dropDownList($model,'cp_code',TvGpCfgCpInfo::model()->getCpList(),array('empty'=>'-- 全 部 --','style'=>'width:140px;'));
	echo Yii::t('main', 'GAME: ');
	echo $form->dropDownList($model,'game_id',TvGpCfgGameInfo::model()->getGameList(),array('empty'=>'-- 全 部 --','style'=>'width:140px;'));
	echo "<br><br>";
	$attribute = 'l_month';
	for ($i = 0; $i <= 1; $i++)
	{
		echo ($i == 0 ? Yii::t('main', '起始月份 : ') : Yii::t('main', '终止月份:'));
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'id'=>CHtml::activeId($model, $attribute.'_'.$i),
				'model'=>$model,
				'attribute'=>$attribute."[$i]",
  				'options'=>array(
                       'dateFormat' => 'yy-mm',
                 ),
		));
	}
	?>
		
	</div>
	<div class="actions">
		<?php echo BHtml::submitButton('查询'); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- search-form -->