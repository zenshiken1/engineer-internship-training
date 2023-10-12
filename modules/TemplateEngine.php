<?php

declare(strict_types=1);

class TemplateEngine
{
    /** @var array */
    public $varMap;

    /**
     * varMapを初期化する
     */
    private function __construct()
    {
        $this->varMap = [];
    }

    /**
     * 自身のインスタンスを返す
     *
     * @return self
     */
    public static function factory(): self
    {
        return new static();
    }


    /**
     * テンプレートのパスを返す
     *
     * @param string $templateName 表示するテンプレートの名前
     * @return string
     */
    public function path(string $templateName): string
    {
        return "/var/www/src/View/{$templateName}";
    }

    /**
     * 表示する値を挿入する
     *
     * @param string $key 挿入する対象
     * @param mixed $values 表示される値
     * @return void
     */
    public function assign(string $key, $values): void
    {
        $this->varMap[$key] = $this->escape($values);
    }

    /**
     * 格納された値を取得する
     *
     * @param string $key 取得する対象
     * @return mixed
     */
    public function get(string $key)
    {
        if (isset($this->varMap[$key])) {
            return $this->varMap[$key];
        }

        return null;
    }

    /**
     * HTML特殊文字をエスケープする
     * @param int|string|array  $params アサインするパラメータ
     * @return string|array         エスケープ済みのパラメータ
     */
    private function escape($params)
    {
        // textareaに値を表示することがあるのでnl2brを通さない
        if (!is_array($params)) return htmlspecialchars($params . '', ENT_QUOTES);

        $params_escaped = [];
        foreach ($params as $i => $param) {
            $params_escaped[$i] = $this->escape($param);
        }
        return $params_escaped;
    }
}
