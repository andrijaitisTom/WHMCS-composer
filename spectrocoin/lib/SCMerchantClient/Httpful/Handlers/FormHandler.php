<?php
/**
 * Mime Type: application/x-www-urlencoded
 * @author Nathan Good <me@nategood.com>
 */

namespace Httpful\Handlers;

require_once __DIR__.'/MimeHandlerAdapter.php';


class FormHandler extends MimeHandlerAdapter 
{
    /**
     * @param string $body
     * @return mixed
     */
    public function parse($body)
    {
        $parsed = array();
        parse_str($body, $parsed);
        return $parsed;
    }
    
    /**
     * @param mixed $payload
     * @return string
     */
    public function serialize($payload)
    {
        return http_build_query($payload, null, '&');
    }
}