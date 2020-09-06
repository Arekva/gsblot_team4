function hideDashboard() {
    let fullName = document.getElementById("fullName");
    let initialName = document.getElementById("initialName");
    if (fullName.style.display === "none") {
        fullName.style.display = "block";
        initialName.style.display = "none";
    } else {
        fullName.style.display = "none";
        initialName.style.display = "block";
    }
}