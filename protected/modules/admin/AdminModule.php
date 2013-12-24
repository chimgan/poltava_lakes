<?php
/**
 * Class AdminModule front controller
 */
class AdminModule extends CWebModule
{
    /**
     * @var array
     */
    public $menu = [];

    /**
     * @var string
     */
    public $defaultController = 'index';

    /**
     * @var string
     */
    public $homeUrl = '/admin/index/login';

    /**
     * @return string
     */
    public function getName()
    {
        return 'Админка';
    }

	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport([
			'admin.models.*',
			'admin.components.*',
		]);

        Yii::app()->setComponents([
            'errorHandler' => [
                'errorAction' => 'admin/index/error'
            ],
        ]);

        $this->menu = require Yii::getPathOfAlias('admin.config') . DIRECTORY_SEPARATOR . 'menu.php';
	}

	public function beforeControllerAction($controller, $action)
	{
		if (parent::beforeControllerAction($controller, $action)) {
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
