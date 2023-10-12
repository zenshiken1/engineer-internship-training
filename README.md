# Webアプリケーション開発体験用サンプルSNSアプリ
## NE株式会社インターンシップへようこそ

本リポジトリはインターンシップ教材として利用し、**Webアプリケーション開発の体験**をすることを目的に作成されています。
実際のサービスとして公開するにはセキュリティ面などで考慮されていない部分もあります。個人情報や機密情報などの情報を登録しないようご注意ください。

# 開発環境の構築 (For インターン生)

## Codespacesで起動する場合

任意のブランチに切り替えて「+」を押す

<img width="400" alt="スクリーンショット 2023-10-12 14 42 52" src="https://github.com/hamee-co-jp/engineer-internship-training/assets/51414950/83d0915f-146d-4f87-986a-539cce7e6864">

|ポート|アプリ|説明|
|-|-|-|
|8000|サンプルアプリ|サンプルSNSアプリ本体です|
|3000|phpMyAdmin|DBの中身を確認したい場合に使うツールです|

### phpMyAdminへの接続

phpMyAdmin起動時にログインを求められたら、以下を入力してログインする

|||
|-|-|
|ユーザー|myuser|
|パスワード|mypassword|

# 開発環境の構築 (For 開発者)

## ローカルで起動する場合

任意のディレクトリにcloneし、以下コマンドを実行する

```
$ docker-compose up -d
```

## SQL再読み込み

マイグレーションしたい場合は、以下のコマンドを実行する。
※ テーブルのデータは削除されるので注意

```
docker-compose down --volume; docker-compose up -d --build
```

# 参考資料

- [講義資料]() @TODO
- [PHP: PHP マニュアル - Manual](https://www.php.net/manual/ja/index.php)
- ブラウザでPHPのコードを実行できるツール | 3v4l(講義で基礎的なPHPの文法を学ぶのに使用します)
    - [string](https://3v4l.org/pkuIY)
    - [if](https://3v4l.org/GEEqm)
    - [array, foreach](https://3v4l.org/4VnHl)
- [HTML ドキュメント(HTML: ハイパーテキストマークアップ言語 | MDN)](https://developer.mozilla.org/ja/docs/Web/HTML)
- [CSS ドキュメント(CSS: カスケーディングスタイルシート | MDN)](https://developer.mozilla.org/ja/docs/Web/CSS)
- [Bootstrap ドキュメント](https://getbootstrap.jp/docs/5.3/getting-started/introduction/)
- [JavaScript | MDN](https://developer.mozilla.org/ja/docs/Web/JavaScript)
