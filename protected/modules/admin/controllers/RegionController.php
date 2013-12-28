<?php

class RegionController extends AdminController
{
    public function accessRules()
    {
        return [
            ['allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => ['create', 'update', 'view', 'admin', 'delete'],
                'users' => ['admin'],
            ],
            ['deny', // deny all users
                'users' => ['*'],
            ],
        ];
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', [
            'model' => $this->loadModel($id, 'Region'),
        ]);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Region;

        if (isset($_POST['Region'])) {

            $model->attributes = $_POST['Region'];

            if ($model->save()) {

                $this->redirect(['view','id'=>$model->id]);
            }
        }

        $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id, 'Region');

        if (isset($_POST['Region'])) {

            $model->attributes = $_POST['Region'];

            if ($model->save()) {

                $this->redirect(['view','id' => $model->id]);
            }
        }

        $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {

            // we only allow deletion via POST request
            $this->loadModel($id, 'Region')->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {

                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : ['admin']);
            }

        } else {

            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Region('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['Region'])) {

            $model->attributes = $_GET['Region'];
        }

        $this->render('admin', [
          'model' => $model,
        ]);
    }
}