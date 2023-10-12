<?php

declare(strict_types=1);

class Favorite
{
    private const DSN = 'mysql:host=engineer-internship-training_mysql_1;dbname=mydatabase;';
    private const DB_USER = 'myuser';
    private const DB_PASS = 'mypassword';

    /**
     * いいね情報を保存
     *
     * @param string $postId 投稿ID
     */
    public function save(string $postId): void
    {
        // 未実装 応用課題:いいね機能
    }

    /**
     * DBに接続したPDOを返却する
     *
     * @return PDO
     */
    private function dbConnect(): PDO
    {
        $pdo = new PDO(self::DSN, self::DB_USER, self::DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        return $pdo;
    }
}
