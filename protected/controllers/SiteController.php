<?php

class SiteController extends Controller
{
	public $layout = '//layouts/section-wide';
	
	public function filters()
	{
		return array(
			'rights + fileManager, browse',
		);
	}
	
	public function actions()
	{
		$actions = array();
		if (isset(Yii::app()->params['enableFileManager'])
			&& Yii::app()->params['enableFileManager'])
		{
			$actions = CMap::mergeArray($actions, array(
				'fileManager' => array(
					'class' => 'ext.yiiext.widgets.elfinder.ElFinderAction',
            		'root' => Yii::getPathOfAlias('webroot.images'),
            		'URL' => Yii::app()->baseUrl . '/images/',
					'rootAlias' => 'Изображения',
					'disabled' => array(
						'extract',
						'archive',
					),
				),
			));
		}
		return $actions;
	}
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	
	public function actionLogin()
	{
		$model = new LoginForm();
		
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		if (isset($_POST['LoginForm']))
		{
			$model->attributes = $_POST['LoginForm'];
			if ($model->validate() && $model->login())
			{
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		
		$this->render('login', array(
			'model' => $model,
		));
	}
	
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionBrowse()
	{
		if (!isset(Yii::app()->params['enableFileManager'])
			|| !Yii::app()->params['enableFileManager'])
		{
			throw new CHttpException(404, 'Страница не найдена');
		}
		$this->layout='//site/browse';
		$this->renderText($this->widget('ext.yiiext.widgets.elfinder.ElFinderWidget', array(
			'lang' => Yii::app()->getLanguage(),
            'url' => CHtml::normalizeUrl(array('site/fileManager')),
			'places' => '',
            'editorCallback' => 'js:function(url) {
				var funcNum = window.location.search.replace(/^.*CKEditorFuncNum=(\d+).*$/, "$1");
				window.opener.CKEDITOR.tools.callFunction(funcNum, url);
				window.close();
			}',
		), true));
	}
}
