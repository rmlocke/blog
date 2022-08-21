<?php

namespace App\Models;

use SimpleXmlElement;
use App\Models\Option;

class Rss
{
    /**
     * Get items from rss feed
     * 
     * @return SimpleXMLElement[]
     */
    public function get()
    {
        $items = [];

        $errorMessage = null;

        //get from options
        $feedUrl = $this->getFeedUrl();

        if ($feedUrl) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $feedUrl);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $xml = curl_exec($ch);

            //handle error
            if (curl_errno($ch)) {
                $errorMessage = curl_error($ch);
            }

            curl_close($ch);

            if (!$errorMessage) {
                $data = new SimpleXmlElement($xml, LIBXML_NOCDATA);
            
                foreach($data->channel->item as $item) {
                    $items[] = $item;
                }
            }
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