<?php
include ("testcard0_2_1.php");

//global $cardpoint;
$cardpoint = array(10, 2, 3, 4, 5, 6, 7, 8, 9, 10, 10, 10, 10); //卡片點數
$afterShuffleCard = shuffleCard($initCard);  
$keepDealing = true;
printHand($afterShuffleCard,$cardSuit, $cardPic);
$count = 0;
for($playernum = 0; $playernum < 5; $playernum++)
{
    $keepDealing = true;
	echo "player [$playernum] = ";
	while($keepDealing == true)
	{
	    $countCards = count($player[$playernum]);
        $player[$playernum][$countCards] = toDeal($afterShuffleCard);
	    $playerPoint = countCardpoint($player[$playernum], $cardpoint);
		//echo printHand($player[$playernum],$cardSuit, $cardPic);
		echo "[$playerPoint], ";
	    $keepDealing = checkDealorNot($playerPoint);
	}
	echo "</br>";
}



function toDeal(&$afterShuffleCard){ //發牌,張數
    //for($playernum =0; $playernum <5; $playernum++){ 
        //$player[$playernum][] = array_shift($afterShuffleCard);
        //foreach($player[$playernum] as $C)
        //echo"Player [$playernum] : $C";
        //printHand($player[$playernum],$cardSuit, $cardPic);
    //}
	$wantCard = array_shift($afterShuffleCard);
	return $wantCard;
}

//countCardpoint($player[$playernum], $cardpoint);

function countCardpoint($playerCards, $cardpoint){   //count player's hand(計算牌點)
    //for($playernum =0; $playernum <5; $playernum++){ 
	$playerPoint = 0;
        foreach($playerCards as $playerCard){
		
	        $toCardpoint = getNum($playerCard); //得到的牌數字
	        //echo "$toCardpoint";
            if($toCardpoint != 0)// 得到的牌不是"A"
		    {   
		        //echo "$toCardpoint";
		        //echo"No";
			    $playerPoint += $cardpoint[$toCardpoint];
			    //echo"$playerPoint";
		    }
		    else   //get "A"
			{
		        //echo "Yes";
				$playerPoint += $cardpoint[$toCardpoint];
				//echo"$playerPoint";
				if($playerPoint>21)
				{
				    $playerPoint -= 9;
				    //echo"$playerPoint";
                }					
			}
        }
		return $playerPoint;
    //}
}

function checkDealorNot($playerPoint){
if($playerPoint<21)
	return true;
else 
    return false;
}

?>

