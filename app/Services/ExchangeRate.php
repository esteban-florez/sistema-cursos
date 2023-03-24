<?php

namespace App\Services;
use \DOMDocument;

class ExchangeRate
{
    const URL = 'https://www.bcv.org.ve/';

    protected static function fetch()
    {
        $ch = curl_init(self::URL);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $res = curl_exec($ch);
     
        if (curl_error($ch)) {
            curl_close($ch);
            abort(500);
        }
     
        curl_close($ch);

        return $res;
    }

    public static function get()
    {
        try {
            $htmlString = self::fetch();
        } catch (\Throwable $th) {
            return 24.30; // fallback value
        }

        $document = new DOMDocument;

        error_reporting(0);
        $document->loadHTML($htmlString);
        error_reporting(E_ALL);
        $dolarDiv = $document->getElementById('dolar');

        $strong = $dolarDiv->getElementsByTagName('strong')[0];
        $priceString = trim($strong->textContent);
        $priceString = str_replace(',', '.', $priceString);
        $price = floatval($priceString);
        $formattedPrice = number_format($price, 2);
        return floatval($formattedPrice);
    }
}