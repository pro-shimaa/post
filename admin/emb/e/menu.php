<?php
?>
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">الدراسات العليا - كلية الهندسة - جامعة الازهر</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
            
               
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> الملف الشخصى</a>
                        </li>
                       
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> خروج</a>
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
                 
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> الرئيسية</a>
                        </li>
                        
                            <!-- /.nav-second-level -->
                        
                       
                            <!-- /.nav-second-level -->
                       <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> الطلاب<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add_std.php">طالب جديد</a>
                                </li>
                                <li>
                                    <a href="update_std.php">تعديلات الطلاب</a>
                                </li>
                                 
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
   
   <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> الاقسام<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="sys.php">نظم وحاسبات</a>
                                </li>
                                <li>
                                    <a href="urban.php">تخطيط عمرانى</a>
                                </li>
                                  <li>
                                    <a href="mechanics.php">الهندسة الميكانيكية بنين</a>
                                </li>
                                <li>
                                    <a href="elec.php">الهندسة الكهربية بنين</a>
                                </li>
                                <li>
                                    <a href="arc.php">هندسة العمارة بنين</a>
                                </li>
                                 <li>
                                    <a href="petro.php">هندسة التعدين والبترول بنين</a>
                                </li>
                                <li>
                                    <a href="civil.php">الهندسة المدنية بنين</a>
                                </li>
                                 
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> الكلية<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="fac.php">العرض على مجلس الكلية</a>
                                </li>
                            
                                 
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> اعضاء هيئة التدريس<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add_prof.php">اضافة عضو هيئة تدريس</a>
                                </li>
                               
                                 
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php 
						if($_SESSION['acc_lvl']==3){
						?>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> اضافة مستخدم<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="view_users.php">اضافة مستخدم جديد</a>
                                </li>
                                
                                                     
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php }?>
                        
                                
                                
                                                     
                            </ul>
                            <!-- /
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>