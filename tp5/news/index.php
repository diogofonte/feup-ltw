<?php
  $db = new PDO('sqlite:news.db');

  $stmt = $db->prepare('SELECT news.*, users.*, COUNT(comments.id) AS comments
                        FROM news JOIN
                            users USING (username) LEFT JOIN
                            comments ON comments.news_id = news.id
                        GROUP BY news.id, users.username
                        ORDER BY published DESC');

    // temp.view_name(id,title,published,tags,username,introduction,fulltext,"username:1",password,name,comments)
  $stmt->execute();
  $articles = $stmt->fetchAll();

  // the date function formats a date in epoch/unix time format
  $date = date('F j', $article['published']);

  // the explode function splits a string with a separator
  $tags = explode(',', $article['tags']);

  foreach($articles as $article) {
    echo '<h1>' . $article['username'] . '</h1>';
    echo '<p>' . $article['fulltext'] . '</p>';
    echo '<p>' . $article['tags
    '] . '</p>';
  }
?>