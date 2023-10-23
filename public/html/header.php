<header>
    <div class="navbar navbar-dark bg-dark shadow-sm" bis_skin_checked="1">
    <div class="container" bis_skin_checked="1">
        <a href="/" class="navbar-brand d-flex align-items-center">
        <strong>
            <!-- <?php echo $company_name; ?> -->
            &copy 
            Url Cut
        </strong>

        </a>
        
        <div class="navbar-brand d-flex align-items-center">
            <?php if(isset($_COOKIE['id'])) { ?>
                <a href="/user" class="p-2">
                    <button type="button" class="btn btn-outline-light">
                        <?php echo $_COOKIE['name']; ?>
                    </button>
                </a>
                <a href="/logout" class="p-2">
                    <button type="button" class="btn btn-outline-light">
                        Выход
                    </button>
                </a>
            <?php } 
        else if(!isset($_COOKIE['id'])) { 
            
            if(!($route == "/auth")) { ?>
                <a href="/auth" class="p-2">
                    <button type="button" class="btn btn-outline-light">
                        Вход
                    </button>
                </a>
                <?php }
            else { ?>


                <a href="/reg" class="p-2">
                    <button type="button" class="btn btn-outline-light">
                        Регистрация
                    </button>
                </a>
            <?php } ?>
        <?php } ?>
        </div>

        <!-- <a href="#" class="navbar-brand d-flex align-items-center">
        <strong>
            <img src="./imeges/avatar.png" alt="avatar" height="70" class="d-inline-block align-text-top">
        </strong>
        </a> -->
       
    </div>
    </div>
</header>