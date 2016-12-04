<?php

class News {

    public static function getNewsItemById($id) {
               
        $result = dbConnect::getConnection()->query('SELECT id,title,date,author_name,short_content FROM news WHERE id=' . $id);        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $newsItem = $result->fetch();

        return $newsItem;
    }

    public static function getNewsList() {
        $newsList = array();
        $result = dbConnect::getConnection()->query("SELECT * FROM news LIMIT 10");

        $i = 0;
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['author_name'] = $row['author_name'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }
        return $newsList;
    }

}
