<?php
/*luciano*/

namespace frontend\tests\unit;
use frontend\models\SessionFrontendUser;


class VerificarSessionFrontedUserTest extends \Codeception\Test\Unit
{
    // tests
    public function testMe()
    {
        $sesion = new SessionFrontendUser();
        $user = 'session_frontend_user';
        $this->assertEquals($user, $sesion->tableName());
    }
}