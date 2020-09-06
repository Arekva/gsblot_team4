function hideDashboard() {
    let fullName = document.getElementById("fullName");
    let initialName = document.getElementById("initialName");
    let bigMoi = document.getElementsByClassName("bigMoi");
    let sidebarText = document.getElementsByClassName("sidebar-text");
    let sidebar = document.getElementById("sidebar");
    let arrowL = document.getElementsByClassName("fa-angle-double-left")[0];
    let arrowR = document.getElementsByClassName("fa-angle-double-right")[0];
    if (fullName.style.display === "none") {
        fullName.style.display = "block";
        initialName.style.display = "none";
        sidebar.style.cssText =
            "    min-width: 250px;\n" +
            "    width: 250px;\n";
        arrowL.style.display = "block";
        arrowR.style.display = "none";
        for (var i = 0; i < bigMoi.length; i++) { /*        BOURRIN - theo, 2020 -      */
            bigMoi[i].style.fontSize = '20px';
            sidebarText[i].style.display = "block";

        }
    } else {
        fullName.style.display = "none";
        initialName.style.display = "block";
        sidebar.style.cssText =
            "    min-width: 0;\n" +
            "    width: 60px;\n";
        arrowL.style.display = "none";
        arrowR.style.display = "block";
        for (var i = 0; i < bigMoi.length; i++) {
            bigMoi[i].style.fontSize = '30px';
            sidebarText[i].style.display = "none";
        }

    }
}