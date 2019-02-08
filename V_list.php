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
        width: 447px;
        padding: 10px;
      }
      a{
          text-decoration:none;
      }
      .colored{
        background-color: #0000FF;
        color: #FFFFFF;
      }

      table{
        margin: 40px;
      }
      td{
        width: 500px;
        height: 50px;
        font-size: 30px;
        vertical-align: middle;
        border: solid 1px;
        padding: 10px;
      }
      td:last-child{
        width: 360px;
      }
      .button{
        width: 150px;
        height: 50px;
        font-size: 30px;
        margin-top: 20px 0px 0px 20px;
      }

    </style>
  </head>
  <body>
    <ul class="category">
      <li><a href="C_main.php">メイン</a></li>
      <li class="colored">リスト</li>
      <li><a href="C_test.php">テスト</a></li>
    </ul>
    <table>
      <?php for ($i=0; $i<count($archive_result); $i++) { ?>
      <form method="post">
        <tr>
          <td class="archive_english" id="<?php print 'english' . $archive_result[$i][0]; ?>"><?php print htmlspecial($archive_result[$i][1]); ?></td>
          <td class="archive_japanese" id="<?php print 'japanese' . $archive_result[$i][0]; ?>"><?php print htmlspecial($archive_result[$i][2]); ?></td>
          <td><input type="submit" class="button" id="<?php print $archive_result[$i][0]; ?>" name="main_action" value="更新">
            <input type="submit" class="button" id="<?php print $archive_result[$i][0]; ?>" name="main_action" value="削除">
            <input type="hidden" name="index" value="<?php print $i; ?>">
            <input type="hidden" name="archive_no" value="<?php print $archive_result[$i][0]; ?>"></td>
        <tr>
      </form>
      <?php } $i++; ?>

    </table>

  </body>
</html>
