<?php
require_once './MovieService.php';
$ms = new MovieService();
$rs = $ms->categories();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Movie Upload</title>

        <!-- Bootstrap framework -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.em.css" />
        <!-- jQuery UI theme -->
        <link rel="stylesheet" href="lib/jquery-ui/css/Aristo/Aristo.css" />
        <!-- tooltips-->
        <link rel="stylesheet" href="lib/jBreadcrumbs/css/BreadCrumb.css" />
        <!-- tooltips-->
        <link rel="stylesheet" href="lib/qtip2/jquery.qtip.min.css" />
        <!-- colorbox -->
        <link rel="stylesheet" href="lib/colorbox/colorbox.css" />
        <!-- code prettify -->
        <link rel="stylesheet" href="lib/google-code-prettify/prettify.css" />    
        <!-- sticky notifications -->
        <link rel="stylesheet" href="lib/sticky/sticky.css" />    
        <!-- aditional icons -->
        <link rel="stylesheet" href="img/splashy/splashy.css" />
        <!-- flags -->
        <link rel="stylesheet" href="img/flags/flags.css" />	
        <!-- datatables -->
        <link rel="stylesheet" href="lib/datatables/extras/TableTools/media/css/TableTools.css">


        <!-- main styles -->
        <link rel="stylesheet" href="css/style.css" />
        <!-- theme color-->
        <link rel="stylesheet" href="css/blue.css" id="link_theme" />	

        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>

        <!-- favicon -->
        <link rel="shortcut icon" href="favicon.ico" />

        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/ie.css" />
        <![endif]-->

        <!--[if lt IE 9]>
                        <script src="js/ie/html5.js"></script>
                        <script src="js/ie/respond.min.js"></script>
                        <script src="lib/flot/excanvas.min.js"></script>
        <![endif]-->
        <!----nipon--css--stype-->
        <link rel="stylesheet" href="css/stock.css">

        <script>
            function validateForm() {
                var x = document.uploadForm.title.value
                if (x == null || x == "") {
                    alert("First name must be filled out");
                    return false;
                }
            }
        </script>

    </head>
    <body class="full_width">
        <div class="style_switcher">
            <div class="sepH_c">
                <p>Colors:</p>
                <div class="clearfix">
                    <a href="javascript:void(0)" class="style_item jQclr blue_theme style_active" title="blue">blue</a>
                    <a href="javascript:void(0)" class="style_item jQclr dark_theme" title="dark">dark</a>
                    <a href="javascript:void(0)" class="style_item jQclr green_theme" title="green">green</a>
                    <a href="javascript:void(0)" class="style_item jQclr brown_theme" title="brown">brown</a>
                    <a href="javascript:void(0)" class="style_item jQclr eastern_blue_theme" title="eastern_blue">eastern blue</a>
                    <a href="javascript:void(0)" class="style_item jQclr tamarillo_theme" title="tamarillo">tamarillo</a>
                </div>
            </div>
            <div class="sepH_c">
                <p>Backgrounds:</p>
                <div class="clearfix">
                    <span class="style_item jQptrn style_active ptrn_def" title=""></span>
                    <span class="ssw_ptrn_a style_item jQptrn" title="ptrn_a"></span>
                    <span class="ssw_ptrn_b style_item jQptrn" title="ptrn_b"></span>
                    <span class="ssw_ptrn_c style_item jQptrn" title="ptrn_c"></span>
                    <span class="ssw_ptrn_d style_item jQptrn" title="ptrn_d"></span>
                    <span class="ssw_ptrn_e style_item jQptrn" title="ptrn_e"></span>
                </div>
            </div>
            <div class="sepH_c">
                <p>Layout:</p>
                <div class="clearfix">
                    <label class="radio-inline"><input name="ssw_layout" id="ssw_layout_fluid" value="" checked="" type="radio"> Fluid</label>
                    <label class="radio-inline"><input name="ssw_layout" id="ssw_layout_fixed" value="gebo-fixed" type="radio"> Fixed</label>
                </div>
            </div>
            <div class="sepH_c">
                <p>Sidebar position:</p>
                <div class="clearfix">
                    <label class="radio-inline"><input name="ssw_sidebar" id="ssw_sidebar_left" value="" checked="" type="radio"> Left</label>
                    <label class="radio-inline"><input name="ssw_sidebar" id="ssw_sidebar_right" value="sidebar_right" type="radio"> Right</label>
                </div>
            </div>
            <div class="sepH_c">
                <p>Show top menu on:</p>
                <div class="clearfix">
                    <label class="radio-inline"><input name="ssw_menu" id="ssw_menu_click" value="" checked="" type="radio"> Click</label>
                    <label class="radio-inline"><input name="ssw_menu" id="ssw_menu_hover" value="menu_hover" type="radio"> Hover</label>
                </div>
            </div>

            <div class="gh_button-group">
                <a href="#" id="showCss" class="btn btn-primary btn-sm">Show CSS</a>
                <a href="#" id="resetDefault" class="btn btn-default btn-sm">Reset</a>
            </div>
            <div class="hide">
                <ul id="ssw_styles">
                    <li class="small ssw_mbColor sepH_a" style="display:none">body {<span class="ssw_mColor sepH_a" style="display:none"> color: #<span></span>;</span> <span class="ssw_bColor" style="display:none">background-color: #<span></span> </span>}</li>
                    <li class="small ssw_lColor sepH_a" style="display:none">a { color: #<span></span> }</li>
                </ul>
            </div>
        </div>

        <div id="maincontainer" class="clearfix">
            <header>
                <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                    <div class="navbar-inner">
                        <div class="container">

                            <a class="brand pull-left" href="dashboard.html">Movie Upload</a>

                            <ul class="nav navbar-nav user_menu pull-right">
                                <!--                                <li class="hidden-phone hidden-tablet">
                                                                    <div class="nb_boxes clearfix">
                                                                        <a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" title="New messages">25 <i class="splashy-mail_light"></i></a>
                                                                        <a data-toggle="modal" data-backdrop="static" href="#myTasks" class="label ttip_b" title="New tasks">10 <i class="splashy-calendar_week"></i></a>
                                                                    </div>
                                                                </li>-->
                                <!--<li class="divider-vertical hidden-sm hidden-xs"></li>-->
                                <!--                                <li class="dropdown">
                                                                    <a href="#" class="dropdown-toggle nav_condensed" data-toggle="dropdown"><i class="flag-th"></i> <b class="caret"></b></a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a href="javascript:void(0)"><i class="flag-us"></i> English </a></li>
                                                                        <li><a href="javascript:void(0)"><i class="flag-th"></i> Thai </a></li>
                                                                    </ul>
                                                                </li>-->
                                <!--<li class="divider-vertical hidden-sm hidden-xs"></li>-->
                                <!--                                <li class="dropdown">
                                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/user_avatar.png" alt="" class="user_avatar">admin <b class="caret"></b></a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a href=".html">My Profile</a></li>
                                                                        <li><a href="javascrip:void(0)">Another action</a></li>
                                                                        <li class="divider"></li>
                                                                        <li><a href="login.html">Log Out</a></li>
                                                                    </ul>
                                                                </li>-->
                                <!--</ul>-->

                                <li class="divider-vertical hidden-sm hidden-xs"></li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-list-alt"></span> List <b></b></a>
                                </li>
                                </li

                        </div>
                    </div>
                </nav>

                <div class="modal fade" id="myMail">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title">New Messages</h3>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-info">In this table jquery plugin turns a table row into a clickable link.</div>
                                <table class="table table-condensed table-striped" data-provides="rowlink">
                                    <thead>
                                        <tr>
                                            <th>Sender</th>
                                            <th>Subject</th>
                                            <th>Date</th>
                                            <th>Size</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Declan Pamphlett</td>
                                            <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                                            <td>23/05/2012</td>
                                            <td>25KB</td>
                                        </tr>
                                        <tr>
                                            <td>Erin Church</td>
                                            <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                                            <td>24/05/2012</td>
                                            <td>15KB</td>
                                        </tr>
                                        <tr>
                                            <td>Koby Auld</td>
                                            <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                                            <td>25/05/2012</td>
                                            <td>28KB</td>
                                        </tr>
                                        <tr>
                                            <td>Anthony Pound</td>
                                            <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                                            <td>25/05/2012</td>
                                            <td>33KB</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default">Go to mailbox</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="myTasks">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title">New Tasks</h3>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-info">In this table jquery plugin turns a table row into a clickable link.</div>
                                <table class="table table-condensed table-striped" data-provides="rowlink">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Summary</th>
                                            <th>Updated</th>
                                            <th>Priority</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>P-23</td>
                                            <td><a href="javascript:void(0)">Admin should not break if URL…</a></td>
                                            <td>23/05/2012</td>
                                            <td><span class="label label-danger">High</span></td>
                                            <td>Open</td>
                                        </tr>
                                        <tr>
                                            <td>P-18</td>
                                            <td><a href="javascript:void(0)">Displaying submenus in custom…</a></td>
                                            <td>22/05/2012</td>
                                            <td><span class="label label-warning">Medium</span></td>
                                            <td>Reopen</td>
                                        </tr>
                                        <tr>
                                            <td>P-25</td>
                                            <td><a href="javascript:void(0)">Featured image on post types…</a></td>
                                            <td>22/05/2012</td>
                                            <td><span class="label label-success">Low</span></td>
                                            <td>Updated</td>
                                        </tr>
                                        <tr>
                                            <td>P-10</td>
                                            <td><a href="javascript:void(0)">Multiple feed fixes and…</a></td>
                                            <td>17/05/2012</td>
                                            <td><span class="label label-warning">Medium</span></td>
                                            <td>Open</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default">Go to task manager</button>
                            </div>
                        </div>
                    </div>
                </div>

            </header>


            <div id="contentwrapper">
                <div class="main_content">

                    <div class="col-sm-12 col-md-12 ">
                        <!--Blank-->
                        <!--Data-Table-Admin-->

                        <div class="row">
                            <form name="uploadForm" action="uploader.php" method="post" enctype="multipart/form-data">
                                <div class="col-sm-10 col-md-10">
                                    <h3 class="heading"><b>Upload</b></h3>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="col-md-12" style=""> 
                                                        <label class="col-sm-2 control-label" style="margin-top: 1% ; margin-right: -5%" id="" >
                                                            Category<span class="f_req">*</span>
                                                        </label>     
                                                        <div class="col-md-8"> 
                                                            <select name="category" class="form-control" style="width: auto; height: auto ; margin-top: 1% ; margin-right: -5%">
                                                                <?php
                                                                foreach ($rs as $value) {
                                                                    echo '<option value=' . $value->id . '>' . $value->name . '</option>';
                                                                }
                                                                ?>                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="col-md-12" style=""> 
                                                        <label class="col-sm-2 control-label" style="margin-top: 1% ; margin-right: -5%" id="" >
                                                            Title<span class="f_req">*</span>
                                                        </label>     
                                                        <div class="col-md-8"> 
                                                            <input name="title" id="w_name" class="form-control" type="text" placeholder ="Title">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="col-md-12" style=""> 
                                                        <label class="col-sm-2 control-label" style="margin-top: 1% ; margin-right: -5%" id="" >
                                                            Thumbnail<span class="f_req">*</span>
                                                        </label>     
                                                        <div class="col-md-8"> 
                                                            <input name="cover" id="w_name" class="form-control" type="file" placeholder ="Picture">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="col-md-12" style=""> 
                                                        <label class="col-sm-2 control-label" style="margin-top: 1% ; margin-right: -5%" id="" >
                                                            Descriptions<span class="f_req">*</span>
                                                        </label>     

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: -4% ; margin-right: 2%">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="col-md-8" style=""> 
                                                        <textarea name="desc" id="wg_message" cols="10" rows="6" class="form-control auto_expand" style="overflow: hidden; word-wrap: break-word; max-height: 134px; min-height: 134px; height: 134px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="col-md-12" style=""> 
                                                        <label class="col-sm-2 control-label" style="margin-top: 1% ; margin-right: -5%" id="" >
                                                            Video Link<span class="f_req">*</span>
                                                        </label>     

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: -4% ; margin-right: 2%">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="col-md-8" style=""> 
                                                        <textarea name="videoLink" id="wg_message" cols="10" rows="6" class="form-control auto_expand" style="overflow: hidden; word-wrap: break-word; max-height: 134px; min-height: 134px; height: 134px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12"> 
                                                    <div class="col-md-offset-7 col-md-2" style="margin-left: 65%"> 
                                                        <input type="submit" Value="Upload" class="btn btn-gebo btn-default btn-sm">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!----Data-Table-Admin-End--->











                        </div>

                    </div>                
                </div>
            </div>

            <!--        <div class="sidebar">
            
                        <div class="sidebar_inner_scroll">
                            <div class="sidebar_inner">
                                <form action="search_page.html" class="input-group input-group-sm" method="post">
                                    <input autocomplete="off" name="query" class="search_query form-control input-sm" size="16" placeholder="Search..." type="text">
                                    <span class="input-group-btn"><button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button></span>
                                </form>
                                <div id="side_accordion" class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <a href="#groupOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                <i class="glyphicon glyphicon-folder-close"></i> จำหน่ายสินค้า
                                            </a>
                                        </div>
                                        <div class="accordion-body collapse" id="groupOne">
                                            <div class="panel-body">
                                                <ul class="nav nav-pills nav-stacked">
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">จำหน่ายผลิตภัณฑ์</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">รายการ BOM</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">จำหน่ายชิ้นส่วน</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">เพิ่มรายการจาก CSV</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">แสดงรายการจำหน่าย</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">ยอดการจำหน่าย</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">ยกเลิกการจำหน่าย</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">รายการยกเลิก</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">รายงานประจำเดือน</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">รายงานประจำปี</span></a></li> 
            
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <a href="#groupTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                <i class="glyphicon glyphicon-folder-close"></i> สั่งซื้อสินค้า
                                            </a>
                                        </div>
                                        <div class="accordion-body collapse" id="groupTwo">
                                            <div class="panel-body">
                                                <ul class="nav nav-pills nav-stacked">
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">เพิ่มรายการสั่งซื้อ</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">แสดงรายการสั่งซื้อ</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">ยอดการสั่งซื้อ</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">ยกเลิกการสั่งซื้อ</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">รายการการยกเลิก</span></a></li> 
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <a href="#groupThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                <i class="glyphicon glyphicon-folder-close"></i> คลังสินค้า
                                            </a>
                                        </div>
                                        <div class="accordion-body collapse" id="groupThree">
                                            <div class="panel-body">
                                                <ul class="nav nav-pills nav-stacked">
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">สินค้าขาดสต๊อก</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">รายการสินค้าทั้งหมด</span></a></li> 
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <a href="#groupFour" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                <i class="glyphicon glyphicon-folder-close"></i> ผู้ค้าส่ง
                                            </a>
                                        </div>
                                        <div class="accordion-body collapse" id="groupFour">
                                            <div class="panel-body">
                                                <ul class="nav nav-pills nav-stacked">
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">เพิ่มรายชื่อผู้ค้าส่ง</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">เพิ่มรายชื่อจาก CSV</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">แสดงรายชื่อผู้ค้าส่ง</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">ลบรายชื่อผุ้ค้าส่ง</span></a></li> 
            
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <a href="#groupFive" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                <i class="glyphicon glyphicon-folder-close"></i> ลูกค้า
                                            </a>
                                        </div>
                                        <div class="accordion-body collapse" id="groupFive">
                                            <div class="panel-body">
                                                <ul class="nav nav-pills nav-stacked">
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">เพิ่มรายชื่อลูกค้า</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">เพิ่มรายชื่อจาก CSV</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">แสดงรายชื่อลูกค้า</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">ลบรายชื่อลูกค้า</span></a></li> 
            
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <a href="#groupSix" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                <i class="glyphicon glyphicon-folder-close"></i> สินค้า
                                            </a>
                                        </div>
                                        <div class="accordion-body collapse" id="groupSix">
                                            <div class="panel-body">
                                                <ul class="nav nav-pills nav-stacked">
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">เพิ่มรายการ</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">เพิ่มรายการจาก CSV</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">แสดงรายการ</span></a></li> 
                                                    <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-close" style="margin-left: 0px"></i><span style="margin-left: 5px">ลบรายการสินค้า</span></a></li> 
            
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <a href="#groupSeven" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                <i class="glyphicon glyphicon-th"></i> เครื่องคิดเลข
                                            </a>
                                        </div>
                                        <div class="accordion-body collapse" id="groupSeven">
                                            <div class="panel-body">
                                                <form name="Calc" id="calc">
                                                    <div class="formSep input-group input-group-sm">
                                                        <input class="form-control" name="Input" type="text"/>
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-default" name="clear" value="c" onclick="Calc.Input.value = ''">
                                                                <i class="glyphicon glyphicon-remove"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="btn form-control btn-default input-sm" name="seven" value="7" onclick="Calc.Input.value += '7'" type="button">
                                                        <input class="btn form-control btn-default input-sm" name="eight" value="8" onclick="Calc.Input.value += '8'" type="button">
                                                        <input class="btn form-control btn-default input-sm" name="nine" value="9" onclick="Calc.Input.value += '9'" type="button">
                                                        <input class="btn form-control btn-default input-sm" name="div" value="/" onclick="Calc.Input.value += ' / '" type="button">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="btn form-control btn-default input-sm" name="four" value="4" onclick="Calc.Input.value += '4'" type="button">
                                                        <input class="btn form-control btn-default input-sm" name="five" value="5" onclick="Calc.Input.value += '5'" type="button">
                                                        <input class="btn form-control btn-default input-sm" name="six" value="6" onclick="Calc.Input.value += '6'" type="button">
                                                        <input class="btn form-control btn-default input-sm" name="times" value="x" onclick="Calc.Input.value += ' * '" type="button">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="btn form-control btn-default input-sm" name="one" value="1" onclick="Calc.Input.value += '1'" type="button">
                                                        <input class="btn form-control btn-default input-sm" name="two" value="2" onclick="Calc.Input.value += '2'" type="button">
                                                        <input class="btn form-control btn-default input-sm" name="three" value="3" onclick="Calc.Input.value += '3'" type="button">
                                                        <input class="btn form-control btn-default input-sm" name="minus" value="-" onclick="Calc.Input.value += ' - '" type="button">
                                                    </div>
                                                    <div class="formSep form-group">
                                                        <input class="btn form-control btn-default input-sm" name="dot" value="." onclick="Calc.Input.value += '.'" type="button">
                                                        <input class="btn form-control btn-default input-sm" name="zero" value="0" onclick="Calc.Input.value += '0'" type="button">
                                                        <input class="btn form-control btn-default input-sm" name="DoIt" value="=" onclick="Calc.Input.value = Math.round( eval(Calc.Input.value) * 1000)/1000" type="button">
                                                        <input class="btn form-control btn-default input-sm" name="plus" value="+" onclick="Calc.Input.value += ' + '" type="button">
                                                    </div>
                                                    Contributed by <a href="http://themeforest.net/user/maumao">maumao</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <a href="#groupExit" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                <i class="glyphicon glyphicon-cog"></i> ออกจากระบบ
                                            </a>
                                        </div>
                                        <div class="accordion-body collapse in" id="groupExit">
            
                                        </div>
                                    </div>
            
                                </div>
            
                                <div class="push"></div>
                            </div>
            
            
                        </div>
            
                    </div>-->
            <script src="js/jquery.min.js"></script>
            <script src="js/jquery-migrate.min.js"></script>
            <script src="lib/jquery-ui/jquery-ui-1.10.0.custom.min.js"></script>
            <!-- touch events for jquery ui-->
            <script src="js/forms/jquery.ui.touch-punch.min.js"></script>
            <!-- easing plugin -->
            <script src="js/jquery.easing.1.3.min.js"></script>
            <!-- smart resize event -->
            <script src="js/jquery.debouncedresize.min.js"></script>
            <!-- js cookie plugin -->
            <script src="js/jquery_cookie_min.js"></script>
            <!-- main bootstrap js -->
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <!-- bootstrap plugins -->
            <script src="js/bootstrap.plugins.min.js"></script>
            <!-- typeahead -->
            <script src="lib/typeahead/typeahead.min.js"></script>
            <!-- code prettifier -->
            <script src="lib/google-code-prettify/prettify.min.js"></script>
            <!-- sticky messages -->
            <script src="lib/sticky/sticky.min.js"></script>
            <!-- tooltips -->
            <script src="lib/qtip2/jquery.qtip.min.js"></script>
            <!-- lightbox -->
            <script src="lib/colorbox/jquery.colorbox.min.js"></script>
            <!-- jBreadcrumbs -->
            <script src="lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
            <!-- hidden elements width/height -->
            <script src="js/jquery.actual.min.js"></script>
            <!-- custom scrollbar -->
            <script src="lib/slimScroll/jquery.slimscroll.js"></script>
            <!-- fix for ios orientation change -->
            <script src="js/ios-orientationchange-fix.js"></script>
            <!-- to top -->
            <script src="lib/UItoTop/jquery.ui.totop.min.js"></script>
            <!-- mobile nav -->
            <script src="js/selectNav.js"></script>

            <!-- common functions -->
            <script src="js/gebo_common.js"></script>




        </div>
    </body>
</html>
