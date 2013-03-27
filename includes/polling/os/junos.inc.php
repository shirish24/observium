<?php

$jun_ver = snmp_get($device, ".1.3.6.1.2.1.25.6.3.1.2.2", "-Oqv", "HOST-RESOURCES-MIB");

if (strpos($poll_device['sysDescr'], "olive"))
{
  $hardware = "Olive";
  $serial = "";
} else {
  $hardware = snmp_get($device, "JUNIPER-MIB::jnxBoxDescr.0", "-Ovqsn", "+JUNIPER-MIB", "+".$config['install_dir']."/mibs/junos");
#  $hardware = "Juniper " . rewrite_junos_hardware($hardware);
  $serial   = snmp_get($device, ".1.3.6.1.4.1.2636.3.1.3.0", "-OQv", "+JUNIPER-MIB", "+".$config['install_dir']."/mibs/junos");
}

list($version) = explode("]", $jun_ver);
list(,$version) =  explode("[", $version);
$features = "";

?>
