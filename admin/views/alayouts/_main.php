
<body class="hold-transition sidebar-mini layout-fixed">
<?php $this->beginBody() ?>

<div class="d-flex" id="wrapper">
    <?= $this->render('sidebar', ['assetDir' => $assetDir]) ?>
    <!-- Page Content -->
    <div id="page-content-wrapper"> 
        <?= $this->render('_navbar', ['assetDir' => $assetDir]) ?>   
        <?= $this->render('content', ['content' => $content, 'assetDir' => $assetDir]) ?>
       
    </div>    
      
</div>
<!--?= $this->render('footer') ?-->
<script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
