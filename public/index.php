<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cupcake-store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min (1).css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

    <div class="container my-15">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <!-- Card Container -->
                <div class="card shadow-lg border-0 rounded-5 p-1 text-center bg-transparent">
                    <div class="card-body">

                        <h2 class="card-title fw-italic text-pink-primary mb-1 display-1">Happy Sprinkles Bakery</h2>
                        <p class="card-text fs-5 mb-4" style="text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.84);">Welcome to our delicious cupcake shop!</p>

                        <!-- Pink Info Badges -->
                        <ul class="list-unstyled d-flex flex-column flex-sm-row justify-content-center gap-1 gap-sm-4 mb-4">
                            <li class="d-flex align-items-center justify-content-center gap-2">
                                <i class="fa-solid fa-clock text-pink-primary me-0"></i>
                                <span style="text-shadow: 1px 1px 3px rgba(34, 33, 33, 0.92);">30-45 minutes delivery</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-center gap-1">
                                <i class="fa-solid fa-location-dot text-pink-primary me-0"></i>
                                <span style="text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.84);">38 Regent Road, Lumley</span>
                            </li>
                        </ul>

                        <!-- Order Button -->
                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                            <button class="btn btn-pink btn-lg px-5 py-2.5 rounded-pill fw-bold shadow-sm" id="orderBtn">
                                <a href="order.php" class="text-decoration-none text-white">Order Now</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 