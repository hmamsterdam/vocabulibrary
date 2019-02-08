<?php
session_start();

require_once 'constant.php';
require_once 'M_function.php';

//変数用意
$eiwa = '';
$english = '';
$japanese = '';
$no = 0;
$e_display = 0;
$j_display = 0;

//セッション管理
//和訳か英訳か
if (isset($_SESSION['eiwa']) !== TRUE) {
  $_SESSION['eiwa'] = 'wayaku';
  $eiwa = $_SESSION['eiwa'];
}
//前の設問を記憶
if (isset($_SESSION['pre_no']) !== TRUE) {
  $_SESSION['pre_no'] = 0;
}

//DB接続
$link = get_db_connect();

//テスト
$request_method = get_request_method();
if ($request_method === 'POST'){

  //英訳・和訳を設定
  if (get_post_data('change') === '和訳 ⇔ 英訳') {
    if ($_SESSION['eiwa'] === 'wayaku') {
      $_SESSION['eiwa'] = 'eiyaku';
      $eiwa = $_SESSION['eiwa'];
    } else {
      $_SESSION['eiwa'] = 'wayaku';
      $eiwa = $_SESSION['eiwa'];
    }
  }

  //問題
  if (get_post_data('test_action') === '問題') {
    $archive = new Archive();
    $archive_result = $archive->getarchive($link);
    //乱数用意
    while ($no === $_SESSION['pre_no']) {
      $no = mt_rand(0, count($archive_result)-1);
    }
    //設問作成
    $english = $archive_result[$no][1];
    $japanese = $archive_result[$no][2];
    $_SESSION['english'] = $english;
    $_SESSION['japanese'] = $japanese;
    //表示設定
    if ($_SESSION['eiwa'] === 'wayaku') {
      $e_display = 1;
    } else {
      $j_display = 1;
    }
    $_SESSION['pre_no'] = $no;
    $eiwa = $_SESSION['eiwa'];
  }

  //確認
  if (get_post_data('test_action') === '確認') {
    $english = $_SESSION['english'];
    $japanese = $_SESSION['japanese'];
    $e_display = 1;
    $j_display = 1;
    $eiwa = $_SESSION['eiwa'];
  }

}



include_once 'V_test.php';
