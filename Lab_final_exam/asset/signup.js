function check_username(){
    let username = document.getElementById("user_name_id").value;
    if(username.trim() == ""){
        document.getElementById("user_name_val").style="display:block; color:red"
    }
    else{
        document.getElementById("user_name_val").style="display:none"
    }
}


function check_name(){
    let author_name = document.getElementById("author_name_id").value;
    if(author_name.trim() == ""){
        document.getElementById("author_name_val").style="display:block; color:red"
    }
    else{
        document.getElementById("author_name_val").style="display:none"
    }
}
function check_contact_no(){
    let contact_no = document.getElementById("contact_no_id").value;
    if(contact_no.trim() == ""){
        document.getElementById("contact_no_val").style="display:block; color:red"
    }
    else{
        document.getElementById("contact_no_val").style="display:none"

    }
}
function check_password(){
    let password = document.getElementById("pass_id").value;
    if(password.trim() == ""){
        document.getElementById("password_val").style="display:block; color:red"
    }
    else{
        document.getElementById("password_val").style="display:none"

    }
}
function check_confirm_password(){
    let confirm_password = document.getElementById("con_pass_id").value;
    if(confirm_password.trim() == ""){
        document.getElementById("con_password_val").style="display:block; color:red"
    }
    else{
        document.getElementById("con_password_val").style="display:none"

    }
}