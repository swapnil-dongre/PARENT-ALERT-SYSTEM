<?php

 require 'connect.php';

 session_start();

if(!$_SESSION['id'])
{
header("Location:login_lit.php");
}

	
	
 ?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <?php

    include 'layout.php';

   ?>

     <script>

    function validate() 
    {
     var num = document.myform.new.value;

     var re =  document.myform.reent.value;




     if(isNaN(num))

     {
        document.getElementById("numloc").style.padding = "8px";

        

      document.getElementById("numloc").innerHTML = "Wrong value entered Enter only Numeric Value in Contact Number";

      return false;

     }


     else
     {

      var count = 0; 
      var len = num.length;

      var num2 = num.split("");

      var i = 0;

      for(i = 0; i < len ; i++)

      {

         count = count + 1;

      }

                  if(count > 10 || count < 10 )
                        {
                            document.getElementById("numloc").style.padding = "8px";

                         
                        
                            document.getElementById("numloc").innerHTML = " Entered" + " " +count+" "+ "digits Contact Number must be of 10 digits only";
                           
                            
                            return false;
                        }

                   else {

                               if(num != re){

                                document.getElementById("span2").style.padding = "8px";


                            document.getElementById("span2").innerHTML = " Entered New Contact And Renter Contact Fileds with diffrent Values.Please Renter";
                              
                    

                                return false;

                                  }

                                  else{
                                    return true;
                                  }
                         }
     }

    }

    </script>


   
   
  
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
     <header class="row">
           
		
			<nav class ="navbar navbar-inverse navbar-default navbar-fixed-top role = "navigation">
			 <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <div>
			
			<!--logo start-->
            <a  class="logo"><b>Little Soldiers School</b></a>
            <!--logo end-->
            
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">

              <button class="btn btn-warning" type="button">
                          <a href="logout.php"><span style="color:white"> Logout <i class="glyphicon glyphicon-off"> </i></span></a>
                            </button>
            	</ul>
            </div>
			</div>
			</nav>

        </header>
		 <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  	
                  <li class="mt">
                      <a  href="myhome.php">
                          <i class="li_shop"></i>
                          <span>Home</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a  href="javascript:;" >
                          <i class="li_mail"></i>
                          <span>Compose</span>
                      </a>
                      <ul class="sub">
                          <li ><a  href="mycompose.php">New Event Message</a></li>
						    <li ><a  href="simple.php">Simple Message</a></li>
                          
                      </ul>
                  </li>

                   <li class="sub-menu">
                      <a  href="javascript:;" >
                          <i class="li_pen"></i>
                          <span> Contact</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="newcontact.php">New Contact</a></li>
<<<<<<< HEAD
						  <li ><a  href="classselect.php">Update Contact Number</a></li>

                    <li ><a  href="classselect2.php">Update Whole Contact</a></li>
    
=======
						    <li ><a  href="classselect.php">Update Contact</a></li>
