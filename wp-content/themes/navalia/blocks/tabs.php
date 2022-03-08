<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$backgroundSettings = new FieldsBuilder('background_settings');
$backgroundSettings
    ->addImage('background_image')
    ->addTrueFalse('background_image_fixed')
    ->addColorPicker('background_color');

$advancedSettings = new FieldsBuilder('advanced_settings');
$advancedSettings
    ->addText('ID')
    ->addText('Class');
