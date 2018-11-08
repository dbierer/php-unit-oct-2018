<?php
namespace Completed\Roman;
/**
 * Original algorithm using switch {}
 */
class RomanNumeral
{

    protected $keyList = [50 => 'L', 40 => 'XL', 10 => 'X', 9 => 'IX', 5 => 'V', 4 => 'IV', 1 => 'I'];

    public function convert(array $list)
    {
        $response = [];
        foreach ($list as $num) {
            $tmp = '';
            while ($num > 0) {
                switch (true) {
                    case $num >= 50 :
                        $key = 50;
                        $val = 'L';
                        break;
                    case $num >= 40 :
                        $key = 40;
                        $val = 'XL';
                        break;
                    case $num >= 10 :
                        $key = 10;
                        $val = 'X';
                        break;
                    case $num >= 9 :
                        $key = 9;
                        $val = 'IX';
                        break;
                    case $num >= 5 :
                        $key = 5;
                        $val = 'V';
                        break;
                    case $num >= 4 :
                        $key = 4;
                        $val = 'IV';
                        break;
                    default :
                        $key = 1;
                        $val = 'I';
                        break;
                }
                $tmp .= $val;
                $num -= $key;
            }
            $response[] = $tmp;
        }
        return $response;
    }
}
