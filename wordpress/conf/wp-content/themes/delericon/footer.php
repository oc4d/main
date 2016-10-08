
               <div id="footer">
                <div id="copyright"><?php echo get_option('del_copyright'); ?></div>
                
                <ul id="footer_navigation">
					<?php $args = array(
                    'title_li'     => '',
                    'depth'        => '1'
                    );
                    ?> 
                    <?php wp_list_pages($args); ?> 
                </ul>
                
            </div>
        </div>
         
<?php echo get_option('del_analytics'); ?>

	</body>

</html>