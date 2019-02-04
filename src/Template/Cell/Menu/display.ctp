<div class="col-md-12 text-center nav-color">
    <nav class="nav  navbar-expand-lg navbar-dark ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ">
                <?php
                foreach ($menu as $parent => $child) {

                    echo '<li class="nav-item dropdown" ><a class="nav-link " id="navbarDropdown" href="#" aria-expanded="false">' .$child->title  . '</a>';
                    echo '<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';

                    foreach ($child->childmenus as $key => $value) {

                        echo '	<a class="dropdown-item" href="'. $value->destination .'"">' . $value->title  . '</a>';
                    }
                    echo '</div></li>';
                }
                ?>

            </ul>

        </div>
    </nav>

</div>