>>>>>>> f0be7880be4e80ad5ab0d4af5c9dce0a7d843986
							   <li ><a  href="delete.php">Delete Contact</a></li>
							   
                      </ul>
                  </li>
				  
				  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="li_pen"></i>
                          <span> Class Operations</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="updateclass.php">Update Whole Class</a></li>
						    <li ><a  href="getcontacts.php">Get All Contacts</a></li>
							   
							   <li ><a  href="delkgii.php">Delete Class KG-II</a></li>
                      </ul>
                  </li>
                

 
                <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="li_user"></i>
                          <span>Staff</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="staffmessage.php">Message Staff</a></li>
						  <li><a  href="newstaff.php">Add New Staff </a></li>
						  <li><a  href="staffdel.php">Delete a Staff</a></li>
                  <li class="active" ><a  href="selectstaff.php">UpdateStaff</a></li>
                 
                      </ul>
                  </li>


              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>


      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
       <section id="main-content">
          <section class="wrapper">
 
                          

    <div class="row mt">

      <div>
          <?php

    

         
           

  if(isset($_POST['contact']) && isset($_POST['new']) && isset($_POST['reent']))
     {

          
            
                     
                      $contact  =   $_POST['contact'];
            $new  =       $_POST['new'];
                      $reent   =    $_POST['reent'];

                         $j = str_split($new);

                      $count = NULL;

                   foreach ($j as  $value) {

                      

                     if(is_numeric($value))
                    {

                     $count = $count + 1;
                    }

            
                        } 

              if(is_numeric($new))

       {
             
             if($count == 10)

             { 



                          if (isset($_POST['enter'])) //to insert data in a table 
               {
             
                                      if(!empty($contact) && !empty($new) && !empty($reent))
               
                   {

                    
                                                  if($new == $reent)
           
                      {

                                
                                                      $query="UPDATE `staff` SET `contact`='$new' WHERE `contact` ='$contact'"; 
        
        

                      
        
                                                                     if($query_run = mysql_query($query))
                       
                                                                    {
                              
            echo '<div class="col-md-10"><div class="col-md-offset-4"><div class="alert alert-info alert-dismissable" ><div class="centered">Contact Updated Sucessfully..</div></div> </div></div>';
                    
                                                         }
              
              
                                                        }
            
                    
                                                        else 
            
                                                    {
                       
                      echo '<article class="col-md-9 col-md-offset-3"><div class="alert alert-danger alert-dismissable"><div class="centered">Warning:: You filled new contact and reenter contact with diffrent values Please Renter</div></div></article>';
                               
                                                       }
                  

            
            }
                    
                
                                  else
                                  
                                { 
                                             echo '<div class="alert alert-danger alert-dismissable"><div class="centered">Warning:: Any Field  is Left Empty ... Please Re-enter</div></div>';
                                        
                                 }

                    
            }

       }     

       

         else
 {

    echo '<article class="col-md-offset-2 col-md-10"><div class="alert alert-danger alert-dismissable"><div class="centered">WARNING::You enter '."$count".' digits only  10 digits required in the new  contact number field.Please Renter</div></div></article>';
               
 }
   

    }

 else
 {

    echo '<article class="col-md-offset-2 col-md-10"><div class="alert alert-danger"><div class="centered">WARNING::Invalid Contact Number entered.Please Renter</div></div></article>';
               
 }

 
               
    
    
    
 }

 ?>
 </div>


<<<<<<< HEAD
          <article class="col-md-8 col-md-offset-2">
=======
          <article class="col-md-10 col-md-offset-2">
>>>>>>> f0be7880be4e80ad5ab0d4af5c9dce0a7d843986

        
				<!-- FORM --------------------FORM-------------------------FORM------------------------FORM --------------------------FORM-->
                    
                        <form name = "myform" class="form-horizontal style-form" action ="updatestaff.php" method="POST" onsubmit="return validate()">


                                  
                          <div class="form-panel">
	
       <div style ="padding:10px;background-color:rgb(100,100,100);margin-left:-1.2%;margin-right:-1.2%;margin-top:-1%"><h4><div class="col-md-offset-5"><span style="color:white">Update Staff Record</span></div></div></h4><br><br>
									
	
               
        
						 
<<<<<<< HEAD
                           <br>

                   <?php 

                           if(isset($_POST['teacher']))
   
                       {

                                $teacher =$_POST['teacher'];

                            
                             echo '<div class="centered"><div class="btn btn-info"><i class="li li_user"> </i> Selected Faculty <i class="glyphicon glyphicon-resize-horizontal"> </i> '.$teacher.'</div></div>';

                        
                          }
                        
                            
              
                          ?> <br>

                        <div class="form-group">
                  
                        <label class="col-sm-5 col-sm-5 control-label"><h4>Exixsting Contact</h4> </label>
                    
                      <div class="col-sm-4">
