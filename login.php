<?php include __DIR__ . "/src/views/partials/header.php"; ?>


<div class="login-container">
    <div class="logo-cont">
        <img src="/resources/assets/mws-logo-white.png" alt="white mws logo and icon">
    </div>

    <div class="form-cont">
        <div class="text-cont">
            <h1>Welcome Back to MWS</h1>
            <p>Please enter your login details below</p>
        </div>

        <div class="sign-links-cont">
            <a class="active" href="#">Sign In</a>
            <a href="#">Signup</a>
        </div>

        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username">
            </div>

            <div class="form-group password-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="* * * * * * * * * * *">
                <i class="bi bi-eye-slash" id="togglePassword"></i>
            </div>

            <div class="form-group">
                <input type="submit" name="submit">
            </div>
        </form>

        <div class="divider">
            <div class="partial-divider"></div>
            <p>or</p>
            <div class="partial-divider"></div>
        </div>

        <div class="quick-sign-in-links-cont">
            <a href="#">
                <svg viewBox="0 0 48 48">
                    <title>Google Logo</title>
                    <clipPath id="g">
                        <path d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/>
                    </clipPath>
                    <g class="colors" clip-path="url(#g)">
                        <path fill="#FBBC05" d="M0 37V11l17 13z"/>
                        <path fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"/>
                        <path fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"/>
                        <path fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"/>
                    </g>
                </svg>
                Sign in with <strong>Google</strong>
            </a>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-apple" viewBox="0 0 16 16">
                    <path d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516s1.52.087 2.475-1.258.762-2.391.728-2.43m3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422s1.675-2.789 1.698-2.854-.597-.79-1.254-1.157a3.7 3.7 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56s.625 1.924 1.273 2.796c.576.984 1.34 1.667 1.659 1.899s1.219.386 1.843.067c.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758q.52-1.185.473-1.282"/>
                </svg>   
                Sign in with <strong>Apple</strong>
            </a>
        </div>
    </div>

    <div class="copyright-msg-cont">
        Copyright © 2026 MWS LTD. Designed By <a href="#">Maxweb</a>
    </div>
    <img class="bg-img" src="/resources/assets/login-bg.png" alt="decorative background">
</div>


<?php include __DIR__ . "/src/views/partials/footer.php"; ?>