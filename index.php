
<?php 
include('dbconnect.php');
session_start();
$query = "SELECT * from movies";
$result = mysqli_query($connection, $query);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Net Ninja Pro - the Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        section {
            padding: 60px 0;
        }
    </style>
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-light pt-5 pb-4">
        <div class="container-xxl">
            <!-- navbar brand / title -->
            <a class="navbar-brand" href="#intro">
                <span class="text-secondary fw-bold">
                    HOME
                </span>
            </a>
            <!-- toggle button for mobile nav -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
                aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- navbar links -->
            <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#topics">About The Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reviews">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Get in Touch</a>
                    </li>
                    <li class="nav-item d-md-none">
                        <a class="nav-link" href="#pricing">Pricing</a>
                    </li>
<?php if(empty($_SESSION['username'])){ ?>
                    <form action="login.php" method="POST">
                        <li class="nav-item ms-2 d-none d-md-inline">
                            <input type="submit" class="btn btn-secondary" name="login" value="LOGIN">
                        </li>
                    </form>
                    <form action="signup.php" method="POST">
                        <li class="nav-item ms-2 d-none d-md-inline">
                            <input type="submit" class="btn btn-secondary" name="signup" value="SIGNUP">
                        </li>
                    </form>
<?php } else { ?>
    <form action="profile.php" method="post">
    <li class="nav-item ms-2 d-none d-md-inline">
                            <input type="submit" class="btn btn-secondary" name="profile" value="PROFILE">
                        </li>
</form>
                        <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

<?php if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)) {
    ?>
    <!-- main image & intro text -->
    <section id="intro">
        <div class="container-lg">
            <div class="row g-4 justify-content-center align-items-center">
                <div class="col-md-5 text-center text-md-start">
                    <h1>
                        <div class="display-2"><?php echo $row['movietitle']; ?></div>
                    </h1>
                    <p class="lead my-4 text-muted"><?php echo $row['moviedescription'] ?></p>
                    <a class="btn btn-secondary btn-lg" href="<?php echo "buynow.php?movieid=".$row['movieid']; ?>">Buy Now <?php echo $row['movieprice']; ?></a>
                </div>
                <div class="col-md-5 text-center d-none d-md-block">
                    <img src="<?php echo "assets/".$row['movieimage']; ?>" class="img-fluid"
                        alt="Movieimage">
                </div>
            </div>
        </div>
    </section>

    <?php }} ?>

    <!-- pricing plans -->
    <section id="pricing" class="bg-light mt-5">
        <div class="container-lg">
            <div class="text-center">
                <h2>Pricing Plans</h2>
                <p class="lead text-muted">Choose a pricing plan to suit you.</p>
            </div>

            <div class="row my-5 g-0 align-items-center justify-content-center">
                <div class="col-8 col-lg-4 col-xl-3">
                    <div class="card border-0">
                        <div class="card-body text-center py-4">
                            <h4 class="card-title">Starter Edition</h4>
                            <p class="lead card-subtitle">eBook download only</p>
                            <p class="display-5 my-4 text-primary fw-bold">$12.99</p>
                            <p class="card-text mx-5 text-muted d-none d-lg-block">Lorem ipsum dolor sit amet
                                consectetur adipisicing elit. Mollitia, vitae magni! Repellat commodi a fuga corporis
                                saepe dolorum.</p>
                            <a href="#" class="btn btn-outline-primary btn-lg mt-3">
                                Buy Now
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-9 col-lg-4">
                    <div class="card border-primary border-2">
                        <div class="card-header text-center text-primary">Most Popular</div>
                        <div class="card-body text-center py-5">
                            <h4 class="card-title">Complete Edition</h4>
                            <p class="lead card-subtitle">eBook download & all updates</p>
                            <p class="display-4 my-4 text-primary fw-bold">$18.99</p>
                            <p class="card-text mx-5 text-muted d-none d-lg-block">Lorem ipsum dolor sit amet
                                consectetur adipisicing elit. Mollitia, vitae magni! Repellat commodi a fuga corporis
                                saepe dolorum.</p>
                            <a href="#" class="btn btn-outline-primary btn-lg mt-3">
                                Buy Now
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-8 col-lg-4 col-xl-3">
                    <div class="card border-0">
                        <div class="card-body text-center py-4">
                            <h4 class="card-title">Ultimate Edition</h4>
                            <p class="lead card-subtitle">download, updates & extras</p>
                            <p class="display-5 my-4 text-primary fw-bold">$24.99</p>
                            <p class="card-text mx-5 text-muted d-none d-lg-block">Lorem ipsum dolor sit amet
                                consectetur adipisicing elit. Mollitia, vitae magni! Repellat commodi a fuga corporis
                                saepe dolorum.</p>
                            <a href="#" class="btn btn-outline-primary btn-lg mt-3">
                                Buy Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- end container -->
    </section>

    <!-- topics at a glance -->
    <section id="topics">
        <div class="container-md">
            <div class="text-center">
                <h2>Inside the Book...</h2>
                <p class="lead text-muted">A quick glance at the topics you'll learn</p>
            </div>
            <div class="row my-5 g-5 justify-content-around align-items-center">
                <div class="col-6 col-lg-4">
                    <img src="/assets/kindle.png" class="img-fluid" alt="ebook">
                </div>
                <div class="col-lg-6">

                    <!-- accordion -->
                    <div class="accordion" id="chapters">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#chapter-1" aria-expanded="true" aria-controls="chapter-1">
                                    Chapter 1 - Your First Web Page
                                </button>
                            </h2>
                            <div id="chapter-1" class="accordion-collapse collapse show" aria-labelledby="heading-1"
                                data-bs-parent="#chapters">
                                <div class="accordion-body">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis assumenda delectus
                                        sapiente quidem consequatur odit adipisci necessitatibus nemo aliquid minus modi
                                        tempore quibusdam quas vitae, animi ipsam nulla sunt alias.</p>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis assumenda delectus
                                        sapiente quidem consequatur odit adipisci necessitatibus nemo aliquid minus modi
                                        tempore quibusdam quas vitae, animi ipsam nulla sunt alias.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#chapter-2" aria-expanded="false" aria-controls="chapter-2">
                                    Chapter 2 - Mastering CSS
                                </button>
                            </h2>
                            <div id="chapter-2" class="accordion-collapse collapse" aria-labelledby="heading-2"
                                data-bs-parent="#chapters">
                                <div class="accordion-body">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis assumenda delectus
                                        sapiente quidem consequatur odit adipisci necessitatibus nemo aliquid minus modi
                                        tempore quibusdam quas vitae, animi ipsam nulla sunt alias.</p>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis assumenda delectus
                                        sapiente quidem consequatur odit adipisci necessitatibus nemo aliquid minus modi
                                        tempore quibusdam quas vitae, animi ipsam nulla sunt alias.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#chapter-3" aria-expanded="false" aria-controls="chapter-1">
                                    Chapter 3 - The Power of JavaScript
                                </button>
                            </h2>
                            <div id="chapter-3" class="accordion-collapse collapse" aria-labelledby="heading-3"
                                data-bs-parent="#chapters">
                                <div class="accordion-body">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis assumenda delectus
                                        sapiente quidem consequatur odit adipisci necessitatibus nemo aliquid minus modi
                                        tempore quibusdam quas vitae, animi ipsam nulla sunt alias.</p>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis assumenda delectus
                                        sapiente quidem consequatur odit adipisci necessitatibus nemo aliquid minus modi
                                        tempore quibusdam quas vitae, animi ipsam nulla sunt alias.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#chapter-4" aria-expanded="false" aria-controls="chapter-4">
                                    Chapter 4 - Storing Data (Firebase Databases)
                                </button>
                            </h2>
                            <div id="chapter-4" class="accordion-collapse collapse" aria-labelledby="heading-4"
                                data-bs-parent="#chapters">
                                <div class="accordion-body">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis assumenda delectus
                                        sapiente quidem consequatur odit adipisci necessitatibus nemo aliquid minus modi
                                        tempore quibusdam quas vitae, animi ipsam nulla sunt alias.</p>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis assumenda delectus
                                        sapiente quidem consequatur odit adipisci necessitatibus nemo aliquid minus modi
                                        tempore quibusdam quas vitae, animi ipsam nulla sunt alias.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#chapter-5" aria-expanded="false" aria-controls="chapter-5">
                                    Chapter 5 - User Authentication
                                </button>
                            </h2>
                            <div id="chapter-5" class="accordion-collapse collapse" aria-labelledby="heading-5"
                                data-bs-parent="#chapters">
                                <div class="accordion-body">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis assumenda delectus
                                        sapiente quidem consequatur odit adipisci necessitatibus nemo aliquid minus modi
                                        tempore quibusdam quas vitae, animi ipsam nulla sunt alias.</p>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis assumenda delectus
                                        sapiente quidem consequatur odit adipisci necessitatibus nemo aliquid minus modi
                                        tempore quibusdam quas vitae, animi ipsam nulla sunt alias.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- reviews list -->
    <section id="reviews" class="bg-light">
        <div class="container-lg">
            <div class="text-center">
                <h2>Book Reviews</h2>
                <p class="lead">What my students have said about the book...</p>
            </div>

            <div class="row justify-content-center my-5">
                <div class="col-lg-8">
                    <div class="list-group">
                        <div class="list-group-item py-3">
                            <h5 class="mb-1">A must-buy for every aspiring web dev</h5>
                            <p class="mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur error
                                veniam sit expedita est illo maiores neque quos nesciunt, reprehenderit autem odio
                                commodi labore praesentium voluptate repellat in id quisquam.</p>
                            <small>Review by Mario</small>
                        </div>
                        <div class="list-group-item py-3">
                            <h5 class="mb-1">A must-buy for every aspiring web dev</h5>
                            <p class="mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur error
                                veniam sit expedita est illo maiores neque quos nesciunt, reprehenderit autem odio
                                commodi labore praesentium voluptate repellat in id quisquam.</p>
                            <small>Review by Mario</small>
                        </div>
                        <div class="list-group-item py-3">
                            <h5 class="mb-1">A must-buy for every aspiring web dev</h5>
                            <p class="mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur error
                                veniam sit expedita est illo maiores neque quos nesciunt, reprehenderit autem odio
                                commodi labore praesentium voluptate repellat in id quisquam.</p>
                            <small>Review by Mario</small>
                        </div>
                        <div class="list-group-item py-3">
                            <h5 class="mb-1">A must-buy for every aspiring web dev</h5>
                            <p class="mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur error
                                veniam sit expedita est illo maiores neque quos nesciunt, reprehenderit autem odio
                                commodi labore praesentium voluptate repellat in id quisquam.</p>
                            <small>Review by Mario</small>
                        </div>
                        <div class="list-group-item py-3">
                            <h5 class="mb-1">A must-buy for every aspiring web dev</h5>
                            <p class="mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur error
                                veniam sit expedita est illo maiores neque quos nesciunt, reprehenderit autem odio
                                commodi labore praesentium voluptate repellat in id quisquam.</p>
                            <small>Review by Mario</small>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- contact form -->


    <!-- get updates / modal trigger -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>