<?php
$this->breadcrumbs=array(
	'Flat Pages'=>array(Yii::t('fp', 'index')),
	Yii::t('fp', 'Manage'),
);

$this->menu=array(
		array('label'=>Yii::t('fp',
				'List FlatPages'), 'url'=>array('index')),
		array('label'=>Yii::t('fp', 'Create FlatPages'),
				'url'=>array('create')),
			);

		Yii::app()->clientScript->registerScript('search', "
			$('.search-button').click(function(){
				$('.search-form').toggle();
				return false;
				});
			$('.search-form form').submit(function(){
				$.fn.yiiGridView.update('flat-pages-grid', {
data: $(this).serialize()
});
				return false;
				});
			");
		?>

<h1> Manage&nbsp;Flat Pages</h1>

<?php echo CHtml::link(Yii::t('fp', 'Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

<?php

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'flat-pages-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'url',
        array(
            'type' => 'raw',
            'name' => 'content',
            'value' =>  'CHtml::link(Yii::t("fp", "See page"),
            Yii::app()->createUrl("/site/page", array("view"=>$data->url)),
            array("target"=>"_blank")
            )'
        ),
	//	'content',
		'title',
		'keywords',
		'description',
		'template_name',
		/*
		'registration_required',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
