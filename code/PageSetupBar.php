<?php

class PageSetupBar extends CompositeField
{

    public function __construct($name, $fields)
    {

        Requirements::css(SETUP_BAR_DIR . '/css/cms.css');
        Requirements::javascript(SETUP_BAR_DIR . '/js/cms.js');

        $args = func_get_args();

        $name = array_shift($args);
        if (!is_string($name))
            user_error('PageSetupBar::__construct(): $name parameter to a valid string', E_USER_ERROR);
        $this->name = $name;
        $this->id = preg_replace('/[^0-9A-Za-z]+/', '', $name);
        $this->title = (isset($title)) ? $title : FormField::name_to_label($name);

        parent::__construct($args);
    }

    public function isOpen()
    {
        $setupbaropen = Cookie::get('setupbaropen');
        if ($setupbaropen == 1 || is_null($setupbaropen)) {
            return true;
        }
        return false;
        new Tab();
    }

}
