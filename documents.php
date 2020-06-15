<?php


error_reporting(0);
session_start();



include 'fileupload.php';   
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="css/admform.css"></link>
        
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
         <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
       <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        
    </head>
    <body style="background-image:url('./images/inbg.jpg');">
        <form id="docup" enctype="multipart/form-data" name="docup" action="documents.php" method="post">
            <div class="container-fluid">    
                <div class="row">
                  <div class="col-sm-12">
                       <!--  <img src="images/cutm.jpg" width="100%" style="box-shadow: 1px 5px 14px #999999; "></img> -->
                  </div>
                 </div>    
             </div>
            <div class="container" style="margin-left:100px;">
            <table class="table table-striped">
                            <thead>
                                       <tr>
                                           <th >
                                       <font style=" font-family: Verdana;  font-size:19px;"> Upload Your Documents</font>
                                           </th>
                                        </tr>           
                            </thead>
                            <tbody>
                            <tr>
                                 <td>Passport Size Image :</td>
                                 <td><input type="file" id="fpic" name="fpic" required="true"><br>
                                     </td>
                            </tr> 
                            
                            <tr>
                                <td>
                                    Signature
                                </td>
                            
                                 <td>
                                    <input type="file" id="fsig" name="fsig" required="true"><br>
                                 
                                </td>
                            </tr>
                            
                            <tr>
                           
                             <tr>
                                <td>10th Mark Sheet :</td>
                                <td>
                                     <input type="file" id="ftndoc" name="ftndoc" required="true"><br>
                                     
                                 </td>
                             </tr>
                            
                              
                             <tr>
                                 <td>
                                     12th Mark Sheet :
                                 </td>
                             
                            
                                 <td>
                                     <input type="file" id="fdmdoc" name="fdmdoc" required="true"><br>
                                     
                                 </td>
                             </tr>
                             
                             
                            <tr>
                                <td>
                                    Identity Proof
                                </td>
                            
                                 <td>
                                    <input type="file" id="fide" name="fide" required="true"><br>
                                 
                                </td>
                            </tr> 
                            
                                
                                <td colspan="2"><input type="submit" id="fpicup" name="fpicup" class="toggle btn btn-primary"></td>
                            </tr>
                           
                           </tbody>
                       </table>
        </div>
           
        </form>
    </body>
</html>
