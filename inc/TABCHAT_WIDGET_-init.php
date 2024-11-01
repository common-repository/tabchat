<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
include(TABCHAT_WIDGET_PATH."/inc/TABCHAT_WIDGET_-dialog.php");

//Class for the setup plugin menu and initialization 
class tabchatwidget_main extends tabchatwidget_dialog {
    function __construct(){
        
        //Setup admin panel
        if(is_admin()){
            parent::__construct(true);
            $this->tabchatwidget_admin_area();
            
        }
        else
            parent::__construct(false);
    }
    //tabchatwidget_admin_area() load admin panel on dashboard
     function tabchatwidget_admin_area(){
       
        //Call admin area class 
        include(TABCHAT_WIDGET_PATH."/inc/TABCHAT_WIDGET_-admin.php");
        new tabchatwidget_admin($this);
    }
    
}
