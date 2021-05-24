<?php
foreach ($newsList as $key => $news) {
    ++$key;
    echo $news . "&nbsp; <a href='". route('news.show', ['id' => $key]) ."'>To the news</a><br>";
}
