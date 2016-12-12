<?php
/*sergio*/
namespace frontend\tests\unit;
use frontend\models\Amigos;
class AmigosBDTest extends \PHPUnit_Framework_TestCase
{

    // tests
    public function testMe()
    {
        $amigo = new Amigos();
        $nombreBD = 'amigos';
        $this->assertEquals($nombreBD, $amigo->tableName());
    }
}
