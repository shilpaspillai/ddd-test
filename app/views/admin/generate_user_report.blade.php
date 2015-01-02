<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h2 class="modal-title" id="myModalLabel" align="center">Report</h2>
            <div class="modal-body">
                <p><b>Username ::</b>  <?php if(isset($user_detail))
                echo $user_detail->username ;
                echo  "<br> <b>Date ::".DATE('d M y');?> </b></p>
    <table  class="table table-striped">
    <thead>
    <tr>
     <th width="400">Date</th>
     <th width="400"> Working Hours </th>
    </tr>
    </thead>
       <?php 
           $total = 0;
           $hours =0;
           $time=0;
       if(isset($user_data)){
                        foreach($user_data as $user){
          ?>
    
        <td width="400">
          <?php echo $user->dw;?>
        </td>
        <td width="400">
            <?php 
             $time=($user->timewrked);
             $total += $time/60;
             $current_date_wkng_time =floor(($user->timewrked)/(60));
             $hours += floor($time/(60*60));
            echo  $current_date_wkng_time." M";?>
        </td>
        </tr>
        <?php }}?>
        <tr> <th width="400">Total working Hours </th><td><?php if($hours >= 0){echo $hours." H ";echo ($total-($hours*60))." M ";}else{echo "----" ;}?></td></tr>
        </table>
        <div class="modal-footer">
        </div></div></div></div></div>


