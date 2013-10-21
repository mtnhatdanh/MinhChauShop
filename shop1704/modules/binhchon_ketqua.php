
<h3 class="heading colr"> KẾT QUẢ BÌNH CHỌN </h3>

<?php 
	$sql='SELECT `id` , `content`
	FROM `nncms_binhchon_cauhoi`
	WHERE `active`=1
	ORDER BY `n_order` ASC';
	$rs=mysql_query($sql);
	while($r=mysql_fetch_assoc($rs))
	{
?>
    <table class="binhchon" width="500" border="1" cellpadding="5">
      <tr>
        <th colspan="2" scope="col"><?php echo $r['content']?></th>
      </tr>
      <?php
            $idPoll=$r['id'];
            $sql2="SELECT `id` , `content`,`vote`
            FROM `nncms_binhchon_luachon`
            WHERE `id_poll` =$idPoll
            ORDER BY `n_order` ASC";
            $rs2=mysql_query($sql2);
			//Tinh tong so luot chon cua tat ca lua chon
			$sum=0;
			while($r2=mysql_fetch_assoc($rs2))$sum=$sum+$r2['vote'];
			
			mysql_data_seek($rs2,0);
            while($r2=mysql_fetch_assoc($rs2))
            {
        ?>
              <tr>
                <td width="240"><?php echo $r2['content']?></td>
                <td width="228" align="left"><div class="bar" style="width:<?php echo round($r2['vote']/$sum*100)?>%"><?php echo $r2['vote']?></div></td>
              </tr>
        <?php
            }
        ?>
    
    </table>
<?php
	}
?>

<!--<script type="text/javascript" src="js/gchart.js"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
		  
		  <?php
		  	mysql_data_seek($rs2,0);
            while($r2=mysql_fetch_assoc($rs2))
            {
		  ?>
          ['<?php echo $r2['content']?>',     <?php echo $r2['vote']?>],
		  <?php
			}
		  ?>
        ]);

        var options = {
          title: 'My Daily Activities',
		  is3D: true,
		  legend:{position: 'bottom', textStyle: {color: 'blue', fontSize: 16},alignment:'start'}
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    <div id="chart_div" style="width: 700px; height: 500px;"></div>

-->