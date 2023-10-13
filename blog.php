<?php
include 'partials/header.php';

// fetch all post from posts table
$query = "SELECT * FROM posts ORDER BY date_time DESC";
$posts =  mysqli_query($connection, $query);
?>
?>


    <!-- ====================== START OF SEARCH BAR  ====================== -->

    <section class="search__bar">
        <form action="<?=  ROOT_URL ?>search.php" class=" search__bar-container container" method="GET">
            <div>
                <i class="uil uil-search"></i>
                <input type="search" name="search" placeholder="Search">
            </div>
            <button type="submit" name="submit" class="btn">Go</button>
        </form>
    </section>
    <!-- ====================== END OF SEARCH BAR  ====================== -->

    <!-- ====================== GENERAL POSTS ====================== -->

    
    <section class="posts <?=$featured ? '': 'section__extra-margin' ?>">
        <div class="container posts__container">

        <?php while($post = mysqli_fetch_assoc($posts)) :  ?>
            <!-- article main   -->
            <article class="post">
                <div class="post__thumbnail">
                    <a href="post.php" ><img src="./images/<?= $post['thumbnail'] ?>" alt=""></a>
                </div>

                <div class="post__info">
                    
                <?php 
                    //fetch category from categories table using category_id of post
                    $category_id = $post['category_id'];
                    $category_query = "SELECT * FROM categories WHERE id=$category_id";
                    $category_result = mysqli_query($connection,$category_query);
                    $category = mysqli_fetch_assoc($category_result);

                ?>

                    <a href="<?= ROOT_URL?>category-posts.php?id=<?= $post['category_id']?>" class="category__button"><?= $category['title']?></a>
                    <h3 class="post__title">
                        <a href="<?= ROOT_URL?>post.php?id=<?=$post['id']?>"> <?= $post['title'] ?></a>
                    </h3>
                    <p class="post__body">
                    <?=substr($post['body'], 0, 150)?>....
                    </p>
                    <div class="post__author">

                    <?php 
                        //fetch author from users table using author_id
                        $author_id = $post['author_id'];
                        $author_query = "SELECT * FROM users WHERE id=$author_id";
                        $author_result = mysqli_query($connection,$author_query);
                        $author = mysqli_fetch_assoc($author_result);
                    ?>

                        <div class="post__author-avatar">
                            <img src="./images/<?= $author['avatar']?>" alt="">
                        </div>
                        <div class="post__author-info">
                        <h5>By: <?= "{$author['firstname']} {$author['lastname']}"?></h5>
                            <small>
                            <?= date("M d, Y - H:i", strtotime($post['date_time']))?>
                            </small>
                        </div>
                    </div>
                </div>

            </article>
            <!-- aritcle main  ended  -->

        <?php endwhile ?>
        </div>
    </section>
    <!-- ====================== END OF POSTS ====================== -->


    <!-- ====================== CATEGORY BUTTONS ====================== -->
    <section class="category__buttons">
        <div class="container category__buttons-container">
        <?php 
        $all_categories_query = "SELECT * FROM categories";
        $all_categories_result = mysqli_query($connection, $all_categories_query);
        ?>
        <?php while($category = mysqli_fetch_assoc($all_categories_result)) : ?>

            <a href="<?= ROOT_URL ?>category-posts.php?id=<?=$category['id']?>" class="category__button"><?= $category['title']?></a>
        <?php endwhile ?>
        </div>
    </section>
    <!-- ====================== END OF CATEGORY BUTTONS ====================== -->

    <!-- ====================== FOOTER ====================== -->
    <?php
include 'partials/footer.php'
?>

