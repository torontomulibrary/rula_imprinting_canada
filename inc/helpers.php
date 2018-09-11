<?php 
function is_top_level_page() {
  return get_post()->post_parent == 0;
}