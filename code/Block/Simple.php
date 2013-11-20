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
class Mbiz_Maps_Block_Simple extends Mage_Core_Block_Abstract implements Mage_Widget_Block_Interface
{
    protected function _toHtml() {
        $cfg = (object) $this->getData();
        $src = null;

        if($cfg->provider === 'osm') {
            $src = 'http://www.openstreetmap.org/export/embed.html?';
            list($lat, $lon) = explode(',', $cfg->coords, 2);
            $bbox = implode(',', [
                $lon - 0.001,
                $lat - 0.001,
                $lon + 0.001,
                $lat + 0.001,
            ]);

            $src .= http_build_query([
                'bbox'   => $bbox,
                'marker' => "$lat,$lon",
            ]);
        } else {
            throw new Exception('Not implemented.');
        }

        return "
            <iframe
                width='{$cfg->width}'
                height='{$cfg->height}'
                frameborder='0'
                scrolling='no'
                marginheight='0'
                marginwidth='0'
                src='$src'
                style='border: 1px solid black'
            ></iframe>
        ";
    }
}
