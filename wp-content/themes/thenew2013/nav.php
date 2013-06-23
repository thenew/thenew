<nav id="sidenav" class="sidenav">
    <ul id="menu" class="cf menu">
        <li>
            <div class="mask">
                <div class="dot"></div>
                <a class="blog-link" href="<?php echo site_url( '/blog' ); ?>">Blog</a>
            </div>
        </li>
        <li>
            <div class="mask">
                <div class="dot"></div>
                <a class="works-link" href="<?php echo get_post_type_archive_link( 'work' ); ?>">Works</a>
            </div>
        </li>
        <li>
            <div class="mask">
                <div class="dot"></div>
                <a class="profile-link" href="<?php echo site_url( '/profile' ); ?>">Profile</a>
            </div>
        </li>
    </ul>
    <a class="thenew-logo logo-100" href="<?php echo site_url('/'); ?>">
        <div class="t demi"></div>
        <div class="n demi"></div>
    </a>
</nav>