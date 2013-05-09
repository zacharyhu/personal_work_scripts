<?php
/* @var $this CpContactInfoController */
/* @var $data CpContactInfo */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('cp_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cpName->cp_name),array('CpBaseInfo/view','id'=>$data->cp_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_name')); ?>:</b>
	<?php echo CHtml::encode($data->contact_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_phone')); ?>:</b>
	<?php echo CHtml::encode($data->contact_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_email')); ?>:</b>
	<?php echo CHtml::mailto(CHtml::encode($data->contact_email)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_type')); ?>:</b>
	<?php echo CHtml::encode(CpContactInfo::model()->getContactType($data->contact_type)); ?>
	<br />

	<b><?php echo CHtml::encode("可操作"); ?>:</b>
	<?php echo " | ";$url_link="更新该联系人信息  cpid:".$data->id;echo CHtml::link(CHtml::encode($url_link), array('update', 'id'=>$data->id)); ?>
	<br />

</div>