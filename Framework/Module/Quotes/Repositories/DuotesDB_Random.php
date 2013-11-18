<?PHP
Extends Framework\Module\Quotes\Repositories
{
	Class QuoteDB
	{
		Protected $XML_FIle = "http://www.quotedb.com/quote/quote.php?action=quote_of_the_day_rss";
		Public Function Abstraction_Layer($Object)
		{
			$Quote->Author  =   $Object->channel->item->title;
			$Quote->Quote   =   $Object->channel->item->description;
			$Quote->Link    =   $Object->channel->item->link;
			Return $Quote;
		}
		Public Function Quote_Of_the_Day()
		{
			 
			Return $Quote;
		}

	}
}

?>


?>
