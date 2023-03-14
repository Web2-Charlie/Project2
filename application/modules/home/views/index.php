
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
        <div id="task" class="container-fluid px-4">
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Tasks</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Date Assigned</th>
                                    <th scope="col">Task Title</th>
                                    <th scope="col">Instrcution</th>
                                    <th scope="col">Assign To</th>
                                    <th scope="col">ETC</th>
                                    <th scope="col">Task Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                            foreach($tasks as $task): ?>
                                <tr id="<?=$task['task_id']?>">
                                    <?php $c_date = DateTime::createFromFormat('Y-m-d', $task['assign_date']); ?>
                                    <td><?= $date_created = $c_date->format('M d, Y') ?></td>
                                    <td><?=$task['task_title']?></td>
                                    <td><?=$task['task_instruction']?></td>
                                    <td><?=$task['assign_to']?></td>
                                    <?php $d_date = DateTime::createFromFormat('Y-m-d', $task['due_date']); ?>
                                    <td><?=$due_date = $d_date->format('M d, Y') ?></td>
                                    <?php  if(strtolower($task['task_status']) == strtolower("Pending")) { ?>

                                            <td class="text-warning fw-bold"><?=$task['task_status']?></td>

                                    <?php 
                                        }
                                        elseif(strtolower($task['task_status']) == strtolower("In Progress")) { ?>

                                            <td class="text-primary fw-bold"><?=$task['task_status']?></td>

                                    <?php 
                                        }
                                        elseif(strtolower($task['task_status']) == strtolower("Break")) { ?>

                                            <td class="text-danger fw-bold"><?=$task['task_status']?></td>

                                        <?php 
                                        }
                                     else { ?>

                                        <td class="text-success fw-bold"><?=$task['task_status']?></td>

                                    <?php } ?>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item text-primary fw-bold" href="inProgress?taskid=<?=$task['task_id']?>">In Progress</a></li>
                                                <li><a class="dropdown-item text-danger fw-bold" href="break?taskid=<?=$task['task_id']?>">Break</a></li>
                                                <li><a class="dropdown-item text-success fw-bold" href="for_QA?taskid=<?=$task['task_id']?>">For QA</a></li>
                                            </ul>
                                            </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
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