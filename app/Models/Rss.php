<?php

namespace App\Models;

use SimpleXmlElement;
use App\Models\Option;

class Rss
{
    /**
     * Get items from rss feed
     * 
     * @return mixed
     */
    public function get()
    {
        $items = [];

        //get from options
        $feedUrl = $this->getFeedUrl();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $feedUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $xml = curl_exec($ch);
        curl_close($ch);
        
        //handle error
        $return_data = new SimpleXmlElement($xml, LIBXML_NOCDATA);
        
        foreach($return_data->channel->item as $item) {
            $items[] = $item;
        }

        return $items;
    }

    /**
     * Get feed url
     * 
     * @return string
     */
    public function getFeedUrl()
    {
        $feedUrl = Option::where('name', 'feed_url')->pluck('value')->first();

        return $feedUrl;
    }
}