<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

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
class IpCheckController implements ContainerInjectableInterface
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
        $title = "Test";

        $page = $this->di->get("page");
        $page->add("ipcheck/index");

        return $page->render([
            "title" => $title,
        ]);
    }

    public function validateActionPost()
    {   
        // Gets the post-parameter
        $request = $this->di->get("request");
        $ipRequest = $request->getPost("ip-text");

        // Checking IP Validity
        if (filter_var($ipRequest, FILTER_VALIDATE_IP)) {
            $realIp = "$ipRequest ÄR en riktig IP-adress";
            $server = gethostbyaddr($ipRequest);
        } else {
            $realIp = "$ipRequest är INTE en riktig IP-adress";
            $server = false;
        }

        // Checking IP Protocol
        if (filter_var($ipRequest, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $protocol = "IPV4";
        } else if (filter_var($ipRequest, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $protocol = "IPV6";
        } else {
            $protocol = "Inget protokoll hittades";
        }
        

        if (!$server || $server == $ipRequest) {
            $domain = "Ingen domän hittades";
        } else {
            $domain = $server;
        }

        $title = "Ip-validering";

        $data = [
            "realIp" => $realIp,
            "protocol" => $protocol,
            "domain" => $domain
        ];

        $page = $this->di->get("page");
        $page->add("ipcheck/validate", $data);

        return $page->render([
            "title" => $title,
        ]);
    }

    public function jsonActionGet()
    {
        // Gets the post-parameter
        $request = $this->di->get("request");
        $ipRequest = $request->getGet("ip");

        // Checking IP Validity
        if (filter_var($ipRequest, FILTER_VALIDATE_IP)) {
            $realIp = true;
            $server = gethostbyaddr($ipRequest);
        } else {
            $realIp = false;
            $server = false;
        }

        // Checking IP Protocol
        if (filter_var($ipRequest, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $protocol = "IPV4";
        } else if (filter_var($ipRequest, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $protocol = "IPV6";
        } else {
            $protocol = "Inget protokoll hittades";
        }

        if (!$server || $server == $ipRequest) {
            $domain = "Ingen doman hittades";
        } else {
            $domain = $server;
        }

        $json = [
            "realIp" => $realIp,
            "protocol" => $protocol,
            "domain" => $domain,
        ];

        return [$json];
    }

    public function routeGet()
    {
        return "test";
    }
}
