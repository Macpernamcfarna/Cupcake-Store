<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place an Order | Happy Sprinkles Bakery</title>
    <link rel="stylesheet" href="css/bootstrap.min (1).css">
</head>
<body>
    <main class="container py-4 py-md-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        <!-- Header -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h1 class="h3 mb-0">Place Your Order</h1>
                            <a href="index.php" class="btn btn-outline-secondary btn-sm">Back to Home</a>
                        </div>

                        <!-- Order Form -->
                        <form action="../backend/process.php" method="post">
                            <!-- Contact Information -->
                            <h2 class="h5 border-bottom pb-2 mb-3">Contact Info</h2>
                            <div class="row g-3 mb-4">
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="name">Name</label>
                                    <input class="form-control" id="name" name="customer_name" type="text" placeholder="Your name" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="email">Email</label>
                                    <input class="form-control" id="email" name="customer_email" type="email" placeholder="you@example.com" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="phone">Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text">+232</span>
                                        <input class="form-control" id="phone" name="customer_phone" type="tel" placeholder="Your phone number" pattern="[0-9]{8}" required>
                                    </div>
                                    <div class="form-text">Enter your 8-digit number without the first zero.</div>
                                </div>
                            </div>

                            <!-- Order Details -->
                            <h2 class="h5 border-bottom pb-2 mb-3">Order Details</h2>
                            
                            <!-- Cake Selection -->
                            <div class="row g-3 mb-4">
                                <div class="col-12">
                                    <label class="form-label">Choose Your Cake</label>
                                </div>
                                
                                <!-- Vanilla -->
                                <div class="col-12 col-md-6">
                                    <label class="cake-card selected">
                                        <input type="radio" name="cake_choice" value="Le5.00" checked required>
                                        <div class="cake-icon">🎂</div>
                                        <div class="cake-name">Vanilla Dream</div>
                                        <div class="cake-price">Le5.00</div>
                                    </label>
                                </div>

                                <!-- Chocolate -->
                                <div class="col-12 col-md-6">
                                    <label class="cake-card">
                                        <input type="radio" name="cake_choice" value="Le10.00">
                                        <div class="cake-icon">🍫</div>
                                        <div class="cake-name">Chocolate Delight</div>
                                        <div class="cake-price">Le10.00</div>
                                    </label>
                                </div>
                            </div> <!-- Properly closed cake selection row -->

                            <!-- Special Instructions -->
                            <div class="mb-4">
                                <label class="form-label" for="instructions">
                                    Special Instructions <span class="text-muted fw-normal">(optional)</span>
                                </label>
                                <textarea class="form-control" id="instructions" name="special_instructions" rows="3" placeholder="Any special instructions for delivery"></textarea>
                            </div>

                            <!-- Payment -->
                            <h2 class="h5 border-bottom pb-2 mb-3">Payment Method</h2>
                            <div class="d-flex flex-column flex-sm-row gap-3 mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" id="payment-cash" name="payment_method" value="Cash on Delivery" type="radio" checked required>
                                    <label class="form-check-label" for="payment-cash">Cash on Delivery</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="payment-mobile" name="payment_method" value="Mobile Money" type="radio">
                                    <label class="form-check-label" for="payment-mobile">Mobile Money</label>
                                </div>
                            </div>

                            <!-- Submit -->
                            <button class="btn btn-primary btn-lg w-100" type="submit" name="create">Submit Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>

