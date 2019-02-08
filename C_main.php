<?php
session_start();

require_once 'constant.php';
require_once 'M_function.php';
require_once 'M_archive.php';

//変数用意
//$phrase = '';
//$phrase_no = 0;
$english = '';
$japanese = '';
$phrase_id = '';
$archive = '';
$archive_result = array();

//DB接続
$link = get_db_connect();

//キャンバス生成
// if (isset($_POST['phrase_no']) === TRUE) {
//   $phrase_no = $_POST["phrase_no"];
//   $phrase = new Archive();
//   $phrase->setphraseno($phrase_no);
//   $english = $phrase->getphrase($link)[0][1];
//   $japanese = $phrase->getphrase($link)[0][2];
// }

//登録・更新・削除
$request_method = get_request_method();
if ($request_method === 'POST'){

  //アーカイブクラスのインスタンス作成
  $archive = new Archive();
  $english = get_post_data('canvas_english');
  $japanese = get_post_data('canvas_japanese');
  $phrase_id = get_post_data('canvas_id');

  //リロードによる二重送信禁止対応
  if (isset($_SESSION['\'' . $english . '\'']) !== TRUE) {
    $_SESSION['\'' . $english . '\''] = 0;
  }

  //登録処理
  if (get_post_data('main_action') === '登録' && $_SESSION['\'' . $english . '\''] === 0) {
    $archive->register($link, $english, $japanese);
    $_SESSION['\'' . $english . '\''] = 1;

  //更新処理
  } elseif (get_post_data('main_action') === '更新') {
    $archive->revise($link, $phrase_id, $english, $japanese);

  //削除処理
  } elseif (get_post_data('main_action') === '削除') {
    $archive->delete($link, $phrase_id);
    $english = "";
    $japanese = "";
  }
}

//アーカイブクラスのインスタンス作成
$archive = new Archive();
$archive_result = $archive->getarchive($link);

//バブルソート
foreach($archive_result as $value ) {
	$to_sort_english[] = $value['english'];
}
array_multisort($to_sort_english, SORT_ASC, $archive_result);

//リストページからの遷移を確認
if (isset($_SESSION['header']) === TRUE){
  if ($_SESSION['header'] === 1) {
    $phrase_id = $archive_result[$_SESSION['index']][0];
    $english = $archive_result[$_SESSION['index']][1];
    $japanese = $archive_result[$_SESSION['index']][2];
    $_SESSION['header'] = 0;
  }
}



include_once 'V_main.php';
