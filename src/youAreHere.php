<?php
function youAreHere($page)
{
    return '<section id="blogArchive">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="blog-breadcrumbs-area">
                    <div class="container">
                        <div class="blog-breadcrumbs-left">
                            <h2>' . $page . '</h2>
                        </div>
                        <div class="blog-breadcrumbs-right">
                            <ol class="breadcrumb">
                                <li>Вы здесь</li>
                                <li><a href="index.php">Главная страница</a></li> 
                                <li class="active">' . $page . '</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>';
}

//breadcrumb -навигационная цепочка (строка навигации)
//Почему href="#"