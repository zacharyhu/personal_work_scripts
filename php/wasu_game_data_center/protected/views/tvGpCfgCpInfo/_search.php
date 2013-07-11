<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'l_cp_code'); ?>
		<div class="input">
			<?php echo $form->textField($model,'l_cp_code'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'vc_cp_name'); ?>
		<div class="input">
			<?php echo $form->textField($model,'vc_cp_name',array('size'=>60,'maxlength'=>64)); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->