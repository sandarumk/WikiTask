<?php

class Page
{
    var $title ;
    var $page_id;
    var $url;
    var $score;
    
    public function setPageid($page_id)
    {
        $this->page_id = $page_id;
    }

    public function getPageid()
    {
        return $this->page_id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }


    public function setScore($score)
    {
        $this->score = $score;
    }

    public function getScore()
    {
        return $this->score;
    }

    public static function compareScore($a, $b)
    {
        if ($a->getScore() == $b->getScore()) {
            return 0;
        }
        //return ($a->getScore() < $b->getScore()) ? -1 : 1;
        return $a->getScore() - $b->getScore();
    }
}