# アプリケーション名
TODO App

# アプリケーションの概要
TODOを登録することで一覧で表示され、自分のタスクを視覚的に確認することができるタスク管理アプリケーション。

# URL
http://18.176.124.241/tasks/index

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
- 【編集】登録したTODOの内容の編集を行う。
- 【削除】登録したTODOの削除を行う。

## その他実装
- レスポンシブ対応
- ページネーションの実装
- bootstrapでのUI作成
- Docker環境の構築

# 今後の実装
- 非同期通信の実装
 → 完了・未完了の遷移
- 詳細ページの作成
- AWSを用いた本番環境へのデプロイ

# データベース設計
[![Image from Gyazo](https://i.gyazo.com/57d25402b42abdba7e1e9746880b78a1.png)](https://gyazo.com/57d25402b42abdba7e1e9746880b78a1)