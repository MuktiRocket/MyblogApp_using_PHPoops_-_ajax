const registerform = document.getElementById("registerform");
const addform = document.getElementById("add-blog-form");
const updateform = document.getElementById("edit-blog-form");
const showAlert = document.getElementById("showAlert");
// const addModal = new bootstrap.Modal(document.getElementById("addNewblogModal"));
// const editModal = new bootstrap.Modal(document.getElementById("editblogModal"));
const tbody = document.querySelector('tbody');

console.log(registerform);

// register form ajax request



registerform.addEventListener('submit', async (e) => {

    const formdata = new FormData(registerform);

    formdata.append("register", 1);

    if (registerform.checkValidity() === false) {
        registerform.classList.add("was-validated");
        return false;
    }
    else {
        document.getElementById('registerform-btn').value = 'Please Wait ...';
        const data = await fetch("action.php", {
            method: "POST",
            body: formdata,
        });
        const response = await data.text();
        // showAlert.innerHTML = response;
        document.getElementById('registerform-btn').value = "Register";
        registerform.reset();
        registerform.classList.remove("was-validated");
        // addModal.hide();
        // fetchAllUsers();
    }

});


// add new user ajax request

addform.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formdata = new FormData(addform);
    formdata.append("add", 1);

    if (addform.checkValidity() === false) {
        e.preventDefault();
        e.stopPropagation();
        addform.classList.add("was-validated");
        return false;
    }
    else {
        document.getElementById('add-blog-btn').value = 'Please Wait ...';
        const data = await fetch("action.php", {
            method: "POST",
            body: formdata,
        });
        const response = await data.text();
        showAlert.innerHTML = response;
        document.getElementById('add-blog-btn').value = "Add blog";
        addform.reset();
        addform.classList.remove("was-validated");
        addModal.hide();
        fetchAllUsers();
    }

});

//fetch all users ajax request;



const fetchAllUsers = async () => {
    const data = await fetch("action.php?read=1", {
        method: "GET",
    });
    const response = await data.text();
    tbody.innerHTML = response;


};
fetchAllUsers();


//Edit ajax request



tbody.addEventListener("click", (e) => {

    if (e.target && e.target.matches("a.editLink")) {
        e.preventDefault();
        let id = e.target.getAttribute("id");
        editUser(id);
    }

});

const editUser = async (id) => {


    const data = await fetch(`action.php?edit=1&id=${id}`, {
        method: "GET",
    });
    const response = await data.json();
    document.getElementById("id").value = response.id;
    document.getElementById("blogsubject").value = response.blogsubject;
    document.getElementById("blogcontent").value = response.blogcontent;
};


//update user ajax request

updateform.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formdata = new FormData(updateform);

    formdata.append("update", 1);

    if (updateform.checkValidity() === false) {
        e.preventDefault();
        e.stopPropagation();
        updateform.classList.add("was-validated");
        return false;
    }
    else {
        document.getElementById('edit-blog-btn').value = 'Please Wait ...';
        const data = await fetch("action.php", {
            method: "POST",
            body: formdata,
        });
        const response = await data.text();
        showAlert.innerHTML = response;
        document.getElementById('edit-blog-btn').value = "Update blog";
        updateform.reset();
        updateform.classList.remove("was-validated");
        editModal.hide();
        fetchAllUsers();
    }
});



//Delete ajax request

tbody.addEventListener("click", (e) => {

    if (e.target && e.target.matches("a.deleteLink")) {
        e.preventDefault();
        let id = e.target.getAttribute("id");
        deleteUser(id);
    }
});

const deleteUser = async (id) => {
    const data = await fetch(`action.php?delete=1&id=${id}`, {
        method: "GET",
    });
    const response = await data.text();
    showAlert.innerHTML = response;
    fetchAllUsers();
}