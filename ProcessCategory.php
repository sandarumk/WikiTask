
<?php
// workaround for the time limit exceed error
ini_set('max_execution_time', 300);

// includes
include_once ('includes/httpful.phar') ;
include_once ('includes/TextStatistics.php');
include_once ('Page.php');
include_once ('Query.php');

echo "<h3>Wikipages with their Flesch Kincaid Reading Ease readability scores</h3>";
echo "<br />\n";

// get the category submitted via html page
if (isset($_POST["category"])){
    $category = filter_var($_POST["category"],FILTER_SANITIZE_STRING);
}
else{
    echo "Value not received";
}
// get the first fifty category members given the category name
$category_members = Query::getCategoryMembers($category);

$item_count = count($category_members);
if ($item_count === null or $item_count == 0){
    echo "No results found for the given category";
}

$text_statistics = new TextStatistics;

$pages = array();

// loop through the category members and calculate their readability score
for ($i = 0; $i< $item_count; $i++){
    $category_member = $category_members[$i];
    $page_id= $category_member->pageid;
    $title = $category_member->title;
    $data = Query::getPageDetails($page_id);
    $extract = $data->query->pages->$page_id->extract;
    $first_pararaph = strtok($extract, "\n");
    $link = $data->query->pages->$page_id->fullurl;
    $score= $text_statistics->fleschKincaidReadingEase($first_pararaph);
    $page= new Page();
    $page->setTitle($title);
    $page->setPageid($page_id);
    $page->setUrl($link);
    $page->setScore($score);
    $pages[$i] = $page;
    
}

// sort the page array from lowest to highest based on the scores
if ($pages != null){
    usort($pages, "Page::compareScore");
    // output the resulting list as a table
    $html = '<table border="1">';
    // header row
    $html .= '<tr>';
    $html .= '<th>Wikipedia Page</th>';
    $html .= '<th>Readability Score</th>';
    $html .= '</tr>';
    // data rows
    foreach( $pages as $wikipage){
        $html .= '<tr>';
        $html .= '<td><a href='.$wikipage->getUrl().'>'.$wikipage->getTitle().'</a></td>';
        $html .= '<td>' .$wikipage->getScore(). '</td>';
        $html .= '</tr>';
    }
    $html .= '</table>';
    echo $html;
}



?>