<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Café Emotion Brew</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        // Fungsi untuk menghitung total harga
        function calculateTotal() {
            const prices = [30000, 20000, 35000, 35000, 35000, 35000]; // Harga item
            const quantities = document.querySelectorAll('input[name="quantity"]');
            let total = 0;
            
            quantities.forEach((input, index) => {
                total += input.value * prices[index];
            });
            
            document.getElementById('total-price').textContent = 'Total: Rp ' + total.toLocaleString('id-ID');
            return total;
        }

        // Fungsi untuk memproses pemesanan ketika tombol submit ditekan
        function processOrder(event) {
            event.preventDefault();  // Mencegah form submit default
            const total = calculateTotal();
            
            if (total > 0) {
                document.getElementById('payment-section').style.display = 'block';  // Tampilkan metode pembayaran
            } else {
                alert('Harap tambahkan item ke pesanan Anda!');
            }
        }

        // Fungsi untuk menampilkan gambar QRIS atau pilihan bank ketika metode pembayaran dipilih
        function showPaymentOptions() {
            const paymentMethod = document.getElementById("payment").value;
            const qrisImage = document.getElementById("qrisImage");
            const mbankingOptions = document.getElementById("mbankingOptions");

            if (paymentMethod === "qris") {
                qrisImage.style.display = "block";  // Menampilkan gambar QRIS
                mbankingOptions.style.display = "none"; // Sembunyikan pilihan bank
            } else if (paymentMethod === "m-banking") {
                qrisImage.style.display = "none";  // Sembunyikan gambar QRIS
                mbankingOptions.style.display = "block";  // Menampilkan pilihan bank
            } else {
                qrisImage.style.display = "none";  // Sembunyikan QRIS
                mbankingOptions.style.display = "none";  // Sembunyikan pilihan bank
            }
        }
    </script>
</head>
<body>
    <section id="menu">
        <h2>Menu</h2>
        <form id="order-form" onsubmit="processOrder(event)" method="POST"> <!-- Memproses saat submit -->
            <ul>
                <li class="menu-item">
                    <img src="pancake.jpg" alt="Joyful Pan Delight" width="300" height="270">
                    <strong>Joyful Pan Delight</strong> - Rp 30.000
                    <div>
                        <label for="quantity1">Quantity:</label>
                        <input type="number" id="quantity1" name="quantity" min="0" value="0">
                    </div>
                </li>
                <li class="menu-item">
                    <img src="lemon.jpg" alt="Sadness Smoothies" width="300" height="270">
                    <strong>Sadness Lemon Grape Drink</strong> - Rp 15.000
                    <div>
                        <label for="quantity2">Quantity:</label>
                        <input type="number" id="quantity2" name="quantity" min="0" value="0">
                    </div>
                </li>
                <li class="menu-item">
                    <img src="IMG-20241012-WA0026.jpg" alt="Angry Milkshake" width="300" height="270">
                    <strong>Angry Mix Berry Drink</strong> - Rp 18.000
                    <div>
                        <label for="quantity3">Quantity:</label>
                        <input type="number" id="quantity3" name="quantity" min="0" value="0">
                    </div>
                </li>
                <li class="menu-item">
                    <img src="muffins.jpg" alt="Cupcake Inside Out" class="menu-image" width="300" height="270">
                    <strong>Cupcake Inside Out</strong> - Rp 25.000
                    <div>
                        <label for="quantity4">Quantity:</label>
                        <input type="number" id="quantity4" name="quantity" min="0" value="0">
                    </div>
                </li>
                <li class="menu-item">
                    <img src="cookies.jpg" alt="Cookies Inside Out" class="menu-image" width="300" height="270">
                    <strong>Cookies Inside Out</strong> - Rp 15.000
                    <div>
                        <label for="quantity5">Quantity:</label>
                        <input type="number" id="quantity5" name="quantity" min="0" value="0">
                    </div>
                </li>
                <li class="menu-item">
                    <img src="donat.jpg" alt="Donut Inside Out" class="menu-image" width="300" height="270">
                    <strong>Donut Inside Out</strong> - Rp 20.000
                    <div>
                        <label for="quantity6">Quantity:</label>
                        <input type="number" id="quantity6" name="quantity" min="0" value="0">
                    </div>
                </li>
            </ul>
            
            <!-- Input Nama dan Nomor HP -->
            <div>
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div>
                <label for="hp">Nomor HP:</label>
                <input type="tel" id="hp" name="hp" required pattern="[0-9]{10,13}">
            </div>
            
            <!-- Menampilkan total harga -->
            <h3 id="total-price">Total: Rp 0</h3>
            
            <button type="submit">Submit Order</button>
        </form>
    </section>

    <!-- Bagian pilihan pembayaran, akan tampil setelah submit -->
    <section id="payment-section" style="display: none; margin-top: 20px;">
        <h3>Pilih Metode Pembayaran</h3>
        <label for="payment">Metode Pembayaran:</label>
        <select name="payment" id="payment" onchange="showPaymentOptions()" required>
            <option value="cash">Cash</option>
            <option value="m-banking">M-Banking</option>
            <option value="qris">QRIS</option>
        </select>

        <!-- Pilihan bank yang muncul jika M-Banking dipilih -->
        <div id="mbankingOptions" style="display: none;">
            <label for="bank">Pilih Bank:</label>
            <select name="bank" id="bank">
                <option value="BCA">BCA - 8764520198</option>
                <option value="BNI">BNI - 6854126582</option>
                <option value="BRI">BRI - 2351389075</option>
                <option value="Mandiri">Mandiri - 8436789531</option>
            </select>
        </div>

        <!-- Gambar QRIS, akan tampil jika metode QRIS dipilih -->
        <div id="qrisImage" style="display: none;">
            <label>Scan QRIS untuk pembayaran:</label> <br>
            <img src="WhatsApp Image 2024-09-19 at 15.08.47.jpeg" alt="QRIS" style="width:200px;">
        </div>
    </section>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data dari form
        $quantities = $_POST['quantity'];
        $prices = [30000, 20000, 35000, 35000, 35000, 35000]; // Daftar harga produk
        
        $total_harga = 0;
        for ($i = 0; $i < count($quantities); $i++) {
            $total_harga += $quantities[$i] * $prices[$i];
        }
        
        $payment = $_POST['payment'];
        $bank = isset($_POST['bank']) ? $_POST['bank'] : ''; // Bank hanya untuk M-Banking

        // Tampilkan hasil
        echo "<div class='result'>";
        echo "<p>Total Pembelian: Rp " . number_format($total_harga, 0, ',', '.') . "</p>";
        echo "<p>Metode Pembayaran: " . ucfirst($payment) . "</p>";
        
        // Tampilkan bank jika M-Banking dipilih
        if ($payment === 'm-banking') {
            echo "<p>Bank: " . ucfirst($bank) . "</p>";
        }
        
        echo "</div>";
    }
    ?>
</body>
</html>
