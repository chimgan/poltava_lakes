<?php

class WaterObjectController extends AdminController
{
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
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
            'model' => $this->loadModel($id, 'WaterObject'),
        ]);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new WaterObject;

        if (isset($_POST['WaterObject'])) {

            $model->attributes = $_POST['WaterObject'];

            if ($model->save()) {

                $this->redirect(['view', 'id' => $model->id]);
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
        $model = $this->loadModel($id, 'WaterObject');

        if (isset($_POST['WaterObject'])) {

            $model->attributes = $_POST['WaterObject'];

            if ($model->save()) {

                $this->redirect(['view', 'id' => $model->id]);
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
            $this->loadModel($id, 'WaterObject')->delete();

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
        $model = new WaterObject('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['WaterObject'])) {

            $model->attributes = $_GET['WaterObject'];
        }

        $this->render('admin', [
            'model' => $model,
        ]);
    }
}
