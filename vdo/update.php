
<?php
$this->breadcrumbs=array(
	'จัดการวิดีโอเว็บไซต์'=>array('index'),
	'แก้ไขวิดีโอเว็บไซต์',
);
?>
<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'formtext'=>'แก้ไขวิดีโอเว็บไซต์'
)); ?>
