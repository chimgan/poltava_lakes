<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 12/29/13
 * Time: 1:22 AM
 */
/**
 * SearchForm class.
 * SearchForm is the data structure for keeping
 * user login form data. It is used by the 'index' action of 'SiteController'.
 */
class SearchForm extends CFormModel
{
    public $searchText;
    public $objects;
    public $water_object_id;
    public $region_id;
    public $areaFrom;
    public $areaTo;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return [
            // username and password are required
            ['searchText', 'required'],
            ['searchText, objects, water_object_id, region_id, areaFrom, areaTo', 'safe'],
        ];
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return [
            'searchText' => 'Поиск',
        ];
    }
}
