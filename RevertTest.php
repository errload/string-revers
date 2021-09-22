<?php

    use PHPUnit\Framework\TestCase;
    include 'Revert.php';

    class RevertTest extends TestCase
    {
        public function testRevertCharacters()
        {
            $testRevert = new Revert();
            $result = $testRevert->revertCharacters('Привет! Давно не виделись.');
            $this->assertEquals('Тевирп! Онвад ен ьсиледив.', $result);
        }
    }