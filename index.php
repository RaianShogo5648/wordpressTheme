<?php
/****************************************

	index.php

	WordPressサイトには、なくてはならない
	テンプレートファイルです。

	index.php のコードに関しては、
	CHAPTER 9 で詳しく解説しています。

*****************************************/

get_header(); ?>

<!-- index.php -->
<div id="main">

	<?php
		if ( have_posts() ) :

			// ループ開始
			while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="content-box">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

						<p class="post-meta">
							<span class="post-date"><?php the_time( get_option( 'date_format') ) ?></span>
							<span class="category">Category - <?php the_category( ', ' ); ?></span>
							<span class="comment-num"><?php comments_popup_link( 'Comment : 0', 'Comment : 1', 'Comments : %' ); ?></span>
						</p>

						<?php the_excerpt(); ?>
						<p class="more-link">
							<a href="<?php the_permalink(); ?>" title="「<?php the_title(); ?>」の続きを読む">続きを読む &raquo;</a>
						</p>
					</div>
					<p class="thumbnail-box">
						<?php
							if( has_post_thumbnail() ) :
								the_post_thumbnail( 'thumbnail' );
							else:
						?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/noimage.gif" alt="noimage" />
						<?php
							endif;
						?>
					</p>
				</div><!-- /#post -->

		<?php
			// ループ終了
			endwhile;


		// ここから記事が見つからなかった場合の処理
		else :  ?>

			<div class="post">

				<h2>記事はありません</h2>
				<p>お探しの記事は見つかりませんでした。</p>

			</div>

	<?php
		// if 文終了
		endif; ?>

	<?php
		/**
		 * ページャーを表示する
		 */
		if ( $wp_query->max_num_pages > 1 ) : ?>

			<div class="posts-navigation">
				<div class="nav-next"><?php previous_posts_link( '&laquo; NEXT' ); ?></div>
				<div class="nav-previous"><?php next_posts_link( 'PREV &raquo;' ); ?></div>
			</div>

	<?php
		// if 文終了
		endif; ?>

	<?php
		/**
		 * ページャーに the_posts_navigation() を使う場合は下記のコメントアウトを削除して有効化ください。
		 */

		//$args = array(
		//	'prev_text'          => 'PREV &raquo;',
		//	'next_text'          => '&laquo; NEXT',
		//	'screen_reader_text' => 'ページナビゲーション',
		//);

		//the_posts_navigation( $args );
	?>

	<?php
		/**
		 * ページネーション the_posts_pagination() を使う場合はコメントアウトを削除して有効化ください。
		 */

		//$args = array(
		//	'prev_text'          => '&laquo; NEXT',
		//	'next_text'          => 'PREV &raquo;',
		//	'mid_size'			 => 1,
		//	'show_all'			 => false,
		//	'screen_reader_text' => 'ページナビゲーション',
		//);

		//the_posts_pagination( $args );
	?>

</div><!-- /#main -->
<!-- / index.php -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
