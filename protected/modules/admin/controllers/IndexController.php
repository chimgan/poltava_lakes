<?php

class IndexController extends AdminController
{
    public function accessRules()
    {
        // Check access for user to request page
        return [
            [
                'allow',
                // allow all users to perform 'login' actions
                'actions' => ['login'],
                'users'   => ['*'],
            ],
            [
                'allow',
                // allow admin user to perform any actions
                'actions' => ['index', 'logout', 'clearCache'],
                'users'   => ['@'],
            ],
            ['deny',
                'users' => ['*'],
            ],
        ];
    }

    /**
     * Main page for admin
     */
    public function actionIndex()
	{
        $this->render('index');
	}

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model = new LoginForm;

        $this->performAjaxValidation($model, 'login-form');

        // collect user input data
        if (isset($_POST['LoginForm'])) {

            $model->attributes = $_POST['LoginForm'];

            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {

                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        // display the login form
        $this->render('login', ['model' => $model]);
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionClearCache()
    {
        // Load all tables of the application in the schema
        Yii::app()->db->schema->getTables();
        // clear the cache of all loaded tables
        Yii::app()->db->schema->refresh();
        $this->redirect('index');
    }
}