<?php

namespace App\Service;

class MainService
{
    public function MergeAndSortArray($posts, $characters)
    {
        $count = 0;
        $dateArray = [];

        for ($i = 0; $i != count($posts); $i++, $count++) {
            $articles[$count] = $posts[$i];
            $articles[$count]['type'] = 'post';
        }

        for ($i = 0; $i != count($characters); $i++, $count++) {
            $articles[$count] = $characters[$i];
            $articles[$count]['type'] = 'character';
        }

        foreach ($articles as $key => $arr) {
            $dateArray[$key] = $arr['updated_at'];
        }

        array_multisort($dateArray, SORT_STRING, $articles);

        return $articles;
    }
}
