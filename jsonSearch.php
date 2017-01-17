<script src="jquery-1.8.3.min.js" type="text/javascript"></script>
  
<?php

$con = mysql_connect("localhost","root","ithands01");
mysql_select_db("TR_test_db");

$rec = mysql_query("select college_ceeb_id,college_name,state FROM college_ceeb WHERE  type != 'F' ");
$temp=[];
while($row=mysql_fetch_assoc($rec))
{
$temp[]=$row;
}

$state = array_column($temp, 'state');

$uniqueState = array_unique($state);

asort($uniqueState);

$tempJson = json_encode($temp);
?>
<script>
var tmp = <?php echo $tempJson ?>;

function loadCollege(state){

$('#mySelect').find('option').remove();
$.each(tmp, function(k,v){
           if(v.state == state)
             $('#mySelect').append("<option value='"+ v.college_ceeb_id+"'>"+ v.college_name+"</option>");
       });
}
</script>

<select name="state" onchange="loadCollege(this.value)">
<option>Select State</option>
<?php
foreach ($uniqueState as $value) {
  echo "<option value='".$value."'>".$value."</option>";
} ?>
</select>


<select name="mySelect" id="mySelect">
<option>TEST</option>
</select>