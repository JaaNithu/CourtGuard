<nav class="navbar navbar-expand-lg bg-white shadow sticky-top">
    <div class="container">
        <a class="navbar-brand" href="user_index.php">Department</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="user_index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="offenders_list.php">Offenders List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.php">Category List</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"  aria-expanded="false">
                            <?php
                            if(isset($_SESSION['auth']))
                            {
                                echo $_SESSION['auth_user']['email'];
                            }
                            else
                            {
                                echo "Not logged In";
                            }
                            ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a href="#" class="dropdown-item"></a>
                            <a href="#" class="dropdown-item"></a>
                            <form action="logout.php" method="POST">
                                <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    $(document).ready(function() {
        $('#dropdownMenuButton').on('click', function() {
            $('.dropdown-menu').toggleClass('show');
        });
    });
</script>
