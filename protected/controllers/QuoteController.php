<?php

class QuoteController extends Controller
{
	public $layout = '//layouts/section-wide';
	public $layoutClass = 'wide';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights - view',
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 */
	public function actionCreate()
	{
		$model = new Quote;

		if (isset($_POST['Quote']))
		{
			$model->attributes = $_POST['Quote'];
			if ($model->save())
			{
				$this->redirect(array('index'));
			}
		}

		$this->render('create', array(
			'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['Quote']))
		{
			$model->attributes=$_POST['Quote'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		
		if(Yii::app()->request->isPostRequest)
		{
			$ajaxRequest = Yii::app()->request->isAjaxRequest;
			if (isset($_POST['delete']) || $ajaxRequest)
			{
				$model->delete();
			}

			if(!$ajaxRequest)
			{
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			}
		}

		$this->render('delete', array(
			'model' => $model,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('Quote', array(
			'pagination' => false,
		));

		$this->render('list', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model = Quote::model()->findByPk((int)$id);
		if ($model === null)
		{
			throw new CHttpException(404);
		}
		return $model;
	}
}
