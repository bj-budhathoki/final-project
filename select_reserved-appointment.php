<?php include 'core/init.php';

if(isset($_GET['hospital']))
{
     $h_id=$_GET['hospital'];
    echo  $today_date= date("Y-m-d");
     $appoitment=mysqli_query($conn,"SELECT * FROM  tbl_appointment WHERE hospital_id='$h_id' AND  book_date='$today_date'  AND appointment_status='Approved' ORDER BY arrival_time ASC ");
    if($appoitment)
    {
      $appoitment1=mysqli_query($conn,"SELECT * FROM  tbl_appointment WHERE hospital_id='$h_id' AND  book_date='$today_date'  AND appointment_status='Approved' ORDER BY deadline ASC ");
     $sn=1;
     
     }
    $hospital=mysqli_query($conn,"SELECT * FROM tbl_hospitals WHERE h_id='$h_id'");
   $fetch_hospital=mysqli_fetch_array($hospital);
 
?>

  <h4 class="text-center"><u>Today's appointment for <?php echo $fetch_hospital['h_name']; ?></u></h4>
  <hr/>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>S.N</th>
          <th>patient name</th>
          <th>Arrival time</th>
          <th>Deadline</th>
          <th>Doctor name</th>
          <th>Book_date</th>
          <th>pendding</th>
        </tr>
      </thead>
      <tbody>

        <?php while( $result=mysqli_fetch_array($appoitment1))
        {
          $d_id=$result['doctor_id'];
          $sel_doc=mysqli_query($conn,"SELECT d_name FROM tbl_doctors WHERE d_id='$d_id' ");
         $res_doc=mysqli_fetch_array($sel_doc);
        ?>
            <tr>
              <td><?=$sn++;?></td>
              <td><?=$result['p_name'];?></td>
              <td><?=$result['arrival_time'];?></td>
              <td><?=$result['deadline'];?></td>
               <td><?=$res_doc['d_name'];?></td>
               <td><?=$result['book_date'];?></td>
               <td><?=$result['appointment_status'];?></td>
            </tr>
          <?php 
          }; ?>
      </tbody>
    </table>
      
    <?php 
    }
           else{
        echo "something wrong";
    }
    ?>
    
 