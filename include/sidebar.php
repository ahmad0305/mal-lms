 <!-- Offcanvas start -->      
 <div class="offcanvas offcanvas-start bg-dark text-white sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <!-- <div class="offcanvas-header">
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div> -->
        <div class="offcanvas-body">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="text-secondary small text-uppercase fw-bold">Core</div>
                  </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL ?>dashboard.php"><i class="fa-solid fa-gauge me-2"></i>Deshboard</a>
                </li>
                <li class="nav-item my-0">
                    <hr>
                </li>
                <li class="nav-item">
                    <div class="text-secondary small text-uppercase fw-bold">Inventry</div>
                  </li>
                <li class="nav-item">
                    <a class="nav-link sidebar-link" data-bs-toggle="collapse" href="#booksMgmt" role="button" aria-expanded="false" aria-controls="booksMgmt"><i class="fa-solid fa-book me-2"></i>
                        Books Management <span class="right-icon float-end"><i class="fa-solid fa-chevron-down"></i></span>
                      </a> 
                      <div class="collapse" id="booksMgmt">
                        <div>
                        <ul class="navbar-nav ps-3">
                            <li class="">
                            <a href="<?php echo BASE_URL ?>books/add.php" class="nav-link"><i class="fa-solid fa-plus me-2"></i>Add New</a>
                            </li>
                                <a href="<?php echo BASE_URL ?>books/" class="nav-link"><i class="fa-solid fa-list me-2"></i>Manage All</a>
                            </li>                            
                        </ul>
                        </div> 
                      </div>                
                </li>
                <li class="nav-item">
                    <a class="nav-link sidebar-link" data-bs-toggle="collapse" href="#studentMgmt" role="button" aria-expanded="false" aria-controls="studentMgmt"><i class="fa-solid fa-user me-2"></i>
                        Student Management <span class="right-icon float-end"><i class="fa-solid fa-chevron-down"></i></span>
                      </a> 
                      <div class="collapse" id="studentMgmt">
                        <div>
                        <ul class="navbar-nav ps-3">
                            <li class="">
                            <a href="<?php echo BASE_URL ?>students/add.php" class="nav-link"><i class="fa-solid fa-plus me-2"></i>Add New</a>
                            </li>
                                <a href="<?php echo BASE_URL ?>students/" class="nav-link"><i class="fa-solid fa-list me-2"></i>Manage All</a>
                            </li>                            
                        </ul>
                        </div> 
                      </div>                
                </li>
                <li class="nav-item my-0">
                    <hr>
                </li>
                <li class="nav-item">
                    <div class="text-secondary small text-uppercase fw-bold">Busness</div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link sidebar-link" data-bs-toggle="collapse" href="#loanMgmt" role="button" aria-expanded="false" aria-controls="loanMgmt"><i class="fa-solid fa-book-open me-2"></i>
                        Books Loan <span class="right-icon float-end"><i class="fa-solid fa-chevron-down"></i></span>
                      </a> 
                      <div class="collapse" id="loanMgmt">
                        <div>
                        <ul class="navbar-nav ps-3">
                            <li class="">
                            <a href="<?php echo BASE_URL ?>loans/add.php" class="nav-link"><i class="fa-solid fa-plus me-2"></i>Add New</a>
                            </li>
                                <a href="<?php echo BASE_URL ?>loans/" class="nav-link"><i class="fa-solid fa-list me-2"></i>Manage All</a>
                            </li>                            
                        </ul>
                        </div> 
                      </div>                
                </li>
                <li class="nav-item">
                    <a class="nav-link sidebar-link" data-bs-toggle="collapse" href="#subscriptionMgmt" role="button" aria-expanded="false" aria-controls="subscriptionMgmt"><i class="fa-solid fa-indian-rupee-sign me-2"></i>
                        Subscription <span class="right-icon float-end"><i class="fa-solid fa-chevron-down"></i></span>
                      </a> 
                      <div class="collapse" id="subscriptionMgmt">
                        <div>
                        <ul class="navbar-nav ps-3">
                            <li class="">
                            <a href="<?php echo BASE_URL ?>subscriptions" class="nav-link"><i class="fa-solid fa-plus me-2"></i>Plans</a>
                            </li>
                                <a href="<?php echo BASE_URL ?>subscriptions/purchase-history.php" class="nav-link"><i class="fa-solid fa-list me-2"></i>Purchase Histry</a>
                            </li> 
                        </ul>
                        </div> 
                      </div>                
                </li>
                <li class="nav-item my-0">
                    <hr>
                </li>                
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL ?>logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i></i>Logout</a>
                  </li>
              </ul>
        </div>
      </div>
    <!-- Offcanvas End -->