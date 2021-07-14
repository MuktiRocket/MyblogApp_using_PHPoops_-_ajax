<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CRUD APPLICATION USING OOPS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- nav bar begins -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
            </div>
        </div>
    </nav>


    <!-- nav bar ended -->





    <!-- add new blog modal starts -->




    <div class="modal fade" tabindex="-1" id="addNewblogModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Blog</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add-blog-form" class="p-2" novalidate>
                        <div class="row mb-3 gx-3">
                            <div class="col">
                                <input type="text" name="blogsubject" class="form-control form-control-lg" placeholder="Enter Blog Subject" required>
                                <div class="invalid-feedback">Blog Subject is required!</div>
                            </div>
                            <div class="col">
                                <input type="text" name="blogcontent" class="form-control form-control-lg" placeholder="Enter Blog Content" required>
                                <div class="invalid-feedback">Blog Content is required!</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Add blog" class="btn btn-primary btn-block btn-lg" id="add-blog-btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- add new blog modal ends -->






    <!-- Edit user modal starts -->

    <div class="modal fade" tabindex="-1" id="editblogModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit New User</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-blog-form" class="p-2" novalidate>
                        <input type="hidden" name="id" id="id" value=''>
                        <div class="row mb-3 gx-3">
                            <div class="col">
                                <input type="text" name="blogsubject" id="blogsubject" class="form-control form-control-lg" placeholder="Enter Blog Subject" required>
                                <div class="invalid-feedback">Blog subject is required!</div>
                            </div>
                            <div class="col">
                                <input type="text" name="blogcontent" id="blogcontent" class="form-control form-control-lg" placeholder="Enter Blog Content" required>
                                <div class="invalid-feedback">Blog content is required!</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Update Blog" class="btn btn-success btn-block btn-lg" id="edit-blog-btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <!--Edit user modal ends -->

    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="text-secondary">All Blogs</h4>
                </div>
                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewblogModal">
                        Add New Blog
                    </button>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div id="showAlert"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-centered">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Username
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Blog-Subject
                                </th>
                                <th>
                                    Blog-Content
                                </th>
                                <th>
                                    Created-At
                                </th>
                                <th>
                                    action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="main.js"></script>

</html>