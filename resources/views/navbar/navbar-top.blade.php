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
                <div class="dropdown">
                    <button type="button" style="width: 3rem" class="mt-3 me-3 btn btn-success position-relative"
                        id="notifbtn" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell"></i>
                    </button>
                    <ul class="dropdown-menu posisi-1 mt-3 dropdown-menu-dark" >
                    <li><a class="dropdown-item" href="#">Notification
                                <span
                                    class="position-absolute p-2 bg-primary mt-1 rounded-circle">
                                    <span class="visually-hidden">New alerts</span>
                                </span>
                                <span class="ms-5 text-primary">Mark
                                    all as read</span></a></li>
                        <hr>
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="row">
                                    <div class="col-md-2 text-center">
                                        <img src="{{ asset('images/avatar.png') }}" class="mt-2"
                                            style="width: 30px; height: 30px;" alt="">
                                    </div>
                                    <div class="col-md-10">
                                        <p class="fw-bold">System</p>
                                        <p style="margin-top: -20px">Report</p>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -10px">
                                    <div class="col-md-12" style="white-space: pre-line;" id="notif-content">    
                                    </div>
                                </div>
                            </a>
                        </li>
                        <hr>

                    </ul>
                </div>
                <li class="nav-item dropdown">
                    <a class="" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('images/avatar.png') }}" style="width: 37px" height="37px" class="mt-3 me-3"
                            alt="">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark mt-3 posisi">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square me-2"></i>Edit Profile</a></li>
                        <li><a class="dropdown-item text-danger" href="#">Keluar</a></li>
                    </ul>
                </li>
            </div>
        </div>
    </div>
</nav>

<!-- jQuery library -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function fetchNotifications() {
            $.ajax({
                url: '/home', 
                method: 'GET',
                success: function(response) {
                    $('#notificationList').empty();
                    if (response.notifications.length > 0) {
                        response.notifications.forEach(function(notification) {
                            $('#notificationList').append(`
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="row" style="margin-top: -30px">
                                            <div class="col-md-12" style="white-space: pre-line;">
                                                ${checkNotifications.message}
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            `);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching notifications:', error);
                }
            });
        }
        // setInterval(fetchNotifications, 5000);
    });
</script> -->


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        function checkNotifications() {
            $.ajax({
                url: '/notifications',
                method: 'GET',
                success: function(response) {
                    if (response.notifications.length > 0) {
                        $('#notificationListItem').show();
                        $('#notificationList').empty();
                        response.notifications.forEach(function(notification) {
                            $('#notificationList').append(`
                                <li>
                                    <a class="dropdown-item" href="#">
                                    <div class="row">
                                        <div class="col-md-2 text-center">
                                            <img src="{{ asset('images/avatar.png') }}" class="mt-2" style="width: 30px; height: 30px;" alt="">
                                        </div>
                                        <div class="col-md-10">
                                            <p class="fw-bold">System</p>
                                            <p style="margin-top: -20px">Report</p>
                                        </div>
                                    </div>
                                        <div class="row" style="margin-top: -30px">
                                            <div class="col-md-12" style="white-space: pre-line;">
                                                ${notification.message}
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            `);
                        });
                    } else {
                        $('#notificationListItem').hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching notifications:', error);
                }
            });
        }

        // Call checkNotifications() every 5 seconds
        setInterval(checkNotifications, 5000);

        // Mark all notifications as read when "Mark All as Read" button is clicked
        $('#markAllAsRead').on('click', function() {
            $.ajax({
                url: '/notifications/mark-all-as-read',
                method: 'POST',
                success: function(response) {
                    // Fetch notifications again to update the list
                    checkNotifications();
                },
                error: function(xhr, status, error) {
                    console.error('Error marking all notifications as read:', error);
                }
            });
        });
    });
</script> -->