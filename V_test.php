<!DOCTYPE html>
<html>
  <head>
		<meta charset="utf-8">
		<title>Vocabulibrary</title>
		<link rel="stylesheet" href="reset.css">
		<style>
      ul{
        margin: 10px 40px;
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

      #main_area{
        margin: 10px 40px 0px 45px;
        width: 75%;
      }
      .change{
        width: 200px;
        height: 50px;
        font-size: 30px;
        margin: 20px 0px;
      }
      .waei{
        display: inline-block;
        vertical-align: middle;
        font-size: 30px;
        margin-left: 20px;
      }
      .title{
        display: inline-block;
        width: 49%;
        font-size: 30px;
        margin-top: 20px;
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
        margin: 20px 0px;
      }
      .left{
        margin-left: 820px;
      }

    </style>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>

    </script>
  </head>
  <body>
    <ul class="category">
      <li><a href="C_main.php">メイン</a></li>
      <li><a href="C_list.php">リスト</a></li>
      <li class="colored">テスト</li>
    </ul>
    <div id="main_area">
      <form method="post">
        <input type="submit" class="change" name="change" value="和訳 ⇔ 英訳">
        <p class="waei"><?php if ($eiwa === "wayaku") { print "和訳してください"; } else { print "英訳してください"; } ?></p>
      </form>
      <p class="title english">英語</p>
      <p class="title japanese">日本語</p>
      <form method="post">
        <input type="text" class="canvas english" id="canvas_english" name="canvas_english" value="<?php if ($e_display === 1) { print $english; } ?>">
        <input type="text" class="canvas japanese" id="canvas_japanese" name="canvas_japanese" value="<?php if ($j_display === 1) { print $japanese; } ?>">

        <input type="submit" class="button left" name="test_action" value="問題">
        <input type="submit" class="button" name="test_action" value="確認">
      </form>
    </div>
  </body>
</html>
