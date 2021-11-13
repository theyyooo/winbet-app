<?php

require_once '../src/Models/Entities/Match.php';

class ApiFootball
{
    private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getAllNextMatch(): ?array
    {
        $curl = curl_init("http://api.football-data.org/v2/matches?dateFrom=" . date("Y-m-d") . "&dateTo=" . date("Y-m-d", strtotime(date("Y-m-d") . ' + 9 days')) . "");
        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER       => array("X-Auth-Token: " . $this->apiKey . ""),
            CURLOPT_RETURNTRANSFER   => true,
            CURLOPT_TIMEOUT          => 2,
        ]);
        $data = curl_exec($curl);

        if ($data == false || curl_getinfo($curl, CURLINFO_HTTP_CODE != "200")) {
            return null;
        }
        $data = json_decode($data, true);

        foreach ($data["matches"] as $match) {
            $theMatch = new Maatch();
            $theMatch->setId($match["id"]);
            $theMatch->setStatus($match["status"]);
            $results[] = $match;
        }
        curl_close($curl);
        return $results;
    }
}
