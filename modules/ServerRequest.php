<?php

declare(strict_types=1);

/**
 * リクエストタイプやクエリパラメータを扱うクラス
 */
class ServerRequest
{
    /** @var array GETのときのパラメータ */
    private $_query;

    /** @var array POSTのときのパラメータ */
    private $_data;

    /** @var array サーバーリクエストのパラメータ */
    private $_request;

    /**
     * ServerRequest constructor.
     */
    public function __construct()
    {
        $this->_query = $_GET;
        $this->_data = $_POST;
        $this->_request = $_SERVER;
    }

    /**
     * GETリクエスト値を取得する
     * キーの指定がない場合、GETパラメータ全てを返却する
     *
     * @param ?string $key 取得するパラメータキー
     * @return mixed GETパラメータ
     */
    public function getQuery(?string $key = null)
    {
        if ($key) {
            return $this->_query[$key];
        }

        return $this->_query;
    }

    /**
     * POSTリクエスト値を取得する
     * キーの指定がない場合、POSTパラメータ全てを返却する
     *
     * @param ?string $key 取得するパラメータキー
     * @return mixed POSTパラメータ
     */
    public function getData(?string $key = null)
    {
        if ($key) {
            return $this->_data[$key];
        }

        return $this->_data;
    }

    /**
     * HTTPリクエストのタイプを返す
     *
     * @return string リクエストタイプ
     */
    public function requestType(): string
    {
        return $this->_request['REQUEST_METHOD'];
    }
}
