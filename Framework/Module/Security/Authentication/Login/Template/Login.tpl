<Login>
    <CSS><?=$this->CSS;?></CSS>
    <Javascript><?=$this->Javascript?></Javascript>
    <Content>
        <div ID="Login" Class="Login">
                    <div class="Padding">
                        <form action="/Security/Authentication/Login/Process">
                            <div class="Grid">
                                <div class="Row">
                                    <div class="Column">
                                        <div class="Row">
                                            <Label>Username: </Label>
                                        </div>
                                        <div class="Row">
                                            <Input Type="Text" Name="Username" Value="<?=$this->Username;?>" />
                                        </div>
                                    </div>
                                    <div class="Column">
                                            <Label>Password: </Label>
                                            <Input Type="Password" Name="Password" Value="<?=$this->Password;?>" />
                                    </div>
                                    <div Class="Column">
                                            <!--<Button OnClick="<?=$this->OnClick;?>" Value="&rarr;" />&rarr;</Button>-->
                                            <input type="submit" Value="&rarr;" Class="Button" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
        </div>
    </Content>
</Login>
