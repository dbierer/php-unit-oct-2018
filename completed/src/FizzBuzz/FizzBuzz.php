<?php

class FizzBuzz
{
    public function process($collection)
    {
        $response = [];

        foreach ($collection as $item) {
            if (!is_int($item)) {
                throw new Exception('Did not get an integer');
            }
            $tmp = '';
            if ($item % 3 == 0 && $item !== 0) $tmp .= 'Fizz';
            if ($item % 5 == 0 && $item !== 0) $tmp .= 'Buzz';
            if ($tmp == '') $tmp = $item;
            $response[] = $tmp;
        }

        return $response;
    }
}
