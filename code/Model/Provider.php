<?php
/**
 * This file is part of Mbiz_Maps for Magento.
 *
 * @license All rights reserved.
 * @author Léo Peltier <l.peltier@monsieurbiz.com>
 * @category Mbiz
 * @package Mbiz_Maps
 * @copyright Copyright (c) 2013 Monsieur Biz (http://monsieurbiz.com/)
 */
class Mbiz_Maps_Model_Provider
{
    public function toOptionArray()
    {
        return [
            [
                'label' => 'OpenStreetMap',
                'value' => 'osm',
            ],
            [
                'label' => 'Google Maps',
                'value' => 'gmaps',
            ],
        ];
    }
}
