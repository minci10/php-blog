<div class="sag">
    <div class="sag3">
        <h2>KATEGORILER</h2>
        <ul>
            <?php $sgkt = DB::get('SELECT * FROM KATEGORILER where kategori_ustid is null');
            if (is_array($sgkt)) {
                foreach ($sgkt as $st) {
                    echo '<li>';
            ?> <a href="index.php?id=<?php echo $st->kategori_id; ?>">
                        <?php

                        echo $st->kategori_adi; ?>

                    </a></li>
            <?php }
            } ?>
        </ul>
    </div>
    <div class="sag2">
        <h2>SON EKLENEN YAZILAR</h2>
        <?php $sgkn = DB::get('SELECT * FROM makale order by makale_id desc LIMIT 10');
        if (is_array($sgkn)) {
            foreach ($sgkn as $sn) {
                echo '<h3>';
        ?> <a href="icerik.php?id=<?php echo $sn->makale_id; ?>">
                    <?php

                    echo $sn->makale_baslik; ?>

                </a></h3>
        <?php }
        } ?>
    </div>
    <div class="sag3">
        <h2>SON YORUMLAR</h2>
        <h3>
            <b><img src="images/avatar.jpg" alt="" /></b>
            bu bir deneme yorumudur <br /><span style="font-size:17px;">mehmet</span>
        </h3>
        <h3>
            <b><img src="images/avatar.jpg" alt="" /></b>
            deneme yorumu...<br /><span style="font-size:17px;">ahmet</span>
        </h3>
        <h3>
            <b><img src="images/avatar.jpg" alt="" /></b>
            deneme yorumu...<br /><span style="font-size:17px;">ali</span>
        </h3>
    </div>
</div>