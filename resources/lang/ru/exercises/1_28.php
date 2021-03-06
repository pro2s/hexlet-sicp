<?php

return [
    'title' => 'Тест Миллера–Рабина',
    'description' => [
        '1' =>
        "Один из вариантов теста Ферма, который невозможно обмануть, называется тест Миллера–Рабина (Miller-Rabin test) (Miller 1976; Rabin 1980). " .
        "Он основан на альтернативной формулировке Малой теоремы Ферма, которая состоит в том, что если n — простое число, " .
        "а a — произвольное положительное целое число, меньшее n, то a в n−1ой степени равняется 1 по модулюn. " .
        "Проверяя простоту числа n методом Миллера–Рабина, мы берем случайное число a < n и возводим его в (n−1)-ю степень по модулю n с помощью процедуры expmod. " .
        "Однако когда в процедуре expmod мы проводим возведение в квадрат, мы проверяем, не нашли ли мы «нетривиальный квадратный корень из 1 по модулю n», " .
        "то есть число, не равное 1 или n−1, квадрат которого по модулю n равен 1. Можно доказать, что если такой нетривиальный квадратный корень из 1 существует, " .
        "то n не простое число. Можно, кроме того, доказать, что если n — нечетное число, не являющееся простым, " .
        "то по крайней мере для половины чисел a < n вычисление a n−1 с помощью такой процедуры обнаружит нетривиальный квадратный корень из 1 по модулю n " .
        "(вот почему тест Миллера–Рабина невозможно обмануть). Модифицируйте процедуру expmod так, чтобы она сигнализировала обнаружение нетривиального квадратного корня из 1, " .
        "и используйте ее для реализации теста Миллера–Рабина с помощью процедуры, аналогичной fermat-test. " .
        "Проверьте свою процедуру на нескольких известных Вам простых и составных числах. " .
        "Подсказка: удобный способ заставить expmod подавать особый сигнал — заставить ее возвращать 0.",
    ],
];
