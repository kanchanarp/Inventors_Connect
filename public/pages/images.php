<!DOCTYPE html>
<html lang="en">
<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}
if(!isset($_SESSION["User"])){
    header("Location:login.php");
}
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventors Connect</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
	
	<!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="../css/blueimp-gallery.min.css">
	<link rel="stylesheet" href="../css/bootstrap-image-gallery.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Inventors Connect</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Kanchana Ruwanpathirana</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Test message content displayed as notification to the user in the message box...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Kanchana Ruwanpathirana</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Test message content displayed as notification to the user in the message box...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Kanchana Ruwanpathirana</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Test message content displayed as notification to the user in the message box...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../control/logoutControl.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
<li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="notification.php"><i class="fa fa-bell fa-fw"></i> Notifications</a>
                        </li>
                        <li>
                            <a href="messages.php"><i class="fa fa-comments fa-fw"></i> Messages</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Posts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="posts.php">User Posts</a>
                                </li>
                                <li>
                                    <a href="savedPosts.php">Saved Posts</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-open fa-fw"></i> Uploads<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="images.php">Images</a>
                                </li>
                                <li>
                                    <a href="files.php">Files</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="user.php"><i class="fa fa-user fa-fw"></i> User Account</a>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Images</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Upload image
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" enctype="multipart/form-data" method="post" action="#" id="test">
										<div class="form-group">
                                            <label>Upload an image</label>
                                            <input type="file" name="fileUploaded" id="fileUploaded">
                                            <div class="progress progress-striped active" >
                                                <div class="progress-bar" style="width:0%"></div>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" placeholder="Name" name="fname" id="filename">
                                        </div>
										<div class="form-group">
                                            <label>General Permission</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="Public" checked>Public
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="View">View only
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="Restricted">Restricted
                                                </label>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label>Who can view?</label>
                                            <input class="form-control" placeholder="Who can view?" name="viewPerm" id="viewPerm">
                                        </div>
										<div class="form-group">
                                            <label>Who can download?</label>
                                            <input class="form-control" placeholder="Who can download?" name="downPerm" id="downPerm">
                                        </div>
                                        <input type="submit" class="btn btn-default" value="Upload" onclick="uploadFileInv();"  name="submit"/>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                </div>

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<div class="row">
                <div class="col-lg-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i> Your Images
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" id="imageGallery">
						<div id="blueimp-gallery" class="blueimp-gallery" data-use-bootstrap-modal="false">
							<!-- The container for the modal slides -->
							<div class="slides"></div>
							<!-- Controls for the borderless lightbox -->
							<h3 class="title"></h3>
							<a class="prev">‹</a>
							<a class="next">›</a>
							<a class="close">×</a>
							<a class="play-pause"></a>
							<ol class="indicator"></ol>
							<!-- The modal dialog, which will be used to wrap the lightbox content -->
							<div class="modal fade">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" aria-hidden="true">&times;</button>
											<h4 class="modal-title"></h4>
										</div>
										<div class="modal-body next"></div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default pull-left prev">
												<i class="glyphicon glyphicon-chevron-left"></i>
												Previous
											</button>
											<button type="button" class="btn btn-primary next">
												Next
												<i class="glyphicon glyphicon-chevron-right"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="links">
                            <?php
                            include_once "../../controller/imageHandler.class.php";
                            $fileHandler=new imageHandler();
                            $docList=$fileHandler->getImageList($_SESSION["User"]);
                            foreach($docList as $doc){
								echo "<a href='".$doc["Path"]."/".$doc["Filename"]."' title='".$doc["Filename"]."' data-gallery>
									<img src='".$doc["Path"]."/".$doc["Filename"]."' alt='Banana' style='height:100px'>
								</a>";
                            }

                            ?>
						</div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
			</div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>


    <script>


        $(document).on('submit','#test',function(e){
            e.preventDefault();

            $form = $(this);

            uploadFileInv($form);

        });

        function uploadFileInv($form){
            $form.find('.progress-bar').removeClass('progress-bar-success')
                .removeClass('progress-bar-danger');

            var formdata = new FormData($form[0]); //formelement
            formdata.append("fname",document.getElementById("filename").value);
            //formdata.append("description",document.getElementById("description").value);
            var permission =1;
            if(document.getElementById("optionsRadios2").checked){
                permission=2;
            }
            if(document.getElementById("optionsRadios3").checked){
                permission=3;
            }
            formdata.append("permission",permission);
            formdata.append("viewPerm",document.getElementById("viewPerm").value);
            formdata.append("downPerm",document.getElementById("downPerm").value);
            var request = new XMLHttpRequest();

            //progress event...
            request.upload.addEventListener('progress',function(e){
                var percent = Math.round(e.loaded/e.total * 100);
                $form.find('.progress-bar').width(percent+'%').html(percent+'%');
            });

            //progress completed load event
            request.addEventListener('load',function(e){
                $form.find('.progress-bar').addClass('progress-bar-success').html('upload completed....');
                $("#imageGallery").load(location.href + " #imageGallery");
                $form.each(function(){
                    this.reset();
                }
                );
            });

            request.open('post', "../control/imageControl.php");
            request.send(formdata);

            $form.on('click','.cancel',function(){
                request.abort();

                $form.find('.progress-bar')
                    .addClass('progress-bar-danger')
                    .removeClass('progress-bar-success')
                    .html('upload aborted...');
            });

        }

    </script>
<script src="../js/jquery.blueimp-gallery.min.js"></script>
<script src="../js/bootstrap-image-gallery.min.js"></script>
</body>

</html>
