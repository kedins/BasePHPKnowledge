<?php
$filename = __DIR__ . "/data.json";
$result = [];
if (file_exists($filename))
    $result = json_decode (file_get_contents ($filename), true);
    if (!empty($_GET)){
        $news_id = $_GET['set_viewed'];
        $news_item = array_search($news_id, array_column($result, 'id'));
        $result[$news_item]['viewed'] += 1;
        file_put_contents('data.json', json_encode($result));
        header("Location: task_1.4.php");
    }
?>

<? foreach ($result as $item): ?>
<div>
    <b><?=$item['name']?></b><br>
    <small>Viewed: <?=$item['viewed']?></small><br>
    <?=$item['text']?><br><br>
    <a href="?set_viewed=<?=$item['id']?>">I watched</a>
    <hr>
</div>
<? endforeach; ?>