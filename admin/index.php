<?php 
include '_layout.php';
include '../conn.php';

?>

<style>

    .dashboard {
        left: 0;
        display: grid;
        grid-template-columns: auto auto auto;
        grid-template-rows: auto auto auto;
        gap: 20px;
        width: 100%;
    }

    .card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card h3 {
        font-size: 1.5em;
        color: #333;
        margin-bottom: 10px;
    }

    .card p {
        font-size: 1em;
        color: #555;
        margin-bottom: 5px;
    }

    .card i {
        font-size: 1.5em;
        color: #5cb85c;
        margin-right: 10px;
    }

    .order-details {
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
        text-align: left;
    }

    @media (max-width: 768px) {
        .dashboard {
            grid-template-columns: 1fr;
            padding: 10px;
        }

        .card {
            padding: 15px;
        }

        .card h3 {
            font-size: 1.2em;
        }

        .card p {
            font-size: 0.9em;
        }
    }
</style>

<div class="dashboard">
    <!-- Current Sales Card -->
    <div class="card">
        <h3><i class="fas fa-dollar-sign"></i> Current Sales</h3>
        <p>Total Sales: $<span id="current-sales">0.00</span></p>
    </div>
    
    <!-- Expenses Card -->
    <div class="card">
        <h3><i class="fas fa-money-bill-wave"></i> Current Expenses</h3>
        <p>Total Expenses: $<span id="current-expenses">0.00</span></p>
    </div>

    <!-- Orders Count Card -->
    <div class="card">
        <h3><i class="fas fa-receipt"></i> Total Orders</h3>
        <p>Number of Orders: <span id="total-orders">0</span></p>
    </div>

    <!-- Ordered Items Details Card -->
    <div class="card">
        <h3><i class="fas fa-list"></i> Order Details</h3>
        <div class="order-details">
            <table>
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Address</th>
                        <th>Order Details</th>
                    </tr>
                </thead>
                <tbody id="order-details-table">
                    <tr>
                        <td>John Doe</td>
                        <td>123 Coffee Lane</td>
                        <td>2x Cappuccino, 1x Mocha</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Inventory Used Items Card -->
    <div class="card">
        <h3><i class="fas fa-box"></i> Inventory Used</h3>
        <p>Items Used Today: <span id="items-used">Coffee Beans, Milk, Sugar</span></p>
    </div>
</div>

<script>
    // Sample data for monitoring (to be fetched dynamically)
    document.getElementById("current-sales").innerText = "1250.75";
    document.getElementById("current-expenses").innerText = "500.25";
    document.getElementById("total-orders").innerText = "35";
    document.getElementById("order-details-table").innerHTML += `
        <tr>
            <td>Jane Smith</td>
            <td>456 Brew Ave</td>
            <td>1x Espresso, 3x Latte</td>
        </tr>
    `;
</script>
</div>
</main>

</body>
</html>
