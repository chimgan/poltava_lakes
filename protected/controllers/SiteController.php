<?php

class SiteController extends Controller
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $model = new SearchForm();

        $this->render('index', [
            'model' => $model,
            'result' => '',
        ]);
	}

    public function actionLake($id)
    {
        $model = Lake::model()->findByPk($id);

        if (!$model) {

            $this->redirect('index');
        }

        $this->render('lake', [
            'model' => $model,
        ]);
    }

    public function actionSearch()
    {
        if (isset($_POST['SearchForm'])) {

            $search = new SearchForm();
            $model = new Lake('search');
            $model->unsetAttributes(); // clear any default values

            if (isset($_POST['SearchForm'])) {

                $search->attributes = $_POST['SearchForm'];

                if (!empty($_POST['SearchForm']['searchText'])) {

                    $model->title = $_POST['SearchForm']['searchText'];
                    $model->description = $_POST['SearchForm']['searchText'];
                }

                if (in_array($_POST['SearchForm']['objects'], [0, 1])) {

                    $model->rent = $_POST['SearchForm']['objects'];
                }

                if (!empty($_POST['SearchForm']['water_object_id'])) {

                    $model->water_object_id = $_POST['SearchForm']['water_object_id'];
                }

                if (!empty($_POST['SearchForm']['region_id'])) {

                    $model->region_id = $_POST['SearchForm']['region_id'];
                }

                if (!empty($_POST['SearchForm']['areaFrom'])) {

                    $model->areaFrom = $_POST['SearchForm']['areaFrom'];
                }

                if (!empty($_POST['SearchForm']['areaTo'])) {

                    $model->areaTo = $_POST['SearchForm']['areaTo'];
                }
            }

            $this->render('index', [

                'model' => $search,
                'result' => $model,
            ]);
            Yii::app()->end();
        }

        $this->redirect('index');
    }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if ($error = Yii::app()->errorHandler->error) {

			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}