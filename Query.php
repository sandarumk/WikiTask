<?php

class Query
{

    public static $base_url = 'https://en.wikipedia.org///w/api.php?';

    public static function getCategoryMembers($category)
    {
        $url = self::constructQueryCategoryMembers($category);
        $data = self::queryWikipedia($url);
        return $data->query->categorymembers;
    }

    public static function constructQueryCategoryMembers($category)
    {
        $url = self::$base_url;
        $url .= 'action=query'.'&';
        $url .= 'format=json'.'&';
        $url .= 'list=categorymembers'.'&';
        $url .= 'cmtitle=Category'.'%3A';
        $url .= $category.'&';
        $url .= 'cmlimit=50';
        return $url;
    }

    public static function queryWikipedia($url)
    {
        $http = \Httpful\Request::get($url);
        $response = $http->send();
        $data = json_decode($response);
        return $data;
    }

    public static function constructQuerygetArticleList($page_id)
    {
        $url = self::$base_url;
        $url .= 'action=query'.'&';
        $url .= 'format=json'.'&';
        $url .= 'prop=info%7Cextracts'.'&';
        $url .= 'pageids='.$page_id;
        $url .= '&';
        $url .= 'inprop=url'.'&';
        $url .= 'exlimit=1'.'&';
        $url .= 'explaintext=1'.'&';
        $url .= 'exsectionformat=plain';
        return $url;
    }

    public static function getPageDetails($page_id)
    {
        $url = self::constructQuerygetArticleList($page_id);
        $data = self::queryWikipedia($url);
        return $data;
    }


}