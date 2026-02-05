<?php
// Sidebar language selector block (SB Admin style)
require_once __DIR__ . '/lang.php';
?>
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#langMenu" aria-expanded="true" aria-controls="langMenu">
    <i class="fas fa-globe fa-fw"></i>
    <span><?php echo __('language'); ?> (<?php echo strtoupper($PANEL_LANG); ?>)</span>
  </a>
  <div id="langMenu" class="collapse" aria-labelledby="headingLang" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="?lang=it">Italiano</a>
      <a class="collapse-item" href="?lang=en">English</a>
      <a class="collapse-item" href="?lang=pt">Português</a>
    </div>
  </div>
</li>
