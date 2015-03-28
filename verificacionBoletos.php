<?php
   session_start();
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<title>Portal de facturación ABC</title>

<?php include 'head.php';?>


</head>
<body>

<?php include 'header.php';?>

<!--*********************
CONTENIDO
*********************-->
<!-- Título -->
<div class="titulo-principal">
  <h1>Comprobación de <strong>boletos</strong></h1>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

<!--********** Formulario **********-->
      <section id="formulario">
        <?php
            require_once("conexion.php");

              $rfc=strtoupper($_POST["rfc"]);
              $tck1=strtoupper($_POST["ticket1"]);
              $tck2=strtoupper($_POST["ticket2"]);
              $tck3=strtoupper($_POST["ticket3"]);
              $tck4=strtoupper($_POST["ticket4"]);
              $tck5=strtoupper($_POST["ticket5"]);
              $tckP1=strtoupper($_POST["ticket1"]);
              $tckP2=strtoupper($_POST["ticket2"]);
              $tckP3=strtoupper($_POST["ticket3"]);
              $tckP4=strtoupper($_POST["ticket4"]);
              $tckP5=strtoupper($_POST["ticket5"]);
                    
//VALIDACIÓN RFC  
              $validacion='/^[A-Z&Ñ]{3,4}[ \-]?[0-9]{2}((0{1}[1-9]{1})|(1{1}[0-2]{1}))((0{1}[1-9]{1})|([1-2]{1}[0-9]{1})|(3{1}[0-1]{1}))[ \-]?[A-Z0-9]{3}/D';
              
              if (preg_match($validacion, $rfc)) {
                  echo "<h4>RFC válido</h4>";
                  
                    $sent2="SELECT EMPRESA FROM CV_BOLETOS WHERE CLAVE = '$tck1'";
                    $sent3="SELECT EMPRESA FROM CV_BOLETOS WHERE CLAVE = '$tck2'";
                    $sent4="SELECT EMPRESA FROM CV_BOLETOS WHERE CLAVE = '$tck3'";
                    $sent5="SELECT EMPRESA FROM CV_BOLETOS WHERE CLAVE = '$tck4'";
                    $sent6="SELECT EMPRESA FROM CV_BOLETOS WHERE CLAVE = '$tck5'";
                    $sent7="SELECT EMPRESA FROM CV_BOLETOS WHERE CLAVE = '$tckP1'";
                    $sent8="SELECT EMPRESA FROM CV_BOLETOS WHERE CLAVE = '$tckP2'";
                    $sent9="SELECT EMPRESA FROM CV_BOLETOS WHERE CLAVE = '$tckP3'";
                    $sent10="SELECT EMPRESA FROM CV_BOLETOS WHERE CLAVE = '$tckP4'";
                    $sent11="SELECT EMPRESA FROM CV_BOLETOS WHERE CLAVE = '$tckP5'";

                    $resultT1 = ibase_query($conectar, $sent2) or die(ibase_errmsg());
                    $resultT2 = ibase_query($conectar, $sent3) or die(ibase_errmsg());
                    $resultT3 = ibase_query($conectar, $sent4) or die(ibase_errmsg());
                    $resultT4 = ibase_query($conectar, $sent5) or die(ibase_errmsg());
                    $resultT5 = ibase_query($conectar, $sent6) or die(ibase_errmsg());
                    
                    $resultVer1 = ibase_query($conectar, $sent7) or die(ibase_errmsg());
                    $resultVer2 = ibase_query($conectar, $sent8) or die(ibase_errmsg());
                    $resultVer3 = ibase_query($conectar, $sent9) or die(ibase_errmsg());
                    $resultVer4 = ibase_query($conectar, $sent10) or die(ibase_errmsg());
                    $resultVer5 = ibase_query($conectar, $sent11) or die(ibase_errmsg());
                  
                    $rowTver1 = ibase_fetch_object($resultVer1);
                    $rowTver2 = ibase_fetch_object($resultVer2);
                    $rowTver3 = ibase_fetch_object($resultVer3);
                    $rowTver4 = ibase_fetch_object($resultVer4);
                    $rowTver5 = ibase_fetch_object($resultVer5); 


                   if(trim($tck1) != '' && trim($tck2) != '' && trim($tck3) != '' && trim($tck4) != '' && trim($tck5) != '')
                    {
                      if($resultVer5 == TRUE && $rowTver5 == FALSE && $resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                      {
                        echo "<p>Tu boletos " .$tck1. ", " .$tck2. ", " .$tck3. ", " .$tck4. " y " .$tck5. " no existen, favor de verificarlos.</p>" ;
                        echo "<form action='portal_facturacion_principal.php' method='POST'>";
                        echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                        echo "</form>";
                      }elseif($resultVer5 == TRUE && $rowTver5 == FALSE && $resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE)
                       {
                        echo "<p>Tu boletos " .$tck2. "," .$tck3. "," .$tck4. " y " .$tck5. " no existen, favor de verificarlos.</p>" ;
                        echo "<form action='portal_facturacion_principal.php' method='POST'>";
                        echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                        echo "</form>";
                       }elseif($resultVer5 == TRUE && $rowTver5 == FALSE && $resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                       {
                        echo "<p>Tu boletos " .$tck1. "," .$tck3. "," .$tck4. " y " .$tck5. " no existen, favor de verificarlos.</p>" ;
                        echo "<form action='portal_facturacion_principal.php' method='POST'>";
                        echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                        echo "</form>";
                       }elseif($resultVer5 == TRUE && $rowTver5 == FALSE && $resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                       {
                        echo "<p>Tu boletos " .$tck1. "," .$tck2. "," .$tck4. " y " .$tck5. " no existen, favor de verificarlos.</p>" ;
                        echo "<form action='portal_facturacion_principal.php' method='POST'>";
                        echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                        echo "</form>";
                       }elseif($resultVer5 == TRUE && $rowTver5 == FALSE && $resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                       {
                        echo "<p>Tu boletos " .$tck1. "," .$tck2. "," .$tck3. " y " .$tck5. " no existen, favor de verificarlos.</p>" ;
                        echo "<form action='portal_facturacion_principal.php' method='POST'>";
                        echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                        echo "</form>";
                       }elseif($resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                         {
                          echo "<p>Tu boletos " .$tck1. "," .$tck2. "," .$tck3. " y " .$tck4. " no existen, favor de verificarlos.</p>" ;
                          echo "<form action='portal_facturacion_principal.php' method='POST'>";
                          echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                          echo "</form>";
                         }elseif($resultVer5 == TRUE && $rowTver5 == FALSE && $resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer3 == TRUE && $rowTver3 == FALSE)
                          {
                            echo "<p>Tu boletos " .$tck3. "," .$tck4. " y " .$tck5. " no existen, favor de verificarlos.</p>" ;
                            echo "<form action='portal_facturacion_principal.php' method='POST'>";
                            echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                            echo "</form>";
                          }elseif($resultVer5 == TRUE && $rowTver5 == FALSE && $resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE)
                          {
                            echo "<p>Tu boletos " .$tck2. "," .$tck4. " y " .$tck5. " no existen, favor de verificarlos.</p>" ;
                            echo "<form action='portal_facturacion_principal.php' method='POST'>";
                            echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                            echo "</form>";
                          }elseif($resultVer5 == TRUE && $rowTver5 == FALSE && $resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                          {
                            echo "<p>Tu boletos " .$tck1. "," .$tck4. " y " .$tck5. " no existen, favor de verificarlos.</p>" ;
                            echo "<form action='portal_facturacion_principal.php' method='POST'>";
                            echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                            echo "</form>";
                          }elseif($resultVer5 == TRUE && $rowTver5 == FALSE && $resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE)
                          {
                            echo "<p>Tu boletos " .$tck2. "," .$tck3. " y " .$tck5. " no existen, favor de verificarlos.</p>" ;
                            echo "<form action='portal_facturacion_principal.php' method='POST'>";
                            echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                            echo "</form>";
                          }elseif($resultVer5 == TRUE && $rowTver5 == FALSE && $resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                          {
                            echo "<p>Tu boletos " .$tck1. "," .$tck3. " y " .$tck5. " no existen, favor de verificarlos.</p>" ;
                            echo "<form action='portal_facturacion_principal.php' method='POST'>";
                            echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                            echo "</form>";
                          }elseif($resultVer5 == TRUE && $rowTver5 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                          {
                            echo "<p>Tu boletos " .$tck1. "," .$tck2. " y " .$tck5. " no existen, favor de verificarlos.</p>" ;
                            echo "<form action='portal_facturacion_principal.php' method='POST'>";
                            echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                            echo "</form>";
                          }elseif($resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE)
                            {
                              echo "<p>Tu boletos " .$tck2. "," .$tck3. " y " .$tck4. " no existen, favor de verificarlos.</p>" ;
                              echo "<form action='portal_facturacion_principal.php' method='POST'>";
                              echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                              echo "</form>";
                             }elseif($resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                            {
                              echo "<p>Tu boletos " .$tck1. "," .$tck3. " y " .$tck4. " no existen, favor de verificarlos.</p>" ;
                              echo "<form action='portal_facturacion_principal.php' method='POST'>";
                              echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                              echo "</form>";
                             }elseif($resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                            {
                              echo "<p>Tu boletos " .$tck1. "," .$tck2. " y " .$tck4. " no existen, favor de verificarlos.</p>" ;
                              echo "<form action='portal_facturacion_principal.php' method='POST'>";
                              echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                              echo "</form>";
                             }elseif($resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                              {
                               echo "<p>Tu boletos " .$tck1. "," .$tck2. " y " .$tck3. " no existen, favor de verificarlos.</p>" ;
                               echo "<form action='portal_facturacion_principal.php' method='POST'>";
                               echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                               echo "</form>";
                              }elseif($resultVer5 == TRUE && $rowTver5 == FALSE && $resultVer4 == TRUE && $rowTver4 == FALSE)
                                {
                                 echo "<p>Tu boletos " .$tck4. "y " .$tck5. " no existen, favor de verificarlos.</p>" ; 
                                 echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                 echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                 echo "</form>";
                                }elseif($resultVer5 == TRUE && $rowTver5 == FALSE && $resultVer3 == TRUE && $rowTver3 == FALSE)
                                {
                                 echo "<p>Tu boletos " .$tck3. "y " .$tck5. " no existen, favor de verificarlos.</p>" ; 
                                 echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                 echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                 echo "</form>";
                                }elseif($resultVer5 == TRUE && $rowTver5 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE)
                                {
                                 echo "<p>Tu boletos " .$tck2. "y " .$tck5. " no existen, favor de verificarlos.</p>" ; 
                                 echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                 echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                 echo "</form>";
                                }elseif($resultVer5 == TRUE && $rowTver5 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                                {
                                 echo "<p>Tu boletos " .$tck1. "y " .$tck5. " no existen, favor de verificarlos.</p>" ; 
                                 echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                 echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                 echo "</form>";
                                }elseif($resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer3 == TRUE && $rowTver3 == FALSE)
                                  {
                                   echo "<p>Tu boletos " .$tck3. "y " .$tck4. " no existen, favor de verificarlos.</p>" ; 
                                   echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                   echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                   echo "</form>";
                                  }elseif($resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE)
                                  {
                                   echo "<p>Tu boletos " .$tck2. "y " .$tck4. " no existen, favor de verificarlos.</p>" ; 
                                   echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                   echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                   echo "</form>";
                                  }elseif($resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                                  {
                                   echo "<p>Tu boletos " .$tck1. "y " .$tck4. " no existen, favor de verificarlos.</p>" ; 
                                   echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                   echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                   echo "</form>";
                                  }elseif($resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE)
                                   {
                                    echo "<p>Tu boletos " .$tck2. "y " .$tck3. " no existen, favor de verificarlos.</p>" ; 
                                    echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                    echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                    echo "</form>";
                                   }elseif($resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                                   {
                                    echo "<p>Tu boletos " .$tck1. "y " .$tck3. " no existen, favor de verificarlos.</p>" ; 
                                    echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                    echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                    echo "</form>";
                                   }elseif($resultVer2 == TRUE && $rowTver2 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                                    {
                                     echo "<p>Tu boletos " .$tck1. "y " .$tck2. " no existen, favor de verificarlos.</p>" ; 
                                     echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                     echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                     echo "</form>";
                                    }elseif($resultVer5 == TRUE && $rowTver5 == FALSE)
                                     {
                                      echo "<p>Tu boleto " .$tck5. " no existe, favor de verificarlo.</p>" ;  
                                      echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                      echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                      echo "</form>";  
                                     }elseif($resultVer4 == TRUE && $rowTver4 == FALSE)
                                      {
                                       echo "<p>Tu boleto " .$tck4. " no existe, favor de verificarlo.</p>" ;   
                                       echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                       echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                       echo "</form>"; 
                                      }elseif($resultVer3 == TRUE && $rowTver3 == FALSE)
                                       {
                                        echo "<p>Tu boleto " .$tck3. " no existe, favor de verificarlo.</p>" ;  
                                        echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                        echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                        echo "</form>";  
                                       }elseif($resultVer2 == TRUE && $rowTver2 == FALSE)
                                        {
                                         echo "<p>Tu boleto " .$tck2. " no existe, favor de verificarlo.</p>" ;   
                                         echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                         echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                         echo "</form>"; 
                                        }elseif($resultVer1 == TRUE && $rowTver1 == FALSE)
                                         {
                                          echo "<p>Tu boleto " .$tck1. " no existe, favor de verificarlo.</p>" ;   
                                          echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                          echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                          echo "</form>"; 
                                         }else
                                          {
                                            while( $rowT1 = ibase_fetch_object($resultT1))
                                            {
                                             $empresa = $rowT1-> EMPRESA;
                                            }while( $rowT2 = ibase_fetch_object($resultT2))
                                            {
                                             $empresa2 = $rowT2-> EMPRESA;
                                            }while( $rowT3 = ibase_fetch_object($resultT3))
                                            {
                                             $empresa3 = $rowT3-> EMPRESA;
                                            }while( $rowT4 = ibase_fetch_object($resultT4))
                                            {
                                             $empresa4 = $rowT4-> EMPRESA;
                                            }while( $rowT5 = ibase_fetch_object($resultT5))
                                            {
                                             $empresa5 = $rowT5-> EMPRESA;
                                            }if($empresa != $empresa5 && $empresa != $empresa4 && $empresa != $empresa3 && $empresa != $empresa2)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck2. "," .$tck3. "," .$tck4. " y " .$tck5. " sean de la misma empresa";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                             				 echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                             echo "</form>";
                                            }elseif($empresa != $empresa5 && $empresa != $empresa4 && $empresa != $empresa3)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck3. "," .$tck4. " y " .$tck5. " sean de la misma empresa";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                       				 	     echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";  
                                             echo "</form>";
                                            }elseif($empresa != $empresa5 && $empresa != $empresa4 && $empresa != $empresa2)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck2. "," .$tck4. " y " .$tck5. " sean de la misma empresa";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                     					     echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                             echo "</form>";
                                            }elseif($empresa != $empresa5 && $empresa != $empresa3 && $empresa != $empresa2)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck2. "," .$tck3. " y " .$tck5. " sean de la misma empresa";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                    					     echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                             echo "</form>";
                                            }elseif($empresa != $empresa4 && $empresa != $empresa3 && $empresa != $empresa2)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck2. "," .$tck3. " y " .$tck4. " sean de la misma empresa";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                   						     echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";  
                                             echo "</form>";
                                            }elseif($empresa != $empresa5 && $empresa != $empresa4)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck4. " y " .$tck5. " sean de la misma empresa";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                   						     echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                             echo "</form>";
                                            }elseif($empresa != $empresa5 && $empresa != $empresa3)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck3. " y " .$tck5. " sean de la misma empresa";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                   						     echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> "; 
                                             echo "</form>";
                                            }elseif($empresa != $empresa5 && $empresa != $empresa2)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck2. " y " .$tck5. " sean de la misma empresa";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                   						     echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                             echo "</form>";
                                            }elseif($empresa != $empresa4 && $empresa != $empresa3)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck3. " y " .$tck4. " sean de la misma empresa";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                						     echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";  
                                             echo "</form>";
                                            }elseif($empresa != $empresa4 && $empresa != $empresa2)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck2. " y " .$tck4. " sean de la misma empresa";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                        					 echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";  
                                             echo "</form>";
                                            }elseif($empresa != $empresa3 && $empresa != $empresa2)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck2. " y " .$tck3. " sean de la misma empresa";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                        					 echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                             echo "</form>";
                                            }elseif($empresa != $empresa5)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck5. " sea de la misma empresa</p>";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                        					 echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> "; 
                                             echo "</form>";
                                            }elseif($empresa != $empresa4)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck4. " sea de la misma empresa</p>";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                         					 echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                             echo "</form>";
                                            }elseif($empresa != $empresa3)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck3. " sea de la misma empresa</p>";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                        					 echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                             echo "</form>";
                                            }elseif($empresa != $empresa2)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck2. " sea de la misma empresa</p>";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                      					     echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";   
                                             echo "</form>";
                                            }else
                                             {
                                             echo "<p>Tus boletos han sido verificados</p>";
                                             echo "<form action='validar_datos_principal.php' method='POST'>";  
                                             echo "<input class='boton magenta siguiente' type='submit' name='continuar' value='Continuar'>";   
                                             echo "</form>"; 
                                             }        $_SESSION['emp']=$empresa;
                                          }
                                          //Termina 5 boletos ingresados
                    }elseif(trim($tck1) != '' && trim($tck2) != '' && trim($tck3) != '' && trim($tck4) != '')
                    {
                    //echo "Haz ingresado en 4 campos";
                     if($resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                     {
                      echo "<p>Tu boletos " .$tck1. "," .$tck2. "," .$tck3. " y " .$tck4. " no existen, favor de verificarlos.</p>" ;
                      echo "<form action='portal_facturacion_principal.php' method='POST'>";
                      echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                      echo "</form>";
                     }elseif($resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE)
                      {
                       echo "<p>Tu boletos " .$tck2. "," .$tck3. " y " .$tck4. " no existen, favor de verificarlos.</p>" ;
                       echo "<form action='portal_facturacion_principal.php' method='POST'>";
                       echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                       echo "</form>";
                      }elseif($resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                      {
                       echo "<p>Tu boletos " .$tck1. "," .$tck3. " y " .$tck4. " no existen, favor de verificarlos.</p>" ;
                       echo "<form action='portal_facturacion_principal.php' method='POST'>";
                       echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                       echo "</form>";
                      }elseif($resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                       {
                        echo "<p>Tu boletos " .$tck1. "," .$tck2. " y " .$tck4. " no existen, favor de verificarlos.</p>" ;
                        echo "<form action='portal_facturacion_principal.php' method='POST'>";
                        echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                        echo "</form>";
                       }elseif($resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                        {
                         echo "<p>Tu boletos " .$tck1. "," .$tck2. " y " .$tck3. " no existen, favor de verificarlos.</p>" ;
                         echo "<form action='portal_facturacion_principal.php' method='POST'>";
                         echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                         echo "</form>";
                        }elseif($resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer3 == TRUE && $rowTver3 == FALSE)
                          {
                           echo "<p>Tu boletos " .$tck3. "y " .$tck4. " no existen, favor de verificarlos.</p>" ; 
                           echo "<form action='portal_facturacion_principal.php' method='POST'>";
                           echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                           echo "</form>";
                          }elseif($resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE)
                           {
                             echo "<p>Tu boletos " .$tck2. "y " .$tck4. " no existen, favor de verificarlos.</p>" ; 
                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                             echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                             echo "</form>";
                           }elseif($resultVer4 == TRUE && $rowTver4 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                             {
                              echo "<p>Tu boletos " .$tck1. "y " .$tck4. " no existen, favor de verificarlos.</p>" ; 
                              echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                          echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                              echo "</form>";
                             }elseif($resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE)
                               {
                                echo "<p>Tu boletos " .$tck2. "y " .$tck3. " no existen, favor de verificarlos.</p>" ; 
                                echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                echo "</form>";
                               }elseif($resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                                 {
                                  echo "<p>Tu boletos " .$tck1. "y " .$tck3. " no existen, favor de verificarlos.</p>" ; 
                                  echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                  echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                  echo "</form>";
                                 }elseif($resultVer2 == TRUE && $rowTver2 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                                   {
                                    echo "<p>Tu boletos " .$tck1. "y " .$tck2. " no existen, favor de verificarlos.</p>" ; 
                                    echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                    echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                    echo "</form>";
                                   }elseif($resultVer4 == TRUE && $rowTver4 == FALSE)
                                      {
                                       echo "<p>Tu boleto " .$tck4. " no existe, favor de verificarlo.</p>" ;   
                                       echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                       echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                       echo "</form>"; 
                                      }elseif($resultVer3 == TRUE && $rowTver3 == FALSE)
                                       {
                                        echo "<p>Tu boleto " .$tck3. " no existe, favor de verificarlo.</p>" ;  
                                        echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                        echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                        echo "</form>";  
                                       }elseif($resultVer2 == TRUE && $rowTver2 == FALSE)
                                        {
                                         echo "<p>Tu boleto " .$tck2. " no existe, favor de verificarlo.</p>" ;   
                                         echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                         echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                         echo "</form>"; 
                                        }elseif($resultVer1 == TRUE && $rowTver1 == FALSE)
                                         {
                                          echo "<p>Tu boleto " .$tck1. " no existe, favor de verificarlo.</p>" ;   
                                          echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                          echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                          echo "</form>"; 
                                         }else
                                          {
                                            while( $rowT1 = ibase_fetch_object($resultT1))
                                            {
                                             $empresa = $rowT1-> EMPRESA;
                                            }while( $rowT2 = ibase_fetch_object($resultT2))
                                            {
                                             $empresa2 = $rowT2-> EMPRESA;
                                            }while( $rowT3 = ibase_fetch_object($resultT3))
                                            {
                                             $empresa3 = $rowT3-> EMPRESA;
                                            }while( $rowT4 = ibase_fetch_object($resultT4))
                                            {
                                             $empresa4 = $rowT4-> EMPRESA;
                                            }if($empresa != $empresa4 && $empresa != $empresa3 && $empresa != $empresa2)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck2. "," .$tck3. " y " .$tck4. " sean de la misma empresa";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                             echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                             echo "</form>";
                                            }elseif($empresa != $empresa4 && $empresa != $empresa3)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck3. " y " .$tck4. " sean de la misma empresa";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                             echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                             echo "</form>";
                                            }elseif($empresa != $empresa4 && $empresa != $empresa2)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck2. " y " .$tck4. " sean de la misma empresa";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                             echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                             echo "</form>";
                                            }elseif($empresa != $empresa3 && $empresa != $empresa2)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck2. " y " .$tck3. " sean de la misma empresa";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                             echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                             echo "</form>";
                                            }elseif($empresa != $empresa4)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck4. " sea de la misma empresa</p>";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                            echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                             echo "</form>";
                                            }elseif($empresa != $empresa3)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck3. " sea de la misma empresa</p>";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                             echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                             echo "</form>";
                                            }elseif($empresa != $empresa2)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck2. " sea de la misma empresa</p>";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                             echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                             echo "</form>";
                                            }else
                                             {
                                             echo "<p>Tus boletos han sido verificados</p>";
                                             echo "<form action='validar_datos_principal.php' method='POST'>";  
                                             echo "<input class='boton magenta siguiente' type='submit' name='continuar' value='Continuar'>";   
                                             echo "</form>"; 
                                             }        $_SESSION['emp']=$empresa;
                                          }
                    //Termina 4 boletos ingresados
                    }elseif(trim($tck1) != '' && trim($tck2) != '' && trim($tck3) != '')
                    {
                    //echo "Haz ingresado en 3 campos";
                    if($resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                     {
                       echo "<p>Tu boletos " .$tck1. "," .$tck2. " y " .$tck3. " no existen, favor de verificarlos.</p>" ;
                       echo "<form action='portal_facturacion_principal.php' method='POST'>";
                       echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                       echo "</form>";
                      }elseif($resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer2 == TRUE && $rowTver2 == FALSE)
                       {
                                    echo "<p>Tu boletos " .$tck2. "y " .$tck3. " no existen, favor de verificarlos.</p>" ; 
                                    echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                    echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                    echo "</form>";
                                   }elseif($resultVer3 == TRUE && $rowTver3 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                                   {
                                    echo "<p>Tu boletos " .$tck1. "y " .$tck3. " no existen, favor de verificarlos.</p>" ; 
                                    echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                    echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                    echo "</form>";
                                   }elseif($resultVer2 == TRUE && $rowTver2 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                                    {
                                     echo "<p>Tu boletos " .$tck1. "y " .$tck2. " no existen, favor de verificarlos.</p>" ; 
                                     echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                     echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                     echo "</form>";
                                    }elseif($resultVer3 == TRUE && $rowTver3 == FALSE)
                                       {
                                        echo "<p>Tu boleto " .$tck3. " no existe, favor de verificarlo.</p>" ;  
                                        echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                        echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                        echo "</form>";  
                                       }elseif($resultVer2 == TRUE && $rowTver2 == FALSE)
                                        {
                                         echo "<p>Tu boleto " .$tck2. " no existe, favor de verificarlo.</p>" ;   
                                         echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                         echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                         echo "</form>"; 
                                        }elseif($resultVer1 == TRUE && $rowTver1 == FALSE)
                                         {
                                          echo "<p>Tu boleto " .$tck1. " no existe, favor de verificarlo.</p>" ;   
                                          echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                          echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                          echo "</form>"; 
                                         }else
                                          {
                                            while( $rowT1 = ibase_fetch_object($resultT1))
                                            {
                                             $empresa = $rowT1-> EMPRESA;
                                            }while( $rowT2 = ibase_fetch_object($resultT2))
                                            {
                                             $empresa2 = $rowT2-> EMPRESA;
                                            }while( $rowT3 = ibase_fetch_object($resultT3))
                                            {
                                             $empresa3 = $rowT3-> EMPRESA;
                                            }if($empresa != $empresa3 && $empresa != $empresa2)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck2. " y " .$tck3. " sean de la misma empresa";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                             echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                             echo "</form>";
                                            }elseif($empresa != $empresa3)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck3. " sea de la misma empresa</p>";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                             echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> "; 
                                             echo "</form>";
                                            }elseif($empresa != $empresa2)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck2. " sea de la misma empresa</p>";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                             echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                             echo "</form>";
                                            }else
                                             {
                                             echo "<p>Tus boletos han sido verificados</p>";
                                             echo "<form action='validar_datos_principal.php' method='POST'>";  
                                             echo "<input class='boton magenta siguiente' type='submit' name='continuar' value='Continuar'>";   
                                             echo "</form>"; 
                                             }        $_SESSION['emp']=$empresa;
                                          }
                    //Termina 3 boletos ingresados
                    }elseif(trim($tck1) != '' && trim($tck2) != '')
                    {
                    //echo "Haz ingresado en 2 campos";
                    if($resultVer2 == TRUE && $rowTver2 == FALSE && $resultVer1 == TRUE && $rowTver1 == FALSE)
                                    {
                                     echo "<p>Tu boletos " .$tck1. "y " .$tck2. " no existen, favor de verificarlos.</p>" ; 
                                     echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                     echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                     echo "</form>";
                                    }elseif($resultVer2 == TRUE && $rowTver2 == FALSE)
                                        {
                                         echo "<p>Tu boleto " .$tck2. " no existe, favor de verificarlo.</p>" ;   
                                         echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                         echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                         echo "</form>"; 
                                        }elseif($resultVer1 == TRUE && $rowTver1 == FALSE)
                                         {
                                          echo "<p>Tu boleto " .$tck1. " no existe, favor de verificarlo.</p>" ;   
                                          echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                          echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                          echo "</form>"; 
                                         }else
                                          {
                                            while( $rowT1 = ibase_fetch_object($resultT1))
                                            {
                                             $empresa = $rowT1-> EMPRESA;
                                            }while( $rowT2 = ibase_fetch_object($resultT2))
                                            {
                                             $empresa2 = $rowT2-> EMPRESA;
                                            }if($empresa != $empresa2)
                                            {
                                             echo "<p>Favor de verificar que el boleto " .$tck2. " sea de la misma empresa</p>";
                                             echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                             echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";  
                                             echo "</form>";
                                            }else
                                             {
                                             echo "<p>Tus boletos han sido verificados</p>";
                                             echo "<form action='validar_datos_principal.php' method='POST'>";  
                                             echo "<input class='boton magenta siguiente' type='submit' name='continuar' value='Continuar'>";   
                                             echo "</form>"; 
                                             }        $_SESSION['emp']=$empresa;
                                          }

                    //Termina 2 boletos ingresados
                    }elseif(trim($tck1) != '')
                    {
                    //echo "Haz ingresado en 1 campo";
                       if($resultVer1 == TRUE && $rowTver1 == FALSE)
                                         {
                                          echo "<p>Tu boleto " .$tck1. " no existe, favor de verificarlo.</p>" ;   
                                          echo "<form action='portal_facturacion_principal.php' method='POST'>";
                                          echo "<input class='boton magenta regresar' onClick='javascript:window.history.back();' type='submit' name='regresar' value='Regresar'> ";
                                          echo "</form>"; 
                                         }else
                                          {
                                            while( $rowT1 = ibase_fetch_object($resultT1))
                                            {
                                             $empresa = $rowT1-> EMPRESA;
                                            }
                                             echo "<p>Tu boleto ha sido verificado</p>";
                                             echo "<form action='validar_datos_principal.php' method='POST'>";  
                                             echo "<input class='boton magenta siguiente' type='submit' name='continuar' value='Continuar'>";   
                                             echo "</form>"; 
                                             
                                          }
                    $_SESSION['emp']=$empresa;
                    //Termina un boleto ingresado
                    }

                    ibase_free_result($resultT1);
                    ibase_free_result($resultT2);
                    ibase_free_result($resultT3);
                    ibase_free_result($resultT4);
                    ibase_free_result($resultT5);

                    $_SESSION['rfc']=$rfc;
                    $_SESSION['ticket1']=$tck1;
                    $_SESSION['ticket2']=$tck2;
                    $_SESSION['ticket3']=$tck3;
                    $_SESSION['ticket4']=$tck4;
                    $_SESSION['ticket5']=$tck5;
                    
                    }
                    //VALIDACIÓN RFC
              else {
              echo "<script language=JavaScript>
              alert('RFC no valido favor de verificarlo.');
              history.back();
              </script>";
                  //echo 'RFC NO válido';
              //header('location:portal_facturacion_principal.html');
              }
            ?>
      </section>
    </div>
  </div>
</div>

</body>
</html>




                                             
                                          
        