<?php

namespace App\Enum;

class Constant
{
    public const HEB_TYPE = [
        'CLOUD' => 0,
        'PROMISE' => 1
    ];

    public const PROMISE = [
        'VPN' => 0,
        'SSH' =>1,
        'IPSEC' =>2
    ];

    public const CLIENT_TYPE = [
        'IPBX' => 0,
        'CRM' => 1
    ];

    public const FACTURATION = [
        'POSTPAYE' => 0,
        'PREPAYE' => 1, 
        'ILLIMITE' => 2
    ];

    public const SERVER_TYPE = [
        'WEB' => 0,
        'VOIP' => 1,
        'DB' => 2
    ]; 

    public const STATUS = [
        'OPEN' => 0,
        'CLOSED' => 1
    ];
}