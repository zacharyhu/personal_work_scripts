<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_action_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->l_action_id), array('view', 'id'=>$data->l_action_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_father_id')); ?>:</b>
	<?php echo CHtml::encode($data->l_father_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vc_business_name')); ?>:</b>
	<?php echo CHtml::encode($data->vc_business_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vc_father_name')); ?>:</b>
	<?php echo CHtml::encode($data->vc_father_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vc_business_desc')); ?>:</b>
	<?php echo CHtml::encode($data->vc_business_desc); ?>
	<br />


</div>