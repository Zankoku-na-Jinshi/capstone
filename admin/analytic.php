<?php
include '../conn.php';
include '_layout.php';
?>
<div class="analytic">
    <!-- Overview Section -->
    <section id="overview">
        <h2>Overview</h2>
        <div class="card">
            <h3>Total Sales</h3>
            <p id="total-sales">$0.00</p>
        </div>
        <div class="card">
            <h3>Number of Customers</h3>
            <p id="customer-count">0</p>
        </div>
        <div class="card">
            <h3>Top Selling Item</h3>
            <p id="top-item">-</p>
        </div>
    </section>

    <!-- Sales by Period Section -->
    <section id="sales-period">
        <h2>Sales by Period</h2>
        <div>
            <button onclick="updateData('hourly')">Hourly</button>
            <button onclick="updateData('daily')">Daily</button>
            <button onclick="updateData('weekly')">Weekly</button>
            <button onclick="updateData('monthly')">Monthly</button>
        </div>
        <div id="sales-chart">
            <!-- Sales data chart here -->
            <canvas id="salesChart"></canvas>
        </div>
    </section>

    <!-- Top Menu Items Section -->
    <section id="top-menu">
        <h2>Top Menu Items</h2>
        <ul id="top-menu-list">
            <!-- Dynamically populated with top menu items -->
        </ul>

        <section id="customer-data">
        <h2>Customer Count by Period</h2>
        <canvas id="customerChart"></canvas>
    </section>
    </section>

    <!-- Customer Data Section -->


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script >
        // Function to fetch and update data based on the selected period
function updateData(period) {
    // Use Fetch API or similar method to get data based on `period`
    // Mock data example:
    const salesData = {
        hourly: 500,
        daily: 4500,
        weekly: 25000,
        monthly: 100000,
    };
    const customerCount = {
        hourly: 10,
        daily: 200,
        weekly: 1400,
        monthly: 6000,
    };
    const topItem = "Latte"; // Example item

    document.getElementById('total-sales').innerText = `$${salesData[period]}`;
    document.getElementById('customer-count').innerText = customerCount[period];
    document.getElementById('top-item').innerText = topItem;
}

// Sample Chart.js for sales and customer counts
const salesCtx = document.getElementById('salesChart').getContext('2d');
const salesChart = new Chart(salesCtx, {
    type: 'bar',
    data: {
        labels: ['Hour 1', 'Hour 2', 'Hour 3'], // Example labels
        datasets: [{
            label: 'Sales',
            data: [100, 200, 300], // Example data
        }]
    },
});

const customerCtx = document.getElementById('customerChart').getContext('2d');
const customerChart = new Chart(customerCtx, {
    type: 'line',
    data: {
        labels: ['Hour 1', 'Hour 2', 'Hour 3'],
        datasets: [{
            label: 'Customers',
            data: [5, 15, 20],
        }]
    },
});

    </script>
</d>
</main>
</body>
</html>
<style>

h1, h2 {
    margin: 0;
}

section {
    padding: 2rem;
}

.card {
    background: #f9f9f9;
    padding: 1rem;
    margin: 1rem;
    text-align: center;
    border-radius: 8px;
    display: inline-block;
    width: 30%;
}

button {
    padding: 0.5rem 1rem;
    margin: 0.5rem;
    cursor: pointer;
}
.analytic {
    display: flex;
    justify-content: space-between;
}
</style>