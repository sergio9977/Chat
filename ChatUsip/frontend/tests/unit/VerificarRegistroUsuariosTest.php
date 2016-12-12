<?php
namespace frontend\tests\unit;
/*sergio*/
use frontend\models\SignupForm;
class VerificarRegistroUsuariosTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    // tests
   
     public function testCorrectSignup()
    {
         $model = new SignupForm([
            'username' => 'ejemplo',
            'email' => 'ejemplo_email@example.com',
            'password' => 'ejemplo_password',
        ]);

        $user = $model->signup();

        expect($user)->isInstanceOf('common\models\User');

        expect($user->username)->equals('ejemplo');
        expect($user->email)->equals('ejemplo_email@example.com');
        expect($user->validatePassword('ejemplo_password'))->true();
    }
}