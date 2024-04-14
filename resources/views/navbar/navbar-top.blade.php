<nav class="navbar navbar-expand-lg bg-green p-4">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">AIMS</a>
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto">
                <a class="nav-link text-white {{ Request::is('home') ? 'active' : '' }}" href="home">Home</a>
                <a class="nav-link text-white {{ Request::is('suhu') ? 'active' : '' }}" href="suhu">Suhu</a>
                <a class="nav-link text-white {{ Request::is('ph') ? 'active' : '' }}" href="ph">Ph</a>
                <a class="nav-link text-white {{ Request::is('ppm') ? 'active' : '' }}" href="ppm">PPM</a>
                <a class="nav-link text-white {{ Request::is('about') ? 'active' : '' }}" href="about-us">About Us</a>
            </div>
            <div class="navbar-nav">
                <button type="button" style="width: 3rem" class="mt-3 btn btn-success position-relative">
                    <i class="bi bi-bell"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        99+
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </button>
            </div>
        </div>
    </div>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        function fetchNotifications() {
            $.ajax({
                url: '/notification', 
                method: 'GET',
                success: function(response) {  
                    $('#notificationBadge').text(response.unreadCount);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching notifications:', error);
                }
            });
        }
        // setInterval(fetchNotifications, 5000);
    });
</script>