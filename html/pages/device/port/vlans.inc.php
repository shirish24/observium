<?php

$vlans = dbFetchRows("SELECT * FROM `ports_vlans` AS PV, vlans AS V WHERE PV.`interface_id` = '".$port['interface_id']."' and PV.`device_id` = '".$device['device_id']."' AND V.`vlan_vlan` = PV.vlan AND V.device_id = PV.device_id");

echo('<table border="0" cellspacing="0" cellpadding="5" width="100%">');

echo("<tr><td>VLAN</td><td>Description</td><td>Cost</td><td>Priority</td><td>State</td><td>Other Ports</td></tr>");

$row=0;
foreach($vlans as $vlan)
{
  $row++;
  if (is_integer($row/2)) { $row_colour = $list_colour_a; } else { $row_colour = $list_colour_b; }
  echo('<tr bgcolor="'.$row_colour.'">');

  echo("<td width=100 class=list-large> Vlan " . $vlan['vlan'] . "</td>");
  echo("<td width=200 class=box-desc>" . $vlan['vlan_descr'] . "</td>");

  echo("<td>".$vlan['cost']."</td><td>".$vlan['priority']."</td><td>".$vlan['state']."</td>");

  $vlan_ports = array();

  $otherports = dbFetchRows("SELECT * FROM `ports_vlans` AS V, `ports` as P WHERE V.`device_id` = ? AND V.`vlan` = ? AND P.interface_id = V.interface_id", array($device['device_id'], $vlan['vlan']));
  foreach($otherports as $otherport)
  {
   $vlan_ports[$otherport[ifIndex]] = $otherport;
  }

  $otherports = dbFetchRows("SELECT * FROM ports WHERE `device_id` = ? AND `ifVlan` = ?", array($device['device_id'], $vlan['vlan']));
  foreach($otherports as $otherport)
  {
   $vlan_ports[$otherport[ifIndex]] = array_merge($otherport, array('access' => '1'));
  }

  ksort($vlan_ports);

  echo("<td>");
  $vsep='';
  foreach($vlan_ports as $otherport)
  {
    echo($vsep.generate_port_link($otherport, makeshortif($otherport['ifDescr'])));
    if($otherport['access']) { echo("(A)"); }
    $vsep=", ";
  }
  echo("</td>");
  echo("</tr>");
}

echo("</table>");

?>
