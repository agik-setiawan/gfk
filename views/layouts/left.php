<!-- <aside class="main-sidebar"> -->
<section class="sidebar">
  <div class="box">




        <?= app\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu bg-info'],
                'items' => [
                    ['label' => 'Questionnaire Item', 'options' => ['class' => 'header bg-aqua color-palette']],
                    ['label' => 'Administration', 'icon' => 'file-code-o', 'url' => ['/Administration/view']],
                    ['label' => 'Area UC', 'icon' => 'file-code-o', 'url' => ['/Administration/view']],
                    ['label' => 'Shop Information', 'icon' => 'file-code-o', 'url' => ['/Administration/view']],
                    ['label' => 'Persentase Display', 'icon' => 'file-code-o', 'url' => ['/Administration/view']],
                    ['label' => 'Tipe Toko', 'icon' => 'file-code-o', 'url' => ['/Administration/view']],
                    ['label' => 'Keterangan Lain', 'icon' => 'file-code-o', 'url' => ['/Administration/view']],

                    [
                        'label' => 'Product Display & Brand',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Audio Visual ', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Lighting', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'MDA & SDA', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'SDA', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'SDA', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'SDA', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Auto', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Auto', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Photo', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'IT (DPC/PPC) & Peripheral', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'IT Peripheral', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'IT Component', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'IT Networking', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'IT Accessories', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'IT Accessories & Telecom', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Telecom', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Home Entertaintment', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Others', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            

                        ],
                    ],
                ],
            ]
        ) ?>
</div>
      </section>

  </aside>
