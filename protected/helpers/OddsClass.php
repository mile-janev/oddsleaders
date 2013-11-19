<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ChartPercent
 *
 * @author mile
 */
class OddsClass {
    
    /**
     * Percents counting
     * @param type $odds
     * @param type $valueOdd
     * @return type float rounded on 2 decimals
     */
    public static function getPercent($odds, $valueOdd)
    {
        $sum = 0;
        
        foreach ($odds as $key => $value) {
            if ($key != 'label') {
                $sum += OddsClass::formatNumber($value, 5);
            }
        }
        
        return round( (1/OddsClass::formatNumber($valueOdd, 5)) * 100, 2);
    }
    
    /**
     * Format numbers, ',' is changed into '.'
     * @param type $value
     * @param type $decimals
     * @return type float
     */
    public static function formatNumber($value, $decimals=5)
    {
        return round(str_replace(',', '.', $value) , $decimals);
    }
    
}

?>