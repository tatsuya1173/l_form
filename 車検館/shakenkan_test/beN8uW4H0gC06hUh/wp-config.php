<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'shakenkan_wp_db');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'phiramy');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'ldr13Ne6y$ZZJdJSS');

/** MySQL のホスト名 */
define('DB_HOST', 'localhost');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'jmfgqP}+_Poaxgx~rdS+VI-|ZvGXP[JvyhG(avSAmbG:}A^JwRqF_o/4=;eTUdN)');
define('SECURE_AUTH_KEY',  '[zF<%u? jy?Gu>3h<w2/8`W2>qYJEpB>bTabuID.Gq@D3M8Ov?B22}GP-wElqlS]');
define('LOGGED_IN_KEY',    'eN@1i=ixcIpD5%Vu4UbHgG7,cn-L{~iK{h*n.L<<?DQiCk7q-(+klr%+Tk5da[;/');
define('NONCE_KEY',        ':1q+a=Qm{ns~AFaN2&A:<NOQ{6|,9H2Cbm1p32s^,9Hy-F]k]Z@.%somAPzpm}@h');
define('AUTH_SALT',        ':=.PYD7$LrcG<w6=s_[!7=o5JO@-}kOR &soB7~J!|+H^Ajz/v!Jl0GfA<;=(ER!');
define('SECURE_AUTH_SALT', '=I*`5!5Y&)]Xz*EK6;!=YW3 +?#%hF;a>ii$@HSJZ0I65)##7kz5R#da9T|0_B=J');
define('LOGGED_IN_SALT',   '.IW9NVs2v,8heG<LV4*Pn<yiL]7H*e|1e4FSdwFehBQg-%)q+*tcz^g<y9M6[~Kt');
define('NONCE_SALT',       ']~{E.p:XW0}e<3S.viSx+bRwBBrV{{:#h4<_7YQ/_ffaT6k}dnWm9GuD)> 4BW]2');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
