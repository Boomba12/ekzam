<?php

namespace Ekzam;

use Ekzam\SettingsBase;

class Settings extends SettingsBase
{
    protected static $instance = null;
    protected $settingsArray = [
        'taskHLBlockId' => 5,
        'stateHLBlockId' => 7,
        'execHLBlockId' => 6,
    ];
}
