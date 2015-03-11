<?PHP
//Bring the Tested Class - Playing cards
require_once('Playingcards.php');

//Testing Class 
class PlayingcardsTest extends PHPUnit_Framework_testCase
{

	public $playing;

	//Initiate the Class and Test it 
	public function setUp()
	{

		$this->playing = new Playingcards();
		var_dump($this->playing->cards);	

	}

	//Test the Constructor Results
	public function testConstructor()
	{

		$this->assertEmpty($this->playing->cards);

	}

	//Test the Shuffling Results
	public function testShuffle()
	{

		$shuffle_cards = $this->playing->shuffleCards();
		var_dump($shuffle_cards);
		$this->assertEmpty($shuffle_cards);

	}

	//Testing the Dealing Player results
	public function testDeal()
	{

		$shuffle_cards = $this->playing->shuffleCards();
		$deal_cards   = $this->playing->dealCards($shuffle_cards);

		var_dump($deal_cards);
		$this->assertEmpty($deal_cards);


	}

}
?>
