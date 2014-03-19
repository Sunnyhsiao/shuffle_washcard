<?php
//global $cardSuit, $cardPic;
$cardSuit = array("Spades", "Hearts","Dimonds","Clubs");
$cardPic =  array("A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K");
$initCard = array(0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c,  //sapdes
                  0x10, 0x11, 0x12, 0x13, 0x14, 0x15, 0x16, 0x17, 0x18, 0x19, 0x1a, 0x1b, 0x1c,  //hearts
			      0x20, 0x21, 0x22, 0x23, 0x24, 0x25, 0x26, 0x27, 0x28, 0x29, 0x2a, 0x2b, 0x2c,  //diamonds
			      0x30, 0x31, 0x32, 0x33, 0x34, 0x35, 0x36, 0x37, 0x38, 0x39, 0x3a, 0x3b, 0x3c); //clubs

function getNum($Card) // get number 
{
	$number = ($Card & 0x0f) ;
	return $number;
} 

function getSuit($Card) //get suit
{
    $suit = $Card >> 4; 
    return $suit;
} 

function printCard($Card, $cardSuit, $cardPic)
{
	//global $cardSuit; 
	//global $cardPic; 
	printf("%s => %s </br> ", $cardSuit[getSuit($Card)] , $cardPic[getNum($Card)]);      //print card 
}

function printHand($initCard,$cardSuit, $cardPic)  //print hand(手牌)
{
	foreach($initCard as $Card)
    printCard($Card,$cardSuit, $cardPic);
}

function shuffleCard($initCard)  //shuffle
{
    $changeCard = array();
	
	for($i = 0; $i<52; $i++){
        $random = mt_rand($i, 51);
        $changeCard[$i] = $initCard[$random]; //put random card to the first place
        $initCard[$random] = $initCard[$i];  //put the i card to the random place
    }
	
	return $changeCard;
}
printHand($initCard,$cardSuit, $cardPic);
echo "after</br>";
$afterShuffleCard = shuffleCard($initCard);  
printHand($afterShuffleCard,$cardSuit, $cardPic);

