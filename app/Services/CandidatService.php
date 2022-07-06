<?php

namespace App\Services;

use GuzzleHttp\Client;

class CandidatService 
{
    private $httpClient;

    function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient; 
    }

    public function getCandidatByCIN(string $cin)
    {
        $response = $this->httpClient->request('GET', config('services.adherants_ws_urls.candidat_status') . '/' . $cin);
        $response = json_decode((string) $response->getBody());
        
        if(!$response->datas || !$response->datas[0]) {
            return null;
        }
 
        return $response->datas[0];
    }

    public function getCandidatStatusByCIN(string $cin)
    {
        $candidat = $this->getCandidatByCIN($cin);
        
        return $candidat ? $candidat->WsEtatAdhesion : null;
    }

    public function checkCandidatIsActiveByCIN(string $cin): bool
    {
        $candidatStatus = $this->getCandidatStatusByCIN($cin);

        return $candidatStatus ? $candidatStatus->libelle != 'معلق' : false;
    }

}