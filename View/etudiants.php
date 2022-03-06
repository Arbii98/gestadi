<?php require "header_dashboard.php"; ?>




<style>
@import url('https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700');

section{
  float:left;
  width:100%;
  padding:30px 0; 
  position:relative; 
  overflow:hidden; 
  background:#6F8D8A;
  margin: 30px;
}

section:before{
  content:"";
  position:absolute; 
  width:110%; 
  height:100%;   
  background-color:#fff; 
  filter: blur(10px); 
  z-index:0; 
  transform: scale(2);-ms-transform: scale(2); 
  -webkit-transform: scale(2);
}


.card{
  box-shadow:2px 2px 20px rgba(0,0,0,0.3); border:none; margin-bottom:30px;
}
.card:hover{
  transform: scale(1.05);
  transition: all 1s ease;
  z-index: 999;
}
.card-01 .card-body{
  position:relative; padding-top:40px;
}
.card-01 .badge-box{
  position:absolute; 
  top:-20px; left:50%; width:100px; height:100px;margin-left:-50px; text-align:center;
}
.card-01 .badge-box i{
  background:#006EFF; color:#fff; border-radius:50%;  width:50px; height:50px; line-height:50px; text-align:center; font-size:20px;
}
.card-01 .height-fix{
  height:455px; overflow:hidden;
}

.card-01 .height-fix .card-img-top{width:auto!imporat;}

.profile-box{
  background-size:cover; float:left; width:100%; text-align:center; padding:30px 0; position:relative; overflow:hidden;
}

.profile-box:before{
  filter: blur(10px);background:url("https://images.pexels.com/photos/195825/pexels-photo-195825.jpeg?h=350&auto=compress&cs=tinysrgb") no-repeat; background-size:cover; width:120%; position:absolute; content:""; height:120%; left:-10%;top:0;z-index:0;
}

.profile-box img{
  width:170px; height:170px; position:relative; border:5px solid #fff;
}

.social-box i {
  border:1px solid #006EFF; color:#006EFF; width:30px; height:30px; border-radius:50%;line-height:30px;
}

.social-box i:hover{
  background:#DFC717; color:#fff;
}

.social-box a{margin: 0 5px;}

.video-foreground{float:left;width:100%; height:500px;}

