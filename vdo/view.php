
<?php
$this->breadcrumbs=array(
	'ระบบวิดีโอเว็บไซต์'=>array('index'),
	$model->vdo_title,
);

$this->widget('ADetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'vdo_title',
		'vdo_path',
        'vdo_type',
		array(
			'name'=>'create_date',
			'value'=> ClassFunction::datethaiTime($model->create_date)
		),
		array(
			'name'=>'create_by',
			'value'=>$model->usercreate->username
		),
		array(
			'name'=>'update_date',
			'value'=> ClassFunction::datethaiTime($model->update_date)
		),
		array(
			'name'=>'update_by',
			'value'=>$model->userupdate->username
		),
	),
)); ?>
