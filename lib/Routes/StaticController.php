<?php
namespace Simplex;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\Yaml\Yaml;


class StaticController {
    public static function main(Request $request) : Response {
        $allowedStaticTypes = Yaml::parseFile(__DIR__."/allowed-static-types.yaml");

        $path = $request->getPathInfo();
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        
        $response = match ($allowedStaticTypes[$extension][1]) {
            "FILE" => new BinaryFileResponse(file: __DIR__ . "/../../public/$path", headers: ["Content-Disposition" => "inline"]),
            "TEXT" => new Response(file_get_contents(__DIR__ . "/../../public/$path")),
        };

        $response->headers->set("Cache-Control", "max-age=3600");
        $response->headers->set("Content-Type", $allowedStaticTypes[$extension][0]);
        return $response;
    }
}
