<?php
header('Access-Control-Allow-Origin: *');

$percent = 0.1;
$extraInvest = $_POST['extrainvest'];
$invest = $_POST['invest'];
$years = $_POST['duration'];
$date = $_POST['date'];

$monthsAmount = $years * 12;

$sum = $invest;
for ($i = 1; $i <= $monthsAmount; $i++) {
	$sum = $sum + ($sum + $extraInvest) * 30 * ($percent / 365);
}

echo json_encode(array("sum" => round($sum)));


/* 
4.5.1 summn = summn-1 + (summn-1 + summadd)daysn(percent / daysy)

4.5.2 где summn – сумма на счете на месяц n (руб),

4.5.3 summn-1 – сумма на счете на конец прошлого месяца

4.5.4 summadd – сумма ежемесячного пополнения

4.5.5 daysn – количество дней в данном месяце, на которые приходился вклад

4.5.6 percent – процентная ставка банка - 10%

4.5.7 daysy – количество дней в году.

4.5.8 Если в поле «Пополнение вклада» стоит «нет», данные «summadd» не используются.
*/