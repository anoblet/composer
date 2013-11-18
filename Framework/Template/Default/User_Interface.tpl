<DIV Class="User_Interface">Test
<DIV Class="Menu_Bar">
<DIV Class="Authentication" ID="Authentication"><Authentication> <?=\SYSTEM\Module\Controller::Load_Object("/SYSTEM/Module/Security/Authentication/Objects/Login_Logout/Login_Logout.xml","Authentication");?>
</Authentication>
</DIV>
</DIV>
<DIV Class="Header">
<DIV Class="Border">
<DIV CLass="Header_Content">
Headeraaa
</DIV>
</DIV>
</DIV>
<DIV Class="Status_Bar">
<DIV ID="Random_Quote">
<?=\SYSTEM\Module\Controller::Load_Object("/SYSTEM/Module/Quotes/Random_Quote/Random_Quote.xml","Random_Quote"); ?>
</DIV>
</DIV>
</DIV>
<DIV Class="Columns">
<DIV ID="Left" Class="Left"><?=\SYSTEM\Module\Controller::Load_Object("/SYSTEM/Module/Quotes/Objects/Author_List/Author_List.xml","Left");?>
</DIV>
<DIV Class="Center">
<DIV Class="Border">
<DIV Class="Box">
<DIV ID="Center">
<?=\SYSTEM\Module\Controller::Load_Object("/SYSTEM/Module/Quotes/Submit/Submit.xml","Center");?>
</DIV>
</DIV>
<DIV Class="Box">
<Div ID="AJAXResponse"></DIV>
<? Var_Dump(\SYSTEM\SYSTEM::$SYSTEM);?>
</DIV>
</DIV>
</DIV>
<DIV Class="Right">
<DIV Class="Border">
<DIV Class="Box"> Right </DIV>
</DIV>
</DIV>
<DIV Class="Clear"></DIV>
</DIV>
<DIV Class="Footer">
<DIV Class="Border">
<DIV Class="Footer_Content">
Footer
</DIV>
</DIV>
</DIV>
</DIV>
</DIV>
