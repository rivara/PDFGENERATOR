<?php echo doctype('xhtml1-trans'); ?>
  <head>
    <?php $this->view->metas(); ?>
    <?php $this->view->title(); ?>
    <?php $this->view->asset('css'); ?>
    <?php echo link_tag( base_url().'favicon.ico', 'shortcut icon', 'image/ico'); ?>
  </head>
  <body>
    <div id="wrap">
      <div>
        <h1 class="hidden"><?php echo $title; ?></h1>
        <div id="logo"><a href="<?php echo base_url(); ?>">Salir</a></div>
      </div>
      <div id="content">
        <?php echo $yield; ?>
      </div>
      <div id="footer">
      </div>
    </div>
    <?php $this->view->asset('js'); ?>
  </body>
</html>
