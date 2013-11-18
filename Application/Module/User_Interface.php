<?php

	Namespace Application\Module
	{
		Class User_Interface Extends \Application\Module
		{	
			Public Function __Construct($Data = Null)
			{
				
			}
			
			Public Function Initialize()
			{
				$this->HTML = New \Application\Model\HTML();
				
				
				// $this->HTML->Head->Add_StyleSheet("//ajax.googleapis.com/ajax/libs/dojo/1.8.1/dijit/themes/claro/claro.css");
				// $this->HTML->Head->Add_Javascript("//ajax.googleapis.com/ajax/libs/dojo/1.8.1/dojo/dojo.js");
				
				$this->HTML->Head->Set_Title("Title");
				$this->HTML->Head->Add_Javascript("Libraries/Dojo/dojo/dojo.js.uncompressed.js");
				$this->HTML->Head->Add_StyleSheet("Libraries/Dojo/dijit/themes/claro/claro.css");
				$this->HTML->Head->Add_StyleSheet("Libraries/Dojo/dojox/layout/resources/ExpandoPane.css");				
				$this->HTML->Head->Add_StyleSheet("Libraries/Dojo/dojox/grid/resources/Grid.css");	
				$this->HTML->Head->Add_StyleSheet("Libraries/Dojo/dojox/grid/resources/claroGrid.css");	
				$this->HTML->Head->Add_StyleSheet("Libraries/Dojo/dojox/grid/Enhanced/resources/EnhancedGrid.css");	
				$this->HTML->Head->Add_Javascript("Application.js");
				$this->HTML->Head->Add_Javascript("Store_Explorer.js");
				$this->HTML->Head->Add_Javascript("Item_Explorer.js");
				$this->HTML->Head->Add_Javascript("Expando_Pane.js");
				$this->HTML->Head->Add_Javascript("Tree_Grid.js");
				$this->HTML->Head->Add_Javascript("Enhanced_Grid.js");
				
				$this->HTML->Head->Add_StyleSheet("Application.css");
				$this->HTML->Body = New \Application\Model();
				$this->HTML->Body->User_Interface = New \Application\Model();
				$this->HTML->Body->User_Interface->Set_Attribute("ID", "User_Interface");
				// $this->Logo = "Application";
				// $this->Toolbar = "Toolbar";
				$this->HTML->Body->User_Interface->Top = New \Application\Model();
				$this->HTML->Body->User_Interface->Top->Set_Attribute("ID", "Top");
				
				$this->HTML->Body->User_Interface->Top->Logo = "The Free Intellectual";
				
				//$this->HTML->Body->User_Interface->Top->Login = "<a href='\Application\Module\User\Login\Form'>Login</a>";
				$this->HTML->Body->User_Interface->Top->Login = New \Application\Core\Model();
				$this->HTML->Body->User_Interface->Top->Login->A = New \Application\Core\Model();
				$this->HTML->Body->User_Interface->Top->Login->A->Set_Attribute("HREF" , "\Application\Module\User\Login\Form");
				
				$this->HTML->Body->User_Interface->Left = New \Application\Model();
				$this->HTML->Body->User_Interface->Left->Set_Attribute("ID", "Left");
				$this->HTML->Body->User_Interface->Left->Navigation = New \Application\Model\Navigation();
				$this->HTML->Body->User_Interface->Left->Navigation->Set_Attribute("ID", "Navigation");
				$this->HTML->Body->User_Interface->Center = New \Application\Model();
				$this->HTML->Body->User_Interface->Center->Set_Attribute("ID", "Center");
				// $this->HTML->Body->User_Interface->Center->Application = $this->Application();				
				
				$this->HTML->Body->User_Interface->Right= New \Application\Model;
				$this->HTML->Body->User_Interface->Right->Set_Attribute("ID", "Right");
				$this->HTML->Body->User_Interface->Right->Friends = New \Application\Model;
				$this->HTML->Body->User_Interface->Right->Friends->Set_Attribute("ID", "Friends");
				$this->HTML->Body->User_Interface->Bottom = New \Application\Model;
				$this->HTML->Body->User_Interface->Bottom->Set_Attribute("ID", "Bottom");
				
				// Causes errors when converting to XML
				// $this->HTML->Body->User_Interface->Bottom->Copyright = "&copy; Copyright Andy Noblet 2012";
				
				// $this->Application = $this->Application();
				// $this->Toolbar = New Application\Models\Toolbar;
				
				Return $this->HTML;
			}
			
		}
	}
?>