<?php
namespace frontend\tests\unit;
use frontend\controllers\SiteController;


class VerificarSiteControllerTest extends \Codeception\Test\Unit
{
 // tests
    public function testMe()
    {
        $amigo = new SiteController();
        $nombreBD = goHome();
        $this->assertEquals($nombreBD, $amigo->actionLogout());
    }
}