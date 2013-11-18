<div class="Grid">
<div Class="User_Interface">
<div class="Header">
<div class="Logo"><span class="Vertically_Centered">The Free Intellectual</span></div>
<div Class="Authentication" ID="Authentication">
<Authentication>
 <?= \SYSTEM\Module\Controller::API()->Load_Object("/Security/Authentication/Objects/Login_Logout/Generate","Authentication");?>
</Authentication>
</div>
</div>
<div class="Status_Bar">
<div id="Navigation" class="Navigation"><!--<a href="/SYSTEM/Module/People">People</a>--><a href="/Security/Authentication/Login/Generate_Form">Sign In</a></div>
<div ID="Random_Quote">
<?=\SYSTEM\Module\Controller::API()->Load_Object("/Quotes/Random_Quote/Generate","Random_Quote"); ?>
</div>
</div>
<div class="Main">
<div class="Columns">
<!-- <div class="Scroll"> -->
<div class="Column Left">

	<block href="Links"></block>
	<div class="Links">
		<?//=Static::$Template->Generate_Box("/SYSTEM/Module/Links");?>
	</div>

<div id="Author_List" class="Window">
	<div class="Margin">
		<div class="Border ui-corner-all">
			<div class="Padding">
				<div id="Title" class="Title">:: Authors</div>
				<div class="Scroll">
					<div id="Authors" class="Content">
						<?=\SYSTEM\Module\Controller::API()->Load_Object("/Quotes/Objects/Author_List/Generate","#Authors");?>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
<div class="Window">
<div class="Margin">
<div class="Border ui-corner-all">
<div class="Padding">
<div id="Title" class="Title">:: Sample Block</div>
<div id="Sample_block" class="Sample_Block">Sample Content</div>
</div>
</div>
</div>
</div>
</div>

<div ID="Center" class="Column Center">
<!-- <div class="Scrollbar"></div>-->
<div class="Window">
<div class="Margin">
<div class="Border ui-corner-all">
<div class="Padding">
<div id="Title" class="Title">:: Submit a Quote</div>
<div id="Content" class="Content">
<block data="" href=" format="" template="" />
<?//=\SYSTEM\Module\User_Interface::Generate_Window();?> <?=\SYSTEM\Module\Controller::API()->Load_Object("/Quotes/Submit/Generate_Form","Content");?></div>
</div>
</div>
</div>
</div>
<div class="Window">
<div class="Margin">
<div class="Border ui-corner-all">
<div class="Padding">
<div id="Title" class="Title">:: Sample Block</div>
<div id="Sample_block" class="Sample_Block">Sample Content</div>
<div class="Clear"></div>
</div>
</div>
</div>
</div>
</div>
<div class="Column Right">
<div class="Window">
<div class="Margin">
<div class="Border ui-corner-all">
<div class="Padding">
<div id="Title" class="Title">:: Sample Block</div>
<div id="Sample_block" class="Sample_Block">Sample Content</div>
</div>
</div>
</div>
</div>
<div class="Window">
<div class="Margin">
<div class="Border ui-corner-all">
<div class="Padding">
<div id="Title" class="Title">:: Sample Block</div>
<div id="Sample_block" class="Sample_Block">Sample Content</div>
</div>
</div>
</div>
</div>
<div class="Window">
<div class="Margin">
<div class="Border ui-corner-all">
<div class="Padding">
<div id="Title" class="Title">:: Sample Block</div>
<div id="Sample_block" class="Sample_Block">Sample Content</div>
<div class="Clear"></div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- </div> -->
</div>
<div class="Clear"></div>
<div class="Footer"><span class="Vertically_Centered">&copy; Copyright 2010. </span><a href="/Module/Site_Map">Site Map</a> | <a href="/Module/Report_A_Bug">Report a bug</a> | <a href="/Donate">Donate</a></div>
</div>
</div>