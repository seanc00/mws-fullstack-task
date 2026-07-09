<?php
require_once "functions.php";
include __DIR__ . "/src/views/partials/header.php";

if (!$session->is_signed_in()) {
    redirect("/login.php");
}

// Get signed in username
$user = User::find_by_id($_SESSION['user_id']);
$users_name = $user[0]->name;

$files = Upload::find_all();
var_dump($files);
?>

<div class="dashboard-block">
    <div class="navigation-bar">
        <div class="nav-wrapper">
            <div class="logo-cont">
                <img src="/resources/assets/mws-logo-color.png" alt="MWS Logo in color">
            </div>
            <div class="menu-items">
                <div class="desktop-main-links">
                    <div class="title">
                        <p>Main Links</p>
                    </div>
                    <div class="links-wrapper">
                        <a class="link active" href="/">
                            <svg viewBox="0 0 21 21" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <rect width="9" height="9" rx="1.73913"/>
                                <rect x="11.5" width="9" height="9" rx="1.73913"/>
                                <rect y="11.5" width="9" height="9" rx="1.73913"/>
                                <rect x="11.5" y="11.5" width="9" height="9" rx="1.73913"/>
                            </svg>
                            Dashboard
                        </a>
                        <a class="link" href="/">
                            <svg viewBox="0 0 22 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 17C21 17.5304 20.7893 18.0391 20.4142 18.4142C20.0391 18.7893 19.5304 19 19 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H8L10 4H19C19.5304 4 20.0391 4.21071 20.4142 4.58579C20.7893 4.96086 21 5.46957 21 6V17Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Documents
                        </a>
                        <a class="link" href="/">
                            <svg viewBox="0 0 20 14" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 1H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6 7H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6 13H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M1 1H1.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M1 7H1.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M1 13H1.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Clients
                        </a>
                        <a class="link" href="/">
                            <svg viewBox="0 0 22 23" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.4383 10.6622L11.2483 19.8522C10.1225 20.9781 8.59552 21.6106 7.00334 21.6106C5.41115 21.6106 3.88418 20.9781 2.75834 19.8522C1.63249 18.7264 1 17.1994 1 15.6072C1 14.015 1.63249 12.4881 2.75834 11.3622L11.9483 2.17222C12.6989 1.42166 13.7169 1 14.7783 1C15.8398 1 16.8578 1.42166 17.6083 2.17222C18.3589 2.92279 18.7806 3.94077 18.7806 5.00222C18.7806 6.06368 18.3589 7.08166 17.6083 7.83222L8.40834 17.0222C8.03306 17.3975 7.52406 17.6083 6.99334 17.6083C6.46261 17.6083 5.95362 17.3975 5.57834 17.0222C5.20306 16.6469 4.99222 16.138 4.99222 15.6072C4.99222 15.0765 5.20306 14.5675 5.57834 14.1922L14.0683 5.71222" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Reports
                        </a>
                        <a class="link" href="/">
                            <svg viewBox="0 0 24 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 19V17C17 15.9391 16.5786 14.9217 15.8284 14.1716C15.0783 13.4214 14.0609 13 13 13H5C3.93913 13 2.92172 13.4214 2.17157 14.1716C1.42143 14.9217 1 15.9391 1 17V19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9 9C11.2091 9 13 7.20914 13 5C13 2.79086 11.2091 1 9 1C6.79086 1 5 2.79086 5 5C5 7.20914 6.79086 9 9 9Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M23 18.9999V16.9999C22.9993 16.1136 22.7044 15.2527 22.1614 14.5522C21.6184 13.8517 20.8581 13.3515 20 13.1299" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16 1.12988C16.8604 1.35018 17.623 1.85058 18.1676 2.55219C18.7122 3.2538 19.0078 4.11671 19.0078 5.00488C19.0078 5.89305 18.7122 6.75596 18.1676 7.45757C17.623 8.15918 16.8604 8.65958 16 8.87988" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Users
                        </a>
                    </div>
                </div>
                <div class="setting-links">
                    <div class="title">
                        <p>Settings</p>
                    </div>
                    <div class="link-wrapper">
                        <a href="#">
                            <p>
                                Help Centre
                            </p>
                            <svg viewBox="0 0 22 22" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.08997 8.00008C8.32507 7.33175 8.78912 6.76819 9.39992 6.40921C10.0107 6.05024 10.7289 5.91902 11.4271 6.03879C12.1254 6.15857 12.7588 6.52161 13.215 7.06361C13.6713 7.60561 13.921 8.2916 13.92 9.00008C13.92 11.0001 10.92 12.0001 10.92 12.0001" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M11 16H11.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <a href="#">
                            <p>
                                Settings
                            </p>
                            <svg viewBox="0 0 24 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 19V12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 8V1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 19V10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 6V1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20 19V14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20 10V1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M1 12H7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9 6H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M17 14H23" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <a href="/src/php/logout.php">
                            <p>
                                Sign Out
                            </p>
                            <svg viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14 15L19 10L14 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M19 10H7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-dropdown-cont">
            <div class="links-wrapper">
                <a class="link active" href="/">
                    <svg viewBox="0 0 21 21" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <rect width="9" height="9" rx="1.73913"/>
                        <rect x="11.5" width="9" height="9" rx="1.73913"/>
                        <rect y="11.5" width="9" height="9" rx="1.73913"/>
                        <rect x="11.5" y="11.5" width="9" height="9" rx="1.73913"/>
                    </svg>
                    Dashboard
                </a>
                <a class="link" href="/">
                    <svg viewBox="0 0 22 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 17C21 17.5304 20.7893 18.0391 20.4142 18.4142C20.0391 18.7893 19.5304 19 19 19H3C2.46957 19 1.96086 18.7893 1.58579 18.4142C1.21071 18.0391 1 17.5304 1 17V3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H8L10 4H19C19.5304 4 20.0391 4.21071 20.4142 4.58579C20.7893 4.96086 21 5.46957 21 6V17Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Documents
                </a>
                <a class="link" href="/">
                    <svg viewBox="0 0 20 14" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 1H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 7H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 13H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M1 1H1.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M1 7H1.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M1 13H1.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Clients
                </a>
                <a class="link" href="/">
                    <svg viewBox="0 0 22 23" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.4383 10.6622L11.2483 19.8522C10.1225 20.9781 8.59552 21.6106 7.00334 21.6106C5.41115 21.6106 3.88418 20.9781 2.75834 19.8522C1.63249 18.7264 1 17.1994 1 15.6072C1 14.015 1.63249 12.4881 2.75834 11.3622L11.9483 2.17222C12.6989 1.42166 13.7169 1 14.7783 1C15.8398 1 16.8578 1.42166 17.6083 2.17222C18.3589 2.92279 18.7806 3.94077 18.7806 5.00222C18.7806 6.06368 18.3589 7.08166 17.6083 7.83222L8.40834 17.0222C8.03306 17.3975 7.52406 17.6083 6.99334 17.6083C6.46261 17.6083 5.95362 17.3975 5.57834 17.0222C5.20306 16.6469 4.99222 16.138 4.99222 15.6072C4.99222 15.0765 5.20306 14.5675 5.57834 14.1922L14.0683 5.71222" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Reports
                </a>
                <a class="link" href="/">
                    <svg viewBox="0 0 24 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 19V17C17 15.9391 16.5786 14.9217 15.8284 14.1716C15.0783 13.4214 14.0609 13 13 13H5C3.93913 13 2.92172 13.4214 2.17157 14.1716C1.42143 14.9217 1 15.9391 1 17V19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 9C11.2091 9 13 7.20914 13 5C13 2.79086 11.2091 1 9 1C6.79086 1 5 2.79086 5 5C5 7.20914 6.79086 9 9 9Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M23 18.9999V16.9999C22.9993 16.1136 22.7044 15.2527 22.1614 14.5522C21.6184 13.8517 20.8581 13.3515 20 13.1299" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 1.12988C16.8604 1.35018 17.623 1.85058 18.1676 2.55219C18.7122 3.2538 19.0078 4.11671 19.0078 5.00488C19.0078 5.89305 18.7122 6.75596 18.1676 7.45757C17.623 8.15918 16.8604 8.65958 16 8.87988" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Users
                </a>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="welcome-block">
            <div class="text-cont">
                <h1>Welcome Back <?= $users_name ?? ''; ?></h1>
                <p>Manage & download your documents below</p>
            </div>
            <div class="btn-cont">
                <a href="#">
                    Upload File
                    <svg viewBox="0 0 14 14" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 9V11.6667C13 12.0203 12.8595 12.3594 12.6095 12.6095C12.3594 12.8595 12.0203 13 11.6667 13H2.33333C1.97971 13 1.64057 12.8595 1.39052 12.6095C1.14048 12.3594 1 12.0203 1 11.6667V9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.3333 4.33333L6.99996 1L3.66663 4.33333" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7 1V9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "/src/views/partials/footer.php"; ?>