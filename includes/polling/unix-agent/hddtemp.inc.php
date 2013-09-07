<?php

global $agent_sensors;

if ($agent_data['hddtemp'] != '|')
{

print_vars($agent_data['hddtemp']);

  $disks = explode('||',trim($agent_data['hddtemp'],'|'));

print_vars($disks);

  if (count($disks))
  {
    echo "hddtemp: ";
    foreach ($disks as $disk)
    {
      list($blockdevice,$descr,$temperature,$unit) = explode('|',$disk,4);
      $diskcount++;
      discover_sensor($valid['sensor'], 'temperature', $device, '', $blockdevice, 'hddtemp', "$blockdevice: $descr", '1', '1', NULL, NULL, NULL, NULL, $temperature, 'agent');

      $agent_sensors['temperature']['hddtemp'][$diskcount] = array('description' => "$blockdevice: $descr", 'current' => $temperature, 'index' => $blockdevice);
    }
    echo "\n";
  }
}

?>
