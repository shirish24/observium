<?php


include("memcached.inc.php");
include("includes/graphs/common.inc.php");
$device = device_by_id_cache($id);

include("includes/graphs/common.inc.php");

$scale_min       = 0;
$ds              = "threads";
$colour_area     = "F6F6F6";
$colour_line     = "555555";
$colour_area_max = "FFEE99";
#$graph_max       = 100;
$unit_text       = "Threads";

include("includes/graphs/generic_simplex.inc.php");

?>
