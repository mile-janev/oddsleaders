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
    
    /**
     * If monthly=true will return the best tipsters from this month, else from all time
     * @param type $monthly
     * @return 10 users from database who fulfill this condition
     */
    public static function getTipsters($monthly=true)
    {
        $criteria1 = new CDbCriteria();
        if ($monthly) {
            $criteria1->order = 'conto DESC';
        } else {
            $criteria1->order = 'conto_all DESC';
        }
        $criteria1->limit = 10;
        $tipsters = User::model()->findAll($criteria1);
        
        return $tipsters;
    }
    
    /**
     * @return user conto
     */
    public static function getUserConto()
    {
        $user = User::model()->findByPk(Yii::app()->user->id);
        return $user->conto;
    }
    
    public static function codeGenerator($tournament)
    {
        return $tournament->sport->id.$tournament->id.mt_rand(100000, 999999);
    }
    
}

?>
