<?

 for($i = 0;$i <52; $i++)
 {
	$a[$i]=$i;
	echo printcard($i);
 }

 echo "</br>It will wash the card every one minutes </br>"; 
 $A = Array();
 
 for($i = 0; $i <52; $i++)
 {
	$ra = mt_rand(0,51);
	if (in_array ($ra, $A))
		$i--;
	else
	{
		$A[$i] = $ra;
		printcard($ra);
	}
  	
 }
 
 function printcard($b)
 {
	$suit = (int)($b/13);
	
	switch( $suit )
	{
		case 0:
            echo " spades=>";
            break;
        case 1:
            echo " hearts=>";
            break;
        case 2:
            echo " diamonds=>";
            break;
        case 3:
            echo " clubs=>";
            break;
	}
	
	$number = $b%13 + 1;
	echo "number: $number </br>";
 } 
 

 
?>