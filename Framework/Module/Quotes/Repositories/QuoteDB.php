<?PHP
Extends Framework\Module\Quotes\Repositories
{
	Class QuoteDB
	{
		Public Function Abstraction_Layer($Object)
		{
			$Quote->Author  =   $Object->channel->item->title;
			$Quote->Quote   =   $Object->channel->item->description;
			$Quote->Link    =   $Object->channel->item->link;
			Return $Quote;
		}

	}
}

?>
