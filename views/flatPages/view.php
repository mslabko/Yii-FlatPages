<?php
$this->breadcrumbs=array(
	'Flat Pages'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List FlatPages', 'url'=>array('index')),
	array('label'=>'Create FlatPages', 'url'=>array('create')),
	array('label'=>'Update FlatPages', 'url'=>array('update', 'id'=>$model->url)),
	array('label'=>'Delete FlatPages', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->url),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FlatPages', 'url'=>array('admin')),
);
?>

<h1>View FlatPages #<?php echo $model->url; ?></h1>

<?php
$reqReq = FlatPages::registrationRequired($model->registration_required);
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'url',
		'title',
        array(
            'type' => 'raw',
            'name' => 'content',
            'value' =>  CHtml::link(Yii::t('fp', 'See page'),
            Yii::app()->createUrl('/site/page', array('view'=>$model->url)),
            array('target'=>'_blank')
            )
        ),

		'keywords',
		'description',
		'template_name',
        array(
            'type' => 'raw',
            'name' => 'registration_required',
            'value' => $reqReq
        )
		,
	),
)); ?>


