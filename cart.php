<?php include 'config.php'; ?>
<?php 
if (!isset($_SESSION['userId'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['userId'];

// Remove item logic
if (isset($_GET['remove'])) {
    $cartId = intval($_GET['remove']);
    $conn->query("DELETE FROM carts WHERE cartId = $cartId AND userId = $userId");
}

$cartSql = "SELECT c.*, p.name, p.price, p.imageUrl, p.brand, p.size FROM carts c 
            JOIN products p ON c.productId = p.productId 
            WHERE c.userId = $userId";
$cartResult = $conn->query($cartSql);

$subtotal = 0;
?>
<?php include 'header.php'; ?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="space-y-12">
        <div class="flex justify-between items-end">
            <h2 class="text-4xl font-black tracking-tight">Your Bag.</h2>
            <p class="text-gray-400 font-medium"><?php echo $cartResult->num_rows; ?> items in your selection.</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Bag Items -->
            <div class="lg:col-span-2 space-y-4">
                <?php if ($cartResult->num_rows > 0): ?>
                    <?php while($item = $cartResult->fetch_assoc()): 
                        $itemTotal = $item['price'] * $item['quantity'];
                        $subtotal += $itemTotal;
                    ?>
                        <div class="bg-white p-6 rounded-[2rem] border border-gray-100 flex gap-6 items-center">
                            <div class="w-24 h-24 bg-gray-50 rounded-2xl overflow-hidden shrink-0">
                                <img src="<?php echo $item['imageUrl']; ?>" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <div class="text-[10px] font-bold text-indigo-600 uppercase tracking-widest"><?php echo $item['brand']; ?></div>
                                <h3 class="font-bold text-lg text-gray-900"><?php echo $item['name']; ?></h3>
                                <p class="text-xs text-gray-400 font-medium italic">Size: <?php echo $item['size']; ?></p>
                            </div>
                            <div class="text-right space-y-2">
                                <div class="font-black text-xl text-gray-900">R<?php echo number_format($itemTotal, 2); ?></div>
                                <div class="flex items-center justify-end gap-3">
                                    <span class="text-xs font-bold text-gray-400 uppercase">Qty: <?php echo $item['quantity']; ?></span>
                                    <a href="cart.php?remove=<?php echo $item['cartId']; ?>" class="p-2 bg-red-50 text-red-500 rounded-full hover:bg-red-100 transition-colors">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="bg-white p-12 rounded-[2.5rem] border border-gray-100 text-center space-y-6">
                        <div class="w-20 h-20 bg-gray-50 rounded-full mx-auto flex items-center justify-center">
                            <i data-lucide="shopping-cart" class="w-10 h-10 text-gray-200"></i>
                        </div>
                        <div class="space-y-2">
                            <h3 class="text-xl font-bold">Your bag is empty.</h3>
                            <p class="text-gray-400 max-w-xs mx-auto text-sm leading-relaxed">Browse our collection and find some unique thrifted gems to add here.</p>
                        </div>
                        <a href="shop.php" class="inline-block bg-indigo-600 text-white px-10 py-4 rounded-full font-bold hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-100">Start Shopping</a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Summary -->
            <div class="space-y-6">
                <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-xl shadow-gray-200/50 space-y-8 sticky top-24">
                    <h3 class="font-black text-2xl tracking-tight">Order Summary</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between text-sm font-medium">
                            <span class="text-gray-400">Subtotal</span>
                            <span class="text-gray-900 font-bold">R<?php echo number_format($subtotal, 2); ?></span>
                        </div>
                        <div class="flex justify-between text-sm font-medium">
                            <span class="text-gray-400">Shipping (South Africa)</span>
                            <span class="text-gray-900 font-bold">R120.00</span>
                        </div>
                        <div class="pt-6 border-t border-gray-50 flex justify-between items-end">
                            <div>
                                <div class="text-[10px] font-black uppercase tracking-widest text-gray-400">Total Amount</div>
                                <div class="text-3xl font-black text-indigo-600">R<?php echo ($subtotal > 0) ? number_format($subtotal + 120, 2) : '0.00'; ?></div>
                            </div>
                        </div>
                    </div>
                    
                    <button <?php echo ($subtotal == 0) ? 'disabled' : ''; ?> class="w-full <?php echo ($subtotal == 0) ? 'bg-gray-100 text-gray-400 cursor-not-allowed' : 'bg-indigo-600 text-white hover:bg-indigo-700 shadow-lg shadow-indigo-100'; ?> py-5 rounded-full font-bold transition-all text-lg">
                        Proceed to Checkout
                    </button>

                    <div class="space-y-3">
                        <div class="flex items-center gap-3 text-xs font-bold text-gray-400">
                            <i data-lucide="shield-check" class="w-4 h-4 text-indigo-500"></i> Encrypted Secure Checkout
                        </div>
                        <div class="flex items-center gap-3 text-xs font-bold text-gray-400">
                            <i data-lucide="truck" class="w-4 h-4 text-indigo-500"></i> 2-3 Days Door-to-Door Delivery
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
