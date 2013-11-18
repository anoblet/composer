<Submit_a_Quote>
<CSS>
<?=$this->CSS;?>
</CSS>
<Javascript>
<?=$this->Javascript;?>
</Javascript>
<Content>
<DIV Class="Box">
<DIV ID="Window" Class="Window">
<DIV ID="Submit_a_Quote" Class="Submit_a_Quote">
<DIV ID="Titlebar" Class="Titlebar"><Window_Title>
<DIV Class="Title"><Label>: : Submit a Quote: </Label></DIV>
</Window_Title>
<DIV Class="Buttons">
<Button Class="Minimize">-</Button>
<Button Class="Close">X</Button>
</DIV>
</DIV>
<DIV Class="Content">
<Form Action="<?=$this->Action;?>"><Input Type="Hidden"
	Name="Parent_Object_ID" Value="0000003"></Input>
<DIV ID="Quote" Class="Quote"><Label>Quote: </Label> <TextArea
	Name="Quote" Length="<?=$this->Length;?>" /></TextArea></DIV>
<DIV ID="Author" Class="Author"><Label>Author: </Label> <Input
	Type="Text" Name="Author" Length="<?=$this->Length;?>"></DIV>
<BR />
<DIV ID="Submit" Class="Submit">
<Button OnClick="this.submit();" Value="Submit">Submit</Button>
</DIV>
</Form>
</DIV>
</DIV>
</DIV>
</DIV>
</Content>
</Submit_a_Quote>
