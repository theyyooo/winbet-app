<?php

require_once '../src/Models/Entities/Team.php';
require_once '../src/Models/Entities/Competition.php';
require_once '../src/Models/Entities/Match.php';

class ApiFootball
{
    private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function curlExec($curl)
    {

        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER       => array("X-Auth-Token: " . $this->apiKey . ""),
            CURLOPT_RETURNTRANSFER   => true,
            CURLOPT_TIMEOUT          => 10,
        ]);
        $data = curl_exec($curl);

        if ($data == false || curl_getinfo($curl, CURLINFO_HTTP_CODE != "200")) {
            return null;
        }
        $data = json_decode($data, true);
        return $data;
    }

    public function getAllNextMatch($idCompetition): ?array
    {
        if (empty($idCompetition)) {
            $curl = curl_init("http://api.football-data.org/v2/matches?dateFrom=" . date("Y-m-d") . "&dateTo=" . date("Y-m-d", strtotime(date("Y-m-d") . ' + 9 days')) . "");
        } else {
            $curl = curl_init("http://api.football-data.org/v2/competitions/" . $idCompetition . "/matches?dateFrom=" . date("Y-m-d") . "&dateTo=" . date("Y-m-d", strtotime(date("Y-m-d") . ' + 9 days')) . "");
        }

        $data = $this->curlExec($curl);

        if (is_null($data)) {
            return null;
        }
        $compteur = 0;
        foreach ($data["matches"] as $match) {
            if ($match['odds']['homeWin'] != null && $match['odds']['awayWin'] != null) {
                $theMatch = new Maatch();
                $theMatch->setId($match["id"]);
                $theMatch->setStatus($match["status"]);
                $theMatch->setDate($match["utcDate"]);
                $theMatch->setHomeTeam((new Team)->setId($match['homeTeam']['id'])
                        ->setName($match["homeTeam"]["name"])
                     ->setCrestUrl($this->getTeamInfo($match['homeTeam']['id']))
                );
                $theMatch->setAwayTeam((new Team)->setId($match['awayTeam']['id'])
                        ->setName($match["awayTeam"]["name"])
                     ->setCrestUrl($this->getTeamInfo($match['awayTeam']['id']))
                );
                $theMatch->setCompetition((new Competition)->setId($match['competition']['id'])
                        ->setName($match['competition']['name'])
                );
                $theMatch->setOdds((new Odds)->setHomeWin($match['odds']['homeWin'])
                        ->setDraw($match['odds']['draw'])
                        ->setAwayWin($match['odds']['awayWin'])
                );
                $results[] = $theMatch;
                $compteur += 1;
                if ($compteur == 10){
                    break;
                }
            }
        }
        curl_close($curl);
        return $results;
    }

    public function getTeamInfo($idTeam)
    {

        $curl = curl_init("http://api.football-data.org/v2/teams/" . $idTeam . "");
        $data = $this->curlExec($curl);
        if (is_null($data)) {
            return null;
        }
        return $data["crestUrl"];
    }
}
