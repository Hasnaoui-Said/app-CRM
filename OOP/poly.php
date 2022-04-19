<?php

abstract class Etudiant
{
    abstract public  function langue();
}
class Fr extends Etudiant
{
    public function langue()
    {
        return 'Bonjour ';
    }
}
class Ar extends Etudiant
{
    public function langue()
    {
        return 'salam';
    }
}
class En extends Etudiant{
    public function langue()


    
    {
        return 'Hello';
    }
}
$tab = [new Fr, new En, new Ar];

foreach ($tab as $t) {
    echo $t->langue() . '<br>';
}
$et2 = new Fr;
// echo $et2->langue();
