<?php
$testArray = array();
$testCount = 0;
for($i = 0; $i<10; $i++)
{
	$countArray = count($testArray);
	$testArray[$countArray] = $i;
	$testCount+=$testArray[$countArray];
}
 /* foreach($testArray as $num )
{
echo ($num + "<br/>");
}  */
echo $testCount;
?>