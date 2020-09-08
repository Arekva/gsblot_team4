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
            $nomUser = "Gaetan Fontan";
            $nomUserInitial = "GF";
            echo "
            <h3 id=\"fullName\">
                ".$nomUser."
            </h3>
            <strong id=\"initialName\" style=\"display: none;\">
                ".$nomUserInitial."
            </strong>";
            ?>


        </div>

        <ul class="list-unstyled components" id="test">
            <li class="active">
                <a href="#">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text">TRUC1</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text">TRUC1</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text">TRUC1</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bookmark bigMoi"></i>
                    <div class="sidebar-text">TRUC1</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-share bigMoi"></i>
                    <div class="sidebar-text">DISCONNECT</div>
                </a>
            </li>
        </ul>

    </nav>

</div>