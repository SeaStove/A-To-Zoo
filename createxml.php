<?php
// Start XML file, create parent node
$doc = domxml_new_doc("1.0");
$node = $doc->create_element("markers");
$parnode = $doc->append_child($node);
$user = "root"
$pwd = ""

// Connects to the database
$connection = mysql_connect ('localhost', $user, $pwd);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Selects the database
$db_selected = mysql_select_db('AtoZoo', $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Selects all the data from the database
$query = "SELECT * FROM AtoZoo WHERE 1";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Creates the different nodes for the XML document
while ($row = @mysql_fetch_assoc($result)){
  $node = $doc->create_element("marker");
  $newnode = $parnode->append_child($node);

  $newnode->set_attribute("id", $row['id']);
  $newnode->set_attribute("name", $row['name']);
}

$xmlfile = $doc->dump_mem();
echo $xmlfile;

?>
