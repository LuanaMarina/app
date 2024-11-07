<nav class="d-flex justify-content-center" aria-label="Pagination">
    <ul class="pagination">
        <?php
            $pagination_links = paginate_links( array(
                'type' => 'array',
                'prev_text' => '&laquo;',
                'next_text' => '&raquo;',
            ) );

            if ( $pagination_links ) {
                foreach ( $pagination_links as $link ) {
                    if ( strpos( $link, 'current' ) !== false ) {
                        echo '<li class="page-item active">' . str_replace('page-numbers', 'page-link', $link) . '</li>';
                    } else {
                        echo '<li class="page-item">' . str_replace('page-numbers', 'page-link', $link) . '</li>';
                    }
                }
            }
        ?>
    </ul>
</nav>