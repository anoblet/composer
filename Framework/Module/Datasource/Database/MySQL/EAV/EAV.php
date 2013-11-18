<?
    /**
    * Needs Joins
    */
    Extends Framework\Module\Datasource\Database\MySQL
    {
        /** Is in a SYSTEM Context **/
        Class EAV Extends \Framework\Module\Datasource\Database\MySQL
        {
            Public $Parameters;
            
            Function Create_Child_Relationship($Parent_ID,$Child_ID)
            {
                $Relationship_ID   =   Static::$Datasource->Generate_Data_Object()->Retrieve_ID();
                    // Insert the relationship
                    // $Datasource->Generate_Child_Relationship()->Retrieve_ID();
                    $Datasource =   Static::$Datasource->Generate_Request()
                        ->Set_Database("andy_DATA")
                        ->Set_Table('Object_Data')
                        ->Set_Operation('Insert')
                        /* ->Set_Object($Object_ID) */
                        ->Set_Data
                        (
                            Array
                            (
                                "Object_ID" =>  $Quote_ID,
                                "Parameter" =>  "Parent_Object_ID",
                                "Value"     =>  $Object_ID
                            )
                        )
                        ->Execute()/*->Result*/;
                Return $Relationship_ID;
            }
            Function Create_Sibling_Relationship($Sibling_One_ID,$Sibling__Two_ID)
            {
                $Relationship_ID   =   Static::$Datasource->Generate_Data_Object()->Retrieve_ID();                
                
                $Siblings =   
                    Array
                    (
                        Array
                        (
                            "Object_ID" =>  $Relationship_ID,
                            "Parameter" =>  "Sibling_One_ID",
                            "Value"     =>  $Sibling_One_ID
                        ),
                        Array
                        (
                                "Object_ID" =>  $Relationship_ID,
                                "Parameter" =>  "Sibling_Two_ID",
                                "Value"     =>  $Sibling__Two_ID
                        )
                    );
                
                
                $Relationship_ID   =   Static::$Datasource->Generate_Data_Object()->Retrieve_ID();
                
                $Query =   Static::$Datasource
                    ->Generate_Request()
                        ->Set_Database("andy_DATA")
                        ->Set_Table('Object_Data')
                        ->Set_Operation('Insert');
                    
                ForEach($Siblings as $Siblilng)
                {
                    $Datasource
                    ->Set_Data($Sibling)
                    ->Execute();
                }

            }
            Public Function Generate_Object()
            {
                $Object =   
                    Library::API()
                    ->Create
                    (
                        Library::API()->Generate_Query
                        ->Set_Table("Objects")
                    );
                $Object_ID  =   $Object->Retrieve_ID();
                Return $Object_ID;
            }
            Public Function Create()
            {
                $Reference_Object;
                $Request =   $_REQUEST;
                Var_Dump($_REQUEST);
                ForEach($_REQUEST as $Key => $Value)
                {
                    
                }  
                Return $Result;  
            }
            Public Function Retrieve_Attributes($Object_ID)
            {
                // Find all child object ids
                $Child_Object_IDs  =   Retrieve_Child_Object_IDs($Objects_ID);
                For($X=0;$X<Count($Child_Object_IDs);$X++)
                {
                    
                }
                $Attributes =   Search($Child_Object_IDs);
                // Array to hold the attributes
                $Attributes =   Array();
                // Find all of the attribute ids associated with this object
                For($X=0;$X<Count($Attribute_IDs);$X++)
                {
                    $Attribute_ID  =   $Attributes_IDs[$X];
                    $Attribute_Objects  =   Library::API()
                    ->Retrieve
                    (
                        Library::API()->Generate_Query
                        ->Set_Table("Data")
                        ->Set_Fields
                        (
                            Array
                            (
                                "Object_ID",
                                "Parameter",
                                "Value"                                
                            )
                        )
                        ->Set_Filter
                        (
                            Array
                            (
                                "Parent_Object_ID"  =>  $Attribute_ID,
                                "Type"         =>  "Attribute";       
                            )
                        )
                    );
                    ForEach($Attribute_Objects as $Parameter => $Value)
                    {
                        $Attributes
                    }
                    ForEach($Attribute)
                }
                Return $Attributes;
            }
            /** Retrieves IDs **/
            Public Function Retrieve_Child_Object_IDs($Object_ID)
            {
                If($Object_ID);
                $Object_IDs =   Array();
                
                // Retrieve the ids of all child objects
                $Objects  =   Library::API()
                ->Retrieve
                (
                    Library::API()->Generate_Query
                    ->Set_Table("Data")
                    ->Set_Fields
                    (
                        Array
                        (
                            "Object_ID"
                        )
                    )
                    ->Set_Filter
                    (
                        Array
                        (
                            "Parent_Object" =>  $Object_ID        
                        )
                    )
                );
                For($X=0;$X<Count($Objects);$X++)
                {
                    $Object =   $Objects[$X];
                    $Object_ID  =   $Object->Object_ID;
                    $Object_IDs[]   =   $Object_ID;
                }
                Return $Object_IDs;    
            }
            Public Function Retrieve_Parameters() 
        }
    }
?>