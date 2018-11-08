<?php
namespace Completed\Roman;
/**
 * Improved algorithm using a mapping array
 */
class Converter
{
    public function arabicToRoman($collection)
    {

        $mappings = [
            50 => 'L',
            40 => 'XL',
            10 => 'X',
            9  => 'IX',
            5  => 'V',
            4  => 'IV',
            1  => 'I'
        ];

        foreach ($collection as $item) {
            $value = $item;
            $tmp = '';
            while ($value > 0) {
                foreach ($mappings as $num => $roman) {
                    if ($value >= $num) {
                        $value = $value - $num;
                        $tmp .= $roman;
                        break;
                    }
                }
            }
            $response[] = $tmp;
        }

        return $response;
    }
}
