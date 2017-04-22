<?php
/****************************************

		functions.php

		テーマ内で利用する関数を定義したり、
		テーマの設定を行うためのファイルです。

		functions.php のコードに関しては、
		CHAPTER 11, 12 で詳しく解説しています。

*****************************************/

/** メインカラムの幅を指定する変数。下記は 600px を指定（記述推奨） */
if ( ! isset( $content_width ) ) $content_width = 600;

/** <head>内に RSSフィードのリンクを表示するコード */
add_theme_support( 'automatic-feed-links' );

/** ダイナミックサイドバーを定義するコード（CHAPTER 11）*/
register_sidebar( array(
	'name'			=> 'サイドバーウィジット-1',
	'id'			=> 'sidebar-1',
	'description'	=> 'サイドバーのウィジットエリアです。デフォルトのサイドバーと丸ごと入れ替えたいときに使ってください。',
    'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
    'after_widget'	=> '</div>',
) );

/** 複数のダイナミックサイドバーを定義するコード（CHAPTER 11）*/
/**
register_sidebar( array(
	'name'			=> 'サイドバーウィジット-2',
	'id'			=> 'sidebar-2',
	'description'	=> 'サイドバーのウィジットのテストです。',
    'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
    'after_widget'	=> '</div>',
));
*/

/** カスタムメニュー機能を有効にするコード（CHAPTER 12）*/
add_theme_support( 'menus' );

/** カスタムメニューの「場所」を設定するコード */
register_nav_menu( 'header-navi', 'ヘッダーのナビゲーション' );
// register_nav_menu( 'sidebar-navi', 'サイドバーのナビゲーション' );
// register_nav_menu( 'footer-navi', 'フッターのナビゲーション' );

/** アイキャッチ画像機能を有効にするコード（CHAPTER 14）*/
add_theme_support( 'post-thumbnails' );

/** フィルターフックの表示の変更（CHAPTER 14） */
function new_excerpt_more ( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

$args = array(
	'width' => 940,
	'flex-height' => true,
	'height' => 250,
	'header-text' => true,
	'default-text-color' => 'ffffff',
	'default-image' => get_template_directory_uri().'/images/header.jpg',
	"uploads" => true,
	'wp-head-callback' => 'header_style',
);
add_theme_support( 'custom-header', $args);

function header_style() {
?>
<style>
	#header-image {
		background: url(<?php header_image(); ?>);
		color: #<?php header_textcolor(); ?>;
		width: <?php echo get_custom_header() -> width; ?>px;
		height: <?php echo get_custom_header() -> height; ?>px;
	}
	#header-image p {
		padding: 5em 3em;
	}
</style>
<?php
add_image_size( 'header-image', 940, 250, true );
} ?>