=======
                           <br><br><br>

                   

                        <div class="form-group">
                  
                        <label class="col-sm-3 col-sm-3 control-label"><h4>Exixsting Contact</h4> </label>
                    
                      <div class="col-sm-5">
>>>>>>> f0be7880be4e80ad5ab0d4af5c9dce0a7d843986
                                            
                
                         <input type="text" class="form-control round-form" name= "contact" class="form-control"  value= "<?php 

                           if(isset($_POST['teacher']))
   
         {

                                $teacher =$_POST['teacher'];

                            


                        
                          
                        
                                $query="select `contact` from `staff` where `teacher` ='".$teacher."';";

                                $query_run=mysql_query($query);

                                $v = mysql_num_rows($query_run);

                                $i = 0;


                            if($v == 1)
                               {
                      
                        
                                  $contact =mysql_result($query_run,$i,'contact');
                                  
                                   echo $contact;
                              }
                          
                            
                          

                    }         
                          
                          
   
              
                          ?>">
        
                         
                      
                            <span class="help-block"><p class="col-md-offset-1">Existing Contact of the staff</p></span>
          
                      </div>  
                      </div>
                    
                    


                          
                    
                    


                              <div class="form-group">
<<<<<<< HEAD
                                 <label class="col-sm-5 col-sm-5 control-label"><h4>New Contact</h4></label>
                                   <div class="col-sm-4">
=======
                                 <label class="col-sm-3 col-sm-3 control-label"><h4>New Contact</h4></label>
                                   <div class="col-sm-5">
>>>>>>> f0be7880be4e80ad5ab0d4af5c9dce0a7d843986
                                        <input type="text" class="form-control round-form" name = "new" required>
                                        <span class="help-block"><p class="col-md-offset-1">Enter the new contact of the staff</p></span>
                                         
   
<<<<<<< HEAD
                                    </div><br>
=======
                                    </div><br><br><br><br>
>>>>>>> f0be7880be4e80ad5ab0d4af5c9dce0a7d843986
                                    <span class="col-md-offset-3"  style= "color:white;  background-color:rgb(244,80,81)" id="numloc"> </span>

 
                            </div><br>

                              <div class="form-group">
<<<<<<< HEAD
                                 <label class="col-sm-5 col-sm-5 control-label"><h4>Renter Contact</h4></label>
                                   <div class="col-sm-4">
                                    <input type="text" class="form-control round-form" name = "reent" required>
                         <span class="help-block"><p class="col-md-offset-1">Again Enter the new contact of the staff</p></span> 

                                    </div> <br>

                              <span class="col-md-offset-5"  style= "color:white;  background-color:rgb(244,80,81)" id="span2"> </span>          
                            </div>
=======
                                 <label class="col-sm-3 col-sm-3 control-label"><h4>Renter Contact</h4></label>
                                   <div class="col-sm-5">
                                    <input type="text" class="form-control round-form" name = "reent" required>
                         <span class="help-block"><p class="col-md-offset-1">Again Enter the new contact of the staff</p></span> 

                                    </div> <br><br>

                              <span class="col-md-offset-5"  style= "color:white;  background-color:rgb(244,80,81)" id="span2"> </span>          
                            </div><br>
>>>>>>> f0be7880be4e80ad5ab0d4af5c9dce0a7d843986

                      

                       <div class="centered">  <input type="submit" class="btn btn-lg btn-success" value="Update" name="enter"> </div>
						 
						 
							</div> 
						 
		
                      </form>
                
				
				
				
		<!------FORM-------------------------FORM------------------------FORM-------------------FORM-->		
				
				
			
          </article>         <!-- col-lg-12-->       
    </div><!-- /row -->
            
     
    </section>          <!--wrapper -->
      </section>   
            

      
      <!--footer end-->-2
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>

      
  <?php
  include 'layout2.php';

  ?>
  
  </body>
</html>
