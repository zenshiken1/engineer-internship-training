<?php

declare(strict_types=1);

require_once '/var/www/src/Controller/AppController.php';

class LoginController extends AppController
{
    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * ログイン画面を表示
     *
     * @return void
     */
    public function index(): void
    {
        $this->show('Login/index.php');
    }

    /**
     * ログインする
     *
     * @return void
     */
    public function sign_in(): void
    {
        // 未実装 応用課題:ログイン機能
    }

    /**
     * ログアウトする
     *
     * @return void
     */
    public function sign_out(): void
    {
        // 実装検討中
    }
}
