<?php
//'guest_id`, `guest_name`, `guest_surname`, `guest_country`, 'guest_card' 
    require_once('crud/preheader.php'); // <-- this include file MUST go first before any HTML/output
    include ('crud/ajaxCRUD.class.php'); // <-- this include file MUST go first before any HTML/output
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
<?php
    $tblDemo = new ajaxCRUD("Item", "guest", "guest_id", "crud/");
    $tblDemo->omitPrimaryKey();
    $tblDemo->displayAs("guest_name", "Field2");
    $tblDemo->displayAs("guest_surname", "Pick List");
    $tblDemo->displayAs("guest_country", "Long Field");
    $tblDemo->displayAs("guest_card", "Is Selected?");

    $allowableValues = array("1", "2", "3", "4");
    $tblDemo->defineAllowableValues("guest_country", $allowableValues);

    $tblDemo->setLimit(30);
    echo "<h2>Table CRUD Guest</h2>\n";
    $tblDemo->showTable();

    echo "<br /><hr ><br />\n";
?>