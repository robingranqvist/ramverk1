<?php

namespace Anax\Controller;
use Anax\Response\ResponseUtility;
use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Testing the IpCheckController
 */
class IpCheckGeoControllerTest extends TestCase
{   
    /**
     * Testing the test route
     */
    public function testrouteGet()
    {
        $controller = new IpCheckController();
        $res = $controller->routeGet();
        $this->assertContains("test", $res);
    }

    /**
     * Test the index route.
     */
    public function testIndexAction()
    {
        // Setup di
        $di = new DIFactoryConfig();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // Use a different cache dir for unit test
        $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        // Setup the controller
        $controller = new IpCheckGeoController();
        $controller->setDI($di);

        // Do the test and assert it
        $res = $controller->indexAction();
        $this->assertInstanceOf(ResponseUtility::class, $res);
    }

    // public function testValidateActionPost()
    // {
    //     // Setup di
    //     $di = new DIFactoryConfig();
    //     $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

    //     // Use a different cache dir for unit test
    //     $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

    //     // Setup the controller
    //     $controller = new IpCheckGeoController();
    //     $controller->setDI($di);

    //     // Do the test and assert it
    //     $res = $controller->validateActionPost();
    //     $this->assertInstanceOf(ResponseUtility::class, $res);

    // }

    // public function testJsonActionGet()
    // {
    //     // Setup di
    //     $di = new DIFactoryConfig();
    //     $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

    //     // Use a different cache dir for unit test
    //     $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

    //     // Setup the controller
    //     $controller = new IpCheckGeoController();
    //     $controller->setDI($di);

    //     // Do the test and assert it
    //     $res = $controller->jsonActionGet();
    //     $this->assertInternalType("array", $res);

    //     $json = $res[0];
    //     $this->assertContains("Ingen info", $json["type"]);
    //     $this->assertContains("Nej", $json["valid"]);
    // }
}