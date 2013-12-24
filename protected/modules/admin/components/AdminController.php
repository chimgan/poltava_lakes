<?php
/**
 *
 * Controller is the customized base controller class.
 * All controller classes for this module Admin should extend from this base class.
 *
 * @author Kovtunov Vladislav
 * @version $Id$
 */
class AdminController extends Controller
{
    public $actionTitle;
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '/layouts/main';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = [];

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = [];


    /**
     * @return array action filters
     */
    public function filters()
    {
        return ['accessControl'];
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        // Check access for user to request page
        return [
            ['deny', 'users' => array('*'),],
        ];
    }

    /**
     * @param integer|string $id
     * @param string $modelClass
     *
     * @return CActiveRecord
     * @throws CHttpException
     */
    public function loadModel($id, $modelClass)
    {
        if (!class_exists($modelClass)) {
            throw new CHttpException(404, 'The requested entity does not exist.');
        }

        $model = CActiveRecord::model($modelClass)->findByPk($id);

        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param  $model the model to be validated
     * @param  string $formName
     */
    protected function performAjaxValidation($model, $formName)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === $formName) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
