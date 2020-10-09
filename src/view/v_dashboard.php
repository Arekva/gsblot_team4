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
            echo "
            <h3 id=\"fullName\">
                ".$nom." ".$prenom."
            </h3>
            <strong id=\"initialName\" style=\"display: none;\">
                ".substr($nom,0,1).substr($prenom,0,1)."
            </strong>";
            ?>


        </div>

        <ul class="list-unstyled components" id="test">
            <li class="active">
            <?php
            
            // production
            if ($_SESSION['droit'] == 1){
                echo '
                <a href="index.php?uc=production&action=consultLotMedicament">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text">Ajout de lot </div>
                </a>
            </li>
            <li>
                <a href="index.php?uc=production&action=chooseMedicament">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text">Consulter les lots par medicament</div>
                </a>
            </li>
            <li>
                <a href="index.php?uc=production&action=chooseDate">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text"> Consulter les lots par date de production</div>
                </a>
            </li>
            <li>
                <a href="index.php?uc=deconnexion">
                    <i class="fas fa-share bigMoi"></i>
                    <div class="sidebar-text">DISCONNECT</div>
                </a>
            </li>' ;                        
            }

            // magasin
            if ($_SESSION['droit'] == 2 ){
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
                <a href="index.php?uc=deconnexion">
                    <i class="fas fa-share bigMoi"></i>
                    <div class="sidebar-text">DISCONNECT</div>
                </a>
            </li>
            '
            ; 

            }

            //visiteur
            if ($_SESSION['droit'] == 3 ){
                echo '
                <a href="#">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text">Donner un échantillon</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text">Echantillon par médicaments</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text"> Echantillon par date de visite</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text"> Echantillon sortis par date de sortie</div>
                </a>
            </li>
            <li>
                <a href="index.php?uc=deconnexion">
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
        
        
        for ($i = 0; $i>$_SESSION'affichage'].count;$i++){
            require $_SESSION['affichage'][$i];
        }*/
        
        
        echo  $_SESSION['affichage'][1];
        echo  count($_SESSION['affichage']);-->
        <?php
            for ($i = 0; $i<count($_SESSION['affichage']);$i++){
                $temp = "view/".$_SESSION['affichage'][$i].".php";
                require $temp;
            }
        ?>
    </div>
</div>