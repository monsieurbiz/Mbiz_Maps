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
    /// Render the widget.
    protected function _toHtml()
    {
        $cfg = (object) $this->getData();

        switch($cfg->provider) {
        case 'osm':
            return $this->renderOsm($cfg);
        case 'gmaps':
            return $this->renderGmaps($cfg);
        default:
            throw new Exception('Not implemented.');
        }
    }


    /**
     * Render a Google Maps iframe.
     *
     * @param stdClass $cfg data given to the widget.
     * @return string HTML.
     */
    protected function renderGmaps($cfg)
    {
        // Google does not provide simple embedding anymore.
        // Maybe this should be implemented later…
        throw new Exception('Not implemented.');
    }


    /**
     * Return a styled iframe for the given URL and size.
     *
     * @param string $src URL to embed.
     * @param int $width
     * @param int $height
     */
    protected function getIframe($src, $width, $height)
    {
        return "
            <iframe
                width='$width'
                height='$height'
                src='$src'
                frameborder='0' scrolling='no' marginheight='0' marginwidth='0'
                style='border: 1px solid black'
            ></iframe>
        ";
    }


    /**
     * Render an OSM iframe.
     *
     * @param stdClass $cfg data given to the widget.
     * @return string HTML.
     */
    protected function renderOsm(stdClass $cfg)
    {
        $URL = 'http://www.openstreetmap.org/export/embed.html';
        list($lat, $lon) = explode(',', $cfg->coords, 2);

        $src = "$URL?" . http_build_query([
            'bbox'   => $this->getOsmBbox($lat, $lon, .001),
            'marker' => "$lat,$lon",
        ]);

        return $this->getIframe($src, $cfg->width, $cfg->height);
    }


    /**
     * Return a bounding-box for OSM viewport from coordinates plus a zoom factor.
     * @param float $lat Latitude.
     * @param float $lon Longitude.
     * @return string "ay,ax,by,bx" (OSM needs it inverted).
     */
    protected function getOsmBbox($lat, $lon, $zoom)
    {
        assert('is_float($zoom)');

        return implode(',', [
            $lon - $zoom,
            $lat - $zoom,
            $lon + $zoom,
            $lat + $zoom,
        ]);
    }
}
