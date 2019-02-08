<!DOCTYPE html>
<html>
  <head>
		<meta charset="utf-8">
		<title>Vocabulibrary</title>
		<link rel="stylesheet" href="reset.css">
		<style>
      ul{
        margin: 10px 40px 40px 40px;
      }
      li{
        border: solid 1px;
        border-bottom: none;
        border-radius: 20px 20px 0px 0px;
        display: inline-block;
        text-align: center;
        font-size: 40px;
        width: 450px;
        padding: 10px;
      }
      a{
          text-decoration:none;
      }
      .colored{
        background-color: #0000FF;
        color: #FFFFFF;
      }

      .container{
        display: flex;
        margin: 10px 40px 0px 45px;
      }

      #main_area{
        width: 75%;
      }
      .title{
        display: inline-block;
        width: 49%;
        font-size: 30px;
      }
      .canvas{
        width: 49%;
        height: 200px;
        font-size: 40px;
      }
      .button{
        width: 150px;
        height: 50px;
        font-size: 30px;
        margin-top: 20px;
      }
      .left{
        margin-left: 550px;
      }

      #side_area{
        width: 20%;
      }
      .list{
        margin: 0px 0px 0px 15px;
      }
      .search{
        vertical-align: top;
        margin: 0px 0px 10px 15px;
      }
      .archive_english{
        font-size: 20px;
        margin: 0px 0px 10px 15px;
      }

    </style>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="V_main.js"></script>
<script>
  function onClicked() {
    var msg = $("#canvas_english").attr("value");
    msg = new SpeechSynthesisUtterance(msg);
    window.speechSynthesis.speak(msg);
  }
</script>

  </head>
  <body>
    <ul class="category">
      <li class="colored">メイン</li>
      <li><a href="C_list.php">リスト</a></li>
      <li><a href="C_test.php">テスト</a></li>
    </ul>
    <div class="container">
      <div id="main_area">
        <p class="title english">英語</p>
        <p class="title japanese">日本語</p>
        <form method="post">
          <input type="text" class="canvas english" id="canvas_english" name="canvas_english" value="<?php if (isset($english) === TRUE) { print $english; } ?>">
          <input type="text" class="canvas japanese" id="canvas_japanese" name="canvas_japanese" value="<?php if (isset($japanese) === TRUE) { print $japanese; } ?>">
          <input type="text" class="canvas" id="canvas_id" name="canvas_id" value="<?php if (isset($phrase_id) === TRUE) { print $phrase_id; } ?>" hidden>
<button onclick="onClicked()" id="speech">発音</button>
          <input type="submit" class="button left" name="main_action" value="登録">
          <input type="submit" class="button" name="main_action" value="更新">
          <input type="submit" class="button" name="main_action" value="削除">
        </form>
      </div>
      <div id="side_area">
        <p class="title list">一覧</p>
        <form class="search" method="post">
          <input type="search" name="search" placeholder="キーワードを入力">
          <input type="submit" name="submit" value="検索">
        </form>
        <?php for ($i=0; $i<count($archive_result); $i++) { ?>
        <p class="archive_english" id="<?php print 'english' . $archive_result[$i][0]; ?>"><?php print htmlspecial($archive_result[$i][1]); ?></p>
        <p class="archive_japanese" id="<?php print 'japanese' . $archive_result[$i][0]; ?>" hidden><?php print htmlspecial($archive_result[$i][2]); ?></p>
        <?php } $i++; ?>
      </div>

    </div>
  </body>
</html>
