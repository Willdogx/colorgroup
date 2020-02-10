<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class ColorGroup extends Module
{
    public function __construct()
    {
        $this->name = 'colorgroup';
        $this->tab = 'others';
        $this->version = '1.0.0';
        $this->author = 'Santiago Alvarez';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => _PS_VERSION_,
            'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Color Group');
        $this->description = $this->l('Creates new attribute group type to have color groups.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
    }
}