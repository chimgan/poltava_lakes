<?php
$this->breadcrumbs = [
    'Водные ресурсы' => ['admin'],
	$model->title,
];
?>

<h1>Провсмотр водного ресурса: "<?php echo $model->title; ?>"</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', [
    'data' => $model,
    'attributes' => [
        'id',
        [
            'name' => 'water_object_id',
            'value' => $model->waterObject->title,
        ],
        [
            'name' => 'region_id',
            'value' => $model->region->title,
        ],
        'title',
        'description',
        'lat',
        'long',
        [
            'name' => 'area',
            'value' => $model->area . ' ГА',
        ],
        [
            'name' => 'rent',
            'value' => empty($model->rent) ? 'Свободно' : 'В аренде',
        ],
        'create_date',
    ],
]); ?>

<?php
Yii::import('ext.gmap.*');

$gMap = new EGMap();
$gMap->zoom = 15;
$gMap->setWidth(880);
$gMap->setHeight(550);
$mapTypeControlOptions = array(
    'position' => EGMapControlPosition::LEFT_BOTTOM,
    'style' => EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU
);
$gMap->mapTypeControlOptions= $mapTypeControlOptions;
$gMap->setCenter($model->lat, $model->long);

// Create GMapInfoWindows
$info_window_a = new EGMapInfoWindow('<div>Искомый водный объект</div>');

// Create marker
$marker = new EGMapMarker($model->lat, $model->long);
$marker->addHtmlInfoWindow($info_window_a);
$gMap->addMarker($marker);

$gMap->renderMap();
?>
