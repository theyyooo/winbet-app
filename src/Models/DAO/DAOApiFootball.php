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
            $curl = curl_init("http://api.football-data.org/v2/matches?dateFrom=" . date("Y-m-d") . "&dateTo=" . date("Y-m-d", strtotime(date("Y-m-d") . ' + 5 days')) . "");
        } else {
            $curl = curl_init("http://api.football-data.org/v2/competitions/" . $idCompetition . "/matches?dateFrom=" . date("Y-m-d") . "&dateTo=" . date("Y-m-d", strtotime(date("Y-m-d") . ' + 7 days')) . "");
        }
        $data = $this->curlExec($curl);

        if (is_null($data)) {
            return null;
        }
        $compteur = 0;

        foreach ($data["matches"] as $match) {
            if ($match['odds']['homeWin'] != null && $match['odds']['awayWin'] != null && $match["status"] == "SCHEDULED") {
                $theMatch = new Maatch();
                $theMatch->setId($match["id"]);
                $theMatch->setStatus($match["status"]);
                $theMatch->setDate($match["utcDate"]);
                $theMatch->setHomeTeam((new Team)->setId($match['homeTeam']['id'])
                        ->setName($match["homeTeam"]["name"])
                        ->setCrestUrl("https://crests.football-data.org/" . $match['homeTeam']['id'] . ".svg")
                );
                $theMatch->setAwayTeam((new Team)->setId($match['awayTeam']['id'])
                        ->setName($match["awayTeam"]["name"])
                        ->setCrestUrl("https://crests.football-data.org/" . $match['awayTeam']['id'] . ".svg")
                );
                $theMatch->setCompetition((new Competition)->setId($match['competition']['id'])
                        ->setName($match['competition']['name'])
                );
                $theMatch->setOdds((new Odds)->setHomeWin($match['odds']['homeWin'])
                        ->setDraw($match['odds']['draw'])
                        ->setAwayWin($match['odds']['awayWin'])
                );
                if (empty(($theMatch->getCompetition())->getName())) {
                    $theMatch->setCompetition((new Competition)->setId($match['competition']['id'])
                            ->setName($data['competition']['name'])
                    );
                }
                $results[] = $theMatch;
                $compteur += 1;
                if ($compteur == 10) {
                    break;
                }
            }
        }
        curl_close($curl);
        return $results;
    }

    public function getMatchById($id, $odds_id)
    {
        $curl = curl_init("http://api.football-data.org/v2/matches/" . $id);

        $data = $this->curlExec($curl);

        if (is_null($data)) {
            return null;
        }
        if ($data['match']) {
            $theMatch = new Maatch();
            $theMatch->setId($id);
            $theMatch->setHomeTeam($data['match']["homeTeam"]["name"]);
            $theMatch->setAwayTeam($data['match']["awayTeam"]["name"]);
            $odds = 0;
            switch ($odds_id) {
                case 1:
                    $odds = $data['match']['odds']['homeWin'];
                    break;
                case 2:
                    $odds = $data['match']['odds']['draw'];
                    break;
                case 3:
                    $odds = $data['match']['odds']['awayWin'];
                    break;
                default:
                $odds = $data['match']['odds']['homeWin'];
                    break;
            }

            $theMatch->setOdds($odds);
            return $theMatch;
        }
        return false;
    }
}
