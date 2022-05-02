<?php

if (isset($_POST['calc'])) {
    $string = $_POST['string'];

    $count_operations = substr_count($string, "+") + substr_count($string, "-") + substr_count($string, "*") + substr_count($string, "/");

    $msg = "Ошибка";

    if (strlen($string) < 3) {
        $msg = "Ошибка. Неправильные входные данные.";
    } elseif ($count_operations == 0) {
        $msg = "Ошибка. Операции отсутствуют.";
    } elseif (strpos($string, "/0") !== false) {
        $msg = "Ошибка. Деление на 0.";
    } else {
        $msg = calculating($string);
    }

    header('Location: /index.php?msg=' . $msg);
}

// Вычисляем результат
function calculate($string) {
    $string .= "+";
    $result = 0;
    $number = 0;
    $oldOperation = "+";
    $startOldOperation = "";
    $t = 0;

    for ($i = 0; $i < strlen($string); $i++) {
        $c = $string[$i - 1];
        if ($string[$i] == "-" && ($c == "*" || $c == "/" || $c == "+")) {
            $number = "-";
        } else {
            $c = $string[$i];
            if ($c == "+" || $c == "-" || $c == "/" || $c == "*") {
                $number = (float)$number;
                if ($c == "+" || $c == "-") {
                    switch ($oldOperation) {
                        case "+": {
                            $result += $number;
                            break;
                        }
                        case "-": {
                            $result -= $number;
                            break;
                        }
                        case "*": {
                            $t *= $number;
                            if ($startOldOperation == "+") $result += $t;
                            else $result -= $t;
                            $t = 0;
                            break;
                        }
                        case "/": {
                            if ($number == 0) {
                                echo "Ошибка. Деление на ноль";
                                exit;
                            }
                            $t /= $number;
                            if ($startOldOperation == "+") $result += $t;
                            else $result -= $t;
                            $t = 0;
                            break;
                        }
                    }
                } else {
                    if ($oldOperation == "+" || $oldOperation == "-") {
                        $t = $number;
                        $startOldOperation = $oldOperation;
                    } else {
                        if ($oldOperation == "*") $t *= $number;
                        else {
                            if ($number == 0) {
                                echo "Ошибка. Деление на ноль";
                                exit;
                            }
                            $t /= $number;
                        }
                    }
                }

                $oldOperation = $string[$i];
                $number = "";
            } else {
                $number .= $string[$i];
            }
        }
    }

    return $result;
}


// Раскрываем скобки
function expand($string) {
    $endBracket = strpos($string, ')');
    $startBracket = $endBracket;
    while ($string[$startBracket] != '(') $startBracket--;
    $new_string = substr($string, $startBracket + 1, $endBracket - $startBracket - 1);
    $result = substr($string, 0, $startBracket) . calculate($new_string) . substr($string, $endBracket + 1);
    if (strpos($result, '(') === false) return calculate($result);
    else return expand($result);
}


// Решение примера
function calculating($string) {
    if (strpos($string, '(') === false) return calculate($string);
    else return expand($string);
}

?>