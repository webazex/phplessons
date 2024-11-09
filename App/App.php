<?php

namespace ACMS\App;

class App
{
    use \Traite1, \Traite2, \Traite3 {
        \Traite1::test insteadof \Traite2;
        \Traite1::test insteadof \Traite3;
        \Traite2::test as TraitTwoTest;
        \Traite3::test as TraitThreeTest;
    }

    function getSum(){
        return $this->test() + $this->TraitTwoTest() + $this->TraitThreeTest();
    }
}