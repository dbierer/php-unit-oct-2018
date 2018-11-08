<?php

class FizzBuzz
{
    public function process($collection)
    {
        $response = [];
        foreach ($collection as $item) {
            $response[] = $this->parse($item);
        }
        return $response;
    }

    protected function parse($item)
    {
        $value = '';
        switch (true) {
            case $item === 0 :
                $value = $item;
                break;
            case $item % 3 == 0 && $item % 5 == 0:
                $value = 'FizzBuzz';
                break;
            case $item % 3 == 0 :
                $value = 'Fizz';
                break;
            case $item % 5 == 0 :
                $value = 'Buzz';
                break;
            default :
                $value = $item;
        }
        return $value;
    }
}
