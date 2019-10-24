<?php

namespace SujalPatel\IntToEnglish;


use Symfony\Component\Routing\Exception\InvalidParameterException;

class IntToEnglish
{


    protected static $numberLength = 9;


    /**
     * @param int $value
     * @return string
     */

    public static function Int2Eng($value): string
    {
        if (strlen((string)$value) > self::$numberLength) {
            throw new InvalidParameterException('Number length must be equal or less then nine.');
        }

        return (new self)->numberToWork($value);
    }

    /**
     * @param int $number
     * @return string
     */
    protected function numberToWork($number): string
    {
        switch ($number) {
            case 0:
                return 'Zero';
                break;
            case 1:
                return 'One';
                break;
            case 2:
                return 'Two';
                break;
            case 3:
                return 'Three';
                break;
            case 4:
                return 'Four';
                break;
            case 5:
                return 'Five';
                break;
            case 6:
                return 'Six';
                break;
            case 7:
                return 'Seven';
                break;
            case 8:
                return 'Eight';
                break;
            case 9:
                return 'Nine';
                break;
            case 10:
                return 'Ten';
                break;
            case 11:
                return 'Eleven';
                break;
            case 12:
                return 'Twelve';
                break;
            case 13:
                return 'Thirteen';
                break;
            case 14:
                return 'Fourteen';
                break;
            case 15:
                return 'Fifteen';
                break;
            case 16:
                return 'Sixteen';
                break;
            case 17:
                return 'Seventeen';
                break;
            case 18:
                return 'Eighteen';
                break;
            case 19:
                return 'Nineteen';
                break;
            case 20:
                return 'Twenty';
                break;
            case 30:
                return 'Thirty';
                break;
            case 40:
                return 'Forty';
                break;
            case 50:
                return 'Fifty';
                break;
            case 60:
                return 'Sixty';
                break;
            case 70:
                return 'Seventy';
                break;
            case 80:
                return 'Eighty';
                break;
            case 90:
                return 'Ninety';
                break;
            case 100:
                return 'One Hundred';
                break;
            case 1000:
                return 'One Thousand';
                break;
            case 1000000:
                return 'One Million';
                break;
            case 1000000000:
                return 'One Billion';
                break;
        }

        // less than 100
        for ($i = 1; $i <= 9; $i++) {
            $j = $i * 10;
            if (($number >= $j) && ($number < $j + 10)) {
                $r = $number - $j;
                return (new self)->numberToWork($j) . ($r > 0 ? (' ' . (new self)->numberToWork($r)) : '');
            }
        }

        // less than 1000
        for ($i = 1; $i <= 9; $i++) {
            $j = $i * 100;
            if (($number >= $j) && ($number < $j + 100)) {
                $r = $number - $j;
                return (new self)->numberToWork($i) . ' Hundred ' . ($r > 0 ? ('' . (new self)->numberToWork($r)) : '');
            }
        }

        // less than 10000
        for ($i = 1; $i <= 9; $i++) {
            $j = $i * 1000;
            if (($number >= $j) && ($number < $j + 1000)) {
                $r = $number - $j;
                return (new self)->numberToWork($i) . ' Thousand ' . ($r > 0 ? (' ' . (new self)->numberToWork($r)) : '');
            }
        }

        // Million
        for ($i = 1; $i <= 9; $i++) {
            $j = $i * 1000000;
            if (($number >= $j) && ($number < $j + 1000000)) {
                $r = $number - $j;
                return (new self)->numberToWork($i) . ' Million ' . ($r > 0 ? (' ' . (new self)->numberToWork($r)) : '');
            }
        }

        // Billion
        for ($i = 1; $i <= 4; $i++) {
            $j = $i * 1000000000;
            if (($number >= $j) && ($number < $j + 1000000000)) {
                $r = $number - $j;
                return (new self)->numberToWork($i) . ' Billion ' + ($r > 0 ? (' ' + (new self)->numberToWork($r)) : '');
            }
        }

        // Divide the number into 3-digit groups from left to right
        $output = '';
        $cnt = 0;
        while ($number > 0) {
            $y = $number % 1000;
            $number /= 1000;
            if ($y > 0) { // skip middle-chunk zero
                $t = '';
                switch ($cnt) {
                    case 1:
                        $t = ' Thousand ';
                        break;
                    case 2:
                        $t = ' Million ';
                        break;
                    case 3:
                        $t = ' Billion ';
                        break;
                }
                $output = (new self)->numberToWork($y) . $t . $output;
            }
            $cnt++;
        }
        if ($output[strlen($output) - 1] == ' ') { // "Three Thousand " == > "Three Thousand"
            return $output . substr(0, strlen($output) - 1);
        }
        return $output;
    }
}