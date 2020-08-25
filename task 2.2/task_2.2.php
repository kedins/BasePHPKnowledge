
<?php
function getLinksFromHTML($url)
{
    $page = file_get_contents($url);
    $dom = new DOMDocument;
    libxml_use_internal_errors(true);  // supressing warnings of parsing
    $dom->loadHTML($page);
    libxml_use_internal_errors(false);  // end of supressing warnings of parsing
    $tags_a = $dom->getElementsByTagName('a');
    foreach($tags_a as $tags_a_item) {
        $href_content[] = $tags_a_item->getAttribute('href');
    }
    foreach($href_content as $href_item){
        // Getting not empty links
        if($href_item !='' && $href_item!='#'){
            $href_formated[]=$href_item;
        }

        // Getting only href`s that are started with 'http'
        // if(preg_match('/^http\S++/',$href_item)){
        //     $href_formated[]=$href_item;
        // }
    
    }
    return $href_formated;
} 
var_dump(getLinksFromHTML('https://stackoverflow.com/questions/14571904/php-dom-getattribute'));