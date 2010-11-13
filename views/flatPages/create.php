<?php
$this->breadcrumbs=array(
	'Flat Pages'=>array(Yii::t('fp', 'index')),
	Yii::t('fp', 'Create'),
);

$this->menu=array(
	array('label'=>'List FlatPages', 'url'=>array('index')),
	array('label'=>'Manage FlatPages', 'url'=>array('admin')),
);
?>

<h1> Create FlatPages </h1>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'flat-pages-form',
	'enableAjaxValidation'=>true,
    'clientOptions' => array(
        'validateOnChange' => false,
        'validateOnSubmit' => true
     )

)); 
echo $this->renderPartial('_form', array(
	'model'=>$model,
	'form' =>$form
	)); ?>

<div class="row buttons">
	<?php echo CHtml::submitButton(Yii::t('fp', 'Create')); ?>
</div>

<?php $this->endWidget(); ?>

</div>
