<Login>
    <CSS><?=$this->CSS;?></CSS>
    <Javascript><?=$this->Javascript?></Javascript>
    <Content>
        <DIV ID="Login" Class="Login"> 
            <Form>
                <DIV Class="Username"><Label>Username: </Label><Input Type="Text" Name="Username" Value="<?=$this->Username;?>" Class="Text" /></DIV>
                <DIV Class="Password"><Label>Password: </Label><Input Type="Password" Name="Password" Value="<?=$this->Password;?>"Class="Text" /></DIV>
                <DIV Class="Submit"><Input Type="Button" OnClick="<?=$this->OnClick;?>" Value="&rarr;"/></DIV>
            </Form>
        </DIV>
    </Content>
</Login> 
