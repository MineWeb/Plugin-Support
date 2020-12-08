<?php

class SupportSecurityComponent extends Component
{
    public static function removeScript($content)
    {
        require "../Plugin/Support/Core/lib/htmLawed/htmLawed.php";

        return htmLawed($content, ['safe' => 1]);
    }
}
