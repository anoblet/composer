<DIV ID="Login" Class="Login">
    <Login>
        <CSS><?=$this->CSS;?></CSS>
        <Javascript><?=$this->Javascript?></Javascript>
        <Form>
            <Label>Username: </Label><Input Type="Text" Name="Username" Value="" />
            <Label>Password: </Label><Input Type="Text" Name="Password" />
            <Input Type="Button" OnClick="<?=$this->OnClick;?>" Value="Login" />
        </Form>
    </Login>
</DIV> 