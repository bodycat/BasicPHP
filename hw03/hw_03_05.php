<?php
// Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.
header("Content-type:text/html; charset=utf-8");
$string = "<p>Съешь ещё этих мягких французских булок, да выпей [же] чаю. 1234567890.
Из «Виндоуса-95» (fontview.exe)</p>";

function underline($string)
{
    $dictionary = [
        " " => "_"
    ];
// Преобразование строки в массив. Решение проблемы с UTF-8
// https://stackoverflow.com/questions/21653033/php-how-to-split-a-utf-8-string
    $stringToArray = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);

    foreach ($stringToArray as $key => $character) {
        foreach ($dictionary as $symbol => $sign) {
            if ($character == $symbol) {
                $stringToArray[$key] = $sign;
                break;
            }
        }
    }

// implode — Объединяет элементы массива в строку
    return implode($stringToArray);
}
echo "<b>Исходный текст:</b> $string <hr>";
echo "<b>Текст с транслитерацией:</b>" . underline($string);