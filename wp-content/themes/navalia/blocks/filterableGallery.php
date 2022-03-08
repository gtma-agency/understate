<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * A Hero section
 */
$filterableGallery = new FieldsBuilder('filterableGallery');
$filterableGallery
->addTab('Content')
    ->addGallery('gallery')
->addTab('Background')
    ->addFields($backgroundSettings)
->addTab('Advanced')
    ->addFields($advancedSettings);