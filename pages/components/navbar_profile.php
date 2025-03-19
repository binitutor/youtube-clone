<!-- profile menu goes here ... -->
            
            <div class="col">
                <li class="list-group-item navitem-c dropdown list-group-item">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Your account
                    </a>
                    <ul class="dropdown-menu navitem-c">
                        <?php 
                            $acc_in = true;
                            if ($acc_in){
                                echo '
                                <label>Biniam Alemayehu</label>
                                <li><hr class="dropdown-divider"></li>
                                <li class="navitem-c-dropdown">
                                    <a class="dropdown-item navitem-c-dropdown" href="#">Profile</a>
                                </li>
                                <li class="navitem-c-dropdown">
                                    <a class="dropdown-item navitem-c-dropdown" href="#">Todo</a>
                                </li>
                                <li class="navitem-c-dropdown">
                                    <a class="dropdown-item navitem-c-dropdown" href="#">Logout</a>
                                </li>
                                '; // logged in
                            } else {
                                echo '
                                <label>Your Account</label>
                                <li><hr class="dropdown-divider"></li>
                                <li class="navitem-c-dropdown">
                                    <a class="dropdown-item navitem-c-dropdown" href="#">Login</a>
                                </li>
                                '; 
                            }  
                        ?>
                    </ul>
                </li>
            </div>
        </div>
    </header>