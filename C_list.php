<?php
session_start();

require_once 'constant.php';
require_once 'M_function.php';
require_once 'M_archive.php';

//変数用意
//$phrase = '';
//$phrase_no = 0;
$archive_no = '';
$archive = '';
$archive_result = array();

//DB接続
$link = get_db_connect();

//登録・更新・削除
$request_method = get_request_method();
if ($request_method === 'POST'){

  //アーカイブクラスのインスタンス作成
  $archive = new Archive();

  //更新処理
  if (get_post_data('main_action') === '更新') {
    $_SESSION['index'] = get_post_data('index');
    $_SESSION['header'] = 1;
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI']).'/C_main.php');

  //削除処理
  } elseif (get_post_data('main_action') === '削除') {
    $archive_no = get_post_data('archive_no');
    $archive->delete($link, $archive_no);
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



include_once 'V_list.php';
