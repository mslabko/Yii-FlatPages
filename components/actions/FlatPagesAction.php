<?php

/**
 * FlatPagesAction class file.
 *  Creating static pages on the similarity of django flatpages.
 *    Features:
 *    - Page title, keywords and page description
 *    - Prohibition of view for non-authorized users
 *    - custom template for a page
 *
 * example of inclusion flatPages for SiteController

	public function actions()
	{
		return array(
			// page action renders "static" pages stored under 'protected/views/site/pages'
            // If the page is in the database, then load its content, else run default  CViewAction
            'page'=>array(
				'class'=>'path_to FlatPagesAction', // application.controllers.actions.FlatPagesAction
			),
		);
	}
 *
 * @author Slabko Mihail <l.nagash@gmail.com>
 */
class FlatPagesAction extends CViewAction{


    public $tableName = 'flat_pages';
    public function run(){
        $db = Yii::app()->getDb();
        $viewParam = $this->viewParam;
        $url = $_GET[$viewParam];
        
        $sql =
        'SELECT url, "content", title, keywords, description, template_name, registration_required
            FROM '.$this->tableName.' WHERE url = :url ;
        ';
        $page = false;
        try{
            $page = $db->createCommand($sql)->bindParam(':url', $url)->queryRow();
        }
        catch(Exception $e){
        
            $page = false;
        }
        
        if($page){
            $controller = $this->getController();
            if($page['registration_required'] == 'y' && Yii::app()->user->isGuest){
                $controller->redirect(Yii::app()->user->loginUrl)   ;
            }
            $this->view = ($page['template_name'])  ? $page['template_name'] : false;
            if($page['title']) $controller->pageTitle = $page['title'];
            if($page['description']) Yii::app()->clientScript->registerMetaTag( $page['description'], 'description');
            if($page['keywords']) Yii::app()->clientScript->registerMetaTag( $page['keywords'], 'keywords');
           
            
            if($this->layout!==null)
            {
                $layout=$controller->layout;
                $controller->layout=$this->layout;
            }

            $this->onBeforeRender($event=new CEvent($this));
            if(!$event->handled)
            {
                if($this->view)
                {
                    try{
                        $controller->render($this->view, array('content' => $page['content']));
                    }
                    catch (Exception $e){
                        throw new CHttpException('404','Cant find template "'.$this->view.'"');
                    }
                }
                else
                    $controller->renderText( $page["content"] );
                $this->onAfterRender(new CEvent($this));
            }

            if($this->layout!==null)
                $controller->layout=$layout;
        }
        else{
            //default action with render static page from file
            parent::run();
        }

    }

}
?>
