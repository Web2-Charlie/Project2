
<div class="d-flex" id="wrapper">
    <div class="bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
            <i class="fas fa-user-secret me-2"></i>
            
                <?php echo $_SESSION['username'] ?>
            
            </div>
        <div class="list-group list-group-flush my-3">
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active">
                <i class="fas fa-tachometer-alt me-2"></i>
                
                Dashboard
            
            </a>
            <a href="getmytasklist" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fas fa-project-diagram me-2"></i>
                
                My Tasks List
                
            </a>

            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <span class="fas fa-list"></span>
                
                My Tasks
                
            </a>

            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fas fa-paperclip me-2"></i>

                    Attachment
                
                </a>
            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fas fa-user-friends me-2"></i>
                
                Disabled Users
            
            </a>

            <a href="<?=base_url().'logout/index' ?>" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                <i class="fas fa-power-off me-2"></i>
                
                Logout
            
            </a>
        </div>
    </div>
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-2 m-0">
                    
                
                </h2>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="m-r-20">
                        <a class="btn btn-primary m-1" data-bs-toggle="modal" href="#exampleModalToggle" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                            <span>

                                Employee

                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="btn btn-primary m-1" data-bs-toggle="modal" href="#addtask" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                            <span>

                                Task

                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="btn btn-primary m-1" data-bs-toggle="modal" href="#addfile" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                                <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                            </svg>
                            <span>

                                File

                            </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-2"></i><?php echo $_SESSION['username']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#">
                                    
                                    Profile
                                
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    
                                    Settings
                                
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    
                                    Logout
                                
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="dashboard" class="container-fluid px-4">
            <div class="row g-3 my-2">
                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2">0</?php echo count($users); ?></h3>
                            <p class="fs-5">
                                
                                Employees
                            
                            </p>
                        </div>
                        <i class="fas fa-user-friends primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2">
                                0
                            </h3>
                            <p class="fs-5">

                                Finish Task

                            </p>
                        </div>
                        <i
                            class="fas fa-tasks primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2">0.00</h3>
                            <p class="fs-5">
                                
                                Income
                            
                            </p>
                        </div>
                        <i class="fas fa-wallet primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2">0%</h3>
                            <p class="fs-5">
                                
                                Increase
                            
                            </p>
                        </div>
                        <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- </?php echo $_SESSION['userid'] ?> -->
    <!-- /#page-content-wrapper -->           
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>