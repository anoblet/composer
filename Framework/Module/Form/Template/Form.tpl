<Form ID="<?=$this->Attributes['ID'];?>"
	Action="<?=$this->Attributes['Action'];?>"
	Method="<?=$this->Attributes['Method'];?>"><?
	ForEach($this->Elements as $Element)
	{
		Echo $Element->Generate_XHTML()."\n";
	}
	?></Form>
