<?php

declare(strict_types=1);

class Dispatcher
{
    const CONTROLLER_INDEX = 1;
    const ACTION_INDEX = 2;
    const ROOT_DIR = '/var/www';
    const APP_DIR = self::ROOT_DIR . '/src';
    const CONTROLLER_DIR = self::APP_DIR . '/Controller/';
    const DEFAULT_CONTROLLER_NAME = 'Posts';
    const DEFAULT_ACTION_NAME = 'index';

    /**
     * URIから適当なアクションを実行させる
     */
    public function dispatch(): void
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);

        list($controller, $actionName) = array_pad($this->routing($uri), 3, null);

        try {
            $this->execAction($controller, $actionName);
        } catch (Exception $e) {
            // @todo / へリダイレクト
        }
    }

    /**
     * ルーティングを作成する
     * 正しくない場合は、DEFAULT_*で宣言されたルートを返す
     *
     * @param array $uri URIのデータ
     *
     * @return array [1]controllerName [2]actionName
     */
    private function routing(array $uri): array
    {
        if (count($uri) < 3) {
            $uri[self::CONTROLLER_INDEX] = self::DEFAULT_CONTROLLER_NAME;
            $uri[self::ACTION_INDEX] = self::DEFAULT_ACTION_NAME;
        }

        $controllerName = file_exists(self::CONTROLLER_DIR . "{$uri[self::CONTROLLER_INDEX]}Controller.php") ? $uri[self::CONTROLLER_INDEX] : self::DEFAULT_CONTROLLER_NAME;

        $controllerName .= 'Controller';
        require_once self::CONTROLLER_DIR . "{$controllerName}.php";
        $actionName = method_exists($controllerName, $uri[self::ACTION_INDEX]) ? $uri[self::ACTION_INDEX] : self::DEFAULT_ACTION_NAME;

        return [$controllerName, $actionName];
    }

    /**
     * クラスのメソッドを実行する。メソッドがない場合はエラーを返す
     *
     * @param string $controller 実行するメソッドを持つコントローラー名
     * @param string $actionName 実行したいメソッド名
     */
    private function execAction(string $controller, string $actionName): void
    {
        $controllerObj = new $controller();
        $controllerObj->$actionName();
    }
}
