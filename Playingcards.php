<?PHP

    /////////////////////////////////////////
   ///////////Playing Cards Class///////////
  /////////Written by Salman Murad/////////
 /////////////////////////////////////////

//Playing Cards Class
class Playingcards
{
    
    //initiate the cards
    public $cards = array();
    
    //The condtructor 
    public function  __construct()
    {
    
    //Orgnise the cards in four suits (Hearts, Clubs, Spades, Diamonds)
            $this->cards = array( 'h1','h2','h3','h4','h5','h6','h7','h8','h9','h10','hj','hq','hk',
                                  'c1','c2','c3','c4','c5','c6','c7','c8','c9','c10','cj','cq','ck',
                                  's1','s2','s3','s4','s5','s6','s7','s8','s9','s10','sj','sq','sk',
                                  'd1','d2','d3','d4','d5','d6','d7','d8','d9','d10','dj','dq','dk');

    }

    //Shuffle the cards
    public function shuffleCards()
    {

            
            $shuffle_cards       = array();  //Initiate cards array before shuffling
            $previous_card_index = -1;      //The previous Card Index
            $current_card_index  = 0;      //The current Card Index
            $current_card        = '';    //The current card value

            //Shuffle all the cards
            while(count($shuffle_cards) < 52)
            {

                    $current_card_index = rand(0,51); //Get random card index
                    $current_card       = $this->cards[$current_card_index]; //Get the selected Card value

                    //If the selected card not in the same sequence as before and has not been shuffled
                    if((($current_card_index-1) != $previous_card_index)&&(!in_array($current_card, $shuffle_cards)))
                    {

                            //Add selected card to the Shuffle ones
                            array_push($shuffle_cards, $current_card);

                            //Make it as a previous selected card
                            $previous_card_index = $current_card_index;

                    }

            }

            return $shuffle_cards;

    }

    //Deal cards
    public function dealCards($shuffle_cards)
    {

            //Array of Players (4 Players)
            $players = array(1=>array(),
                             2=>array(),
                             3=>array(),
                             4=>array());

            $j = 0; //Intiate player index

            //Distribute the 27 Cards to the four players
            for($i=0; $i < 28; $i++)
            {

                    //If the fourth got the last card for the cycle
                    if($j == 4)
                    {
                            //Give the current card to the first one
                            $j = 1;
                    
                    }
                    else //Give the current card to the next Player
                    {

                            $j = $j+1;
                    
                    }

                    //The Player j got his card
                    array_push($players[$j], $shuffle_cards[$i]);

            }

            //Preview the whole movement
            $this->display($this->cards, $shuffle_cards, $players);

            return $players;

    }

    //Display the procedure in the Browser 
    function display($cards, $shuffle_cards, $players)
    {

        //Initiate the cards before the preview
        $cards_reg = $cards_shf = $cards_ply = '';

        //Show the Cards in regular sequence
        foreach($cards as $card_index => $card)
        {   

            $cards_reg .= "<img src='images/".$card.".png' />";

        }
        
        //Show the Cards after shuffling it
        foreach($shuffle_cards as $card_index => $card)
        {   

            $cards_shf .= "<img src='images/".$card.".png' />";

        }
        
        //Show the Cards after dealing the players - 7 for each
        foreach($players as $player_index => $player_cards)
        {   
            
            $cards_ply .= '<span>Player'.$player_index.':</span>';

            foreach($player_cards as $card_index => $card)
            {

                $cards_ply .= "<img src='images/".$card.".png' />";

            }

            $cards_ply .= "<br/>";
            
        }

        //Print the Cards as HTML 
        echo "<html>
              <head>
                    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>
                    <script language='javascript' type='text/javascript' src='js/functions.js'></script>
                    <link rel='stylesheet' type='text/css' href='css/style.css'>
              </head>
              <body>
                <div id='cards_reg'><h1>REGULAR SEQUENCE</h1>".$cards_reg."</div>
                <div id='cards_shf'><h1>SHUFFLE DECK    </h1>".$cards_shf."</div>
                <div id='cards_ply'><h1>DEAL THE CARDS  </h1>".$cards_ply."</div>";

        echo   "</div>
                <div>
                    <input type='button' value='Regular'        onClick=\"changeDisplay('cards_reg')\" />
                    <input type='button' value='Shuffle'        onclick=\"changeDisplay('cards_shf')\"/>
                    <input type='button' value='Deal the Cards' onclick=\"changeDisplay('cards_ply')\"/>
                    <input type='button' value='Shuffle Again - Refresh' onClick=\"location.reload();\" />
                </div>
              </body>
              </html>";

    }

}

$playing = new Playingcards();
$playing->dealCards($playing->shuffleCards());

?>
