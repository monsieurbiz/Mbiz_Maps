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
class Mbiz_Maps_Block_Osm extends Mage_Core_Block_Abstract implements Mage_Widget_Block_Interface
{
    protected function _toHtml() {
        return <<<EOF
            <iframe
                width="425"
                height="350"
                frameborder="0"
                scrolling="no"
                marginheight="0"
                marginwidth="0"
                src="http://www.openstreetmap.org/export/embed.html?bbox=2.342182695865631%2C48.863405513703945%2C2.3452967405319214%2C48.86478534024213&amp;layer=mapnik&amp;marker=48.864095431728515%2C2.3437410593032837"
                style="border: 1px solid black"
            ></iframe>
            <br/>
            <small><a href="http://www.openstreetmap.org/?mlat=48.86410&amp;mlon=2.34374#map=19/48.86410/2.34374">View Larger Map</a></small>
EOF;
    }
}
