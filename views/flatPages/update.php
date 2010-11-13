<?php
$this->breadcrumbs=array(
	'Flat Pages'=>array('index'),
	$model->title=>array('view','id'=>$model->url),
	Yii::t('fp', 'Update'),
);

$this->menu=array(
	array('label'=>'List FlatPages', 'url'=>array('index')),
	array('label'=>'Create FlatPages', 'url'=>array('create')),
	array('label'=>'View FlatPages', 'url'=>array('view', 'id'=>$model->url)),
	array('label'=>'Manage FlatPages', 'url'=>array('admin')),
);
?>

<h1> Update FlatPages #<?php echo $model->url; ?> </h1>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'flat-pages-form',
	'enableAjaxValidation'=>true,
)); 
echo $this->renderPartial('_form', array(
	'model'=>$model,
	'form' =>$form
	)); ?>

<div class="row buttons">
	<?php echo CHtml::submitButton(Yii::t('fp', 'Update')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
