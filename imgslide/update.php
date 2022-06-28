
<?php
$this->breadcrumbs=array(
	'ระบบป้ายประชาสัมพันธ์'=>array('index'),
	'แก้ไขป้ายประชาสัมพันธ์',
);
?>
<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'formtext'=>'แก้ไขป้ายประชาสัมพันธ์',
	'imageShow'=>$imageShow,
	'notsave'=>$notsave
)); ?>

