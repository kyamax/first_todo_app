# アプリケーション名
TODO App

# アプリケーションの概要
TODOを登録することで一覧で表示され、自分のタスクを視覚的に確認することができるタスク管理アプリケーション。

# URL
http://18.176.124.241/tasks/index

# テストログイン
- メールアドレス：user@example.com
- パスワード：123qwe

# 機能要素
## ユーザー管理機能
- 【新規登録】ユーザー名・メールアドレス・パスワードを入力してユーザー登録を行う。
- 【ログイン】メールアドレス・パスワードを入力してログインを行う。
- 【編集】ユーザー情報の登録内容の変更を行う。

## TODO登録機能
- 【新規登録】題名・内容・重要度を新規登録する。
- 【一覧】TODOリストが一覧で表示される。

## 検索機能
- 【検索】検索フォームから登録したTODOの検索を行う。

## TODOの管理機能
- 【一覧】実行済みTODOは完了ボタンを押すと、完了リストに移動する。
- 【一覧】完了リストにあるTODOは、未完了ボタンを押すとTODOリストに移動する。
- 【詳細】TODOのタイトル・内容・重要度が表示される。
- 【編集】登録したTODOの内容の編集を行う。
- 【削除】登録したTODOの削除を行う。
- 【ソート機能】重要度を昇順降順の並び替えを行う。

## その他実装
- レスポンシブ対応
- ページネーションの実装
- bootstrapでのUI作成
- Docker環境の構築

# 前回（1/24）からの修正・追加
## 自己課題
- AWSでのデプロイ<br>
- レスポンシブ対応の修正<br>
  →iphoneSEの画面サイズだとTODOリストのボックスから内容がはみ出てしまっていたので、画面サイズの小さい端末では、内容・編集ボタン・削除ボタンの3点を非表示にした。<br>
- 詳細ページの作成<br>
  →画面サイズのによって、一覧画面に表示できないアクションがあるため、詳細ページで表示できるように実装した。<br>
- バリデーションの重複記述の修正<br>
  コントローラーにて、バリデーション済みのリクエストにさらにバリデーションをかけていたため、修正した。<br>

## アルサーガパートナーズ様からの課題
- バリデーションメッセージの追加と日本語対応<br>
  →TODOの追加時、User登録・ログイン時に入力内容に誤りがある場合、エラーメッセージが表示されるようにした。<br>
- 検索機能のリファクタ<br>
  →コントローラーの記述がwhereメソッドの中に関数を置き、そこに検索機能の記述をしていたが、シンプルに記述し直した。<br>
- ソート機能の実装<br>
  →重要度について昇降順に並び替えを行うことができるように実装した。<br>
  ※本来は新たに状態カラムを設け、その状態によって並び替えを行うものとのことだったが、状態カラムと似たcheckカラム（Done・Undoneでタスクの状態を管理する）があったため、別の箇所にソート機能を適用した。<br>

## レビュー後の修正(デプロイ後、知人にレビューをいただきました)
- Taskテーブルの内容にnullableの設定<br>
  →TODOのtextカラムを任意入力とした。<br>
- TODO追加時のテキストエリアの修正<br>
  →フォーム入力時に、textカラムの改行を可能にした。<br>

#　今後の実装
- javascriptの実装
- 削除前のアラート機能の実装
- 検索0件時に、検索結果なしの表示

# データベース設計
[![Image from Gyazo](https://i.gyazo.com/57d25402b42abdba7e1e9746880b78a1.png)](https://gyazo.com/57d25402b42abdba7e1e9746880b78a1)
