<?php
namespace frontend\tests\unit;
/*sergio*/
use frontend\controllers\SessionController;
class VerificarSessionTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;

    // tests
    public function testSession()
    {
        $model = new SessionController(1, 1);
         $id = '217ev2ddpqf5g4hkn1giulgui6';        
        $this->assertEquals(1,$model->BuscarSession($id));
            
           
    }
}