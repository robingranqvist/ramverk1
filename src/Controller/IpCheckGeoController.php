<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Robin\Models\Geo;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 * The controller will be injected with $di if implementing the interface
 * ContainerInjectableInterface, like this sample class does.
 * The controller is mounted on a particular route and can then handle all
 * requests for that mount point.
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class IpCheckGeoController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * This is the index method action, it handles:
     * ANY METHOD mountpoint
     * ANY METHOD mountpoint/
     * ANY METHOD mountpoint/index
     *
     * @return object
     */
    public function indexAction()
    {
        $title = "IP Check Geo";

        $page = $this->di->get("page");
        $page->add("ipcheckgeo/index");

        return $page->render([
            "title" => $title,
        ]);
    }

    public function validateActionPost()
    {   
        $title = "Ip Check Geo";
            
        // Requests
        $request = $this->di->get("request");

        // Getting the input
        $ipRequest = $request->getPost("ip-text");
        
        $geo = new Geo();
        $geo->setupGeoIp($ipRequest);
        
        // Checking if IP is valid
        if ($geo->getType() == '') {

            $data = [
                "ip" => $geo->getIp(),
                "type" => "Ingen info",
                "country" => "Ingen info",
                "region" => "Ingen info",
                "city" => "Ingen info",
                "latitude" => "Ingen info",
                "longitude" => "Ingen info",
                "valid" => "Nej"
            ];

        } else {

            // Getting & setting the data
            $data = [
                "ip" => $geo->getIp(),
                "type" => $geo->getType(),
                "country" => $geo->getCountry(),
                "region" => $geo->getRegion(),
                "city" => $geo->getRegion(),
                "latitude" => $geo->getLatitude(),
                "longitude" => $geo->getLongitude(),
                "valid" => "Ja"
            ];

        }
        
        
        $page = $this->di->get("page");
        $page->add("ipcheckgeo/validate", $data);

        return $page->render([
            "title" => $title,
        ]);
    }

    public function jsonActionGet()
    {
        // Gets the post-parameter
        $request = $this->di->get("request");
        $ipRequest = $request->getGet("ip");

        $geo = new Geo();
        $geo->setupGeoIp($ipRequest);
        
        // Checking if IP is valid
        if ($geo->getType() == '') {

            $json = [
                "ip" => $geo->getIp(),
                "type" => "Ingen info",
                "country" => "Ingen info",
                "region" => "Ingen info",
                "city" => "Ingen info",
                "latitude" => "Ingen info",
                "longitude" => "Ingen info",
                "valid" => "Nej"
            ];

        } else {

            // Getting & setting the data
            $json = [
                "ip" => $geo->getIp(),
                "type" => $geo->getType(),
                "country" => $geo->getCountry(),
                "region" => $geo->getRegion(),
                "city" => $geo->getRegion(),
                "latitude" => $geo->getLatitude(),
                "longitude" => $geo->getLongitude(),
                "valid" => "Ja"
            ];

        }

        return [$json];
    }

    public function routeGet()
    {
        return "test";
    }
}
