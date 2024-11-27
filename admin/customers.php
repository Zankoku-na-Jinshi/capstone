<?php
include '../conn.php';
include '_layout.php';
?>

    <!-- Search and Filter Section -->
    <section id="search-filter">
        <input type="text" id="searchInput" placeholder="Search customers by name or email" oninput="filterCustomers()">
    </section>

    <!-- Customer Table Section -->
    <section id="customer-table">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Number of Orders</th>
                    <th>Total Spend</th>
                </tr>
            </thead>
            <tbody id="customerTableBody">
                <!-- Customer rows will be inserted here -->
            </tbody>
        </table>
    </section>

    <!-- Pagination Section -->
    <section id="pagination">
        <button onclick="prevPage()">Previous</button>
        <span id="page-info">Page 1</span>
        <button onclick="nextPage()">Next</button>
    </section>
</main>
</body>
</html>
<style>

#search-filter {
    text-align: center;
    padding: 1rem;
}

#searchInput {
    padding: 0.5rem;
    width: 50%;
    font-size: 1rem;
}

#customer-table {
    padding: 2rem;
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 1rem 0;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 0.75rem;
    text-align: center;
}

#pagination {
    text-align: center;
    padding: 1rem;
}

</style>
<script>
    // Sample customer data
const customers = [
    { name: "John Doe", email: "john@example.com", phone: "123-456-7890", orders: 5, totalSpend: 100.00 },
    { name: "Jane Smith", email: "jane@example.com", phone: "987-654-3210", orders: 3, totalSpend: 75.00 },
    // Add more customer data here
];

let currentPage = 1;
const rowsPerPage = 10;

// Display customer data in the table
function displayCustomers() {
    const tbody = document.getElementById("customerTableBody");
    tbody.innerHTML = ""; // Clear current rows

    // Calculate starting and ending index based on the current page
    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    const paginatedCustomers = customers.slice(start, end);

    paginatedCustomers.forEach(customer => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${customer.name}</td>
            <td>${customer.email}</td>
            <td>${customer.phone}</td>
            <td>${customer.orders}</td>
            <td>$${customer.totalSpend.toFixed(2)}</td>
        `;
        tbody.appendChild(row);
    });

    // Update page info
    document.getElementById("page-info").innerText = `Page ${currentPage}`;
}

// Filter customers based on search input
function filterCustomers() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const filtered = customers.filter(customer => 
        customer.name.toLowerCase().includes(input) || 
        customer.email.toLowerCase().includes(input)
    );

    displayFilteredCustomers(filtered);
}

// Display filtered customer data in the table
function displayFilteredCustomers(filteredCustomers) {
    const tbody = document.getElementById("customerTableBody");
    tbody.innerHTML = "";

    filteredCustomers.forEach(customer => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${customer.name}</td>
            <td>${customer.email}</td>
            <td>${customer.phone}</td>
            <td>${customer.orders}</td>
            <td>$${customer.totalSpend.toFixed(2)}</td>
        `;
        tbody.appendChild(row);
    });
}

// Pagination functions
function nextPage() {
    if ((currentPage * rowsPerPage) < customers.length) {
        currentPage++;
        displayCustomers();
    }
}

function prevPage() {
    if (currentPage > 1) {
        currentPage--;
        displayCustomers();
    }
}

// Initial display
displayCustomers();

</script>