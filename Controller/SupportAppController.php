<?php

class SupportAppController extends AppController
{

    public $components = [
        'Support.SupportSecurity'
    ];

    public function removeScript($content)
    {
        return $this->SupportSecurity->removeScript($content);
    }

}