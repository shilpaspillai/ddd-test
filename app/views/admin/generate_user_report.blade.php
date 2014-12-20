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
    <th width="400">Signin Time</th>
    <th width="400">Signout Time</th>
    <th width="400">Total</th>
    </tr>
    </thead>
          <?php 
          $hours=0;
          $total=0;
                    if(isset($user_data)){
                          foreach($user_data as $user){
                              if($user->signout == NULL){$time = 0;}
                              else{
                                  $time_signin = strtotime($user->signin);
                                  $time_signout = strtotime($user->signout);
                                  $time = ($time_signout - $time_signin)/60;
                                 $total += $time;
                                 $hours += floor($time/60);
                                }
                    ?>
    <tr><td> <?php 
      if($user->signin != NULL){$signin_date = explode(" ",$user->signin); echo $signin_date[0];}else{echo "---";}
    ?> </td>
        <td>
        <?php if($user->signin != NULL) {$signin_time = explode(" ",$user->signin); echo($signin_time[1]);}else{echo "---" ;}?>
        </td>
        <td>
        <?php if($user->signout != NULL){$signout_time = explode(" ",$user->signout); echo($signout_time[1]);}else{echo "---" ;}?>
        </td>
        <td>
        <?php echo ceil($time); ?>
        </td>
        </tr>
        <?php }}?>
        <tr><td><b>TOTAL</b></td> <td><?php if($hours >= 0)
        {echo " <b>$hours H ".($total-($hours*60))." M</b>";}else{echo "---";}?></td></tr>
        </table>
        <div class="modal-footer">
        </div></div></div></div></div>


