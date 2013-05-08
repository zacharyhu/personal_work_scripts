<?php
/* @var $this CpBaseInfoController */
/* @var $model CpBaseInfo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


<!-- //注释掉cpid搜索 -->
<!-- 	<div class="row"> -->
		<?php //echo $form->label($model,'cp_id'); ?>
		<?php //echo $form->textField($model,'cp_id'); ?>
<!-- 	</div> -->

	<div class="row">
		<?php echo $form->label($model,'cp_name'); ?>
		<?php echo $form->textField($model,'cp_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cpcode'); ?>
		<?php echo $form->textField($model,'cpcode'); ?>
	</div>

<!-- 	搜索起始时间，使用timepicker控件 -->
	<div class="row"> 
    <?php echo $form->label($model,'begin_date'); ?> 
    <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker'); 
        $this->widget('CJuiDateTimePicker',array( 
        'attribute' => 'begin_date', 
        'model'=>$model, 
        'name'=>'begin_date', 
    	'mode'=>'datetime',
    	'options' => array( 
                'changeYear' => 'true',
                'showAnim' => 'fold', 
                'dateFormat' => 'yy-mm-dd',
                 'timeFormat' =>'hh:mm:ss', 
            ), 
    )); 
    ?> 
    </div>

    <div class="row">
    <?php echo $form->label($model,'end_date'); ?> 
    <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
      $this->widget('CJuiDateTimePicker', array( 
        'attribute' => 'end_date', 
        'model'=>$model, 
        'name'=>'end_date', 
    	'mode'=>'datetime',
        'options' => array( 
                'changeYear' => 'true',
                'showAnim' => 'fold', 
                'dateFormat' => 'yy-mm-dd',
                'timeFormat' =>'hh:mm:ss',
            ), 
    )); 
    ?> 
    </div>
	
	<div class="row">
		<?php echo $form->label($model,'cp_desc'); ?>
		<?php echo $form->textField($model,'cp_desc',array('size'=>60,'maxlength'=>200)); ?>
	</div>

<!-- 	修改下拉菜单选择状态 -->
	<div class="row">
		<?php echo $form->label($model,'cp_status'); ?>
		<?php echo $form->dropDownList($model,'cp_status',CpBaseInfo::model()->getCPStatusList()); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('搜索'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->