<?php

declare(strict_types=1);

namespace Rinvex\Country;

use Rinvex\Country\CountryLoader;

class CurrencyLoader
{
    protected static $curriencies = [];

    /**
     * Retrive all the curriencies of all countries
     * @param  boolean $longlist states if need all the details of the curriencies or only the keys
     * @return array
     */
    public static function curriencies($longlist = false): array
    {
        $list = $longlist ? 'longlist' : 'shortlist';

        if(!isset(static::$curriencies[$list])) {
            
            $countries = CountryLoader::countries(true);

            foreach ($countries as $country) {
                foreach ($country["currency"] as $currency => $details) {
                    static::$curriencies[$list][$currency] = $longlist? $details: $currency; 
                }
            }
        } 

        return static::$curriencies[$list];
    }
}
