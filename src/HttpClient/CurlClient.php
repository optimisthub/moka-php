<?php

namespace Moka\HttpClient;

use InvalidArgumentException;

class CurlClient implements ClientInterface
{
    public function request(Request $request)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $request->getUrl());
        curl_setopt($curl, CURLOPT_HTTPHEADER, $request->getHeaders());
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        switch ($request->getMethod()) {
            case Request::METHOD_GET:
                break;
            case Request::METHOD_POST:
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $request->getContent());
                break;
            case Request::METHOD_PUT:
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($curl, CURLOPT_POSTFIELDS, $request->getContent());
                break;
            case Request::METHOD_PATCH:
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
                curl_setopt($curl, CURLOPT_POSTFIELDS, $request->getContent());
                break;
            case Request::METHOD_DELETE:
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
                curl_setopt($curl, CURLOPT_POSTFIELDS, $request->getContent());
                break;
            default:
                throw new InvalidArgumentException('Method ' . $request->getMethod() . ' is not recognized.');
                break;
        }

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}
