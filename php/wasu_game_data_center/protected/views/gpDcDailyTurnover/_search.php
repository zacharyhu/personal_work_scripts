<div class="wide form">

 <?php $form=$this->beginWidget('BActiveForm', array(
 	'action'=>Yii::app()->createUrl($this->route),
 	'method'=>'get',
 ));?>
	<!-- 	搜索起始时间，使用timepicker控件 -->
	<div class="clearfix"> 
	<?php 
	$attribute = 'date_range';
	for ($i = 0; $i <= 1; $i++)
	{
		echo ($i == 0 ? Yii::t('main', '起始日期 : ') : Yii::t('main', '终止日期:'));
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'id'=>CHtml::activeId($model, $attribute.'_'.$i),
				'model'=>$model,
				'attribute'=>$attribute."[$i]",
		));
	}
	//print_r($model->date_range);
	?>
	</div>
	<div class="actions">
		<?php echo BHtml::submitButton('搜索'); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- search-form -->