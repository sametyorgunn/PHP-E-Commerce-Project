<?php include_once("include/baglan.php"); ?>
<?php $listIl = $db->query("SELECT * FROM ilce "); ?>
<?php foreach ($listIl as $list) { ?>

	 <?php $sql=$db->q("SELECT id,ilce_adi FROM ilce  WHERE il_id = '$_POST[country_id]'");
            while($row=$db->fassoc($sql)){ ?>  ?>
	<option value="<?php echo $row['id']; ?>"><?php echo $row['ilce_adi']; ?></option>
<?php } ?>