<?php
// Проверка на тип числа
$numb = $_POST["numbers"];
if (is_numeric($numb)) {
	
// Функция конвертации в римские цифры
function numberRoman($number) {
	// Наш массив для преобразования арабские в римские цифры
	$romanArray = array(
		1000000=>"<span class='marker'>M</span>",
		900000=>"<span class='marker'>CM</span>",
		800000=>"<span class='marker'>DCCC</span>",
		700000=>"<span class='marker'>DCC</span>",
		600000=>"<span class='marker'>DC</span>",
		500000=>"<span class='marker'>D</span>",
		400000=>"<span class='marker'>CD</span>",
		100000=>"<span class='marker'>C</span>",
		90000=>"<span class='marker'>XC</span>",
		80000=>"<span class='marker'>LXXX</span>",
		70000=>"<span class='marker'>LXX</span>",
		60000=>"<span class='marker'>LX</span>",
		50000=>"<span class='marker'>L</span>",
		40000=>"<span class='marker'>XL</span>",
		10000=>"<span class='marker'>X</span>",
		9000=>"<span class='marker'>IX</span>",
		6000=>"<span class='marker'>V</span>M",
		5000=>"<span class='marker'>V</span>",
		4000=>"M<span class='marker'>V</span>",
		1000=>"M",
		900=>"CM",
		500=>"D",
		400=>"CD",
		100=>"C",
		90=>"XC",
		50=>"L",
		40=>"XL",
		10=>"X",
		9=>"IX",
		5=>"V",
		4=>"IV",
		1=>"I"
	);

//убираем пробелы
$number = trim(str_replace(" ","",$number));

// округляем в число и убираем буквы если есть
$number = round($number, 0);

// не большая проверка на 0 и большое число
if($number <= 0 || $number > 3900000) {
	
	$numberarab = "Число не может быть меньше нуля или нулем, больше 3900000!!!";
	} elseif ($number > 0) {	
		// запускаем масив пока число не поделить без остатка и не станет false
		while($number) { 
			foreach ($romanArray as $i => $v) {
				$amountNumber = (int)($number/$i);
				// повторяем значение из массива, столько раз на сколко поделилось наше число на индекс и конкатенацию делаем. Результат это наше деление.
				$result = $result . str_repeat($v,$amountNumber);
				// повторяем цикл пока число делиться
				$number = $number - ($i*$amountNumber); 
			}
		} return $result;
	} else "ошибка"; }
	
	$resultNumber = numberRoman($_POST["numbers"]);
	$resPost = $_POST["numbers"];
	$resPost = round($resPost, 0);
	
	$numberarab = $resultNumber;
    $result = array(
    	'number' => $numberarab
    ); 
    echo json_encode($result); 
} elseif (preg_match('/(M{1,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})|M{0,4}(CM|C?D|D?C{1,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})|M{0,4}(CM|CD|D?C{0,3})(XC|X?L|L?X{1,3})(IX|IV|V?I{0,3})|M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|I?V|V?I{1,3}))/i', $numb)) { 

// Функция конвертации в арабские цифры	
function numbArab($r) {
// Разбиваем на масив и переводим в верхний регистр
$romanArray=str_split(strtoupper($r));

	// Наш массив для преобразования
	$arabArray = array(
		"M"=>1000,
		"CM"=>900,
		"D"=>500,
		"CD"=>400,
		"C"=>100,
		"XC"=>90,
		"L"=>50,
		"XL"=>40,
		"X"=>10,
		"IX"=>9,
		"V"=>5,
		"IV"=>4,
		"I"=>1
	);
	
for($i=0; $i<count($romanArray); $i++)
{ // если меньше 
    if ($arabArray[$romanArray[$i]] < $romanArray[$romanArray[$i+1]]) {
        $result += $arabArray[$romanArray[$i+1]] - $arabArray[$romanArray[$i]];
        $i++;
    }
    else { 
		// если совпадает
        $result += $arabArray[$romanArray[$i]];
    }
}
return $result;
}
	$numberarab = numbArab($_POST["numbers"]);
    $result = array(
    	'number' => $numberarab
    ); 
    echo json_encode($result); 
} else {
	 $result = array(
    	'number' => 'Ошибка: Слишком большое число или вы вводите не римскую цифру, а строку.'
    ); 
    echo json_encode($result); 
}
?>