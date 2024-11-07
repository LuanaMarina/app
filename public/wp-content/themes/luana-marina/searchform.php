<form class="d-flex" action="<?php echo esc_url(home_url('/')); ?>" method="get" id="searchform">
    <input type="search" value="<?php echo the_search_query(); ?>" name="s" id="search" class="form-control me-2" placeholder="Search..." aria-label="Search" />
    <button type="submit" id="searchsubmit" class="btn btn-outline-success">Search</button>
</form>