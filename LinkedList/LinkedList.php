<?php

require('Node.php');

class LinkedList
{
    public $nodes = [];
    /**
     * @var Node
     */
    private $head = null;
    /**
     * @var Node
     */
    private $tail = null;
    
    public function getHead()
    {
        return $this->head;
    }
    
    public function getTail()
    {
        return $this->tail;
    }
    
    public function insertLast($data)
    {
        if (is_null($this->head)) {
            $this->insertFirst($data);
            
            return;
        }

        $node = new Node($data);
        $this->tail->next = $node;
        $node->next = null;
        $this->tail = $node;
    }
    
    public function insertFirst($data)
    {
        $node = new Node($data);
        
        $node->next = $this->head;
        $this->head = $node;
        
        if (is_null($this->tail)) {
            $this->tail = $node;
        }
    }
    
    public function printNodes()
    {
        $node = $this->head;
        
        while(!is_null($node)) {
            echo($node->data . ' ');
            
            $node = $node->next;
        }
        
        echo(PHP_EOL);
    }

    public function reverse()
    {
        $this->reverseList($this->head);
    }
    
    private function reverseList(Node $currentNode)
    {
        if (is_null($currentNode->next)) {
            return $currentNode;
        }
        
        $nextNode = $this->reverseList($currentNode->next);

        $nextNode->next = $currentNode;
        
        if ($currentNode === $this->head) {
            $this->head = $this->tail;
            $this->tail = $currentNode;
            $currentNode->next = null;
        }

        return $currentNode;
    }
}