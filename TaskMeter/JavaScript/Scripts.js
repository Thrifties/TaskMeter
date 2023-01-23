function logout()
{
	var choice = confirm("Do you really want to log out?");
	if(choice==true)
	window.location = "toLogout.php";
}

let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange();//calling the function(optional)
        });

        // following are the code to change sidebar button(optional)
        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-tachometer", "bx-menu");//replacing the iocns class
            } else {
                closeBtn.classList.replace("bx-menu", "bx-tachometer");//replacing the iocns class
            }
        }