.card-01.height-fix .card-img-overlay{
  top:unset; 
  color:#fff;
  background: -moz-linear-gradient(top, rgba(26,96,111,0) 0%, rgba(26,96,111,0) 1%, rgba(24,87,104,0.91) 31%, rgba(21,65,89,0.91) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, rgba(26,96,111,0) 0%,rgba(26,96,111,0) 1%,rgba(24,87,104,0.91) 31%,rgba(21,65,89,0.91) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, rgba(26,96,111,0) 0%,rgba(26,96,111,0) 1%,rgba(24,87,104,0.91) 31%,rgba(21,65,89,0.91) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#001a606f', endColorstr='#e8154159',GradientType=0 );
}
.card-01.height-fix .fa{color: #fff;font-size: 22px;margin-right: 18px;};




</style>




<!------ Include the above in your HEAD tag ---------->

<section>
    <div class="container">
        <div class="row">
        
        <div class="col-md-12">
          <div class="card card-01">
                <div class="profile-box">
                <img class="card-img-top rounded-circle" src="photos/arbi.jpg" alt="Card image cap">
                </div>
                <div class="card-body text-center">
                    <span class="badge-box"><i class="fa fa-check"></i></span>
                    <h4 class="card-title">Mohamed SAIDI</h4>
                    <p class="card-text" style="margin-top:-5%">
                    <div class="container table-responsive py-5" style="width:100%"> 
                        <table class="table table-bordered table-hover" style="width:100%">
                            <thead class="thead-dark">
                            <tr>
                                <th>E-mail</th>
                                <th>Telephone</th>
                                <th>Adresse</th>
                                <th>Date de naissance</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>arbisaidi8@gmail.com</td>
                                <td>0668259886</td>
                                <td>16 Boulevard Charles Nicolle</td>
                                <td>15/10/1998</td>
                            <tr>
                        </table>
                    </div>
                    </p>
                    <span class="social-box">
                        <a href="#"><button class="btn btn-dark">Voir attestation</button></a>
                        <a href="#"><button class="btn btn-dark" data-title="edit" data-toggle="modal" data-target="#myModal">Voir stage</button></a>
                    </span>
                </div>
            </div>
        </div>


        <div class="col-md-6">
          <div class="card card-01">
                <div class="profile-box">
                <img class="card-img-top rounded-circle" src="photos/arbi.jpg" alt="Card image cap">
                </div>
                <div class="card-body text-center">
                    
                    <h4 class="card-title">Mohamed SAIDI</h4>
                    <p class="card-text" style="margin-top:-10%">
                    <div class="container table-responsive py-5" style="width:100%"> 
                        <table class="table table-bordered table-hover" style="width:100%">
                            <thead class="thead-dark">
                            <tr>
                                <th>E-mail</th>
                                <th>Telephone</th>
                                <th>Adresse</th>
                                <th>Date de naissance</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>arbisaidi8@gmail.com</td>
                                <td>0668259886</td>
                                <td>16 Boulevard Charles Nicolle</td>
                                <td>15/10/1998</td>
                            <tr>
                        </table>
                    </div>
                    </p>
                    <span class="social-box">
                        <a href="#"><button class="btn btn-dark">Voir attestation</button></a>
                    </span>
                </div>
            </div>
        </div>


        <div class="col-md-6">
          <div class="card card-01">
                <div class="profile-box">
                <img class="card-img-top rounded-circle" src="photos/arbi.jpg" alt="Card image cap">
                </div>
                <div class="card-body text-center">
                    <span class="badge-box"><i class="fa fa-check"></i></span>
                    <h4 class="card-title">Mohamed SAIDI</h4>
                    <p class="card-text" style="margin-top:-10%">
                    <div class="container table-responsive py-5" style="width:100%"> 
                        <table class="table table-bordered table-hover" style="width:100%">
                            <thead class="thead-dark">
                            <tr>
                                <th>E-mail</th>
                                <th>Telephone</th>
                                <th>Adresse</th>
                                <th>Date de naissance</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>arbisaidi8@gmail.com</td>
                                <td>0668259886</td>
                                <td>16 Boulevard Charles Nicolle</td>
                                <td>15/10/1998</td>
                            <tr>
                        </table>
                    </div>
                    </p>
                    <span class="social-box">
                        <a href="#"><button class="btn btn-dark">Voir attestation</button></a>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
          <div class="card card-01">
                <div class="profile-box">
                <img class="card-img-top rounded-circle" src="photos/arbi.jpg" alt="Card image cap">
                </div>
                <div class="card-body text-center">
                    <span class="badge-box"><i class="fa fa-check"></i></span>
                    <h4 class="card-title">Mohamed SAIDI</h4>
                    <p class="card-text" style="margin-top:-10%">
                    <div class="container table-responsive py-5" style="width:100%"> 
                        <table class="table table-bordered table-hover" style="width:100%">
                            <thead class="thead-dark">
                            <tr>
                                <th>E-mail</th>
                                <th>Telephone</th>
                                <th>Adresse</th>
                                <th>Date de naissance</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>arbisaidi8@gmail.com</td>
                                <td>0668259886</td>
                                <td>16 Boulevard Charles Nicolle</td>
                                <td>15/10/1998</td>
                            <tr>
                        </table>
                    </div>
                    </p>
                    <span class="social-box">
                        <a href="#"><button class="btn btn-dark">Voir attestation</button></a>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
          <div class="card card-01">
                <div class="profile-box">
                <img class="card-img-top rounded-circle" src="photos/arbi.jpg" alt="Card image cap">
                </div>
                <div class="card-body text-center">
                    <span class="badge-box"><i class="fa fa-check"></i></span>
                    <h4 class="card-title">Mohamed SAIDI</h4>
                    <p class="card-text" style="margin-top:-10%">
                    <div class="container table-responsive py-5" style="width:100%"> 
                        <table class="table table-bordered table-hover" style="width:100%">
                            <thead class="thead-dark">
                            <tr>
                                <th>E-mail</th>
                                <th>Telephone</th>
                                <th>Adresse</th>
                                <th>Date de naissance</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>arbisaidi8@gmail.com</td>
                                <td>0668259886</td>
                                <td>16 Boulevard Charles Nicolle</td>
                                <td>15/10/1998</td>
                            <tr>
                        </table>
                    </div>
                    </p>
                    <span class="social-box">
                        <a href="#"><button class="btn btn-dark">Voir attestation</button></a>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
          <div class="card card-01">
                <div class="profile-box">
                <img class="card-img-top rounded-circle" src="photos/arbi.jpg" alt="Card image cap">
                </div>
                <div class="card-body text-center">
                    <span class="badge-box"><i class="fa fa-check"></i></span>
                    <h4 class="card-title">Mohamed SAIDI</h4>
                    <p class="card-text" style="margin-top:-10%">
                    <div class="container table-responsive py-5" style="width:100%"> 
                        <table class="table table-bordered table-hover" style="width:100%">
                            <thead class="thead-dark">
                            <tr>
                                <th>E-mail</th>
                                <th>Telephone</th>
                                <th>Adresse</th>
                                <th>Date de naissance</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>arbisaidi8@gmail.com</td>
                                <td>0668259886</td>
                                <td>16 Boulevard Charles Nicolle</td>
                                <td>15/10/1998</td>
                            <tr>
                        </table>
                    </div>
                    </p>
                    <span class="social-box">
                        <a href="#"><button class="btn btn-dark">Voir attestation</button></a>
                    </span>
                </div>
            </div>
        </div>

        

        
        </div>


        
        
    </div>
</section>



<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                  		SAIDI Mohamed
                    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                   		<h4 class="modal-title" id="myModalLabel"></h4>
                  </div>

                  <div class="modal-body">
                    <center><h1>SAIDI Mohamed</h1></center>
                    <div class="container table-responsive py-5" style="width:100%"> 
                          <table class="table table-bordered table-hover" style="width:100%">
                              <thead class="thead-dark">
                              <tr>
                                  <th>E-mail</th>
                                  <th>Telephone</th>
                                  <th>Adresse</th>
                                  <th>Date de naissance</th>
                              </tr>
                              </thead>
                              <tr>
                                  <td>arbisaidi8@gmail.com</td>
                                  <td>0668259886</td>
                                  <td>16 Boulevard Charles Nicolle</td>
                                  <td>15/10/1998</td>
                              <tr>
                          </table>
                    </div>
                    <center><h1>Stage</h1></center>
                    <div class="container table-responsive py-5" style="width:100%"> 
                          <table class="table table-bordered table-hover" style="width:100%">
                              <thead class="thead-dark">
                              <tr>
                                  <th>Tuteur IUT</th>
                                  <th>Titre du stage</th>
                                  <th>Description du stage</th>
                                  <th>Entreprise</th>
                                  <th>Adresse Entreprise</th>
                                  <th>Maitre de stage</th>
                                  <th>Email Maitre de stage</th>
                                  <th>Telephone Maitre de stage</th>
                                  <th>Date debut</th>
                                  <th>Date fin</th>
                                  <th>Durée en semaines</th>
                              </tr>
                              </thead>
                              <tr>
                                  <td><button class="btn btn-dark">Affecter</button></td>
                                  <td>Stage Développement Informatique</td>
                                  <td>Gestion d'un projet informatique (analyse, développement, phase de test, mise en production)</td>
                                  <td>Althea Solution</td>
                                  <td>12 Boulevard Latouche 72000 La Fleche</td>
                                  <td>Lionel Hardy</td>
                                  <td>lionel.hardy@althea-solutions.fr</td>
                                  <td>07.83.35.22.88</td>
                                  <td>04/04/2022</td>
                                  <td>26/06/2022</td>
                                  <td>12 semaines</td>
                              <tr>
                          </table>
                    </div>
                    <br><br>
                    <center>
                        <button class="btn btn-success">Formulaire Etudiant</button>
                        <button class="btn btn-danger">Formulaire Entreprise</button>
                        <button class="btn btn-dark">Accord Etudiant</button>
                      </center>


                  </div>
                </div>
            </div>
        </div>
<?php require "footer_dashboard.php"; ?>