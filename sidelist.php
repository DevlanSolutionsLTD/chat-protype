<?php
           
            include('config.php');
            //get all users
            $user_id =$_SESSION['user_id'];
            $stmt = $conn->prepare("SELECT * FROM user WHERE user_id !=?");
            $stmt->bind_param('s', $user_id);
            $stmt->execute();
            $res = $stmt->get_result();
            while ($row = $res->fetch_object()) {
                $other_user=$row->user_id;
                //count new messages
            $ret = "SELECT COUNT(*) FROM  chat WHERE chat_sender = '$other_user' AND chat_receiver='$user_id' AND  chat_status='1'";
            $stmt = $conn->prepare($ret);
            $stmt->execute();
            $stmt->bind_result($msgs);
            $stmt->fetch();
            $stmt->close();
             if ($msgs) {
                 $msgs='Your have'.$msgs.' unread messages';
                }else{
                    $msgs='';
                }
						$user_status = 'active';						
						if($row->user_status) {
							echo'  <div class="list-group list-group-flush">
              <a href='.'chat_forum.php?chat='.$row->user_id.' class="list-group-item" data-touserid="'.$row->user_id.'" data-tousername="'.$row->user_fname.'" >
                <div class="media">
                  <img alt="Image" src="img/'.$row->user_image.'" class="img-fluid rounded-circle m-0" width="48" height="48" />
                  <div class="media-body d-none d-lg-block ml-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h6 class="mb-0">'.$row->user_fname.''.$row->user_mname.' '.$row->user_lname.'</h6>
                      <div>
                        <small class="text-muted">'.$user_status.'</small>
                      </div>
                    </div>
                        <span class="text-muted text-small col-11 p-0  d-block"><p class="name"><span id="unread_" class="unread"><span class="badge badge-info">' . 
                            $msgs
                        .'</span></p></span>
                    
                        <p class="preview"><span id="isTyping_'.$row->user_id.'" class="isTyping"></span></p> 
                    
                   
                  </div>
                </div>
              </a>
              </div>';
                    } }
              ?>
            </div>
                  