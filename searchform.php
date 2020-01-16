<form action="<?php echo home_url('/'); ?>" method="get">
  <div class="input-group">
    <input type="search" class="form-control" placeholder="search" name="s" value="<?php echo get_search_query(); ?>">
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
    </div>
  </div>
</form>
