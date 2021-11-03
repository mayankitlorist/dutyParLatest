<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<table id="customers">
  <tr>
  	<th>Candidate Id</th>
    <th>Name</th>
	<th>Batch_name</th>
	<th>Intime</th>
	<th>Outtime</th>
	<th>Date</th>
  </tr>
   <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php 

    $date1 = $userss->intime;
    $time =(date("H:i:s",strtotime($date1)));

    $date2 = $userss->outtime;
    $time2 =(date("H:i:s",strtotime($date2)));

    $date21 = $userss->intime;
    $datenew =(date("Y-m-d",strtotime($date21)));
?>
<tr>
	<td><?php echo e($userss->uid); ?> </td>
    <td><?php echo e($userss->name); ?> </td>
    <td>
    	<?php if(!empty($userss->batch_name) ): ?>
		<?php echo e($userss->batch_name); ?>

		<?php else: ?>
		-
		<?php endif; ?>
     </td>
    <td> <?php echo e($time); ?> </td>
     <td>
    <?php if(!empty($date2) ): ?>
		<?php echo e($time2); ?>

		<?php else: ?>
		-
		<?php endif; ?> </td>
    <td><?php echo e($datenew); ?> </td>

      </tr>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
</table>

</body>
</html>








<?php /**PATH /home/azureuser/dutyParLatest/resources/views/admin/attendenceDetail/pdf.blade.php ENDPATH**/ ?>