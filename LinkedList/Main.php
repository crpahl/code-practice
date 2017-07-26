<?php

require('LinkedList.php');

$list = new LinkedList();

$list->insertLast(1);
$list->insertLast(2);
$list->insertLast(3);
$list->insertLast(4);
$list->insertLast(5);
$list->insertFirst(0);

$list->printNodes();
$list->reverse();
$list->printNodes();
$list->reverse();
$list->printNodes();

$list->insertLast(7);
$list->printNodes();

/*$n1 = new Node(1);
$n2 = $n1;

$n2->data = 4;
$n1->data = 6;

echo(PHP_EOL);
echo($n1->data);
echo($n2->data);

$a = 1;
$b = &$a;
$a = 2;

echo(PHP_EOL);
echo($a);
echo($b);*/