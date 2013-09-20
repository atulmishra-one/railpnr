<?php 

//6712133131
$ch = curl_init('http://www.railpnrapi.com/'.$_POST['pnrn']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
curl_setopt($ch, CURLOPT_HEADER, 0);  // DO NOT RETURN HTTP HEADERS
curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
$res= curl_exec($ch);

//header('Content-Type: application/json');
$res = json_decode( $res, true );

if( $res['ok'] == 1 ) :
?>

<table width="100%" class="traind">
	<tr class="header">
    	<td># Train</td>
        <td>Train name</td>
        <td>Train date</td>
        <td>From</td>
        <td>To</td>
        <td>Class</td>
        <td>Chart</td>
    </tr>
    <tr class="trtxt">
    	<td><?php echo $res['tnum'] ?></td>
        <td><?php echo $res['tname'] ?></td>
        <td><?php echo $res['tdate'] ?></td>
        <td><?php echo $res['from'] ?></td>
        <td><?php echo $res['to'] ?></td>
        <td><?php echo $res['class'] ?></td>
        <td><?php echo $res['charted'] ?></td>
    </tr>
</table>
<div class="gap"></div>
<table class="trainpx">
	<tr class="header">
    	<td>Coach</td>
        <td>Berth</td>
        <td>Quota</td>
        <td>Status</td>
    </tr>
  <?php foreach( $res['pax'] as $p ) : ?>
    <tr class="pxtxt">
   		<td><?php echo $p['coach'] ?></td>
        <td><?php echo $p['berth'] ?></td>
        <td><?php echo $p['quota'] ?></td>
        <td><?php echo $p['status'] ?></td>
    </tr>
  <?php endforeach;?>
</table>

<?php else: 
	echo 'Invalid';
 endif; ?>
