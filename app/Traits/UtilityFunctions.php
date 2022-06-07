<?php


namespace App\Traits;

trait UtilityFunctions {

    public function getScores() {

    }


    public function getStrictMatch($searchProfileValue, $propertyValue)
    {
        dd(array_key_exists($propertyValue, $searchProfileValue), $searchProfileValue, $propertyValue);
    }

    public function getMatches($searchProfileFields, $propertyFields) {
        $strictMatch = 0;

        foreach ($searchProfileFields as $searchFieldKey => $searchFieldValue) {
            if(isset($propertyFields->$searchFieldKey)) {
                if($this->getStrictMatch($searchFieldValue, $propertyFields->$searchFieldKey)) {
                    $strictMatch++;
                }
            }
        }

    }
}
