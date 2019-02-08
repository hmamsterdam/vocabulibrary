<?php

class Archive{
  private $phrase;
//  private $phrase_no;

  //コンストラクタ
  public function __construct(){

  }

  //フレーズ番号を設定
  // public function setphraseno($phrase_no){
  //   $this->phrase_no = $phrase_no;
  // }

  //一文選択
  // public function getphrase($link){
  //   $sql = "SELECT * FROM phrase where phrase_id = " . $this->phrase_no;
  //   $phrase = sql_select($link, $sql);
  //   return $phrase;
  // }

  //一覧取得
  public function getarchive($link){
    $sql = 'SELECT * FROM phrase';
    $phrase = sql_select($link, $sql);
    return $phrase;
  }

  //登録
  public function register($link, $english, $japanese){
    $sql = 'INSERT INTO phrase(english, japanese) VALUES("' . $english . '", "' . $japanese . '")';
    $phrase = sql_update($link, $sql);
  }

  //更新
  public function revise($link, $id, $english, $japanese){
    $sql = 'UPDATE phrase SET english = "' . $english . '", japanese = "' . $japanese . '" where phrase_id = ' . $id;
    $phrase = sql_update($link, $sql);
  }

  //削除
  public function delete($link, $id){
    $sql = 'DELETE from phrase where phrase_id = ' . $id;
    $phrase = sql_update($link, $sql);
  }

  //表示
  // public function showphrase(){
  //   return $this->data->getphrase($phrase_no);
  // }

}

?>
