 	/////////////////////////////////////////
   //javascript Functions - Playing Cards //
  /////////Written by Salman Murad/////////
 /////////////////////////////////////////

//Function to show hide the Cards according to the action
function changeDisplay(id)
{

	//Hide The whole cards
	$('[id^="cards_"]').hide();

	//Show the one you called
	$('#'+id).fadeIn();

}