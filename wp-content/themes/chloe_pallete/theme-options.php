<h2>Theme Option</h2>

<?php
$form = tr_form("option");
$form->useJson();
$form->setGroup( $this->getName() );
?>

<div class="typerocket-container">
    <?php
    echo $form->open();

    $smtp = $form->text('SMTP Host');
    $smtp .= $form->text('SMTP Port');
    $smtp .= $form->radio('Encryption')->setOptions([
            'No encryption.' => '',
            'Use SSL encryption.' => 'ssl',
            'Use TLS encryption.' => 'tls'
        ]);
    $smtp .= $form->radio('Authentication')->setOptions([
            'No: Do not use SMTP authentication.' => 0,
            'Yes: Use SMTP authentication.' => 1
        ]);
    $smtp .= $form->text('Username');
    $smtp .= $form->text('Password')->setType('password');
    $smtp .= $form->text('From Email');
    $smtp .= $form->text('Receive Email');

    
    $config= $form->text('company_phone')->setLabel('Hotline');
    $config.= $form->textarea('company_contact')->setLabel('Thông tin liên hệ');
    $config.= $form->textarea('company_contact_en')->setLabel('Thông tin liên hệ (EN)');
    $config.= $form->text('link_360')->setLabel('Link 360');
    $config.= $form->text('link_messenger')->setLabel('Link Messenger');



    

    $social = $form->text('Facebook');
    $social .= $form->text('Tiktok');
    $social .= $form->text('Youtube');

    // popup
    $popup = $form->checkbox('enable_popup')->setLabel('Hiển thị');
    $popup .= $form->image('banner_popup')->setLabel('Banner');
    $popup .= $form->text('link_popup')->setLabel('Liên kết');

    $script = $form->textarea('script_header')->setLabel('Header');
    $script .= $form->textarea('script_body')->setLabel('Body');
    $script .= $form->textarea('script_footer')->setLabel('Footer');



    // save
    $save = $form->submit( 'Lưu' );

    // layout
    tr_tabs()
    ->setSidebar( $save )
    ->addTab( 'Cấu hình', $config )
    ->addTab( 'Email SMTP', $smtp )
    ->addTab( 'Mạng xã hội', $social )
    ->addTab( 'Script', $script )
    ->addTab( 'Popup', $popup )
    ->render( 'box' );
    echo $form->close();
    ?>
</div>

