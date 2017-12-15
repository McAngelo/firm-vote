<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vote</title>
</head>

<body>
<table width="600" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td valign="top">Hello <?php echo $this->session->userdata('username') ?></td>
      <td align="right"><a href="<?php echo site_url("login/logout") ?>">Log out</a></td>
    </tr>
    <tr>
      <td width="298" valign="top"><p>Categories</p>
        
            <ul><?php foreach($list as $cate):
	  echo "<li><a href='/index.php/home/index/".$cate->id."'>".$cate->name."</a></li>";
	  endforeach
	  ?></ul>
         </td>
      <td width="290">
      <?php 
		if (isset($error))
		echo $error;
		elseif (isset($error1))
		echo $error1;
		else {
			?>
      <table width="200" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>&nbsp;</td>
        </tr>
        <?php
		foreach($query as $row):?>
        <tr>
          <td><form id="form<?php echo $row->item_id ?>" name="form<?php echo $row->item_id ?>" method="post" action="<?php $url = "home/index/".$row->category; echo site_url($url) ?>">
            <?php echo $row->description ?><br />
            <img src="<?php echo $row->image ?>" width="60" height="60" />&nbsp; <br />
            <?php echo $row->votes ?><br />
            <input type="submit" name="button" id="button" value="Vote" />
            <input name="id" type="hidden" id="id" value="<?php echo $row->item_id ?>" />
            <input name="usr" type="hidden" id="usr" value="<?php echo $this->session->userdata('username') ?>" />
            <input name="cate" type="hidden" id="cate" value="<?php echo $row->category ?>" />
          </form></td>
        </tr>
        <?php endforeach;  ?>
      </table>
      <?php }?></td>
  </tr>
  </table>
</body>
</html>
