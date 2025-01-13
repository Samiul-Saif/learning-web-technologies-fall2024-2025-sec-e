function search_author(){
    search = document.getElementById("search").value;
    let xhttp = new XMLHttpRequest();
    xhttp.open("post", "../controller/search_user.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("search=" + search);
    
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
          let tableBody = document.querySelector("table tbody");
    
          if (!tableBody) {
            tableBody = document.createElement("tbody");
            document.querySelectorAll("table").appendChild(tableBody);
          }
    
          if (this.responseText == "No User found") {
            let messageRow = document.createElement("tr");
            let messageCell = document.createElement("td");
            messageCell.setAttribute("colspan", "8"); 

            messageCell.innerHTML = "No User found"; 
            messageRow.appendChild(messageCell);
            tableBody.innerHTML = ""; 
            tableBody.appendChild(messageRow);
          } else {
            tableBody.innerHTML = this.responseText;
          }
        }

}
}