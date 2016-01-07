<?php

namespace Bdryagya\Utils;

class Ip {
    
    function __construct() {
    }

    /**
     * Calculate bitwise AND to IP and available NETMASKS to get the subnet
     *
     * @var $networks   Array of Networks
     * @var $ip         IP to be tested
     */
    public function inNetwork($networks = [], $ip = "") {
        $network_group = [];
        $netmask_group = [];

        foreach($networks as $network) {
            list($subnet, $cidr) = explode('/', $network);
            $netmask = (1 << 32) - (1 << (32 - $cidr));
            $network_group[ip2long($subnet)] = $network;

            if(!in_array($netmask, $netmask_group)) $netmask_group[] = $netmask;
        }

        // sort netmask in desc order - important to work properly
        rsort($netmask_group);

        foreach($netmask_group as $netmask) {
            // get network from ip address and netmask
            $network = ip2long($ip) & $netmask;

            if(array_key_exists($network, $network_group)) return $network_group[$network];
        }

    }
}
