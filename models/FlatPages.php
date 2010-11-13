<?php

/**
 * This is the model class for table "flat_pages".
 *
 * The followings are the available columns in table 'flat_pages':
 * @property string $url
 * @property string $content
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $template_name
 * @property string $registration_required
 */
class FlatPages extends CActiveRecord
{

    public static $wysiwyg = 'application.extensions.cleditor.ECLEditor';


    /**
	 * Returns the static model of the specified AR class.
	 * @return FlatPages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'flat_pages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url, content', 'required'),
			array('url', 'unique'),
			array('url', 'length', 'max'=>100),
			array('title', 'length', 'max'=>200),
			array('template_name', 'length', 'max'=>70),
			array('registration_required', 'in', 'range' => array('y', 'n')),
			
			array('keywords, description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('url, content, title, keywords, description, template_name, registration_required', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'url' => Yii::t('fp', 'Url'),
			'content' => Yii::t('fp', 'Content'),
			'title' => Yii::t('fp', 'Title'),
			'keywords' => Yii::t('fp', 'Keywords'),
			'description' => Yii::t('fp', 'Description'),
			'template_name' => Yii::t('fp', 'Template Name'),
			'registration_required' => Yii::t('fp', 'Registration Required'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('url',$this->url,true);
		//$criteria->compare('content',$this->content,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('template_name',$this->template_name,true);
		//$criteria->compare('registration_required',$this->registration_required,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}


    public static function registrationRequired($v = false){
        $arr =  array(
                'n'=>Yii::t('fp', 'No'),
                'y'=>Yii::t('fp', 'Yes')
                );
        return ($v) ? $arr[$v] : $arr;
    }
}