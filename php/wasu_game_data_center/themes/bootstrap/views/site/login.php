<?php
$this->pageCaption='登录';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription="登录后可执行相应操作";
$this->breadcrumbs=array(
	'登录',
);
?>

<p>填写你的登录信息:</p>

<div class="form">
<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<?php $this->widget('BAlert',array(
		'content'=>'<p>带 <span class="required">*</span> 号项为必填项.</p>',
	)); ?>

	<div class="<?php echo $form->fieldClass($model, 'username'); ?>">
		<?php echo $form->labelEx($model,'username'); ?>
		<div class="controls">
			<?php echo $form->textField($model,'username'); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'password'); ?>">
		<?php echo $form->labelEx($model,'password'); ?>
		<div class="controls">
			<?php echo $form->passwordField($model,'password'); ?>
			<?php echo $form->error($model,'password'); ?>
			
			<span class="help-block">
				提示：若无系统帐号请联系管理员申请.
			</span>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'rememberMe'); ?>">
		<div class="controls">
			<?php echo $form->checkBox($model,'rememberMe'); ?>
			<?php echo $form->error($model,'rememberMe'); ?>
		</div>
	</div>

	<div class="form-actions">
		<?php echo BHtml::submitButton('Login'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
