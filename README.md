# 提出課題:Conduit

ブログプラットフォームを作る [RealWorld](https://github.com/gothinkster/realworld/tree/main) という OSS のプロジェクトがあります。RealWorld は実世界と同じ機能を持つプラットフォームを作ることで、学習したいフレームワークの技術を習得することを目的としてたプロジェクトです。

[Conduit](https://demo.realworld.io/#/) は RealWolrd で作成する Medium.com のクローンサイトです。

今回は Counduit と同じ見た目・機能のサイトを Laravel で実装します。

## ステップ1

[RealWorld のドキュメント](https://realworld-docs.netlify.app/docs/specs/frontend-specs/templates) を参考に、次のページの HTML と CSS を実装し、ページを作成してください。この時点では機能は作成せず、見た目を整えるだけでよいです。

- [Home](https://realworld-docs.netlify.app/docs/specs/frontend-specs/templates#home)
- [Create/Edit Article](https://realworld-docs.netlify.app/docs/specs/frontend-specs/templates#createedit-article)
- [Article](https://realworld-docs.netlify.app/docs/specs/frontend-specs/templates#article)

なお、Article に関わる要素のうち、認証機能及び著者、お気に入り(`favorite`) は実装しなくてよいものとします。

## ステップ2

ステップ1のページの機能を実装し、動作するようにしてください。

## ステップ3 (advanced)

次のページの HTML と CSS を実装し、ページを作成してください。この時点では機能は作成せず、見た目を整えるだけでよいです。

- [Authentication](https://realworld-docs.netlify.app/docs/specs/frontend-specs/templates#authentication)

## ステップ4 (advanced)

ステップ3のページの機能を実装し、動作するようにしてください。

また合わせて、ステップ1、2の Article に関わる要素のうち、認証機能及び著者も実装してください。

----------------------------------------------------------------------------------------------------------------------------------------

## 実装済みの機能
* 投稿データの一覧表示
* 新規投稿用フォームの表示
* 新規投稿の保存
* 投稿データの個別表示
* 投稿データ編集用フォームの表示
* 編集したデータの保存
* データの削除
* タグ
  
## 未実装の機能
* コメント
* お気に入り
* ユーザーフォロー
* 認証
  
## セットアップ
**リポジトリのクローンを作成し、プロジェクトフォルダーに移動**

````
git clone https://github.com/itoh28/Conduit.git  

cd Conduit
````

**PHPとComposerを含む最小のDockerコンテナを使用して、アプリケーションの依存関係をインストール**

````
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
````

**.env ファイルを作成**

````
cp .env.example .env
````

**.env ファイルのDB_HOSTを下記に上書き**

````
DB_HOST=mysql
````

**コンテナ起動/キー生成**

````
./vendor/bin/sail up -d

./vendor/bin/sail artisan key:generate
````

**テーブルを作成**

````
sail artisan migrate
````

**npmコマンドでパッケージをインストールし、起動**

````
sail npm install

sail npm run dev
````

****

その後、http://localhost/ にアクセスしてください

データベース（phpMyAdmin）は、 http://localhost:8080/ にアクセスしてください
