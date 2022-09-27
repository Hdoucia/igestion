<?php
namespace App;

    class NumberHelper {
        public static function price(float $number, string $sigle = "XAF"): ?string
        {
            return number_format($number, 0, '', ' '). ' '. $sigle;
        
        }
    

        public static function Nombre(?float $number ): ?string
        {
            return number_format($number, 0, '', ' ');
        
        }
    }
?>