<?

  echo("<div style='font-family: courier, serif; margin: 10px';><strong>" . $device['sysDescr'] . "</strong></div>");

  $uptime = @mysql_result(mysql_query("SELECT `attrib_value` FROM `devices_attribs` WHERE `device_id` = '" . $device['device_id'] . "' AND `attrib_type` = 'uptime'"), 0);

    echo("
      <table width=100%>
        <tr>
          <td class=list-bold>Operating System</td>
          <td>" . $device['os'] . " " . $device['version'] . " ( " . $device['features'] . " )</td>
        </tr>");
	
    if($device['hardware']) {echo("<tr>
          <td class=list-bold>Hardware</td>
          <td>" . $device['hardware']. "</td>
        </tr>"); }

    if($device['sysContact']) {echo("<tr>
          <td class=list-bold>Contact</td>
          <td>" . htmlspecialchars($device['sysContact']). "</td>
        </tr>"); }

    if($device['location']) {echo("<tr>
          <td class=list-bold>Location</td>
          <td>" . $device['location']. "</td>
        </tr>"); }

   if($uptime) { echo("<tr>
          <td class=list-bold>Uptime</td>
          <td>" . formatUptime($uptime) . "</td>
        </tr>");  }

    echo("        

      </table>");
  

?>
