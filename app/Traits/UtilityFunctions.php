<?php


namespace App\Traits;

trait UtilityFunctions {


    private function getScores($searchProfileFields, $propertyFields) {
        $strictMatchCount = 0;
        $looseMatchCount  = 0;
        $results          = [];

        foreach ($searchProfileFields as $searchFieldKey => $searchFieldValue) {
            if(isset($propertyFields->$searchFieldKey)) {
                if($this->getMatch($searchFieldValue, $propertyFields->$searchFieldKey, 'STRICT')) {
                    $strictMatchCount++;
                    continue;
                }

                if($this->getMatch($searchFieldValue, $propertyFields->$searchFieldKey, 'LOOSE')) {
                    $looseMatchCount++;
                }
            }
        }

        $results['score']              = $strictMatchCount + $looseMatchCount;
        $results['strictMatchesCount'] = $strictMatchCount;
        $results['looseMatchesCount']  = $looseMatchCount;

        return $results;
    }

    private function getMatch($searchProfileValue, $propertyValue, $matchType)
    {
        //Direct search Parameter check
        if (!is_array($searchProfileValue)) {
            if($searchProfileValue == null) {
                return true;
            }

            return $propertyValue == $searchProfileValue;
        }

        //Range search Parameter check
        if(empty(array_filter($searchProfileValue))) return true;

        if($matchType == 'LOOSE' ) {
            if($searchProfileValue[0] != null) $searchProfileValue[0] = $this->getDeviatedValue($searchProfileValue[0], 25, 'minvalue');
            if($searchProfileValue[1] != null) $searchProfileValue[1] = $this->getDeviatedValue($searchProfileValue[1], 25, 'maxvalue');
        }

        $minSearchProfileVal = $searchProfileValue[0] == null ? 0 : $searchProfileValue[0];
        $hasMaxValue         = $searchProfileValue[1] == null ? false : $searchProfileValue[1];

        if($hasMaxValue == false && $propertyValue >= $minSearchProfileVal)
            return true;

        if($propertyValue <= $hasMaxValue && $propertyValue >= $minSearchProfileVal)
            return true;

        return false;
    }

    private function getDeviatedValue($profileValue, $percentage, $type) {
        $newProfileValue = ($percentage/100) * $profileValue;

        if($type == 'minvalue') return ($profileValue - $newProfileValue);

        return ($profileValue + $newProfileValue);
    }

}
