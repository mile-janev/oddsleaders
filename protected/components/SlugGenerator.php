<?php

class SlugGenerator{
    
    //Pokasno napravi vo ovaj metod da ne moze da se generira isti slug povekje pati
    public static function slug($string)
    {
        $slug = SlugGenerator::cleanurl($string);
        
        return $slug;
    }

    public static function cleanurl($string){
        $cyrillic = array("а", "б", "в", "г", "д", "ѓ", "е", "ж", "з", "ѕ", "и", "ј", "к",
                    "л", "љ", "м", "н", "њ", "о", "п", "р", "с", "т", "ќ", "у", "ф",
                    "х", "ц", "ч", "џ", "ш", "А", "Б", "В", "Г", "Д", "Ѓ", "Е", "Ж",
                    "З", "Ѕ", "И", "Ј", "К", "Л", "Љ", "М", "Н", "Њ", "О", "П", "Р",
                    "С", "Т", "Ќ", "У", "Ф", "Х", "Ц", "Ч", "Џ", "Ш");
                
        $latin = array("a", "b", "v", "g", "d", "g", "e", "z", "z", "z", "i", "j", "k",
                    "l", "l", "m", "n", "nj", "o", "p", "r", "s", "t", "k", "u", "f",
                    "h", "c", "c", "j", "s", "A", "B", "V", "G", "D", "G", "E", "Z",
                    "Z", "Z", "I", "J", "K", "L", "L", "M", "N", "Nj", "O", "P", "R",
                    "S", "T", "K", "U", "F", "H", "C", "C", "J", "S");
        $string = trim($string);
        $clean = iconv('UTF-8', 'UTF-8//TRANSLIT', $string);
	$clean = preg_replace("/[\/,:<>=()&*;'?_|+ -\"\']+/", "-", $clean);
        $clean = str_replace($cyrillic, $latin, $clean);
//        < > = ( * ; '
        $clean = strtolower($clean);
        
        return $clean;
    }
}