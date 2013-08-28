<?php

$app_sections = array('stats' => "Server statistics",
                      'auth' => "Authoritative",
                      'resolv' => "Resolving",
                      'queries' => "Queries");

$app_graphs['stats'] = array('bind_req_in'  => "Incoming requests",
                         'bind_answers' => "Answers Given",
                         'bind_updates' => "Dynamic Updates",
                         'bind_req_proto' => "Request protocol details",
                         'bind_cache' => "Cache content");

$app_graphs['auth'] = array('bind_zone_maint' => "Zone maintenance");

$app_graphs['resolv'] = array('bind_resolv_queries' => "Queries",
                          'bind_resolv_errors' => "Errors",
                          'bind_resolv_rtt' => "Query RTT",
                          'bind_resolv_dnssec' => "DNSSEC validation");

$app_graphs['queries'] = array('bind_query_rejected' => "Rejected queries",
                           'bind_query_in' => "Incoming queries",
                           'bind_query_out' => "Outgoing queries");
