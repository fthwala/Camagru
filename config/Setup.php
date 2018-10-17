<?php
//require 'Database.php';
      try{
        $host = "mysql:host=127.0.0.1";
        $dbname = "camagrumvc";
        $username = "root";
        $password = "thwala88";
        $DB_DSN_NAME = "mysql:host=127.0.0.1;dbname=".$dbname;
            $conn = new PDO($host, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$conn = connect();
            $sql_db = "CREATE DATABASE IF NOT EXISTS $dbname";
            $conn->exec($sql_db);
            $sql_db = "USE $dbname;
            CREATE TABLE `comments` (
                `id` int(11) UNSIGNED NOT NULL,
                `user` text CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
                `comment` text NOT NULL,
                `image_id` int(11) UNSIGNED NOT NULL,
                `posted_at` datetime NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
                
              CREATE TABLE `images` (
                `image_id` int(11) UNSIGNED NOT NULL,
                `image_name` varchar(1000) NOT NULL,
                `image_path` varchar(1000) NOT NULL,
                `user` varchar(32) DEFAULT NULL,
                `likes` int(11) UNSIGNED NOT NULL,
                `post_time` datetime NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
                
              CREATE TABLE `login_tokens` (
                `id` int(11) UNSIGNED NOT NULL,
                `token` char(64) NOT NULL DEFAULT '',
                `user_id` int(11) UNSIGNED NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
                
              CREATE TABLE `password_tokens` (
                `id` int(11) UNSIGNED NOT NULL,
                `token` char(64) NOT NULL DEFAULT '',
                `user_id` int(11) UNSIGNED NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              CREATE TABLE `post_likes` (
                `id` int(11) UNSIGNED NOT NULL,
                `user` varchar(32) DEFAULT NULL,
                `no_likes` int(11) NOT NULL,
                `image_id` int(11) UNSIGNED NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              CREATE TABLE `users` (
                `id` int(11) UNSIGNED NOT NULL,
                `user` varchar(32) DEFAULT NULL,
                `password` varchar(60) DEFAULT NULL,
                `email` text,
                `checks` int(1) DEFAULT 0,
                `notif` int(1) DEFAULT 0
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

              ALTER TABLE `comments`
            ADD PRIMARY KEY (`id`);

            ALTER TABLE `images`
            ADD PRIMARY KEY (`image_id`);

            ALTER TABLE `login_tokens`
            ADD PRIMARY KEY (`id`),
            ADD UNIQUE KEY `token` (`token`),
            ADD KEY `user_id` (`user_id`);

            ALTER TABLE `password_tokens`
            ADD PRIMARY KEY (`id`),
            ADD UNIQUE KEY `token` (`token`);

            ALTER TABLE `post_likes`
            ADD PRIMARY KEY (`id`);

            ALTER TABLE `users`
            ADD PRIMARY KEY (`id`);

            ALTER TABLE `comments`
            MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

            ALTER TABLE `images`
            MODIFY `image_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

            ALTER TABLE `login_tokens`
            MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

            ALTER TABLE `password_tokens`
            MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

            ALTER TABLE `post_likes`
            MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

            ALTER TABLE `users`
            MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

            ALTER TABLE `login_tokens`
            ADD CONSTRAINT `login_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
            ";

            $conn->exec($sql_db);
        }
        catch (PDOException $e)
        {
            echo "rrrrr";
        }
?>