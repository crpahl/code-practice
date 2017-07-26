<?php

class Node
{
    /**
     * @var Node
     */
    public $next = null;
    public $data;
    
    function __construct($data)
    {
        $this->data = $data;
    }
}