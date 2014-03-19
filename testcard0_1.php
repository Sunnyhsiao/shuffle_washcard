<?php
global $cardSuit;
$cardSuit = array("Spades", "Hearts","Dimonds","Clubs");
$initCard = array(0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c,  //sapdes
                  0x10, 0x11, 0x12, 0x13, 0x14, 0x15, 0x16, 0x17, 0x18, 0x19, 0x1a, 0x1b, 0x1c,  //hearts
			      0x20, 0x21, 0x22, 0x23, 0x24, 0x25, 0x26, 0x27, 0x28, 0x29, 0x2a, 0x2b, 0x2c,  //diamonds
			      0x30, 0x31, 0x32, 0x33, 0x34, 0x35, 0x36, 0x37, 0x38, 0x39, 0x3a, 0x3b, 0x3c); //clubs

foreach($initCard as $Card)
        printCard($Card);
	
		echo "after</br>";

//$A = Array();

/*for($i = 0; $i<52; $i++){
        $ra = mt_rand(0,51);
        if(in_array($ra, $A))
                $i--;

        else{
                $A[$i] = $ra;
                classifyCard($ra);
        }
}*/

shuffle($initCard);  //洗牌,還要再想過

foreach($initCard as $Card)
printCard($Card);

function getNum($Card)
{
	$number = ($Card & 0x0f) + 1;
	return $number;
	//return (($Card & 0x0f) + 1);
} 

  function getSuit($Card)
 {
    $suit = $Card >> 4; 
    return $suit;
 } 

function printCard($Cards)
{
	global $cardSuit;
    //$suit = $Cards >> 4;   //$suit = (int)($b/16);
	//$number = ($Cards & 0x0f) + 1;    //$number = $Cards %16+1;
    
	printf("%s => %02d </br> ", $cardSuit[getSuit($Cards)] , getNum($Cards));  //print card and  align    
}
