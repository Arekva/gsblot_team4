<nav class="navbar navbar navbar-dark nav-top-dashboard">

    <a class="navbar-brand" href="#" >
        <img src="includes/logoGSBlight.png" height="30" class="d-inline-block align-top" alt="">
        <button type="button" class="btn btn-light btn-sm nav-top-dashboard-toggle-button" onclick="hideDashboard()"><i class="fas fa-angle-double-left"></i><i class="fas fa-angle-double-right"></i></button>
    </a>

</nav>
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">

            <!-- nom Dashboard -->
            <?php
            $nomUserInitial = "pasFait";
            echo "
            <h3 id=\"fullName\">
                ".$nom." ".$prenom."
            </h3>
            <strong id=\"initialName\" style=\"display: none;\">
                ".$nomUserInitial."
            </strong>";
            ?>


        </div>

        <ul class="list-unstyled components" id="test">
            <li class="active">
            <?php
            
            // production
            if ($user[0]['gsb_autorisation'] == 1){
                echo '
                <a href="#">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text">Ajout de lot </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text">Consulter les lots par medicament</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text"> Consulter les lots par date de production</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-share bigMoi"></i>
                    <div class="sidebar-text">DISCONNECT</div>
                </a>
            </li>' ;                        
            }

            // magasin
            if ($user[0]['gsb_autorisation'] == 2 ){
                echo '
            <a href="#">
                <i class="fas fa-bookmark bigMoi"></i>
                <div class="sidebar-text">Renseigne date et user </div>
            </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text">Consulte échantillon stock</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text"> Consulte échantillon sortis par medicament</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text"> Consulte échantillon sortis par date de sortie</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text"> Consulte échantillon sortis par visiteurs</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-share bigMoi"></i>
                    <div class="sidebar-text">DISCONNECT</div>
                </a>
            </li>
            '
            ; 

            }

            //visiteur
            if ($user[0]['gsb_autorisation'] == 3 ){
                echo '
                <a href="#">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text">Renseigne date et medecins a qui l echantillon a été donné </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text">Consulte échantillon par médicaments</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text"> Consulte échantillon par date de visite</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text"> Consulte échantillon sortis par date de sortie</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text"> Consulte échantillon sortis par visiteurs</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-share bigMoi"></i>
                    <div class="sidebar-text">DISCONNECT</div>
                </a>
            </li>' ; 

            }


            ?>
        </ul>

    </nav>
    <div class="main-db">
        <!-- Y a moyen de faire en sorte que le controller interviennet ici dans devoir mettre les autres balises dans le footer, je m'en occuprais + tard
        - QUEL CONTROLER ?
        -->
        <?php


        ?>
    </div>
</div>