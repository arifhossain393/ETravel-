                        
                    <?php include 'inc/header.php'; ?>

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Inbox Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1><i class="gi gi-envelope"></i> Inbox<br><small>Your Message Center</small></h1>
                            </div>
                        </div>
                        <!-- Inbox Content -->
                        <div class="row">
                            <!-- Inbox Menu -->
                            <div class="col-sm-4 col-lg-3">
                                <!-- Menu Block -->
                                <div class="block full">
                                    
                                    <!-- Menu Content -->
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="active">
                                            <a href="inbox.php">
                                                <i class="fa fa-angle-right fa-fw"></i> <strong>Inbox</strong>
                                            </a>
                                        </li>
                                        
                                        <li>
                                            <a href="sendmessage.php">
                                                <i class="fa fa-angle-right fa-fw"></i> <strong>Sent</strong>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                    <!-- END Menu Content -->
                                </div>
                                <!-- END Menu Block -->

                            </div>
                            <!-- END Inbox Menu -->

                            <!-- Messages List -->
                            <div class="col-sm-8 col-lg-9">
                                <!-- Messages List Block -->
                                <div class="block">

                                    <?php 
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                            
                                        $to = mysqli_real_escape_string($db->link, $_POST['toemail']);
                                        $from = mysqli_real_escape_string($db->link, $_POST['fromemail']);
                                        $subject = mysqli_real_escape_string($db->link, $_POST['subject']);
                                        $sendmsg = mysqli_real_escape_string($db->link, $_POST['sendmsg']);
                                        
                                       $sendemail = mail($to, $subject, $sendmsg, $from);

                                       if ($sendemail) {
                                           echo "<span style='color:green;'>Your Mail send Successfully</span>";
                                       }else {
                                           echo "<span style='color:red;'>Mail not send</span>";
                                       }
                                    }

                                ?>  
                                    <!-- END Messages List Title -->
                                <form action="" method="post">
                                    <!-- Messages List Content -->
                                    <div class="table-responsive">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="toemail">To</label>
                                            <div class="col-md-9">
                                                <input id="toemail" name="toemail" class="form-control" placeholder="Email" type="email">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="fromemail">From</label>
                                            <div class="col-md-9">
                                                <input id="fromemail" name="fromemail" class="form-control" placeholder="Email" type="email">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="subject">Subject</label>
                                            <div class="col-md-9">
                                                <input id="subject" name="subject" class="form-control" placeholder="Enter Your Subject" type="email">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="sendmsg">Message</label>
                                            <div class="col-md-9">
                                                <textarea id="sendmsg" name="sendmsg" class="ckeditor"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-md-offset-3">
                                            <button type="submit" name="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Sent</button>
                                        </div>
                                           
                                    </div>
                                </form>
                                    <!-- END Messages List Content -->
                                </div>
                                <!-- END Messages List Block -->
                            </div>
                            <!-- END Messages List -->
                        </div>
                        <!-- END Inbox Content -->
                    </div>
                    <!-- END Page Content -->

                    <!-- END Page Content -->

                   <?php include 'inc/footer.php'; ?>