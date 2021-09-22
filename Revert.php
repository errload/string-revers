<?php

    /**
     * из-за проблемы с кодировками для русских букв, такие функции
     * как strrev() и ucfirst() не работают...
     * приходится писать перебор строки и реверс вручную
     */

    class Revert
    {
        public function revertCharacters(string $string)
        {
            // разбиваем строку
            $stringExp = explode(' ', $string);
            // новый массив для перевернутых слов
            $stringRevers = [];

            // перебор нового массива
            foreach ($stringExp as $val) {
                // сохранение результата
                $result = '';
                
                // переворачиваем слово
                for ($i = 1; $i <= mb_strlen($val); $i++) {
                    $result .= mb_substr($val, -$i, 1);
                }

                // если первый символ в строке точка или восклицательный знак
                if (mb_substr($result, 0, 1) === '!' || mb_substr($result, 0, 1) === '.') {
                    // записываем первый символ в переменную
                    $symbol = mb_substr($result, 0, 1);
                    // удаляем символ из слова
                    $result = mb_substr($result, 1, mb_strlen($result));
                    // добавляем этот символ в конец
                    $result .= $symbol;
                }

                // добавляем в новый массив
                $stringRevers[] = $result;
            }

            // склеиваем новый массив из перевернутых слов
            $string = implode(' ', $stringRevers);
            // обнуляем массив
            $stringRevers = [];
            
            // разбиваем строку (для заглавных букв)
            $stringExp = explode('! ', $string);

            // делаем первые буквы строки заглавными
            foreach ($stringExp as $val) {
                // первая буква заглавная
                $first = mb_strtoupper(mb_substr($val, 0, 1));
                // остальные буквы строчные
                $last = mb_strtolower(mb_substr($val, 1, mb_strlen($val)));
                // добавляем в массив полученную склеенную строку
                $stringRevers[] = $first . $last;
            }

            // возвращаем готовую склеенную строку
            return implode('! ', $stringRevers);
        }
    }

    // $revert = new Revert();
    // echo $revert->revertCharacters('Привет! Давно не виделись.');