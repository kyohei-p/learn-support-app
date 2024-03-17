# 環境構築
## 環境構築参考サイト
- [Laravel9とReactをDockerで導入してみよう!](https://zenn.dev/eguchi244_dev/articles/laravel-react-docker-introduction-20230831)
- [Laravel9のVite環境でVue.js 3を利用する方法](https://reffect.co.jp/laravel/laravel9_vite)
- [Laravel Breezeのインストール](https://reffect.co.jp/laravel/laravel10#Laravel_Breeze)
- 今回は最新版のLaravel10で環境構築しています。

## 環境構築（特記事項）
上記サイトと異なる手順はこちらに記載しています。
- docker/php/Dockerfile（以下に変更）
```
[](旧：php:8.0-fpm)
FROM php:8.1-fpm
```

- docker-compose.yml
```
  php:
    image: php:8.1-fpm
```

- docker/nginx/default.conf（以下に変更）
```
root /var/www/html/Laravelのプロジェクトディレクトリ名/public;
```

- PHPバイナリのパスを通す（変更後はターミナル再起動する）
```
echo $PATH
echo 'export PATH="/usr/local/opt/php@8.1/bin:$PATH"' >> ~/.bashrc
echo 'export PATH="/usr/local/opt/php@8.1/sbin:$PATH"' >> ~/.bashrc
source ~/.bashrc
php -v
```

- Laravelインストール
root@~/www/html直下で実行

Laravelのインストール
```
composer create-project "laravel/laravel=10.*" LaravelReactProject
```

- laravel/breezeのインストール

インストール後にlocalhostでブラウザを立ち上げると、LaravelのバージョンがJSON形式で表示されること
```
composer require laravel/breeze --dev
php artisan breeze:install
[](Which Breeze stack would you like to install?で以下を選択)
 ○ API only

[](Which testing framework do you prefer?で以下を選択)
 Pest
```

- Alpine Linuxで最新nodeの導入

npm run devがバージョンの問題により失敗した場合の対処法
```
apk del nodejs npm
apk add --no-cache nodejs npm
node -v
```

## 環境構築後の操作
- dockerイメージとコンテナの作成
```
docker compose build --no-cache && docker-compose up -d
```

- コンテナの作成
```
docker-compose up -d
```

- phpコンテナにログイン
```
docker-compose exec php bash
```

- マイグレーションの実行
```
php artisan migrate
```

could not find driver~のエラーが発生した場合、phpコンテナ内で以下を実行してください
（ビルド時に実行するコマンドです）
```
docker-php-ext-install mysqli pdo_mysql
```

- nodeコンテナにログイン&開発サーバーを起動
```
docker-compose exec node /bin/sh
cd /var/www/html/LaravelReactProject
npm run dev
```

### リファレンス
- [docker-composeコマンド概要](https://docs.docker.jp/v1.12/compose/reference/overview.html)

### バージョン情報

name|version
--|--
PHP | 8.1.27
Laravel | 10.46.0
Node.js | v18.19.0
React | 18.2.0
Vite | v5.1.5