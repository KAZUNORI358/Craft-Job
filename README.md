![Craft Jobのkv写真です](/assets/img/github_kv.png)

# 求人サイトCraft Job (架空求人サイト)

## 概要

Hello Mentor の課題で、Figmaのデザインカンプをもとに、コーディングしました。

## 制作期間

2026年2月~3月(約3週間)

## 公開URL

[craft-job.kazunori-folio.com](https://craft-job.kazunori-folio.com/)

## 概要

求人サイトです。  
WordPressを用いて、掲載求人情報、会社情報、コラム記事、プライバシーポリシーページをクライアントが更新が可能です。  
また、求人では、地域、雇用形態、職種、タグ、年収からの絞り込みが可能です。  
人気求人では閲覧数のカウント、閲覧順位でランキング形式で表示しています。  
お気に入り求人ページでは、お気に入りボタンを押したものが一覧表示されます。

## 開発環境のセットアップ

### 構築環境

- Cursor
- LocalWP
- WP環境：WordPress 6.9
- ライブラリ：Splide.js

## Cursor 推奨拡張機能

開発効率を向上させるために、以下の拡張機能の使用しています

### SCSS 開発

- **Live Sass Compiler**： SCSS ファイルのリアルタイムコンパイル

### コードフォーマット

- **Format HTML in PHP**： PHP ファイル内の HTML と PHP コードの自動フォーマット
- **Prettier**： SCSS、JavaScript、JSON 等のコードフォーマット

## ファイル構成

```
Craft Job theme/
├── .vscode/
├── assets/
│   ├── css/
│   ├── img/
│   ├── js/
│   └── scss/
├── includes/ #テーマの設定・管理画面などの分割ファイル
├── template-parts/ #再利用テンプレートパーツ
├── .gitignore
├── *.php
├── README.md
├── screenshot.png
└── style.css
```

### 重要な注意事項

- **テーマファイル以外**: データベース、プラグイン設定等は
  WPvivid で共有するため、管理者に連絡すること

## コーディングルール

- **命名規則**: FLOCSS (c-,l- プレフィックスを使用)
- **CSS**: Sass(SCSS) を使用しています。
- **PHP**: セキュリティのため、エスケープ処理を行う
