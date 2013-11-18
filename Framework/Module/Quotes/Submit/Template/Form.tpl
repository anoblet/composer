<Submit_a_Quote>
<CSS>
<?=$this->CSS;?>
</CSS>
<Javascript>
<?=$this->Javascript;?>
</Javascript>
<DIV ID="Submit_a_Quote" Class="Submit_a_Quote">
<Form ID="Submit" Action="<?=$this->Action;?>" class="Form"><Input Type="Hidden"
	Name="Parent_Object_ID" Value="0000003"></Input>
<DIV ID="Quotation" Class="Quotation"><Label>Quotation: </Label> <TextArea
	Name="Quotation" Length="<?=$this->Length;?>" /></TextArea></DIV>
<DIV ID="Author" Class="Author"><Label>Author: </Label> <Input
	Type="Text" Name="Author" Length="<?=$this->Length;?>"></DIV>
<BR />
<DIV ID="Submit" Class="Submit">
<input type="Submit" value="Submit" Class="Submit"/>
<!--   <Button Class="Submit" Type="Submit" Value="Submit">Submit</Button>-->
</DIV>
</Form>
</div>
</Content>
</Submit_a_Quote>
