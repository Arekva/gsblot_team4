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
            <h3 id="fullName">
                <?php
                $nomUser = "El DIIOOO";
                echo $nomUser;
                ?>
            </h3>
            <strong id="initialName">
                <?php
                $nomUserInitial = "ED";
                echo $nomUserInitial;
                ?>
            </strong>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="#">
                    <i class="fas fa-bookmark"></i>
                    TRUC1
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bookmark"></i>
                    TRUC2
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bookmark"></i>
                    TRUC3
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bookmark"></i>
                    TRUC4
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-bookmark"></i>
                    TRUC4
                </a>
            </li>
        </ul>

    </nav>

</div>