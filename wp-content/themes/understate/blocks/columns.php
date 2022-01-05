<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * A Hero section
 */
$columns = new FieldsBuilder('columns');
$columns
->addTab('Content')
    ->addRepeater('columns', ['min' => 1, 'max' => 4, 'layout' => 'block'])
        ->addWysiwyg('content')
        ->addLink('Button')
    ->endRepeater()
->addTab('Background')
    ->addFields($backgroundSettings)
->addTab('Advanced')
    ->addFields($advancedSettings);