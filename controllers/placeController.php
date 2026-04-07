<?php

require_once 'models/placeModel.php';

$places = getAllPlaces();

require_once 'views/places/list.php';