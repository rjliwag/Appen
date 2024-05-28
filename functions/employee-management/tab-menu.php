<div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link text-dark" href="employee-management">Employee</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link text-dark" href="employee-invoice-management">Invoice</a>
        </li>
    </ul>
</div>

<script>
    var currentUrl = window.location.href;

    var tabs = document.querySelectorAll('.nav-link');

    tabs.forEach(function(tab) {
        var tabHref = tab.getAttribute('href');
        if (currentUrl.includes(tabHref)) {
            tab.classList.add('active');
        }
    });
</script>
